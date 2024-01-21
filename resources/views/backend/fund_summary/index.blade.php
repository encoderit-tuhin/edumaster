@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <h4 class="panel-title ">{{ _lang('Fund Summary Transaction Overview') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('fund-summary.index') }}" method="get">

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

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-info ml-5 mt-4">{{ _lang('Search') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- @if (isset($transactions) && !empty($transactions) && count($transactions) > 0)
                @php
                    $fundData = [];
                    $fundCount = 0;
                @endphp

                @foreach ($transactions as $transaction)
                    @php
                        $fundName = $transaction->fund_name;
                        $debit = $transaction->debit;
                        $credit = $transaction->credit;
                    @endphp

                    @if (!isset($fundData[$fundName]))
                        @php
                            $fundData[$fundName] = ['debit' => 0, 'credit' => 0];
                            $fundCount++;
                        @endphp
                    @endif

                    @php
                        $fundData[$fundName]['debit'] += $debit;
                        $fundData[$fundName]['credit'] += $credit;
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
                                <strong>{{ $fundCount }}</strong>
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
                                @foreach ($fundData as $fundName => $data)
                                    <tr>
                                        <td>{{ $fundName }}</td>
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

                                @foreach ($fundData as $data)
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
