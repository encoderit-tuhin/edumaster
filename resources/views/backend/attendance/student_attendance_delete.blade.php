@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">

                    </span>
                </div>

                <div class="panel-heading">
                    <div class="panel-title pull-left">
                        {{ _lang('Student Attendance Delete') }}
                    </div>

                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <form class="params-panel" action="{{ route('student_attendance.delete') }}" method="post"
                        accept-charset="utf-8">
                        @csrf
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Class') }}</label>
                                <select name="class_id" class="form-control select2" onChange="getData(this.value);"
                                    required>
                                    <option value="">{{ _lang('Select Class') }}</option>
                                    {{ create_option('classes', 'id', 'class_name', $class_id) }}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Section') }}</label>
                                <select name="section_id" class="form-control select2" required>
                                    <option value="">{{ _lang('Select Section') }}</option>
                                    {{ create_option('sections', 'id', 'section_name', $section_id) }}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Period') }}</label>
                                <select name="period_id" class="form-control select2" required>
                                    <option value="">{{ _lang('Select Period') }}</option>
                                    @foreach ($periods->sortBy('serial_no') as $period)
                                        <option {{ $period->id == $period_id ? 'selected' : '' }}
                                            value="{{ $period->id }}">
                                            {{ $period->period }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="date" class="control-label">Date</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="date"
                                        value="{{ $date }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="submit" style="margin-top:24px;"
                                    class="btn btn-primary btn-block rect-btn">{{ _lang('Delete Attendance') }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
