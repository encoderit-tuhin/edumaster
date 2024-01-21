<div>
    @if (count($marks) == 0)
        <div>
            <p class="text-center  font-weight-bold text-danger ">No Data Found</p>
        </div>
    @else
        <table class="table  border data-table">
            <thead>
                <tr>
                    <th class="id no-line-break">
                        {{ __('Student Roll') }}
                    </th>
                    <th class="name">
                        {{ __('Name') }}
                    </th>
                    <th>Attendance</th>
                    <th class="no-line-break">Monthly Test</th>
                    <th>Objective</th>
                    <th>Written</th>
                    <th>Practical</th>
                    <th class="no-line-break">Total Mark</th>
                    <th>Letter Grade</th>
                    <th>Grade Point</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marks as $key => $mark)
                    <tr class="add-or-update-mark">
                        <td class="id">{{ $mark->student->studentSession->roll ?? '--' }}</td>
                        <input type="hidden" name="student_id[{{ $key }}]" value="{{ $mark->student_id }}" />
                        <input type="hidden" name="mark_id[{{ $key }}]" value="{{ $mark->mark_id }}" />

                        <td class="name">{{ $mark->student->user->name ?? '' }}</td>
                        <td>
                            <input type="number" min="0" max="100" class="form-control-sm form-control "
                                name="attendance[{{ $key }}][]"
                                value="{{ $mark->attendance ?? old('attendance') }}"
                                id="attendance_{{ $key }}" oninput="changeMarkValue({{ $key }})" />
                        </td>
                        <td>
                            <input type="number" min="0" max="100"
                                class="form-control-sm form-control monthly_test"
                                name="monthly_test[{{ $key }}][]"
                                value="{{ $mark->monthly_test ?? old('monthly_test') }}" 
                                id="monthly_test_{{ $key }}" oninput="changeMarkValue({{ $key }})" />
                        </td>
                        <td>
                            <input type="number" min="0" max="100"
                                class="form-control-sm form-control objective " name="objective[{{ $key }}][]"
                                value="{{ $mark->objective ?? old('objective') }}" id="objective_{{ $key }}"
                                oninput="changeMarkValue({{ $key }})" />
                        </td>
                        <td>
                            <input type="number" min="0" max="100"
                                class="form-control-sm form-control written" name="written[{{ $key }}][]"
                                value="{{ $mark->written ?? old('written') }}" id="written_{{ $key }}"
                                oninput="changeMarkValue({{ $key }})" />
                        </td>
                        <td>
                            <input type="number" min="0" max="100"
                                class="form-control-sm form-control practical" name="practical[{{ $key }}][]"
                                value="{{ $mark->practical ?? old('practical') }}" id="practical_{{ $key }}"
                                oninput="changeMarkValue({{ $key }})" />
                        </td>
                        <td>
                            <input type="text" class="form-control-sm form-control text-black font-weight-bold"
                                id="total_mark_{{ $key }}"
                                value="{{ $mark->mark_value ?? old('mark_value') }}" readonly />
                        </td>
                        <td>
                            <input type="text" class="form-control-sm form-control text-black font-weight-bold"
                                id="letter_{{ $key }}" value="{{ get_point($mark->mark_value?$mark->mark_value:0 ?? old('mark_value')) }}" readonly />
                        </td>
                        <td>
                            <input type="text" class="form-control-sm form-control text-black font-weight-bold"
                                id="grade_{{ $key }}" value="{{ get_grade($mark->mark_value?$mark->mark_value:0 ?? old('mark_value')) }}"
                                readonly />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Submit</button>
    @endif
</div>

<script>
    function changeMarkValue(key) {
        // get all mark values for #objective_key, #written_key, #practical_key
        // and set total mark, letter and grade
        let attendance = document.getElementById('attendance_' + key).value;
        let monthly_test = document.getElementById('monthly_test_' + key).value;
        let objective = document.getElementById('objective_' + key).value;
        let written = document.getElementById('written_' + key).value;
        let practical = document.getElementById('practical_' + key).value;


        let total_mark = parseInt(attendance || '0') +
            parseInt(monthly_test || '0') +
            parseInt(objective || '0') +
            parseInt(written || '0') +
            parseInt(practical || '0');

        if (isNaN(total_mark)) {
            total_mark = 0;
        }

        try {
            document.getElementById('total_mark_' + key).value = total_mark;
        } catch (error) {
            console.log('error', error)
        }

        let letter = '';
        if (total_mark >= 80) {
            letter = 'A+';
        } else if (total_mark >= 70) {
            letter = 'A';
        } else if (total_mark >= 60) {
            letter = 'A-';
        } else if (total_mark >= 50) {
            letter = 'B';
        } else if (total_mark >= 40) {
            letter = 'C';
        } else if (total_mark >= 33) {
            letter = 'D';
        } else {
            letter = 'F';
        }

        try {
            document.getElementById('letter_' + key).value = letter;
        } catch (error) {
            console.log('error', error)
        }

        let grade = '';
        if (total_mark >= 80) {
            grade = '5.00';
        } else if (total_mark >= 70) {
            grade = '4.00';
        } else if (total_mark >= 60) {
            grade = '3.50';
        } else if (total_mark >= 50) {
            grade = '3.00';
        } else if (total_mark >= 40) {
            grade = '2.00';
        } else if (total_mark >= 33) {
            grade = '1.00';
        } else {
            grade = '0.00';
        }

        try {
            document.getElementById('grade_' + key).value = grade;
        } catch (error) {
            console.log('error', error)
        }
    }
</script>
