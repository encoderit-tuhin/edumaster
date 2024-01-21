@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Update Class') }}
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('class.update', $class->id) }}"
                        class="form-horizontal form-groups-bordered validate" method="post" accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ _lang('Name') }}</label>
                                <input type="text" class="form-control" name="class_name"
                                    value="{{ $class->class_name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info">{{ _lang('Update Class') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
