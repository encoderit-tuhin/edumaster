@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{ _lang('Update Period') }}</div>

                <div class="panel-body">
                    <form method="post" class="validate" autocomplete="off"
                        action="{{ route('periods.update', $period->id) }}">
                        {{ csrf_field() }}

                        <input name="_method" type="hidden" value="PATCH">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Period') }}</label>
                                <input type="text" class="form-control" name="period" value="{{ $period->period }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Serial No') }}</label>
                                <input type="text" class="form-control" name="serial_no"
                                    value="{{ $period->serial_no }}">
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
