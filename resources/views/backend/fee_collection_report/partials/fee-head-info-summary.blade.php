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
    @if (isset($studentCollections) && !empty($studentCollections) && count($studentCollections) > 0)
        <div class="card-border">
            @include('layouts.pdf.header')
            <div class="card-header py-3 d-flex justify-content-between">

                <div>
                    <p class="">Total Found: <strong>{{ count($studentCollections) ?? 0 }}</strong></p>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>{{ _lang('Student ID') }}</th>
                        <th>{{ _lang('Roll') }}</th>
                        <th>{{ _lang('Name') }}</th>
                        <th>{{ _lang('Total Amount') }}</th>
                        <th>{{ _lang('New Admission') }}</th>
                        <th>{{ _lang('Tuition Fees') }}</th>
                        <th>{{ _lang('Exam Fees') }}</th>
                        <th>{{ _lang('Transaport Fees') }}</th>
                        <th>{{ _lang('Model Test') }}</th>
                        <th>{{ _lang('Attendance Fees') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($studentCollections as $data)
                            <tr>
                                <td class="text-right">{{$data->student_id}}</td>
                                <td class="text-right">{{$data->roll}}</td>
                                <td class="text-right">{{$data->first_name}}</td>
                                <td class="text-right">{{$data->total_amount}}</td>
                                <td class="text-right">{{$data->new_admission}}</td>
                                <td class="text-right">{{$data->tuition_fees}}</td>
                                <td class="text-right">{{$data->exam_fees}}</td>
                                <td class="text-right">{{$data->transport_fees}}</td>
                                <td class="text-right">{{$data->model_test}}</td>
                                <td class="text-right">{{$data->attendance}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
