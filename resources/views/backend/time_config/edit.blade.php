@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ __('Update Time Config') }}
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('attendance-time-config.update', $attendanceTimeConfig->id) }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ __('Shift') }}</label>
                                        <select class="form-control" name="shift">
                                            <option value="">--Select One--</option>
                                            <option {{ $attendanceTimeConfig->shift == 'Morning' ? 'selected' : '' }}
                                                value="Morning">Morning</option>
                                            <option {{ $attendanceTimeConfig->shift == 'Day' ? 'selected' : '' }}
                                                value="Day">Day</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ __('Start Time') }}</label>
                                        <input type="time" class="form-control" name="start_time" required
                                            value="{{ $attendanceTimeConfig->start_time }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ __('End Time') }}</label>
                                        <input type="time" class="form-control" name="end_time" required
                                            value="{{ $attendanceTimeConfig->end_time }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ __('Delay Time') }}</label>
                                        <input type="time" class="form-control" name="delay_time" required
                                            value="{{ $attendanceTimeConfig->delay_time }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ __('SMS Status') }}</label>
                                        <select class="form-control" name="sms_status">
                                            <option {{ $attendanceTimeConfig->sms_status == '1' ? 'selected' : '' }}
                                                value="1">Present</option>
                                            <option {{ $attendanceTimeConfig->sms_status == '2' ? 'selected' : '' }}
                                                value="2">Absent</option>
                                            <option {{ $attendanceTimeConfig->sms_status == '3' ? 'selected' : '' }}
                                                value="3">Both</option>
                                            <option {{ $attendanceTimeConfig->sms_status == '4' ? 'selected' : '' }}
                                                value="4">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info">{{ __('Update Time Config') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
