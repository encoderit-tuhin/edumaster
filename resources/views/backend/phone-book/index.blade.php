@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ __('New Phone book') }}
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('phone-book.store') }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ _lang(' Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ _lang('Phone') }}</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ _lang('Category') }}</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control select2" id="" required>
                                    <option value="">{{ _lang('--Select--') }}</option>
                                    @foreach ($phoneBookCategories as $category)
                                        <option value="{{ (int) $category->id }}">
                                            {{ _lang($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ _lang('Note') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="note">{{ old('note') }}</textarea>
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
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Phone Books') }}
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Contact Name') }}</th>
                            <th>{{ _lang('Contact Number') }}</th>
                            <th>{{ _lang('Contact Category') }}</th>
                            <th>{{ _lang('Note') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @if (isset($phoneBooks))
                                @foreach ($phoneBooks as $phoneBook)
                                    <tr>
                                        <td>{{ $phoneBook->name }}</td>
                                        <td>{{ $phoneBook->phone }}</td>
                                        <td>{{ $phoneBook->category?->name }}</td>
                                        <td>{{ $phoneBook->note }}</td>
                                        <td>
                                            <form action="{{ route('phone-book.destroy', $phoneBook->id) }}" method="post"
                                                class="d-flex">
                                                {{-- <a href="{{ route('phone-bookshow', $phoneBook->id) }}"
                                                    class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a> --}}
                                                <a href="{{ route('phone-book.edit', $phoneBook->id) }}"
                                                    class="btn btn-warning btn-xs mx-2"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i></a>
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-xs btn-remove"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-danger">Not Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
