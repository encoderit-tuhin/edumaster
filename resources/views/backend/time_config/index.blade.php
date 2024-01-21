@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ __('Add Time Config') }}
                    </span>
                </div>
                <div class="panel-body">
                    <form action="{{ route('attendance-time-config.store') }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ __('Shift') }}</label>
                                        <select class="form-control" name="shift">
                                            <option value="">--Select One--</option>
                                            <option value="Morning">Morning</option>
                                            <option value="Day">Day</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ __('Start Time') }}</label>
                                        <input type="time" class="form-control" name="start_time" required
                                            value="{{ old('start_time') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ __('End Time') }}</label>
                                        <input type="time" class="form-control" name="end_time" required
                                            value="{{ old('end_time') }}">
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
                                            value="{{ old('delay_time') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ __('SMS Status') }}</label>
                                        <select class="form-control" name="sms_status">
                                            <option value="4" selected>None</option>
                                            <option value="1">Present</option>
                                            <option value="2">Absent</option>
                                            <option value="3">Both</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info">{{ __('Add Time Config') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ __('Time Config List') }}
                    </span>
                </div>
                <div class="panel-body no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ __('SL No.') }}</th>
                            <th>{{ __('Shift') }}</th>
                            <th>{{ __('Start Time') }}</th>
                            <th>{{ __('End Time') }}</th>
                            <th>{{ __('Delay Time') }}</th>
                            <th>{{ __('SMS Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($attendanceTimeConfig as $timeConfig)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        {{ $timeConfig->shift }}
                                    </td>
                                    <td>{{ $timeConfig->start_time }}</td>
                                    <td>{{ $timeConfig->end_time }}</td>
                                    <td>{{ $timeConfig->delay_time }}</td>
                                    <td>
                                        @if ($timeConfig->sms_status == 1)
                                            <span>Present</span>
                                        @endif

                                        @if ($timeConfig->sms_status == 2)
                                            <span>Absent</span>
                                        @endif

                                        @if ($timeConfig->sms_status == 3)
                                            <span>Both</span>
                                        @endif

                                        @if ($timeConfig->sms_status == 4)
                                            <span>None</span>
                                        @endif
                                    </td>

                                    <td>
                                        <form action="{{ route('attendance-time-config.destroy', $timeConfig->id) }}"
                                            method="post">
                                            <a href="{{ route('attendance-time-config.edit', $timeConfig->id) }}"
                                                class="btn btn-warning btn-xs"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
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
