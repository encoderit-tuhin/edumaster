@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Add New club') }}
                    </div>
                </div>
                <div class="panel-body row">
                    <div class="col-md-8">
                        <form action="{{ route('clubs.store') }}" method="post" autocomplete="off"
                            class="form-horizontal validate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Name') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Slogan') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="slogan" value="{{ old('slogan') }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Foundation Date') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control datepicker" name="foundation_date"
                                        value="{{ old('foundation_date') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('History') }}</label>
                                    <textarea class="form-control summernote" name="history" required>{{ old('history') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('activity') }}</label>
                                    <textarea class="form-control summernote" name="activity" required>{{ old('activity') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Mission Vision') }}</label>
                                    <textarea class="form-control summernote " name="mission_vision">{{ old('mission_vision') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Achievement') }}</label>
                                    <textarea class="form-control summernote" name="achievement">{{ old('achievement') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Facebook Link') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fb_link" value="{{ old('fb_link') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Logo') }}</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control dropify" name="logo"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Banner Image') }}</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control dropify" name="banner_image"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">Add club</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 panel panel-default">
                        <div class="form-group">
                            <label class="control-label">{{ _lang('Add Members') }}</label>
                            <select class="form-control select2" name="member_ids[]" multiple="multiple">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{ _lang('Add Moderators') }}</label>
                            <select class="form-control select2" name="moderator_ids[]" multiple="multiple">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
