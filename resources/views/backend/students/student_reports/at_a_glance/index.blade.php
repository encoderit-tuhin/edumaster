@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th colspan="4" class="text-left">{{ _lang('Student List') }}
                                </th>
                                <th colspan="4" class="text-right">{{ _lang('Total Found') }} :
                                    {{ count($students) }}</th>
                            </tr>
                            <tr class="bg-white">
                                <th>{{ _lang('Student ID') }}</th>
                                <th>{{ _lang('Roll No.') }}</th>
                                <th>{{ _lang('Name') }}</th>
                                <th>{{ _lang('Class') }}</th>
                                <th>{{ _lang('Shift') }}</th>
                                <th>{{ _lang('Section') }}</th>
                                <th>{{ _lang('Gender') }}</th>
                                <th>{{ _lang('G.Mobile') }}</th>
                            </tr>
                        </thead>


                        <tbody>
                            @if (isset($students))
                                @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            {{ $student->id }}
                                        </td>
                                        <td>{{ $student->roll }}</td>
                                        <td> {{ $student->first_name }} {{ $student->last_name }}</td>
                                        <td>{{ $student->class_name }}</td>
                                        <td>
                                            ---
                                        </td>
                                        <td>
                                            {{ $student->section_name }}
                                        </td>
                                        <td>
                                            {{ $student->gender }}
                                        </td>
                                        <td>
                                            {{ $student->phone }}
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

                    <a href="{{ route('at-a-glance-pdf.index') }}" style="margin-top:24px;"
                        class="btn btn-primary rect-btn">
                        <i class="fa fa-cloud-download" aria-hidden="true"></i>
                        {{ _lang('PDF Download') }}
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
