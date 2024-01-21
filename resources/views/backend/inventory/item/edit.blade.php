@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ __('Edit Item') }}
                    </div>
                </div>
                <div class="panel-body row">
                    <div class="col-md-8">
                        <form action="{{ route('item.update', $item->id) }}" method="post" autocomplete="off"
                            class="form-horizontal validate" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Name') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ $item->name }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Price') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="price" value="{{ $item->price }}"
                                        required>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Opening stock') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="opening_stock"
                                        value="{{ $item->opening_stock }}" required>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Categories') }}</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="category_id" required>
                                        <option value="">--Select--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id === $item->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('Description') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="description"
                                        value="{{ $item->description }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="exampleCheck1">{{ __('Active') }}</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" class="form-check-input" name="status"
                                        {{ $item->status ? 'checked' : '' }}>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
