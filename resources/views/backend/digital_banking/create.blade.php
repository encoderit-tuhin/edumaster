@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{ _lang('Add Bank Account') }}</div>

                <div class="panel-body">
                    <form method="post" class="validate" autocomplete="off" action="{{ url('payment_methods') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Account Holder Name') }}</label>
                                <input type="text" class="form-control" name="acc_holder_name"
                                    value="{{ old('acc_holder_name') }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Bank') }}</label>
                                <input type="text" class="form-control" name="bank" value="{{ old('bank') }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Branch') }}</label>
                                <input type="text" class="form-control" name="branch" value="{{ old('branch') }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Account Number') }}</label>
                                <input type="number" class="form-control" name="account_no"
                                    value="{{ old('account_no') }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Balance') }}</label>
                                <input type="number" class="form-control" name="balance" value="{{ old('balance') }}"
                                    required>
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
