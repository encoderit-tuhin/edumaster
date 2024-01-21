@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <h4 class="title">{{ __('New Category') }}</h4>
                <form action="{{ route('item-category.store') }}" method="post" autocomplete="off"
                    class="form-horizontal validate">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ __('Name') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ __('Category List') }}</h4>
                    </div>
                    {{-- <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('item-category.create') }}"
                            class="btn btn-info btn-sm">{{ __('Add Category') }}</a>
                    </div> --}}
                </div>
                <div class="content">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        @if ($category->status === 1)
                                            <span class='text-info text-uppercase'>{{("Active")}}</span>
                                        @else
                                            <span class='text-danger text-uppercase'>{{("Inactive")}}</span>
                                        @endif
                                    </td>
                                    <td>
                                       

                                            <a href="{{ route('item-category.edit', $category->id) }}"
                                                class="btn btn-warning btn-xs" title="View">
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
