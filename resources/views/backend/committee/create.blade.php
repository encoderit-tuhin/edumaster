@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title pull-left">
                        {{ _lang('Add New committee Member') }}
                    </div>

                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="col-md-8">
                        <form action="{{ route('committee.store') }}" autocomplete="off"
                            class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Name') }}</label>
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
                                <label class="col-sm-3 control-label">{{ _lang('Post') }}</label>
                                <div class="col-sm-9">
                                    <select name="post" class="form-control select2" id="" required>
                                        <option value="">{{ _lang('--Select--') }}</option>
                                        @foreach (get_committee_post_name() as $item)
                                            <option value="president">{{ _lang($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('From Year') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control datepicker" id="year_from" name="year_from"
                                        value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('To Year') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control datepicker" id="year_to" name="year_to"
                                        value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Address') }}</label>
                                <div class="col-sm-9">
                                    <textarea required class="form-control" name="address">{{ old('address') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Picture') }}</label>
                                <div class="col-sm-9">
                                    <input required type="file" class="form-control dropify" name="photo"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">Add</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
