@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="text-center panel-title">{{ _lang('Account Journal') }}</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('account-journal-report') }}" method="get">

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
                                        <input type="text" class="form-control datepicker" name="to_date"
                                            value="{{ $toDate ?? old('to_date') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group mt-2">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-info mt-3 ml-5">{{ _lang('Search') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- @if (isset($transactions) && !empty($transactions) && count($transactions) > 0)
                @php
                    $ledgerData = [];
                    $ledgerCount = 0;
                @endphp

                @foreach ($transactions as $transaction)
                    @php
                        $ledgerName = $transaction->ledger_name;
                        $debit = $transaction->debit;
                        $credit = $transaction->credit;
                    @endphp

                    @if (!isset($ledgerData[$ledgerName]))
                        @php
                            $ledgerData[$ledgerName] = ['debit' => 0, 'credit' => 0];
                            $ledgerCount++;
                        @endphp
                    @endif

                    @php
                        $ledgerData[$ledgerName]['debit'] += $debit;
                        $ledgerData[$ledgerName]['credit'] += $credit;
                    @endphp
                @endforeach

                <div class="card-border">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <div>
                            <p>Ledger Summary Between <strong>{{ $fromDate }}</strong> to
                                <strong>{{ $toDate }}</strong>
                            </p>
                        </div>

                        <div>
                            <p class="">Total Found -
                                <strong>{{ $ledgerCount }}</strong>
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <th>{{ _lang('Ledger') }}</th>
                                <th>{{ _lang('Debit Amount') }}</th>
                                <th>{{ _lang('Credit Amount') }}</th>
                            </thead>

                            <tbody>
                                @foreach ($ledgerData as $ledgerName => $data)
                                    <tr>
                                        <td>{{ $ledgerName }}</td>
                                        <td>{{ number_format($data['debit'], 2) }}</td>
                                        <td>{{ number_format($data['credit'], 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                @php
                                    $totalDebit = 0;
                                    $totalCredit = 0;
                                @endphp

                                @foreach ($ledgerData as $data)
                                    @php
                                        $totalDebit += $data['debit'];
                                        $totalCredit += $data['credit'];
                                    @endphp
                                @endforeach

                                <tr class="bg-primary">
                                    <td colspan="1" class="text-right"> <strong
                                            class="text-white">{{ _lang('Total') }}</strong> </td>
                                    <td> <strong class="text-white">{{ number_format($totalDebit, 2) }} </strong> </td>
                                    <td> <strong class="text-white">{{ number_format($totalCredit, 2) }} </strong> </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @endif --}}

        </div>
    </div>
@endsection
