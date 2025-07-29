<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
        .center { text-align: center; }
        .bold { font-weight: bold; }
        .uppercase { text-transform: uppercase; }
        .underline { text-decoration: underline; }
        .spacer { margin-top: 2.7em; }
        .tight { margin-top: 0.7em; }
        .vcenter {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 4rem 0;
        }
        h1 {
            font-weight: 700;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 1.05em;
            margin-top: 1.2em;
        }
        th, td {
            border: 1px solid #222;
            padding: 0.35em 0.5em;
        }
        th {
            background: #f8f8f8;
            font-weight: bold;
            text-align: center;
        }
        .table-header {
            background: #f8f8f8;
        }
        .table-total {
            font-weight: bold;
            background: #f8f8f8;
        }
        .nowrap {
            white-space: nowrap;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="vcenter">
        <h1 class="center bold uppercase">BUNDLE NO. __</h1>
        <div class="spacer"></div>
        <h1 class="center bold uppercase underline" style="margin-bottom:0.2em;">FACILITY:</h1>
        <h1 class="center bold uppercase" style="margin-top:0.2em;">{{ $facility }}</h1>
        <div class="spacer"></div>
        <h1 class="center bold uppercase" style="margin-bottom:0.2em;">VENUE:</h1>
        <h1 class="center bold uppercase" style="margin-top:0.2em;">{{ $venue }}</h1>
        <div class="spacer"></div>
        <h1 class="center bold uppercase tight">DATE: {{ \Carbon\Carbon::parse($date)->format('F d, Y') }}</h1>
        <h1 class="center bold uppercase tight">NO. OF PATIENT: {{ $total_patients }}</h1>
        <h1 class="center bold uppercase tight">AMOUNT: {{ $total_amount }}</h1>
    </div>

    <div class="page-break"></div>

    <table style="width:75%; margin:auto;">
        <tr>
            <td class="bold nowrap" style="width:35%;">DATE:</td>
            <td>{{ \Carbon\Carbon::parse($date)->format('F d, Y') }}</td>
        </tr>
        <tr>
            <td class="bold nowrap">VENUE:</td>
            <td>{{ $venue }}</td>
        </tr>
        <tr>
            <td class="bold nowrap">TOTAL NO. OF PATIENT:</td>
            <td>{{ $total_patients }}</td>
        </tr>
        <tr>
            <td class="bold nowrap">TOTAL AMOUNT:</td>
            <td>{{ number_format((float) $total_amount, 2) }}</td>
        </tr>
        <tr>
            <td class="bold nowrap">FACILITY:</td>
            <td>
                @php
                    $acronym = implode('', array_map(function($w) { return mb_substr($w,0,1); }, explode(' ', $facility)));
                @endphp
                {{ strtoupper($acronym) }}
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:0;">
                <table style="width:100%; border:none; margin-top:0;">
                    <tr class="table-header">
                        <th style="width:5%; border:1px solid #222;">NO.</th>
                        <th style="width:65%; border:1px solid #222;">NAME OF PATIENT</th>
                        <th style="width:30%; border:1px solid #222;">AMOUNT</th>
                    </tr>
                    @foreach($applicants as $i => $row)
                    <tr>
                        <td style="text-align:center; border:1px solid #222;">{{ $i+1 }}</td>
                        <td style="border:1px solid #222;">{{ $row->patient_first_name }} {{ $row->patient_middle_name }} {{ $row->patient_family_name }}</td>
                        <td style="text-align:right; border:1px solid #222;">
                            {{ number_format((float) $row->maifip_assistance_amount, 2) }}
                        </td>
                    </tr>
                    @endforeach
                    <tr class="table-total">
                        <td style="border:1px solid #222;"></td>
                        <td style="text-align:left; border:1px solid #222;">TOTAL</td>
                        <td style="text-align:right; border:1px solid #222;">{{ number_format((float) $total_amount, 2) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
