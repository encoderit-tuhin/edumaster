@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Edit Category') }}
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('book-categories.update', $bookCategory->id) }}"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ _lang('Category Name') }}</label>
                                <input type="text" class="form-control" name="category_name"
                                    value="{{ $bookCategory->category_name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info">{{ _lang('Update Category') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
