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
    @if (isset($unpaidInfos) && !empty($unpaidInfos) && count($unpaidInfos) > 0)
        <div class="card-border">
            @include('layouts.pdf.header')
            <div class="card-header py-3 d-flex justify-content-between">

                <div>
                    <p class="">Total Found: <strong>{{ count($unpaidInfos) ?? 0 }}</strong></p>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>{{ _lang('Student ID') }}</th>
                        <th>{{ _lang('Student Name') }}</th>
                        <th>{{ _lang('Roll') }}</th>
                        <th>{{ _lang('Due Details') }}</th>
                        <th>{{ _lang('Fee Due') }}</th>
                        {{-- <th>{{ _lang('Payslip due') }}</th> --}}
                        <th>{{ _lang('Total Due') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($unpaidInfos as $data)
                            <tr>
                                <td class="text-right">{{$data->student_id}}</td>
                                <td class="text-right">{{$data->first_name}}</td>
                                <td class="text-right">{{$data->roll}}</td>
                                <td class="text-right">{{$data->due_details}}</td>
                                <td class="text-right">{{$data->total_fee_due}}</td>
                                {{-- <td class="text-right">{{$data->total_slip_due}}</td> --}}
                                <td class="text-right">{{$data->total_fee_due+$data->total_slip_due}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
