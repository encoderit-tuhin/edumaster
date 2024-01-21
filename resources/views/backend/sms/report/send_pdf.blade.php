<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Lists</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    @include('backend.students.student_reports.quick_search.print_css')

    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
        }

        .dashed-line {
            border-top: 2px dashed #000;
            width: 40%;
            margin: 10px 0;
            display: inline-block;
        }

        .heading-container {
            text-align: center;
        }

        table {
            width: 100%;
            margin-bottom: 15px;
            border-collapse: collapse;
            font-size: 12px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid black;
        }

        th {
            background-color: #696969;
            color: white;
        }

        tbody tr {
            padding: 8px;
        }

        tfoot tr {
            background-color: #696969;
        }
    </style>
</head>

<body style="width: 100%; margin: 0 auto; padding: 0;">

    {{-- Institute Info Start --}}
    <table style="background: #fff; color: #222; width: 100%; border: none;">
        <tr>
            <td style="width: 10%; border: none;">
                <img src="data:image/png;base64,{{ $logo }}" alt="institute-logo"
                    style="width: 100px; padding: 10px 15px;">
            </td>
            <td style="width: 90%; border: none;">
                <table>
                    <tr>
                        <td style="border: none;">
                            <h4 style="font-size: 24px; font-weight: 700;">
                                {{ get_option('school_name') }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none;">
                            <h5 style="font-size: 18px; font-weight: 500;">{{ get_option('address') }}
                            </h5>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    {{-- Institute Info End --}}
    <hr style="border: 1px solid #000000">

    <table style="background: #fff; color: #222; width: 100%; text-align: center">
        <tr>
            <td style="border: none;">
                <div class="heading-container">
                    <h2 style="margin-bottom: 0;">Total SMS Reports</h2>
                    <span class="dashed-line"></span>
                </div>
            </td>
        </tr>
    </table>

    <table
        style="background: #fff; color: #222; width: 100%; text-align: center; border-collapse: collapse; padding: 10px 0; margin-bottom: 20px;">
        <tr>
            <td style="border: 1px solid black;">From Date:</td>
            <td style="border: 1px solid black; font-weight: 700">{{ $fromDate }}</td>
            <td style="border: 1px solid black;">To Date:</td>
            <td style="border: 1px solid black; font-weight: 700">{{ $toDate }}</td>
            <td style="border: 1px solid black;">Type:</td>
            <td style="border: 1px solid black; font-weight: 700">{{ $type }}</td>
        </tr>
    </table>

    @if (isset($smsReports) && count($smsReports) > 0)
        <table style="width: 100%; margin-bottom: 15px;">
            <thead style="background-color: #696969; color: white;">
                <tr style="padding: 15px 0 !important;">
                    <th>{{ _lang('Send Date') }}</th>
                    <th>{{ _lang('Name') }}</th>
                    <th>{{ _lang('Phone') }}</th>
                    <th>{{ _lang('message') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($smsReports as $item)
                    <tr style="padding: 15px 0 !important;">
                        <td>
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }} -
                            {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                        </td>
                        <td>{{ $item->user?->name }}</td>
                        <td>{{ $item->receiver }}</td>
                        <td>{{ $item->message }}</td>
                    </tr>
                @empty
                    <tr style="padding: 15px 0 !important;">
                        <td colspan="2" class="text-danger">No Student Found</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot style="background-color: #696969">
                <tr>
                    <td colspan="2" style="text-align:right; color: white;">{{ _lang('Total') }}</td>
                    <td colspan="2" style="text-align:left; color: white;">{{ count($smsReports) }}</td>
                </tr>
            </tfoot>
        </table>
    @endif

    <table>
        <tr>
            <td style="text-align:left; border: none;">Powered by NMDC</td>
            {{-- <td style="text-align:center">Page 1 of 1</td> --}}
            @php
                $currentDate = date('M d, Y');
            @endphp
            <td style="text-align:right; border: none;">{{ $currentDate }}</td>
        </tr>
    </table>
</body>

</html>
