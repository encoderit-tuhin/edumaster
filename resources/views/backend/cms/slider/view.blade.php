@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading panel-title">{{ _lang('View Page') }}</div>

                <div class="panel-body">

                    <table class="table table-bordered">
                        <tr>
                            <td>{{ _lang('Slider Image') }}</td>
                            <td><img src="{{ $slider->image != '' ? asset('uploads/media/' . $slider->image) : asset('uploads/no_image.jpg') }}"
                                    style="max-width:200px;"></td>
                        </tr>

                        <tr>
                            <td>{{ _lang('Title') }}</td>
                            <td>{{ $slider->title }}</td>
                        </tr>

                        <tr>
                            <td>{{ _lang('Slug') }}</td>
                            <td>{{ $slider->slug }}</td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Status') }}</td>
                            <td>{{ $slider->status }}</td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Author') }}</td>
                            <td>{{ $slider->author->name }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
