@extends('layouts.pdf.index')
@section('styles')
    <link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: rgb(214, 212, 212)
        }

        header {
            height: 153px !important;
        }
    </style>
@endsection
@section('content-download')
    <div class="noprint print-download-buttons">
        @include('layouts.pdf.back-button')
        @include('layouts.pdf.download-button')
        @include('layouts.pdf.print-button')
    </div>
    <div style="clear: both;"></div>
@endsection

@section('title')
    {{ _lang('Paid Invoices') }}
@endsection

@section('content')
    @if (isset($result) && !empty($result) && count($result) > 0)
        <div class="card-border">
            @include('layouts.pdf.header')
            <div class="card-header py-3 justify-content-between">
                <div>
                    <p class="pdf-page-title">
                       Paid Invoices
                    </p>
                </div>
                <div>
                    <p class="">Total Found: <strong>{{ count($result) ?? 0 }}</strong></p>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>{{ _lang('Invoice ID') }}</th>
                        <th>{{ _lang('Student Name') }}</th>
                        <th>{{ _lang('Roll No') }}</th>
                        <th>{{ _lang('Fee Head') }}</th>
                        <th>{{_lang('Fee Sub Head')}}</th>
                        <th>{{_lang('Ledger Name')}}</th>
                        <th>{{_lang('Payable Amount')}}</th>
                        <th>{{_lang('Paid Amount')}}</th>
                        <th>{{_lang('Due Amount')}}</th>
                    </thead>
                    <tbody>
                        @foreach ($result as $data)
                            <tr>
                                <td class="text-right">{{ $data->invoice_id }}</td>
                                <td class="text-right">{{ $data->student_name }}</td>
                                <td class="text-right">{{ $data->roll }}</td>
                                <td class="text-right">{{ $data->fee_head_name }}</td>
                                <td class="text-right">{{ $data->fee_sub_head_name }}</td>
                                <td class="text-right">{{ $data->ledger_name }}</td>
                                <td class="text-right">{{ $data->payable_amount }}</td>
                                <td class="text-right">{{ $data->paid_amount }}</td>
                                <td class="text-right">{{ $data->due_amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
