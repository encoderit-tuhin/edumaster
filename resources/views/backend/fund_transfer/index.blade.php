@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ _lang('Fund Transfer') }}</h4>
                </div>

                <div class="panel-body">
                    <form action="{{ route('account-fund-transfers.store') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('Payment Date') }}</label>
                                        <input type="text" class="form-control datepicker" name="transaction_date"
                                            value="{{ old('transaction_date') }}" required>

                                        <input type="hidden" class="form-control" name="type" value="fund_transfer">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('Transfer From') }}</label>

                                        <select class="form-control select2" name="fund_id" required>
                                            {{ create_option('accounting_funds', 'id', 'name', old('fund_id')) }}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('Transfer To') }}</label>

                                        <select class="form-control select2" name="fund_to_id" required>
                                            {{ create_option('accounting_funds', 'id', 'name', old('fund_to_id')) }}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('Amount') }}</label>
                                        <input type="text" class="form-control" name="amount"
                                            value="{{ old('amount') }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('Description') }}</label>

                                        <textarea type="text" class="form-control" name="description" placeholder="Description" cols="4"
                                            rows="4">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-info">{{ _lang('Save') }}</button>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>



            </div>


        </div>
    </div>
@endsection
