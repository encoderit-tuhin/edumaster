@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="panel panel-default" data-collapsed="0">
                    <div class="panel-heading">
                        <span class="panel-title">
                            {{ _lang('Add New Fund') }}
                        </span>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('accounting-funds.store') }}" autocomplete="off"
                            class="form-horizontal form-groups-bordered validate" method="post" accept-charset="utf-8">
                            @csrf

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">{{ _lang('Accouting Fund Name') }}</label>
                                    <input type="text" class="form-control" name="name" required
                                        value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">{{ _lang('Serial') }}</label>
                                    <input type="number" class="form-control" name="serial" min="1"
                                        value="{{ old('serial') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-info">{{ _lang('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="panel panel-default" data-collapsed="0">
                    <div class="panel-heading">
                        <span class="panel-title">
                            {{ _lang('Accounting Fund List') }}
                        </span>
                    </div>
                    <div class="panel-body no-export">
                        <table class="table table-bordered data-table">
                            <thead>
                                <th>{{ _lang('Serial') }}</th>
                                <th>{{ _lang('Name') }}</th>
                                <th>{{ _lang('Amount In') }}</th>
                                <th>{{ _lang('Amount Out') }}</th>
                                <th>{{ _lang('Balance') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($accountingFunds as $accountingFund)
                                    <tr>
                                        <td>{{ $accountingFund->serial }}</td>
                                        <td>{{ $accountingFund->name }}</td>
                                        @php
                                            $debitTotal = 0;
                                            $creditTotal = 0;
                                        @endphp

                                        @foreach ($accountingFund->accountingFundsTransactions as $transaction)
                                            @php
                                                $debitTotal += floatval($transaction['debit']);
                                                $creditTotal += floatval($transaction['credit']);
                                            @endphp
                                        @endforeach

                                        <td>
                                            {{ number_format($creditTotal, 2) }}
                                        </td>
                                        <td>
                                            {{ number_format($debitTotal, 2) }}
                                        </td>
                                        <td>{{ number_format($accountingFund->balance, 2) }}</td>
                                        <td>
                                            <form action="{{ route('accounting-funds.destroy', $accountingFund->id) }}"
                                                method="post">
                                                <a href="{{ route('accounting-funds.edit', $accountingFund->id) }}"
                                                    class="btn btn-warning btn-xs"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i></a>
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-xs btn-remove"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
