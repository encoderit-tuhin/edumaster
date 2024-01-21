@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ __('Update Media Category') }}
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('media-categories.update', $mediaCategory->id) }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ $mediaCategory->name }}"
                                    required>
                            </div>

                            <div class="col-sm-6">
                                <label class="control-label">{{ __('Sub Category') }}</label>
                                <input type="text" class="form-control" name="subcategory" value="">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info">{{ __('Update Media Category') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
