@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Edit Subject') }}
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('subjects.update', $subject->id) }}" class="validate" autocomplete="off"
                        method="post" accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Class</label>
                                <select name="class_id" class="form-control select2" required>
                                    <option value="">Select Class</option>
                                    {{ create_option('classes', 'id', 'class_name', $subject->class_id) }}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Group</label>
                                <select name="group_id" class="form-control select2" required>
                                    <option value="">Select Group</option>
                                    <option value="1" @if ('1' == $subject->group_id) selected @endif>Science
                                    </option>
                                    <option value="2" @if ('2' == $subject->group_id) selected @endif>Business
                                        Studies</option>
                                    <option value="3" @if ('3' == $subject->group_id) selected @endif>Humanities
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Subject Name') }}</label>
                                <input type="text" class="form-control" name="subject_name"
                                    value="{{ $subject->subject_name }}"required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Subject Code') }}</label>
                                <input type="text" class="form-control" name="subject_code"
                                    value="{{ $subject->subject_code }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Subject Short Form') }}</label>
                                <input type="text" class="form-control" name="subject_short_form"
                                    value="{{ $subject->subject_short_form }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! generate_select(
                                    'subject_type',
                                    get_subject_types(),
                                    __('Subject Type'),
                                    $subject->subject_type,
                                    true,
                                    __('--Select Type--'),
                                    'form-control',
                                ) !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! generate_select(
                                    'subject_type_form',
                                    get_subject_all_types(),
                                    __('Subject Type Form'),
                                    $subject->subject_type_form,
                                    true,
                                    __('--Select Type--'),
                                    'form-control',
                                ) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('SL No') }}</label>
                                <input type="number" class="form-control" name="sl_no" value="{{ $subject->sl_no }}"
                                    placeholder="sl_no">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Objective') }}</label>
                                <input type="number" class="form-control" name="objective"
                                    value="{{ $subject->objective }}" placeholder="objective">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Written') }}</label>
                                <input type="number" class="form-control" name="written" value="{{ $subject->written }}"
                                    placeholder="written">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Practical') }}</label>
                                <input type="number" class="form-control" name="practical"
                                    value="{{ $subject->practical }}" placeholder="practical">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Full Marks') }}</label>
                                <input type="number" class="form-control int-field" name="full_mark"
                                    value="{{ $subject->full_mark }}" placeholder="Full Mark">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Passing Marks') }}</label>
                                <input type="number" class="form-control int-field" name="pass_mark"
                                    value="{{ $subject->pass_mark }}" placeholder="Pass Mark">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">{{ _lang('Update Subject') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
