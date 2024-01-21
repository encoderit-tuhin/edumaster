@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <span class="panel-title">{{ _lang('Fee Head Class Collection') }}</s>
            </div>
            <div class="card-body">
                <form action="{{ route('fee-head-class-collection') }}" method="get">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">{{ _lang('Class') }}</label>
    
                                    <select class="form-control select2" name="class_id">
                                        {{ create_option('classes', 'id', 'class_name', old('class_id')) }}
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