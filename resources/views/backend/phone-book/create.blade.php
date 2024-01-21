@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title pull-left">
                        {{ _lang('New Phone Book ') }}
                    </div>

                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="col-md-8">
                        <form action="{{ route('phone-book.store') }}" autocomplete="off"
                            class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
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
                            <hr>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
