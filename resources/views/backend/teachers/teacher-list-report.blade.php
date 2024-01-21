@php
    use Carbon\Carbon;
    $now = Carbon::now();
    $today = $now->format('Y-m-d');
@endphp
@extends('layouts.pdf.index')
@section('styles')
    <link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: rgb(214, 212, 212)
        }

        table th,
        table td {
            font-size: 12px;
        }
    </style>
@endsection
@section('content')
    <div class="containera" style="width:100%">
        @include('layouts.pdf.header')

        <table class="table table-bordered data-table">
            <thead>
                <th>{{ _lang('ID') }}</th>
                <th>{{ _lang('Name') }}</th>
                <th>{{ _lang('Email') }}</th>
                <th>{{ _lang('Department') }}</th>
                <th>{{ _lang('Designation') }}</th>
                <th>{{ _lang('Blood Group') }}</th>
                <th>{{ _lang('Religion') }}</th>
                <th>{{ _lang('Phone') }}</th>
            </thead>
            <tbody>
                @foreach ($teachers as $data)
                    <tr>
                        <td>{{ $data->user_id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->user->email ?? '--' }}</td>
                        <td>{{ $data->department->department_name ?? '--' }}</td>
                        <td>{{ $data->designation ?? '--' }}</td>
                        <td>{{ $data->blood ?? '--' }}</td>
                        <td>{{ $data->religion ?? '--' }}</td>
                        <td>
                            {{ $data->user->phone ?? '--' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
