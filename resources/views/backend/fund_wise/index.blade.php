@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default border">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Fund Wise Transaction Overview') }}</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('fund-wise.index') }}" method="get">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('From') }}</label>
                                        <input type="text" class="form-control datepicker" name="from_date"
                                            value="{{ $fromDate ?? old('from_date') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('To') }}</label>
                                        <input type="date" class="form-control datepicker   " name="to_date"
                                            value="{{ $toDate ?? old('to_date') }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-info ml-3 mt-4">{{ _lang('Search') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (isset($transactions) && !empty($transactions) && count($transactions) > 0)
                <div class="card-border">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <div>
                            <p>Fund Wise Summary Between <strong>{{ $fromDate }}</strong> to
                                <strong>{{ $toDate }}</strong>
                            </p>
                        </div>

                        <div>
                            <p class="">Total Found -
                                <strong>
                                    {{ count($transactions) }}
                                </strong>
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <th>{{ _lang('Trn Date') }}</th>
                                <th>{{ _lang('Voucher ID') }}</th>
                                <th>{{ _lang('Fund Name') }}</th>
                                <th>{{ _lang('Amount In') }}</th>
                                <th>{{ _lang('Amount Out') }}</th>
                            </thead>

                            <tbody>
                                @php
                                    $totalDebit = 0;
                                    $totalCredit = 0;
                                @endphp
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->transaction_date }}</td>
                                        <td>{{ $transaction->voucher_id }}</td>
                                        <td>{{ $transaction->fund_name }}</td>
                                        <td>{{ number_format($transaction->debit, 2) }}</td>
                                        <td>{{ number_format($transaction->credit, 2) }}</td>
                                    </tr>

                                    @php
                                        $totalDebit += $transaction->debit;
                                        $totalCredit += $transaction->credit;
                                    @endphp
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr class="bg-primary">
                                    <td colspan="3" class="text-right"> <strong
                                            class="text-white">{{ _lang('Total') }}</strong> </td>
                                    <td> <strong class="text-white">{{ number_format($totalDebit, 2) }} </strong> </td>
                                    <td> <strong class="text-white">{{ number_format($totalCredit, 2) }} </strong> </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
