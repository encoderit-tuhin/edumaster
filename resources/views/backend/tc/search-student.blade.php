@if ($student)
    <div class="row">
        <div class="col-md-6">
            <table class=" table table-bordered data-table">

                <tbody>
                    <tr>
                        <td>Student Roll</td>
                        <td class="ng-binding">{{ $student?->roll }}</td>
                    </tr>

                    <tr>
                        <td>Name</td>
                        <td class="ng-binding">{{ $student?->first_name }}
                            {{ $student?->last_name }}</td>
                    </tr>

                    <tr>
                        <td>Father's Name</td>
                        <td class="ng-binding">{{ $student?->father_name }}</td>
                    </tr>

                    <tr>
                        <td>Mother's Name</td>
                        <td class="ng-binding">{{ $student?->mother_name }}</td>
                    </tr>


                    <tr>
                        <td>Session</td>
                        <td class="ng-binding">{{ get_academic_year() }} </td>
                    </tr>

                    <tr>
                        <td>Date Of Birtd</td>
                        <td class="ng-binding">{{ $student?->birthday }} </td>
                    </tr>

                    <tr>
                        <td>Class</td>
                        <td class="ng-binding">{{ $student?->class?->class_name }} </td>-
                    </tr>
                </tbody>


            </table>
        </div>
        <div class="col-md-6">
            <input type="text" hidden name="student_id"value={{ $student?->student_id }}>


            <div class="col-md-6">
                <label for="">Reason</label>
                <input type="text" id="reason" class="form-control" placeholder="" aria-describedby="helpId"
                    required name="reason">
            </div>

            <div class="col-md-6">
                <label for="">Issue Date</label>
                <input type="date" id="issue_date" class="form-control date" placeholder="" aria-describedby="helpId"
                    required name="issue_date">
            </div>
            <div class="col-md-6">
                <label for="">Left Date</label>
                <input type="date" id="left_date" class="form-control date" placeholder="" aria-describedby="helpId"
                    required name="left_date">
            </div>


            <div class="col-md-6">

                <button class="btn btn-success mt-5 " type="submit">Submit</button>
            </div>

        </div>

    </div>
@else
    <div class="alert alert-danger text-center text-white">{{ _lang('No Student Found !') }}</div>
@endif

<script>
    $(document).ready(function() {
        $('.date').datepicker();
    });
</script>
