@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title pull-left">
                        {{ _lang('Update') }}
                    </div>

                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="col-md-10">
                        <form action="{{ route('phone-book-category.update', $phoneBookCategory->id) }}" autocomplete="off"
                            class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Category Title') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ $phoneBookCategory->name }}"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Description') }}</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description">{{ $phoneBookCategory->description }}</textarea>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
