@extends('layouts.backend')

@section('content')
    <div class="row">
        <form method="post" class="validate" autocomplete="off" action="{{ url('sliders') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ _lang('Slider create') }}</div>

                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Title') }}</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Status') }}</label>
                                <select class="form-control select2" name="status">
                                    <option value="1">{{ _lang('Publish') }}</option>
                                    <option value="0">{{ _lang('Draft') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Priority') }}</label>
                                <input type="number" class="form-control" name="priority" value="{{ old('priority') }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Slider Image') }}</label>
                                <input type="file" class="dropify" name="image"
                                    data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit"
                                    class="btn btn-primary pull-right">{{ _lang('Save Slider') }}</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </form>
    </div>
@endsection
