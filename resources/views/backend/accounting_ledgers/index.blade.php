@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="panel panel-default" data-collapsed="0">
                    <div class="panel-heading">
                        <span class="panel-title">
                            {{ _lang('Add New Ledger') }}
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 px-5">
                                @include('backend.accounting_ledgers.form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="panel panel-default" data-collapsed="0">
                    <div class="panel-heading">
                        <span class="panel-title">
                            {{ _lang('Accounting Ledger List') }}
                        </span>
                    </div>
                    <div class="panel-body no-export">
                        <table class="table table-bordered data-table">
                            <thead>
                                <th>{{ _lang('SL No.') }}</th>
                                <th>{{ _lang('Ledger') }}</th>
                                <th>{{ _lang('Accounting Category') }}</th>
                                <th>{{ _lang('Accounting Group') }}</th>
                                <th>{{ _lang('Balance') }}</th>
                                <th>{{ _lang('Nature') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($accountingLedgers as $accountingLedger)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $accountingLedger->ledger_name }}</td>
                                        <td>{{ $accountingLedger->accountingCategory->name ?? '' }}</td>
                                        <td>{{ $accountingLedger->accountingGroup->name ?? '' }}</td>
                                        <td>{{ $accountingLedger->balance }}</td>
                                        <td>{{ $accountingLedger->accountingCategory->nature ?? '' }}</td>
                                        <td>
                                            <form action="{{ route('accounting-ledgers.destroy', $accountingLedger->id) }}"
                                                method="post">
                                                <a href="{{ route('accounting-ledgers.edit', $accountingLedger->id) }}"
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
