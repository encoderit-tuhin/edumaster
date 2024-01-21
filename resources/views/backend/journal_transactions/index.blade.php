@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ _lang('Journal (Payment)') }}</h4>
                </div>

                <div class="panel-body">
                    <form action="{{ route('journal-transactions.store') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('Payment Date') }}</label>
                                        <input type="text" class="form-control datepicker" name="transaction_date"
                                            value="{{ old('transaction_date') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('Category') }}</label>

                                        <select class="form-control select2" name="category_id" required>
                                            {{ create_option('accounting_categories', 'id', 'name', old('category_id')) }}
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row my-3 p-5">
                            <table class="table">
                                <thead>
                                    <th>{{ _('Transaction For') }}</th>
                                    <th>{{ __('Debit') }}</th>
                                    <th>{{ __('Credit') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="ledger_ids[]">
                                                {{ create_option('accounting_ledgers', 'id', 'ledger_name', old('ledger_id')) }}
                                            </select>
                                            <input type="hidden" name="type" value="journal">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control " name="debits[]" value="">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control " name="credits[]" value="">
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
@endsection

@section('js-script')
    <script>
        $(document).ready(function() {
            // Add row
            $(document).on("click", ".add-row", function() {
                var newRow = $(this).closest("tr").clone();
                newRow.find("select").val('');
                newRow.find("input[type='number']").val('');
                newRow.find("input[name='credits[]']").prop('readonly', false);
                newRow.find("input[name='debits[]']").prop('readonly', false);
                $(this).closest("tr").after(newRow);
            });

            // Remove row
            $(document).on("click", ".remove-row", function() {
                if ($("tbody tr").length > 1) {
                    $(this).closest("tr").remove();
                }
            });

            // Detect changes in the debits or credits input
            $(document).on("input", "input[name='debits[]', input[name='credits[]']", function() {
                var currentRow = $(this).closest("tr");
                currentRow.find("input[name='debits[]']").prop('readonly', false);
                currentRow.find("input[name='credits[]']").prop('readonly', false);

                if ($(this).val() !== '') {
                    currentRow.find("input[name='debits[]']").prop('readonly', true);
                } else {
                    currentRow.find("input[name='credits[]']").prop('readonly', true);
                }
            });
        });
    </script>
@endsection
