@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default no-export">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('List slider') }}</span>
                    <a class="btn btn-primary btn-sm pull-right"
                        href="{{ route('sliders.create') }}">{{ _lang('Add New') }}</a>
                </div>

                <div class="panel-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                        <br />
                    @endif
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>{{ _lang('Title') }}</th>
                                <th>{{ _lang('Image') }}</th>
                                <th>{{ _lang('Status') }}</th>
                                <th>{{ _lang('Priority') }}</th>
                                <th>{{ _lang('Created') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sliders as $slider)
                                <tr id="row_{{ $slider->id }}">
                                    <td>{{ $slider->title }}</td>
                                    <td><img class="img-thumbnail post_image"
                                            src="{{ $slider->image != '' ? asset('uploads/media/' . $slider->image) : asset('uploads/no_image.jpg') }}">
                                    </td>
                                    <td>{{ ucwords($slider->status) }}</td>
                                    <td>{{ ucwords($slider->priority) }}</td>
                                    <td>{{ date('d-M-Y'), strtotime($slider->created_at) }}</td>
                                    <td>
                                        <form action="{{ action('SliderController@destroy', $slider->id) }}"
                                            method="post">
                                            <a href="{{ action('SliderController@edit', $slider->id) }}"
                                                class="btn btn-warning btn-sm">{{ _lang('Edit') }}</a>
                                            <a href="{{ action('SliderController@show', $slider->id) }}"
                                                class="btn btn-info btn-sm">{{ _lang('View') }}</a>
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm btn-remove"
                                                type="submit">{{ _lang('Delete') }}</button>
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
