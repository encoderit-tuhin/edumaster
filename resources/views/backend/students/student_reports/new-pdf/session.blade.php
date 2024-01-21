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
            /* font-size: 12px; */
        }
    </style>
@endsection
@section('content')
    <div class="containera" style="width:95%">
        @include('layouts.pdf.header')
        @if (isset($students) && count($students) > 0)
            <table class="table table-striped table-responsive data-table table-bordered">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Section</th>
                        <th>Class</th>
                        <th>Roll</th>
                        <th>Session</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->student->first_name }} {{ $student->student->last_name }}</td>
                            <td>{{ $student->section->section_name }}</td>
                            <td>{{ $student->class->class_name }}</td>
                            <td>{{ $student->roll }}</td>
                            <td>{{ $student->session->year }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
@section('scripts')
    <script>
        function hideHeaderFooter() {
            document.getElementById("testimonial-header").style.visibility = "hidden";
            document.getElementById("testimonial-footer").style.visibility = "hidden";

        }

        function showHeaderFooter() {
            document.getElementById("testimonial-header").style.visibility = "visible";
            document.getElementById("testimonial-footer").style.visibility = "visible";

        }
    </script>
@endsection
