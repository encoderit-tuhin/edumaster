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

@section('title')
    {{ _lang('Payment Details Info') }}
@endsection

@section('content-download')
    <div class="noprint print-download-buttons">
        @include('layouts.pdf.back-button')
        @include('layouts.pdf.download-button')
        @include('layouts.pdf.print-button')
    </div>
    <div style="clear: both;"></div>
@endsection

@section('content')
    @if (isset($studentCollections) && !empty($studentCollections) && count($studentCollections) > 0)
        <div class="card-border">
            @include('layouts.pdf.header')
            <div class="card-header py-3 justify-content-between">
                <div>
                    <p class="pdf-page-title">Payment Details Info</p>
                </div>
                <div>
                    <p class="">Total Found: <strong>{{ count($studentCollections) ?? 0 }}</strong></p>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>{{ _lang('Invoice ID') }}</th>
                        <th>{{ _lang('Fee Head') }}</th>
                        <th>{{ _lang('Fee Sub Head') }}</th>
                        <th>{{ _lang('Total Paid') }}</th>
                        <th>{{ _lang('Total Due') }}</th>
                        {{-- <th>{{ _lang('Status') }}</th> --}}
                    </thead>
                    <tbody>
                        @foreach ($studentCollections as $data)
                            <tr>
                                <td class="text-right">{{ $data->invoice_id }}</td>
                                <td class="text-right">
                                    @foreach ($data->details as $detail)
                                        {{ $detail->feeHead->name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-right">
                                    @foreach ($data->details as $detail)
                                        @foreach ($detail->subHeads as $subHeads)
                                            {{ $subHeads->feeSubHead->name }},
                                        @endforeach
                                    @endforeach
                                </td>
                                <td class="text-right">{{ $data->total_paid }}</td>
                                <td class="text-right">{{ $data->total_due }}</td>
                                {{-- <td class="text-right">{{ $data->unpaid_percentage }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
