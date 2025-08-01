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

    public function generatePatientListSummaryPdf(Request $request)
    {
        $facility = $request->input('facility');
        $date = $request->input('day');
        $venue = strtoupper($request->input('venue', '_________________'));

        // Query applicants using is_approved and approval_date, not application_status
        $applicants = Applicant::where('is_approved', true)
            ->whereDate('approval_date', $date)
            ->where('hospital_name', $facility)
            ->get();

        $totalPatients = $applicants->count();
        $totalAmount = $applicants->sum('maifip_assistance_amount');

        $data = [
            'bundle_no' => '', // You can set this if needed
            'facility' => $facility,
            'venue' => $venue,
            'date' => $date,
            'total_patients' => $totalPatients,
            'total_amount' => number_format($totalAmount, 2),
            'applicants' => $applicants, // Pass applicants for table
        ];

        $pdf = Pdf::loadView('admin.reports.patient_list_summary_pdf', $data);

        // Store report details in reports table
        $reportName = 'patient-list-summary-' . now()->format('Ymd_His');
        $createdBy = Auth::id();
        if (!$createdBy) {
            $createdBy = '171844f9-f44d-4b70-ad3a-92b81ac20d2d';
        }
        Report::create([
            'report_name' => $reportName,
            'report_type' => 'patient-list-coa',
            'created_by' => $createdBy,
            'date_generated' => now(),
            // 'file_path' => $filePath, // Uncomment and set when file storage is ready
            'filters' => json_encode([
                'facility' => $facility,
                'date' => $date
            ]),
        ]);

        return $pdf->download($reportName . '.pdf');
    }

    public function generateFundUtilizationPdf(Request $request)
    {
        $facility = $request->input('facility');
        $year = $request->input('year');
        $currentMonth = (int)date('n');
        $currentDay = (int)date('d');

        if ($request->has('month')) {
            $currentMonth = (int)$request->input('month');
        }
        if ($request->has('day')) {
            $currentDay = (int)$request->input('day');
        }

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

        // Set paper size to A4 and orientation to portrait
        $pdf = Pdf::loadView('admin.reports.fund_utilization_pdf', $data)
            ->setPaper('a4', 'portrait');

        // Store report details in reports table
        $reportName = 'fund-utilization-summary-' . now()->format('Ymd_His');
        $createdBy = Auth::id() ?: '171844f9-f44d-4b70-ad3a-92b81ac20d2d';
        Report::create([
            'report_name' => $reportName,
            'report_type' => 'fund_utilization',
            'created_by' => $createdBy,
            'date_generated' => now(),
            'filters' => json_encode([
                'facility' => $facility,
                'year' => $year
            ]),
        ]);

        return $pdf->download($reportName . '.pdf');
    }

    // Main entry for generating reports PDF
    public function generateReportPdf(Request $request)
    {
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
