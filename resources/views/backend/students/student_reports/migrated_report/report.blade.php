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
    <div class="containera" style="width:95%">
        @include('layouts.pdf.header')

        <table class="table table-bordered data-table">
            <thead>

                <th>{{ _lang('Student ID') }}</th>
                <th>{{ _lang('Roll') }}</th>
                <th>{{ _lang('Name') }}</th>              
                <th>{{ _lang('Previous Section') }}</th>
                <th>{{ _lang('Gender') }}</th>

            </thead>
            <tbody>
                @if (isset($migratedLists))
                        @foreach ($migratedLists as $student)
                            <tr>
                                <td>
                                    {{ $student->studentID }}
                                </td>
                                <td>
                                    {{ $student->student_roll }}
                                </td>
                                <td>
                                    <span class="text-capitalize">{{ $student->student_first_name }}</span> <span class="text-capitalize">{{ $student->student_last_name }}</span>
                                </td>
                                <td>
                                    {{$student->student_section_name}}
                                </td>
                                <td>
                                    {{ $student->student_gender }}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-danger">No Student Found</td>
                        </tr>
                    @endif
            </tbody>
        </table>
    @endsection
