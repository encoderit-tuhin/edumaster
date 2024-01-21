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
    {{ _lang('Head Wise Due') }}
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
    @if (isset($headWiseDue) && !empty($headWiseDue) && count($headWiseDue) > 0)
        <div class="card-border">
            @include('layouts.pdf.header')
            <div class="card-header py-3 justify-content-between">
                <div>
                    <p class="pdf-page-title">
                        Head wise Due
                    </p>
                </div>
                <div>
                    <p class="">Total Found: <strong>{{ count($headWiseDue) ?? 0 }}</strong></p>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered data-table">
                    @php
                        $feeDue=0;
                    @endphp
                    <thead>
                        <th>{{ _lang('Student ID') }}</th>
                        <th>{{ _lang('Roll No') }}</th>
                        <th>{{ _lang('Name') }}</th>
                        @foreach ($headWiseDue as $data)
                        @php
                            $feeFue =+ $data->sub_head_due;
                        @endphp
                            <th>{{ _lang($data->fee_sub_head_name) }}</th>
                        @endforeach
                        <th>{{_lang('Fee Due')}}</th>
                        <th>{{_lang('Total Due')}}</th>
                    </thead>
                    <tbody>
                        @foreach ($headWiseDue as $data)
                            <tr>
                                <td class="text-right">{{ $data->student_id }}</td>
                                <td class="text-right">{{ $data->roll }}</td>
                                <td class="text-right">{{ $data->first_name }}</td>
                                <td class="text-right">{{ $data->sub_head_due }}</td>
                                <td class="text-right">{{ $feeFue }}</td>
                                <td class="text-right">{{ $feeFue }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
