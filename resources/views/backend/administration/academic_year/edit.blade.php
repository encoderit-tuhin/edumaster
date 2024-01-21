@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">{{ _lang('Update Academic Year') }}</div>

                <div class="panel-body">
                    <form method="post" class="validate" autocomplete="off" action="{{ route('academic-years.update', $id) }}">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Session Name') }}</label>
                                <input type="text" class="form-control" name="session"
                                    value="{{ $academicYear->session }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Academic Year') }}</label>
                                <input type="text" class="form-control" name="year" value="{{ $academicYear->year }}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">{{ _lang('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
