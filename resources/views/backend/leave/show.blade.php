@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading panel-title">{{ _lang('View Post') }}</div>

                <div class="panel-body">
                    <!--<ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#english">{{ _lang('English') }}</a></li>
      
      </ul>-->

                    <div class="tab-content params-panel">

                        <div id="english" class="tab-pane fade in active">
                            <table class="table table-bordered">

                                @isset($leave->student)
                                    <td>{{ _lang('Student') }}</td>
                                    <td>{{ $leave->student->name }}</td>
                                    </tr>
                                @endisset
                                <tr>
                                <tr>
                                    <td>{{ _lang('Leave Type') }}</td>
                                    <td>{{ $leave->leave_type }}</td>
                                </tr>
                                <tr>
                                    <td>{{ _lang('Reason') }}</td>
                                    <td>{{ $leave->reason }}</td>
                                </tr>
                                <tr>
                                    <td>{{ _lang('from date') }}</td>
                                    <td>{{ $leave->from_date }}</td>
                                </tr>
                                <tr>
                                    <td>{{ _lang('To date') }}</td>
                                    <td>{!! $leave->to_date !!}</td>
                                </tr>
                                <tr>
                                    <td>{{ _lang('Status') }}</td>
                                    <td>{{ $leave->status }}</td>
                                </tr>
                                <tr>
                                    <td>{{ _lang('Approved By') }}</td>
                                    <td>{{ $leave->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ _lang(' Submit By') }}</td>
                                    <td>{{ $leave->user->name  }}</td>
                                </tr>


                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
