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
    @if (isset($feeDetails) && !empty($feeDetails) && count($feeDetails) > 0)
        <div class="card-border">
            @include('layouts.pdf.header')
            <div class="card-header py-3 d-flex justify-content-between">

                <div>
                    <p class="">Total Found: <strong>{{ count($feeDetails) ?? 0 }}</strong></p>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>{{ _lang('Class') }}</th>
                        @foreach ($feeHeads as $feeHead)
                            <th>{{ _lang($feeHead->name) }}</th>
                        @endforeach
                        <th>{{ _lang('Total Amount') }}</th>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                                $total_amount = 0;
                            @endphp
                            <td class="text-right">{{ $class->class_name }}</td>
                            @foreach ($feeHeads as $feeHead)
                                @if (isset($feeDetails[$feeHead->id]))
                                    <td class="text-right">{{ $feeDetails[$feeHead->id] }}</td>
                                    @php
                                        $total_amount += $feeDetails[$feeHead->id];
                                    @endphp
                                @else
                                    <td class="text-right">0</td>
                                @endif
                            @endforeach
                            <td class="text-right">{{ $total_amount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
