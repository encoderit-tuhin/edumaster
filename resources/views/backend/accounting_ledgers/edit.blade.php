@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Update Ledger') }}
                    </div>
                </div>
                <div class="panel-body">
                    @include('backend.accounting_ledgers.form', [
                        'accountingLedger' => $accountingLedger,
                        'id' => $accountingLedger->id,
                        'accountingCategories' => $accountingCategories,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
