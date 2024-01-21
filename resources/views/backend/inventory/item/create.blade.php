@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ __('Add New Item') }}
                    </div>
                </div>
                <div class="panel-body row">
                    <div class="col-md-8">
                        <form action="{{ route('item.store') }}" method="post" autocomplete="off"
                            class="form-horizontal validate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Name') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Price') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="price" value="{{ old('price') }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Sale Price') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="sale_price"
                                        value="{{ old('sale_price') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Opening stock') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="opening_stock"
                                        value="{{ old('opening_stock') ?? '0' }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Category') }}</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="category_id" required>
                                        <option value="">--Select--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Description') }}</label>
                                <div class="col-sm-9">
                                    <textarea id="" cols="20" rows="5" class="form-control" name="description">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">{{__("Add Item")}}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
