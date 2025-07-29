<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Arial', 'Helvetica', 'Liberation Sans', 'DejaVu Sans', sans-serif;
            font-size: 0.74em;
            color: #222;
            margin: 0.7cm 0.7cm 0.7cm 0.7cm;
        }
        .center { text-align: center; }
        .bold { font-weight: bold; }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1em;
            font-size: 0.74em;
        }
        th, td {
            border: 1px solid #222;
            padding: 0.18em 0.28em;
        }
        th {
            background: #fff;
            color: #222;
            font-weight: bold;
            text-align: center;
            font-size: 0.78em;
            height: 3em;
        }
        td.balance-col {
            width: 18%;
        }
        .gray {
            background: #f8f8f8;
            color: #d00;
            font-style: italic;
            height: 1.1em;
        }
        .right { text-align: right; }
        .footer {
            margin-top: 1em;
            font-size: 0.7em;
        }
        .signatories {
            margin-top: 2.2em;
        }
        .sign-row {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 2em;
            margin-top: 1.2em;
        }
        .sign-block {
            flex: 1 1 0;
            text-align: center;
            font-size: 0.74em;
            vertical-align: top;
            min-width: 0;
            box-sizing: border-box;
        }
        .sign-label {
            font-weight: bold;
            margin-bottom: 0.5em;
            display: block;
        }
        .sign-line {
            display: block;
            margin: 0.5em 0 0.5em 0;
            border-bottom: 1px solid #222;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
        .sign-role {
            margin-bottom: 0.2em;
        }
        .sign-date {
            margin-top: 0.2em;
        }
        .header-row {
            position: relative;
            margin-bottom: 0.2em;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .annex {
            position: absolute;
            right: 0;
            top: 0;
            font-weight: bold;
            border: 1px solid #222;
            padding: 0.08em 0.5em;
            background: #fff;
            font-size: 0.74em;
        }
        .maifip-logo {
            height: 38px;
            width: 38px;
            object-fit: contain;
            margin-right: 5em;
            vertical-align: end;
            display: inline-block;
            transform: translate(1rem, 2rem);
        }
        .maifip-header-title {
            font-weight: bold;
            font-size: 1.05em;
            letter-spacing: 0.08em;
            display: inline-block;
            vertical-align: middle;
        }
        .maifip-header-desc {
            font-size: 0.85em;
            color: #444;
            margin-top: 0.1em;
            display: inline-block;
            vertical-align: middle;
        }
        .maifip-header-center {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1em;
            margin-bottom: 0.2em;
        }
        @page { size: A4; margin: 0.7cm; }
        .table tr td {
            background: #fff;
        }
        .table tr.bold td {
            background: #fff;
            color: #222;
            font-weight: bold;
        }
        .table tr.total-row td {
            border: none !important;
            background: transparent !important;
            color: #222 !important;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header-row" style="height:38px;">
        <span class="annex">ANNEX A2</span>
        <div class="maifip-header-center">
            <img src="{{ public_path('images/maifip_logo.png') }}" alt="MAIFIP Logo" class="maifip-logo">
        </div>
    </div>
    <div class="center bold" style="font-size:0.78em;">MAIFIP</div>
    <div class="center bold" style="font-size:0.78em;">Republic of the Philippines</div>
    <div class="center bold" style="font-size:0.78em;">Medical Assistance to Indigent Patients (MAIP) Program - Fund Utilization Report Summary CY {{ $year }}</div>
    <div class="center" style="margin-bottom:0.7em; font-size:0.78em; font-style:italic;">
        As of January {{ $year }}
    </div>
    <table style="width:100%; margin-bottom:0.3em; border:none; font-size:0.74em;">
        <tr>
            <td style="border:none; width:20%;">Name of Hospital:</td>
            <td style="border:none;"><span class="bold">{{ $facility }}</span></td>
        </tr>
        <tr>
            <td style="border:none; width:20%;">Region:</td>
            <td style="border:none;">V - Bicol</td>
        </tr>
    </table>
    <table class="table">
        <tr>
            <th>SAA No. and Date of Issuance of SAA</th>
            <th>Amount of SAA</th>
            <th>Total Fund Allocation</th>
            <th>Month Utilized</th>
            <th>Total Number of Patients Served</th>
            <th>Total Actual Approved Assistance through MAIPP (Utilized Amount)</th>
            <th class="balance-col">Balance</th>
        </tr>
        <tr class="gray">
            <td colspan="3">Remaining balance from previous year:</td>
            <td></td>
            <td></td>
            <td class="right" style="color:#d00;">{{ number_format($grandTotalAmount, 2) }}</td>
            <td class="right" style="color:#d00;">-{{ number_format($grandTotalAmount, 2) }}</td>
        </tr>
        @php
            $monthsArr = [
                1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
            ];
            $monthDataMap = collect($monthlyData)->keyBy('month');
        @endphp
        @foreach($monthsArr as $num => $name)
        @php
            $row = $monthDataMap->get($name, ['total_patients' => 0, 'total_amount' => 0]);
        @endphp
        <tr>
            <td></td>
            <td class="right">0.00</td>
            <td class="right">0.00</td>
            <td>{{ $name }}</td>
            <td class="center">{{ $row['total_patients'] }}</td>
            <td class="right">{{ number_format($row['total_amount'], 2) }}</td>
            <td class="right balance-col">{{ $name === \Carbon\Carbon::createFromDate($year, $currentMonth, 1)->format('F') ? number_format(-1 * $grandTotalAmount, 2) : '0.00' }}</td>
        </tr>
        @endforeach
    </table>
    <table style="width:100%; font-size:0.74em; margin-top:0.2em; border:none;">
        <tr>
            <td style="font-weight:bold; text-align:left; border:none; width:9%;">TOTAL</td>
            <td style="font-weight:bold; text-align:right; border:none;">0.00</td>
            <td style="font-weight:bold; text-align:right; border:none;">0.00</td>
            <td style="border:none;"></td>
            <td style="font-weight:bold; text-align:right; border:none;">{{ $grandTotalPatients }}</td>
            <td style="font-weight:bold; text-align:right; border:none;">{{ number_format($grandTotalAmount, 2) }}</td>
            <td style="font-weight:bold; text-align:right; border:none;">{{ number_format(-1 * $grandTotalAmount, 2) }}</td>
        </tr>
    </table>
    <div class="footer">
        NOTE:<br>
        *Affix initials per page of report except for the last page which includes complete signatories
    </div>
    <table style="width: 100%; margin-top: 2.2em; border-collapse: collapse; border: none;">
        <tr>
            <td style="width: 33%; text-align: left; vertical-align: top; border: none; font-size: 0.74em;">
                <span>Prepared by:</span>
                <div style="height: 2.2em;"></div>
                <div style="font-weight: bold; margin-top: 1.2em;">_________________</div>
                RSW<br>
                {{ $signDate }}
            </td>
            <td style="width: 33%; text-align: left; vertical-align: top; border: none; font-size: 0.74em;">
                <span>Certified Correct:</span>
                <div style="height: 2.2em;"></div>
                <div style="font-weight: bold; margin-top: 1.2em;">_________________</div>
                Admin Officer Designated<br>
                {{ $signDate }}
            </td>
            <td style="width: 33%; text-align: left; vertical-align: top; border: none; font-size: 0.74em;">
                <span>Approved by:</span>
                <div style="height: 2.2em;"></div>
                <div style="font-weight: bold; margin-top: 1.2em;">_________________</div>
                Chief Of Hospital<br>
                {{ $signDate }}
            </td>
        </tr>
    </table>
    <div style="position: fixed; left: 0; bottom: 0; width: 100%; font-size: 0.72em; color: #444; text-align: left; padding: 0.7em 0;">
        CONFIDENTIALITY NOTICE:<br>
        <div style="margin-bottom:0.6em;">
            This generated report is for the exclusive and confidential use of the hospital MAIFIPP focal and the DOH Bicol CHD MAIFIPP focal. If you are not the intended recipient, please be aware that any<br>
            use, reproduction, or distribution of this report is strictly prohibited.<br>
        </div>
        <div style="text-align:right;">
            Page 1 of 1<br>
        </div>
        This report is system generated on {{ date('m/d/Y', strtotime($year . '-' . $currentMonth . '-' . $currentDay)) }}
    </div>
</body>
</html>