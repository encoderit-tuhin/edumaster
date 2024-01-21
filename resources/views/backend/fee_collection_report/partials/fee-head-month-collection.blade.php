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
@section('content')
    @if (isset($monthlyData) && !empty($monthlyData) && count($monthlyData) > 0)
        <div class="card-border">
            @include('layouts.pdf.header')
            <div class="card-header py-3 d-flex justify-content-between">


                <div>
                    <p class="">Total Found: <strong>{{ count($monthlyData) ?? 0 }}</strong></p>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>{{ _lang('Class name') }}</th>
                        <th>{{ _lang('January') }}</th>
                        <th>{{ _lang('February') }}</th>
                        <th>{{ _lang('March') }}</th>
                        <th>{{ _lang('April') }}</th>
                        <th>{{ _lang('May') }}</th>
                        <th>{{ _lang('June') }}</th>
                        <th>{{ _lang('July') }}</th>
                        <th>{{ _lang('August') }}</th>
                        <th>{{ _lang('September') }}</th>
                        <th>{{ _lang('October') }}</th>
                        <th>{{ _lang('November') }}</th>
                        <th>{{ _lang('December') }}</th>
                    </thead>
                    <tbody>
                        @php
                            $totalDebit = 0;
                            $totalCredit = 0;
                            $totalNetflow = 0;
                        @endphp
                        @foreach ($monthlyData as $data)
                            <tr>
                                <td class="text-right">{{$data->class_name}}</td>
                                <td class="text-right">{{$data->January}}</td>
                                <td class="text-right">{{$data->February}}</td>
                                <td class="text-right">{{$data->March}}</td>
                                <td class="text-right">{{$data->April}}</td>
                                <td class="text-right">{{$data->May}}</td>
                                <td class="text-right">{{$data->June}}</td>
                                <td class="text-right">{{$data->July}}</td>
                                <td class="text-right">{{$data->August}}</td>
                                <td class="text-right">{{$data->September}}</td>
                                <td class="text-right">{{$data->October}}</td>
                                <td class="text-right">{{$data->November}}</td>
                                <td class="text-right">{{$data->December}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
