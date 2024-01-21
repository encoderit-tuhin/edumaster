<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Religion info section-wise</title>

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
                    <h2 style="margin-bottom: 0;">Total Student List</h2>
                    <span class="dashed-line"></span>
                </div>
            </td>
        </tr>
    </table>

    <table
        style="background: #fff; color: #222; width: 100%; text-align: center; border-collapse: collapse; padding: 10px 0; margin-bottom: 20px;">
        <tr>
            <td style="border: 1px solid black;">Academic Year:</td>
            <td style="border: 1px solid black; font-weight: 700">2023</td>
            <td style="border: 1px solid black;">Type:</td>
            <td style="border: 1px solid black; font-weight: 700">Section Wise</td>
        </tr>
    </table>

    @if (isset($religionSectionWiseData) && count($religionSectionWiseData) > 0)
        <table style="width: 100%; margin-bottom: 15px;">
            <thead style="background-color: #696969; color: white;">
                <tr style="padding: 15px 0 !important;">
                    <th>{{ _lang('Class') }}</th>
                    <th>{{ _lang('Shift') }}</th>
                    <th>{{ _lang('Section') }}</th>
                    <th>{{ _lang('Total Students') }}</th>
                    <th>{{ _lang('Islam') }}</th>
                    <th>{{ _lang('Christian') }}</th>
                    <th>{{ _lang('Hindu') }}</th>
                    <th>{{ _lang('Buddhism') }}</th>
                    <th>{{ _lang('Others') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($religionSectionWiseData as $data)
                    <tr>
                        <td>{{ $data->class_name }}</td>
                        <td>1st Shift</td>
                        <td>{{ $data->section_name ?? 'N/A' }}</td>
                        <td>{{ $data->total_religions }}</td>
                        <td>{{ $data->islam_religions }}</td>
                        <td>{{ $data->christian_religions }}</td>
                        <td>{{ $data->hindu_religions }}</td>
                        <td>{{ $data->buddhism_religions }}</td>
                        <td>{{ $data->others_religions }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-danger">No Student Found</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot style="background-color: #696969">
                <tr>
                    <td colspan="3" class="text-right">{{ _lang('Total') }}</td>
                    <td>{{ $totalReligionSectionStudentCount }}</td>
                    <td>{{ $totalReligionIslamStudentsSectionCount }}</td>
                    <td>{{ $totalReligionChristianStudentsSectionCount }}</td>
                    <td>{{ $totalReligionHinduStudentsSectionCount }}</td>
                    <td>{{ $totalReligionBuddhismStudentsSectionCount }}</td>
                    <td>{{ $totalReligionOthersStudentsSectionCount }}</td>
                </tr>
            </tfoot>
        </table>
    @endif

    <table>
        <tr>
            <td style="text-align:left; border: none;">Powered by NMDC</td>
            {{-- <td style="text-align:center">Page 1 of 1</td> --}}
            @php
                $currentDate = date('M d,Y');
            @endphp
            <td style="text-align:right; border: none;">{{ $currentDate }}</td>
        </tr>
    </table>
</body>

</html>
