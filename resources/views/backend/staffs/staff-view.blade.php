@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-sm-10">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="fa fa-dot-circle-o"></i>{{ _lang('Staff Profile') }}
                    </div>
                </div>
                <table class="table table-striped table-bordered" width="100%">
                    <tbody>
                        <tr>
                            <td style="text-align: center;" colspan="4"><img width="200px" style="border-radius: 7px;"
                                    src="{{ asset('uploads/images/' . $staff->image) }}"></td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ _lang('Name') }}</td>
                            <td colspan="2">{{ $staff->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Designation') }}</td>
                            <td>{{ $staff->designation }}</td>
                            <td>{{ _lang('Date Of Birth') }}</td>
                            <td>{{ $staff->birthday }}</td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Gender') }}</td>
                            <td>{{ $staff->gender }}</td>
                            <td>{{ _lang('Religion') }}</td>
                            <td>{{ $staff->religion }}</td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Joining Date') }}</td>
                            <td>{{ $staff->joining_date }}</td>
                            <td>Address</td>
                            <td>{{ $staff->address }}</td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Phone') }}</td>
                            <td>{{ $staff->phone }}</td>
                            <td>{{ _lang('Email') }}</td>
                            <td>{{ $staff->email }}</td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Blood Group') }}</td>
                            <td>{{ $staff->blood }}</td>
                            <td>{{ _lang('SL') }}</td>
                            <td>{{ $staff->sl }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
