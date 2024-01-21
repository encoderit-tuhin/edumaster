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
    {{ _lang('Payment Ratio Info') }}
@endsection

@section('content')
    @if (isset($payments) && !empty($payments) && count($payments) > 0)
        <div class="card-border">
            @include('layouts.pdf.header')
            <div class="card-header py-3 d-flex justify-content-between">
                <div>
                    <p class="">Total Found: <strong>{{ count($payments) ?? 0 }}</strong></p>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>{{ _lang('Class Name') }}</th>
                        <th>{{ _lang('Total Student') }}</th>
                        <th>{{ _lang('Paid Students') }}</th>
                        <th>{{ _lang('Paid Percentage') }}</th>
                        <th>{{ _lang('Unpaid Students') }}</th>
                        <th>{{ _lang('Unpaid Percentage') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($payments as $data)
                            <tr>
                                <td class="text-right">{{$data->class_name}}</td>
                                <td class="text-right">{{$data->total_students}}</td>
                                <td class="text-right">{{$data->paid_students}}</td>
                                <td class="text-right">{{$data->paid_percentage}}</td>
                                <td class="text-right">{{$data->unpaid_students}}</td>
                                <td class="text-right">{{$data->unpaid_percentage}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
