@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class=" panel-title">{{ _lang('Voucher Wise Transaction Overview') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('voucher-wise.index') }}" method="get" autocomplete="off"

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('From') }}</label>
                                        <input type="text" class="form-control datepicker" name="from_date"
                                            value="{{ $fromDate ?? old('from_date') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('To') }}</label>
                                        <input type="text" class="form-control datepicker" name="to_date"
                                            value="{{ $toDate ?? old('to_date') }}" required>
                                    </div>
                                </div>
                            </div>
                     

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('Voucher Type') }}</label>
                                        <select class="form-control" name="type" id="" required>
                                            <option value="">--Select Type--</option>
                                            <option {{ $type == 'All' ? 'selected' : '' }} value="All">
                                                All
                                            </option>
                                            <option {{ $type == 'Receipt' ? 'selected' : '' }} value="Receipt">Receipt
                                            </option>
                                            <option {{ $type == 'Payment' ? 'selected' : '' }} value="Payment">Payment
                                            </option>

                                            <option {{ $type == 'Journal' ? 'selected' : '' }} value="Journal">Journal
                                            </option>
                                            <option {{ $type == 'Contra' ? 'selected' : '' }} value="Contra">Contra
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mt-3 ml-5 p-3 ">
                               
                                    <button type="submit" class="btn btn-info ">{{ _lang('Search') }}</button>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (isset($transactions) && !empty($transactions) && count($transactions) > 0)
                <div class="card-border">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <div>
                            <p> Voucher List from <strong>{{ $fromDate }}</strong> to
                                <strong>{{ $toDate }}</strong>
                            </p>
                        </div>

                        <div>
                            <p class="">Total Found: <strong>{{ count($transactions) }}</strong></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <th>{{ _lang('Date') }}</th>
                                <th>{{ _lang('Voucher ID') }}</th>
                                <th>{{ _lang('Voucher Type') }}</th>
                                <th>{{ _lang('Ledger') }}</th>
                                <th>{{ _lang('Debit Amount') }}</th>
                                <th>{{ _lang('Credit Amount') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </thead>
                            <tbody>
                                @php
                                    $totalDebit = 0;
                                    $totalCredit = 0;
                                @endphp
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->transaction_date }}</td>
                                        <td>
                                            {{ $transaction->voucher_id }}
                                        </td>
                                        <td>{{ $transaction->type }}</td>
                                        <td>{{ $transaction->ledger_name }}</td>
                                        <td>
                                            {{ number_format($transaction->debit, 2) }}
                                        </td>
                                        <td>
                                            {{ number_format($transaction->credit, 2) }}
                                        </td>

                                        <td>
                                            <form action="{{ route('voucher-wise.destroy', $transaction->id) }}"
                                                method="post">
                                                <a href="{{ route('voucher-wise.show', $transaction->id) }}"
                                                    class="btn btn-info btn-xs"><i class="fa fa-file"
                                                        aria-hidden="true"></i></a>
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-xs btn-remove"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>

                                        @php
                                            $totalDebit += $transaction->debit;
                                            $totalCredit += $transaction->credit;
                                        @endphp
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr class="bg-primary">
                                    <td colspan="4" class="text-right"> <strong
                                            class="text-white">{{ _lang('Total') }}</strong> </td>
                                    <td> <strong class="text-white">{{ number_format($totalDebit, 2) }} </strong> </td>
                                    <td> <strong class="text-white">{{ number_format($totalCredit, 2) }} </strong> </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
