@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">


                <form action="{{ route('tc.update', $tcs->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="">
                        <div class="col-md-12 row">

                            <div class="form-group col-md-3">
                                <label class="control-label" for="">Student ID</label>
                                <input type="text" id="studentId" class="form-control" placeholder=""
                                    aria-describedby="helpId" required value="{{ $tcs->student_id }}"
                                    name="studentId" disabled>

                            </div>

                        </div>
                        <div class="col-md-12">
                            @if ($tcs)
                                <div class="row">

                                    <input type="text" hidden name="student_id"value={{ $tcs?->student_id }}>
                                   
                                    
                                    <div class="col-md-4">
                                        <label for="">Reason</label>
                                        <input type="text" id="reason" class="form-control" placeholder=""
                                            aria-describedby="helpId" required name="reason"
                                            value="{{ $tcs->reason }}">
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="">Issue Date</label>
                                        <input type="date" id="issue_date" class="form-control date" placeholder=""
                                            aria-describedby="helpId" required name="issue_date"
                                            value="{{ $tcs->issue_date }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Left Date Date</label>
                                        <input type="date" id="left_date" class="form-control date" placeholder=""
                                            aria-describedby="helpId" required name="left_date"
                                            value="{{ $tcs->left_date }}">
                                    </div>
                                    
                                    <div class="col-md-4">

                                        <button class="btn btn-success mt-5 " type="submit">Update</button>
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