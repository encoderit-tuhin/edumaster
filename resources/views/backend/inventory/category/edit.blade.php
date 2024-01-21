@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ __('Upadate') }}
                    </div>
                </div>
                <div class="panel-body row">
                    <div class="col-md-8">
                        <form action="{{ route('item-category.update', $category->id) }}" method="post" autocomplete="off"
                            class="form-horizontal validate" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Name') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                                        required>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="exampleCheck1">{{ __('Active') }}</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" class="form-check-input" name="status"
                                        {{ $category->status ? 'checked' : '' }}>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">{{__("Update")}} </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
