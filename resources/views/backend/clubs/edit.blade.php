@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Update Clubs') }}
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-8">
                        <form action="{{ route('clubs.update', $club->id) }}" autocomplete="off"
                            class="form-horizontal validate" autocomplete="off" method="post" accept-charset="utf-8"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Name') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ $club->name }}"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Slogan') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="slogan" value="{{ $club->slogan }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Foundation Date') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control datepicker" name="foundation_date"
                                        value="{{ $club->foundation_date }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('History') }}</label>
                                    <textarea class="form-control summernote" name="history" required>{{ $club->history }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('activity') }}</label>
                                    <textarea class="form-control summernote" name="activity" required>{{ $club->activity }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Mission Vision') }}</label>
                                    <textarea class="form-control summernote" name="mission_vision">{{ $club->mission_vision }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Achievement') }}</label>
                                    <textarea class="form-control summernote" name="achievement">{{ $club->achievement }}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Facebook Link') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " name="fb_link"
                                        value="{{ $club->fb_link }}">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Logo') }}</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control dropify" name="logo"
                                        data-default-file="{{ asset('uploads/images/clubs/' . $club->logo) }}"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Banner Image') }}</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control dropify" name="banner_image"
                                        data-default-file="{{ asset('uploads/images/clubs/' . $club->banner_image) }}"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">{{ _lang('Update Club') }}</button>
                                </div>
                            </div>

                    </div>
                    <div class="  col-md-4 panel panel-default">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ __('Url') }}</label>
                            <div class="">
                                <input type="text" class="form-control " name="slug" value="{{ $club->slug }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">{{ _lang('Add Members') }}</label>
                            <select class="form-control select2" name="member_ids[]" multiple="multiple">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $members->pluck('user_id')->contains($user->id) ? 'selected' : '' }}>
                                        {{ _lang($user->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{ _lang('Add Moderators') }}</label>
                            <select class="form-control select2" name="moderator_ids[]" multiple="multiple">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $moderators->pluck('user_id')->contains($user->id) ? 'selected' : '' }}>
                                        {{ _lang($user->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
