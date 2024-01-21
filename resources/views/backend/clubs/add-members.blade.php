@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading panel-title">{{ _lang('Add Members') }}</div>

                <div class="panel-body">
                    <form method="post" class="validate" autocomplete="off" action="{{ route('members.store') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}




                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Club Name') }}</label>
                                    <select class="form-control select2" name="club_id">
                                        @foreach ($clubs as $club)
                                            <option value="{{ $club->id }}">{{ _lang($club->name) }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Member Name') }}</label>
                                    <select class="form-control select2" name="user_id[]" multiple="multiple">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ _lang($user->name) }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="reset" class="btn btn-danger">{{ _lang('Reset') }}</button>
                                <button type="submit" class="btn btn-primary">{{ _lang('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
