<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default border">
            <div class="panel-heading">
                <span class="text-center panel-title">
                    {{ get_accounting_types($type) }}
                </span>
            </div>

            <div class="card-body">
                <form action="{{ route('account-transaction-payment.store') }}" method="post">
                    @csrf

                    {{-- Hidden transaction type --}}
                    <input type="text" name="type" id="type" value="{{ $type }}" hidden />

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">{{ _lang('Payment Date') }}</label>
                                    <input type="text" class="form-control datepicker" name="transaction_date"
                                        value="{{ old('transaction_date') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-12 ">
                                    {!! generate_select(
                                        'payment_method_id',
                                        App\AccountingLedger::pluck('ledger_name', 'id')->toArray(),
                                        __('Payment By'),
                                        old('payment_method_id'),
                                        true,
                                        __('--Select Type--'),
                                        'form-control select2'
                                    ) !!}
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-4">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">{{ _lang('Category') }}</label>
                                    <select class="form-control select2" name="category_id" required>
                                        {{ create_option('accounting_categories', 'id', 'name', old('category_id')) }}
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="row my-3 p-5">
                        <table class="table">
                            <thead>
                                <th>{{ __('Transaction For') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Action') }}</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="ledger_ids[]">
                                            {{ create_option('accounting_ledgers', 'id', 'ledger_name', old('ledger_id')) }}
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="amounts[]" value="0">
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-success add-row" type="button">+</button>
                                        <button class="btn btn-sm btn-danger remove-row" type="button">-</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row my-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">{{ _lang('Fund') }}</label>

                                    <select class="form-control select2" name="fund_id">
                                        {{ create_option('accounting_funds', 'id', 'name', old('fund_id')) }}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">{{ _lang('Ref.') }}</label>
                                    <input type="text" class="form-control" name="reference"
                                        value="{{ old('reference') }}">
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
