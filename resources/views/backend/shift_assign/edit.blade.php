@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('Edit Shift Assign') }}
                    </span>
                </div>
                <div class="panel-body">
                    <form action="{{ route('assignshifts.update', $assign_shift->id) }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{_lang('Teacher')}}</label>
                                <select name="teacher_id" class="form-control select2" required>
                                    <option value="">{{_lang('Select One') }}</option>
                                    {{ create_option('teachers','id','name', $assign_shift->teacher_id) }}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{_lang('Shift')}}</label>
                                <select name="shift_id" class="form-control select2" required>
                                    <option value="">{{_lang('Select One') }}</option>
                                    {{ create_option('shifts','id','name',$assign_shift->shift_id) }}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info">{{ _lang('Edit Shift Assign') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


