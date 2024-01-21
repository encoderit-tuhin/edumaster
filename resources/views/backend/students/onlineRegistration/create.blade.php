@extends('layouts.backend')
@section('styles')
    <style>
        .sub-section-header::after {
            border-top: 18px solid transparent !important;
        }

        .sub-section-header {
            margin: 0px 10px !important;
            margin-left: -14px !important;
        }

        .form-horizontal .form-group {
            margin-right: 5px;
            margin-left: 0px;
        }

        .form-group {
            margin-bottom: 0px;
        }

        .control-label .text-danger {
            display: none;
        }
    </style>
@endsection

@section('content')
    @include('partials.student-online-application-part', [
        'route' => route('student-online-registration.store'),
        'method' => 'POST',
        'student' => null,
        'isEdit' => false,
        'isAdmin' => true,
    ])
@endsection
