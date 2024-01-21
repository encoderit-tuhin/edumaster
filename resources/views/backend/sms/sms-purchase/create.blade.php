@extends('layouts.backend')
@section('content')
<div class="col-md-4 panel-body  shadow">
    <form action="{{ route('sms-purchase.store') }}" autocomplete="off"
        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
        accept-charset="utf-8">
        @csrf
        <div class="form-group">
            <label class="col-sm-3 control-label">{{ _lang('Transaction date') }}</label>
            <div class="col-sm-9">
                <input type="text" class="form-control datepicker" name="transaction_date"
                    value="{{ old('transaction_date', date('Y-m-d')) }}" required>
                <!-- `date('Y-m-d')` will provide the current date in the 'Y-m-d' format -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">{{ _lang('Quantity') }}</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="no_of_sms" value="{{ old('no_of_sms') }}" required
                    id='no_of_sms'>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">{{ _lang('Price') }}</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="amount" id='amount' value="{{ old('amount') }}"
                    required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">{{ _lang('SMS Gateway') }}</label>
            <div class="col-sm-9">
                <select name="sms_gateway" class="form-control select2" id="" required>
                    <option value="">{{ _lang('--Select--') }}</option>
                    <option value="bulksmsbd">Bulk SMS BD</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">{{ _lang('Masking Type') }}</label>
            <div class="col-sm-9">
                <select name="masking_type" class="form-control select2" id="" required>
                    <option value="">{{ _lang('--Select--') }}</option>
                    <option value="masking">Masking</option>
                    <option value="nonmasking">Non Masking</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </div>
        <hr>
    </form>
</div>
@endsection
@section('js-script')

@stop
