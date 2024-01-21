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
            font-size: 10px;
        }

        th,
        td {
            padding: 5px;
            border: 1px solid black;
        }

        th {
            background-color: #696969;
            color: white;
        }

        tbody tr {
            padding: 5px;
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
            @php
                $class_id = (int) request()->class_id;

                $className = App\ClassModel::where('id', $class_id)
                    ->select('id', 'class_name')
                    ->first();
            @endphp

            <td style="border: 1px solid black;">Class:</td>
            <td style="border: 1px solid black; font-weight: 700">{{ $className->class_name }}</td>
        </tr>
    </table>

    @if (isset($classWiseStudents) && count($classWiseStudents) > 0)
        <table style="width: 100%; margin-bottom: 15px;">
            <thead style="background-color: #696969; color: white;">
                <tr style="padding: 15px 0 !important;">
                    <th>{{ _lang('Student ID') }}</th>
                    <th>{{ _lang('Roll') }}</th>
                    <th>{{ _lang('Name') }}</th>
                    <th>{{ _lang('Group') }}</th>
                    <th>{{ _lang('Gender') }}</th>
                    <th>{{ _lang('Father`s Name') }}</th>
                    <th>{{ _lang('Mother`s Name') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($classWiseStudents as $student)
                    <tr style="padding: 15px 0 !important;">
                        <td>
                            {{ $student->id }}
                        </td>
                        <td>
                            {{ $student->roll }}
                        </td>
                        <td>
                            {{ $student->first_name }} {{ $student->last_name }}
                        </td>
                        <td>
                            {{ $student->group_name }}
                        </td>
                        <td>
                            {{ $student->gender }}
                        </td>
                        <td>
                            {{ $student->father_name }}
                        </td>
                        <td>
                            {{ $student->mother_name }}
                        </td>
                    </tr>
                @empty
                    <tr style="padding: 15px 0 !important;">
                        <td colspan="2" class="text-danger">No Student Found</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot style="background-color: #696969">
                <tr>
                    <td colspan="4" style="text-align:right; color: white;">{{ _lang('Total') }}</td>
                    <td colspan="3" style="text-align:left; color: white;">{{ count($classWiseStudents) }}</td>
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




{{-- <div class="panel panel-default">
     <div class="panel-body">
         <div class="row justify-content-center">
             <div class="col-lg-4">
                 <div class="card">
                     <form class="" method="post" action="{{ route('class-wise-student-list.search') }}"
                         autocomplete="off" accept-charset="utf-8">
                         @csrf

                         <input type="hidden" name="form_type" value="class_wise">

                         <div class="col-md-8">
                             <div class="form-group">
                                 <label class="control-label">{{ _lang('Class') }}</label>
                                 <select class="form-control select2" name="class_id" required>
                                     {{ create_option('classes', 'id', 'class_name', $classId) }}
                                 </select>
                             </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                                 <button type="submit" style="margin-top:24px;"
                                     class="btn btn-primary btn-block rect-btn">{{ _lang('Search') }}</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>

             <div class="col-lg-12">
                 <div class="panel-body">
                     @if (isset($classWiseStudents) && count($classWiseStudents) > 0)
                         <table class="table table-bordered data-table">

                             <thead>
                                 <tr class="bg-primary text-white">
                                     <th colspan="4" class="text-left">{{ _lang('Student Details (Class Wise)') }}
                                     </th>
                                     <th colspan="3" class="text-right">{{ _lang('Total Found') }} :
                                         {{ count($classWiseStudents) }}</th>
                                 </tr>
                                 <tr class="bg-white">
                                     <th>{{ _lang('Student ID') }}</th>
                                     <th>{{ _lang('Roll') }}</th>
                                     <th>{{ _lang('Name') }}</th>
                                     <th>{{ _lang('Group') }}</th>
                                     <th>{{ _lang('Gender') }}</th>
                                     <th>{{ _lang('Father`s Name') }}</th>
                                     <th>{{ _lang('Mother`s Name') }}</th>
                                 </tr>
                             </thead>


                             <tbody>
                                 @if (isset($classWiseStudents))
                                     @foreach ($classWiseStudents as $student)
                                         <tr>
                                             <td>
                                                 {{ $student->id }}
                                             </td>
                                             <td>
                                                 {{ $student->roll }}
                                             </td>
                                             <td>
                                                 {{ $student->first_name }} {{ $student->last_name }}
                                             </td>
                                             <td>
                                                 {{ $student->group_name }}
                                             </td>
                                             <td>
                                                 {{ $student->gender }}
                                             </td>
                                             <td>
                                                 {{ $student->father_name }}
                                             </td>
                                             <td>
                                                 {{ $student->mother_name }}
                                             </td>
                                         </tr>
                                     @endforeach
                                 @else
                                     <tr>
                                         <td colspan="7" class="text-danger">No Student Found</td>
                                     </tr>
                                 @endif

                             </tbody>
                         </table>

                         @if (isset($classId))
                             <form action="{{ route('student-details-download.index') }}" method="post"
                                 style="display: inline;">
                                 @csrf
                                 <input type="hidden" name="form_type" value="class_wise">
                                 <input type="hidden" name="class_id" value="{{ $classId }}">
                                 <button type="submit" style="margin-top:24px;" class="btn btn-primary rect-btn">
                                     <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                     {{ _lang('PDF Download') }}
                                 </button>
                             </form>
                         @endif
                     @endif
                 </div>
             </div>
         </div>

     </div>
 </div> --}}
