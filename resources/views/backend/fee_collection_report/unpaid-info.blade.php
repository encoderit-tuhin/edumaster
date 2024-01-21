@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <span class="panel-title">{{ _lang('Unpaid Info') }}</s>
            </div>
            <div class="card-body">
                <form action="{{ route('unpaid-info') }}" method="get">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">{{ _lang('Academic Year') }}</label>
                                    <select name="year" id="year" class="form-control select2">
                                        @for ($i = 2023; $i < 2100; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">{{ _lang('Sections') }}</label>
    
                                    <select class="form-control select2" name="section">
                                        {{ create_option('sections', 'id', 'section_name', old('section')) }}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-info mt-4">{{ _lang('Search') }}</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection