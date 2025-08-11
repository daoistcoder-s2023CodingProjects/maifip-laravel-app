<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Applicant;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('user')->orderByDesc('date_generated')->get();
        return view('admin.reports.index', compact('reports'));
    }

    public function store(Request $request)
    {
        $report = Report::create([
            'report_name' => $request->input('report_name'),
            'report_type' => $request->input('report_type'),
            'created_by' => Auth::id(),
            'date_generated' => now(),
            'file_path' => $request->input('file_path'),
            'filters' => $request->input('filters'),
        ]);
        return redirect()->back()->with('success', 'Report generated.');
    }

    public function exportPdf(Request $request)
    {
        $data = [/* your report data */];
        $pdf = Pdf::loadView('admin.reports.pdf', $data);
        return $pdf->download('report.pdf');
    }

    public function generatePatientListSummaryPdf(Request $request, $queryProps = null)
    {
        // Use $queryProps if provided (for regeneration), otherwise use $request
        $facility = $queryProps['facility'] ?? $request->input('facility');
        $date = $queryProps['day'] ?? $request->input('day');
        $venue = strtoupper($queryProps['venue'] ?? $request->input('venue', '_________________'));

        // Query applicants using is_approved and approval_date, not application_status
        $applicants = Applicant::where('is_approved', true)
            ->whereDate('approval_date', $date)
            ->where('hospital_name', $facility)
            ->get();

        $totalPatients = $applicants->count();
        $totalAmount = $applicants->sum('maifip_assistance_amount');

        $data = [
            'bundle_no' => '',
            'facility' => $facility,
            'venue' => $venue,
            'date' => $date,
            'total_patients' => $totalPatients,
            'total_amount' => number_format($totalAmount, 2),
            'applicants' => $applicants,
        ];

        $pdf = Pdf::loadView('admin.reports.patient_list_summary_pdf', $data);

        // Only create a new report if not regenerating from report_id
        if (!$queryProps) {
            $reportName = 'patient-list-summary-' . now()->format('Ymd_His');
            $createdBy = Auth::id() ?: '171844f9-f44d-4b70-ad3a-92b81ac20d2d';
            Report::create([
                'report_name' => $reportName,
                'report_type' => 'patient-list-coa',
                'created_by' => $createdBy,
                'date_generated' => now(),
                'filters' => json_encode([
                    'facility' => $facility,
                    'day' => $date,
                    'venue' => $venue,
                ]),
            ]);
        }

        return $pdf->download(
            ($queryProps['report_name'] ?? 'patient-list-summary-' . now()->format('Ymd_His')) . '.pdf'
        );
    }

    public function generateFundUtilizationPdf(Request $request, $queryProps = null)
    {
        $facility = $queryProps['facility'] ?? $request->input('facility');
        $year = $queryProps['year'] ?? $request->input('year');
        $currentMonth = isset($queryProps['month']) ? (int)$queryProps['month'] : (int)($request->input('month', date('n')));
        $currentDay = isset($queryProps['day']) ? (int)$queryProps['day'] : (int)($request->input('day', date('d')));

        // Get all approved applicants for the facility and year
        $applicants = Applicant::where('is_approved', true)
            ->whereYear('approval_date', $year)
            ->where('hospital_name', $facility)
            ->get();

        // Group by month and calculate totals
        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];
        $monthlyData = [];
        $grandTotalPatients = 0;
        $grandTotalAmount = 0;

        foreach ($months as $num => $name) {
            $monthApplicants = $applicants->filter(function($a) use ($num) {
                return \Carbon\Carbon::parse($a->approval_date)->month == $num;
            });
            $totalPatients = $monthApplicants->count();
            $totalAmount = $monthApplicants->sum('maifip_assistance_amount');
            $monthlyData[] = [
                'month' => $name,
                'total_patients' => $totalPatients,
                'total_amount' => $totalAmount,
            ];
            $grandTotalPatients += $totalPatients;
            $grandTotalAmount += $totalAmount;
        }

        $signDate = \Carbon\Carbon::createFromDate($year, $currentMonth, $currentDay)->format('F d, Y');

        $data = [
            'facility' => $facility,
            'year' => $year,
            'monthlyData' => $monthlyData,
            'grandTotalPatients' => $grandTotalPatients,
            'grandTotalAmount' => $grandTotalAmount,
            'currentMonth' => $currentMonth,
            'currentDay' => $currentDay,
            'signDate' => $signDate
        ];

        $pdf = Pdf::loadView('admin.reports.fund_utilization_pdf', $data)
            ->setPaper('a4', 'portrait');

        if (!$queryProps) {
            $reportName = 'fund-utilization-summary-' . now()->format('Ymd_His');
            $createdBy = Auth::id() ?: '171844f9-f44d-4b70-ad3a-92b81ac20d2d';
            Report::create([
                'report_name' => $reportName,
                'report_type' => 'fund-utilization',
                'created_by' => $createdBy,
                'date_generated' => now(),
                'filters' => json_encode([
                    'facility' => $facility,
                    'year' => $year,
                    'month' => $currentMonth,
                    'day' => $currentDay,
                ]),
            ]);
        }

        return $pdf->download(
            ($queryProps['report_name'] ?? 'fund-utilization-summary-' . now()->format('Ymd_His')) . '.pdf'
        );
    }

    // Main entry for generating reports PDF
    public function generateReportPdf(Request $request)
    {
        // If report_id is provided, regenerate from stored query
        $reportId = $request->input('report_id');
        if ($reportId) {
            $report = Report::findOrFail($reportId);
            $query = $report->filters ? json_decode($report->filters, true) : [];
            $reportType = $report->report_type;

            // Add report_name for filename
            $query['report_name'] = $report->report_name;
            switch ($reportType) {
                case 'patient-list-coa':
                    return $this->generatePatientListSummaryPdf($request, $query);
                case 'fund-utilization':
                    return $this->generateFundUtilizationPdf($request, $query);
                case 'fund_utilization':
                    return $this->generateFundUtilizationPdf($request, $query);
                default:
                    abort(400, 'Invalid report type.');
            }
        }

        $reportType = $request->input('report_type');
        switch ($reportType) {
            case 'patient-list-coa':
                return $this->generatePatientListSummaryPdf($request);
            case 'fund-utilization':
                return $this->generateFundUtilizationPdf($request);
            default:
                abort(400, 'Invalid report type.');
        }
    }

    // API to get all reports
    public function getReports(Request $request)
    {
        $reportTypeMap = [
            'patient-list-coa' => 'Summary of Patient List w/ COA Report',
            'fund-utilization' => 'Fund Utilization Report Summary',
            'fund_utilization' => 'Fund Utilization Report Summary',
        ];

        $perPage = (int)($request->query('per_page', 10));
        $page = (int)($request->query('page', 1));

        $reports = Report::orderByDesc('date_generated')->paginate($perPage, ['*'], 'page', $page);

        // Map report_type to readable name
        $reports->getCollection()->transform(function ($report) use ($reportTypeMap) {
            $report->report_type_label = $reportTypeMap[$report->report_type] ?? $report->report_type;
            return $report;
        });

        return response()->json([
            'success' => true,
            'data' => $reports->items(),
            'current_page' => $reports->currentPage(),
            'last_page' => $reports->lastPage(),
            'per_page' => $reports->perPage(),
            'total' => $reports->total(),
            'reportTypeMap' => $reportTypeMap,
        ]);
    }
}
