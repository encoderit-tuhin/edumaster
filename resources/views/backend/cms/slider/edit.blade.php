@extends('layouts.backend')

@section('content')
    <div class="row">
        <form method="post" class="validate" autocomplete="off" action="{{ action('SliderController@update', $id) }}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ _lang('Slider Setting') }}</div>

                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Title') }}</label>
                                <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Status') }}</label>
                                <select class="form-control select2" name="status">
                                    <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>
                                        {{ _lang('Publish') }}</option>
                                    <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>
                                        {{ _lang('Draft') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Priority') }}</label>
                                <input type="number" class="form-control" name="priority" value="{{ $slider->priority }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Slider Image') }}</label>
                                <input type="file" class="dropify" name="image"
                                    data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-show-remove="false"
                                    data-default-file="{{ asset('uploads/media/' . $slider->image) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit"
                                    class="btn btn-primary pull-right">{{ _lang('Update Slider') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </div>
@endsection

@section('js-script')
@endsection
