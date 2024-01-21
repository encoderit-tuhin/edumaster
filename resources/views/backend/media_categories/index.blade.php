@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ __('Add New Media Category') }}
                    </span>
                </div>
                <div class="panel-body">
                    <form action="{{ route('media-categories.store') }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control" name="name" required
                                    value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info">{{ __('Add Media Category') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ __('Media Category List') }}
                    </span>
                </div>
                <div class="panel-body no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ __('Parent Category') }}</th>
                            <th>{{ __('Category') }}</th>
                            <th>{{ __('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($mediaCategories as $category)
                                <tr>
                                    <td>
                                        {{-- Check if the category has a parent --}}
                                        @if ($category->parent)
                                            {{ $category->parent->name }}
                                        @endif
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <form action="{{ route('media-categories.destroy', $category->id) }}"
                                            method="post">
                                            <a href="{{ route('media-categories.edit', $category->id) }}"
                                                class="btn btn-warning btn-xs"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
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

@section('js-script')
    <script>
        function showClass(elem) {
            if ($(elem).val() == "") {
                return;
            }
            window.location = "<?php echo url('media-categories/class'); ?>/" + $(elem).val();
        }
    </script>
@stop
