@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class=" panel-title">{{ _lang('Delete Voucher') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('voucher-delete') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Voucher Number') }}</label>
                                    <input type="text" class="form-control " name="voucher_id"
                                        value="{{ old('voucher_id') }}" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group" style="margin-top: 25px;">
                                    <button type="submit" class="btn btn-info ">{{ _lang('Search') }}</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
