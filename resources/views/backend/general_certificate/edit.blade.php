@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">


                <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="">
                        <div class="col-md-12 row">

                            <div class="form-group col-md-3">
                                <label class="control-label" for="">Student ID</label>
                                <input type="text" id="studentId" class="form-control" placeholder=""
                                    aria-describedby="helpId" required value="{{ $testimonial->student_id }}"
                                    name="studentId" disabled>

                            </div>

                        </div>
                        <div class="col-md-12">
                            @if ($testimonial)
                                <div class="row">

                                    <input type="text" hidden name="student_id"value={{ $testimonial?->student_id }}>
                                    <div class="col-md-4">
                                        <label for="exam_name">Exam name</label>

                                        <select class="form-control" class="form-control" name="exam_name">
                                            <option value="HSC">HSC</option>
                                            <option value="First Year">First Year</option>
                                            <option value="Second Year">Second Year</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Board</label>
                                        <select class="form-control" class="form-control" name="board_name" required>
                                            <option value="">--Select--</option>
                                            @foreach ($boardsName as $item)
                                                <option value="{{ $item }}"
                                                    {{$testimonial->board_name== $item  ? 'selected' : '' }}>
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Board Registration No</label>
                                        <input type="text" id="board_reg_no" class="form-control" placeholder=""
                                            aria-describedby="helpId" required name="board_reg_no"
                                            value="{{ $testimonial->board_reg_no }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">GPA</label>
                                        <input type="numeric" id="gpa" class="form-control" placeholder=""
                                            aria-describedby="helpId" required name="gpa"
                                            value="{{ $testimonial->gpa }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Board Roll No</label>
                                        <input type="text" id="board_roll_no" class="form-control" placeholder=""
                                            aria-describedby="helpId" required name="board_roll_no"
                                            value="{{ $testimonial->board_roll_no }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Passing year</label>
                                        <input type="number" id="passing_year" class="form-control" placeholder=""
                                            aria-describedby="helpId" required name="passing_year"
                                            value="{{ $testimonial->passing_year }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Grade</label>
                                        <input type="test" id="grade" class="form-control" placeholder=""
                                            aria-describedby="helpId" required name="grade"
                                            value="{{ $testimonial->grade }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Issue Date</label>
                                        <input type="date" id="issue_date" class="form-control date" placeholder=""
                                            aria-describedby="helpId" required name="issue_date"
                                            value="{{ $testimonial->issue_date }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Session</label>
                                        <select class="form-control" name="session" required>
                                            <option value="">--Select--</option>

                                            @foreach (get_table('academic_years') as $session)
                                                <option value="{{ $session->year }}"
                                                    {{ $testimonial->session == $session?->year ? 'selected' : '' }}>
                                                    {{ _lang('Session') }} ({{ $session->year }})</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-4">

                                        <button class="btn btn-success mt-5 " type="submit">Submit</button>
                                    </div>

                                </div>
                            @else
                                <div class="alert alert-danger text-center text-white">{{ _lang('No Student Found !') }}
                                </div>
                            @endif

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
<script>$(document).ready(function(){
    $('.date').datepicker();
});</script>
@endsection