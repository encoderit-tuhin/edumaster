@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row justify-content-center">
                                    <form class="" method="get" action="{{ route('student-session-report') }}"
                                        autocomplete="off" accept-charset="utf-8">
                                        <div class="col-md-3">
                                            <label class="control-label">
                                                {{ __('Session') }} <span class="text-danger"> *</span>
                                            </label>
                                            <select class="form-control" name="session_id" required>
                                                @foreach (get_table('academic_years') as $session)
                                                    <option value="{{ $session->id }}"
                                                        {{ $session->id == get_option('academic_year') ? 'selected' : '' }}>
                                                        {{ $session->year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button type="submit" style="margin-top:24px;"
                                                    class="btn btn-primary btn-block rect-btn">{{ _lang('Search') }}</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
