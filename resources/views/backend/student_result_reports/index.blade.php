@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Student Result Report List') }}</span>
                    <div class="pull-right" style="text-align: right;">
                        <a href="{{ route('student-result-reports.create') }}"
                            class="btn btn-info btn-sm">{{ _lang('Bulk Report Upload') }}</a>
                    </div>
                </div>
                <div class="panel-body no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Student ID') }}</th>
                            <th>{{ _lang('Roll No') }}</th>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('Group') }}</th>
                            <th>{{ _lang('Category') }}</th>
                            <th>{{ _lang('Gender') }}</th>
                            <th>{{ _lang('Religion') }}</th>
                            <th>{{ _lang('Mobile No') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($student_result_reports as $data)
                                <tr>
                                    <td>{{ $data->student_id }}</td>
                                    <td>{{ $data->roll_no }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->group }}</td>
                                    <td>{{ $data->category }}</td>
                                    <td>{{ $data->gender }}</td>
                                    <td>{{ $data->religion }}</td>
                                    <td>{{ $data->mobile_no }}</td>
                                    <td>
                                        <a href="{{ route('student-result-reports.show', $data->id) }}"
                                            class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
