@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default border">
                <div class="panel-heading">
                    <h4 class="panel-title ">{{ _lang('Fund Transaction Monthly Overview') }}</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('fund-summary-monthly.index') }}" method="get">
                        <div class="row ">
                            <div class="col-lg-6">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label class="control-label">{{ _lang('Year') }}</label>
                                                    <select class="form-control" name="year">
                                                        <option {{ $year === '2023' ? 'selected' : '' }} value="2023">2023
                                                        </option>
                                                        <option {{ $year === '2022' ? 'selected' : '' }} value="2022">2022
                                                        </option>
                                                        <option {{ $year === '2021' ? 'selected' : '' }} value="2021">2021
                                                        </option>
                                                        <option {{ $year === '2020' ? 'selected' : '' }} value="2020">2020
                                                        </option>
                                                        <option {{ $year === '2019' ? 'selected' : '' }} value="2019">
                                                            2019</option>
                                                        <option {{ $year === '2018' ? 'selected' : '' }} value="2018">
                                                            2018</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="col-sm-5 mt-3">
                                                    <button type="submit"
                                                        class="btn btn-info">{{ _lang('Search') }}</button>
                                                </div>
                                            </div>
                                        </div>
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
                            <p>Monthly Fund Transaction
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <th>{{ _lang('Monthly') }}</th>
                                <th>{{ _lang('Flow In') }}</th>
                                <th>{{ _lang('Flow Out') }}</th>
                                <th>{{ _lang('Net Flow') }}</th>
                            </thead>

                            <tbody>
                                @php
                                    $monthData = [];
                                    $currentMonth = null;
                                    $totalDebit = 0;
                                    $totalCredit = 0;

                                    foreach ($transactions as $transaction) {
                                        $date = \Carbon\Carbon::parse($transaction->transaction_date);
                                        $month = $date->format('F');

                                        if ($month !== $currentMonth) {
                                            // Calculate the remaining balance for the previous month and store it
                                            if ($currentMonth !== null) {
                                                $monthData[$currentMonth]['debit'] = $totalDebit;
                                                $monthData[$currentMonth]['credit'] = $totalCredit;
                                            }

                                            // Initialize the current month
                                            $currentMonth = $month;
                                            $monthData[$currentMonth] = [
                                                'debit' => 0,
                                                'credit' => 0,
                                            ];
                                        }

                                        // Update the debit and credit for the current month
                                        $monthData[$currentMonth]['debit'] += $transaction->debit;
                                        $monthData[$currentMonth]['credit'] += $transaction->credit;

                                        // Update the total debit and credit for the overall calculation
                                        $totalDebit += $transaction->debit;
                                        $totalCredit += $transaction->credit;
                                    }
                                @endphp

                                @foreach ($monthData as $month => $data)
                                    <tr>
                                        <td>{{ $month }}</td>
                                        <td>{{ number_format($data['credit'], 2) }}</td>
                                        <td>{{ number_format($data['debit'], 2) }}</td>
                                        <td>{{ number_format($data['credit'] - $data['debit'], 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot class="bg-primary">
                                @php
                                    $totalDebit = 0;
                                    $totalCredit = 0;

                                    foreach ($monthData as $data) {
                                        $totalDebit += $data['debit'];
                                        $totalCredit += $data['credit'];
                                    }
                                @endphp
                                <tr>
                                    <td colspan="1" class="text-right"> <strong
                                            class="text-white">{{ _lang('Total') }}</strong> </td>
                                    <td>{{ number_format($totalCredit, 2) }}</td>
                                    <td>{{ number_format($totalDebit, 2) }}</td>
                                    <td>{{ number_format($totalCredit - $totalDebit, 2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
