@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
                <div class="panel panel-default" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            {{ __('Add New Item') }}
                        </div>
                    </div>
                    <div class="panel-body row">
                        <div class="col-md-12">
                            <form action="{{ route('item.store') }}" method="post" autocomplete="off"
                                class="form-horizontal validate" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ __('Name') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ __('Price') }}</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="price"
                                            value="{{ old('price') }}" required>
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
                                        <button type="submit" class="btn btn-info"> {{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ __('Item List') }}</h4>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('item.create') }}" class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Add Item') }}</a>
                    </div>
                </div>
                <div class="content">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Category name') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Current stock') }}</th>
                            <th>{{ __('Opening stock') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category?->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->current_stock }}</td>
                                    <td>{{ $item->opening_stock }}</td>
                                    <td>{{ $item->description }}</td>

                                    <td>
                                        @if ($item->status === 1)
                                            <span class='text-info text-uppercase'>{{ __('Active') }}</span>
                                        @else
                                            <span class='text-danger text-uppercase'>{{ __('Inactive') }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        

                                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-warning btn-xs"
                                                title="View">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>

                                          
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
