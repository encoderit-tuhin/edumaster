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
    {{ _lang('Monthly Paid Info') }}
@endsection

@section('content')
    @if (isset($studentDetails) && !empty($studentDetails) && count($studentDetails) > 0)
        <div class="card-border">
            @include('layouts.pdf.header')
            <div class="card-header py-3 justify-content-between">
                <div>
                    <p class="pdf-page-title">
                        Monthly Paid Info
                    </p>
                </div>

                <div>
                    <p class="">Total Found: <strong>{{ count($studentDetails) ?? 0 }}</strong></p>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>{{ _lang('Student ID') }}</th>
                        <th>{{ _lang('Roll No') }}</th>
                        <th>{{ _lang('Name') }}</th>
                        <th>{{ _lang('Invoice ID') }}</th>
                        <th>{{ _lang('Details') }}</th>
                        <th>{{ _lang('Total Amount') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($studentDetails as $data)
                            <tr>
                                <td class="text-right">{{$data->student_id}}</td>
                                <td class="text-right">{{$data->roll}}</td>
                                <td class="text-right">{{$data->first_name}}</td>
                                <td class="text-right">{{$data->invoice_id}}</td>
                                <td class="text-right">{{$data->details}}</td>
                                <td class="text-right">{{$data->total_amount}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
