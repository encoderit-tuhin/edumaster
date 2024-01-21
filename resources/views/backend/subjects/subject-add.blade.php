@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Add New Subject') }}
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('subjects.store') }}" class="validate" autocomplete="off" method="post"
                        accept-charset="utf-8">
                        @csrf
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">{{ __('Class') }}</label>
                                <select name="class_id" class="form-control select2" required>
                                    <option value="">{{ __('Select Class') }}</option>
                                    {{ create_option('classes', 'id', 'class_name', old('class_id')) }}
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Group</label>
                                <select name="group_id" class="form-control select2" required>
                                    <option value="">{{ __('Select Group') }}</option>
                                    {{ create_option('student_groups', 'id', 'group_name', old('group_id')) }}
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Subject Name') }}</label>
                                <input type="text" class="form-control" name="subject_name"
                                    value="{{ old('subject_name') }}" placeholder="Subject Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Subject Code') }}</label>
                                <input type="text" class="form-control" name="subject_code"
                                    value="{{ old('subject_code') }}" placeholder="Subject Code" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Subject Short Form') }}</label>
                                <input type="text" class="form-control" name="subject_short_form"
                                    value="{{ old('subject_short_form') }}" placeholder="Subject Short Form" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! generate_select(
                                    'subject_type',
                                    get_subject_types(),
                                    __('Subject Type'),
                                    old('subject_type'),
                                    true,
                                    __('--Select Type--'),
                                    'form-control',
                                    null,
                                    null,
                                    false
                                ) !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! generate_select(
                                    'subject_type_form',
                                    get_subject_all_types(),
                                    __('Subject Type Form'),
                                    old('subject_type_form'),
                                    true,
                                    __('--Select Type--'),
                                    'form-control',
                                    null,
                                    null,
                                    false
                                ) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('SL No') }}</label>
                                <input type="number" class="form-control" name="sl_no" value="{{ old('sl_no') }}"
                                    placeholder="sl_no">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Objective mark') }}</label>
                                <input type="number" class="form-control" name="objective" value="{{ old('objective') }}"
                                    placeholder="objective">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Written mark') }}</label>
                                <input type="number" class="form-control" name="written" value="{{ old('written') }}"
                                    placeholder="written">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Practical mark') }}</label>
                                <input type="number" class="form-control" name="practical" value="{{ old('practical') }}"
                                    placeholder="practical">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Full Marks') }}</label>
                                <input type="number" class="form-control int-field" name="full_mark"
                                    value="{{ old('full_mark') }}" placeholder="Full Mark">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Passing Marks') }}</label>
                                <input type="number" class="form-control int-field" name="pass_mark"
                                    value="{{ old('pass_mark') }}" placeholder="Pass Mark">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ _lang('Add Subject') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
