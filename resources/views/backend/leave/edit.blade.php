@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Edit Leave Application') }}
                    </div>
                </div>
                <div class="panel-body row">
                    <div class="col-md-8">
                        @include('backend.leave.partials.form', [
                            'formAction' => route('leave.update', $leave->id),
                            'leaveTypes' => $leaveTypes,
                            'students' => $students,
                            'leave' => $leave,
                            'methodField' => method_field('PATCH'),
                            'leavesStatuses' => $leavesStatuses,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
