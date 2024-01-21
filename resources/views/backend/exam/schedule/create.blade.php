@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading panel-title">{{ _lang('Exam Schedule') }}</div>

                <div class="panel-body">
                    @if ($type == 'create')
                        <form method="post" class="params-panel validate" autocomplete="off"
                            action="{{ url('exams/schedule/create') }}">
                        @else
                            <form method="post" class="params-panel validate" autocomplete="off"
                                action="{{ url('exams/schedule') }}">
                    @endif

                    {{ csrf_field() }}

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">{{ _lang('Select Exam') }}</label>
                            <select class="form-control select2" id="dropdownData" name="exam" required>
                                <option value="">{{ _lang('Select One') }}</option>
                                {{ create_option('exams', 'id', 'name', isset($exam) ? $exam : old('exam'), ['session_id=' => get_option('academic_year')]) }}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">{{ _lang('Exam Type') }}</label>
                            <select class="form-control select2" name="exam_type">
                                <option value="">{{ _lang('Select One') }}</option>
                                @foreach ($exam_types as $exam_type)
                                    <option value="{{ $exam_type->id }}"
                                        {{ $examTypeName == $exam_type->id ? 'selected' : '' }}>
                                        {{ $exam_type->exam_type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">{{ _lang('Exam Start At') }}</label>
                            <input type="datetime-local" class="form-control" name="date_time" value="{{ $examDateTime }}"
                                required id="setDateTime">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">{{ _lang('Select Class') }}</label>
                            <select class="form-control select2" name="class" required>
                                <option value="">{{ _lang('Select One') }}</option>
                                {{ create_option('classes', 'id', 'class_name', isset($class) ? $class : old('class')) }}
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">{{ _lang('Select Group') }}</label>
                            <select class="form-control select2" name="group">
                                <option value="">{{ _lang('Select One') }}</option>
                                {{ create_option('student_groups', 'id', 'group_name', isset($group) ? $class : old('group')) }}
                            </select>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" style="margin-top:24px;"
                                class="btn btn-primary btn-block rect-btn">{{ _lang('Search') }}</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div><!-- End Panel-->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (isset($subjects) && $type == 'create')
                @if (count($subjects) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading panel-title">{{ _lang('Exam Schedule') }}</div>

                        <div class="panel-body">
                            <form action="{{ url('exams/store_schedule') }}" class="" autocomplete="off"
                                method="post">
                                <div class="table">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>{{ _lang('Subject') }}</th>
                                            <th>{{ _lang('Date') }}</th>
                                            <th>{{ _lang('Start Time') }}</th>
                                            <th>{{ _lang('End Time') }}</th>
                                            <th>{{ _lang('Room') }}</th>
                                            {{-- <th>{{ _lang('Objective') }}</th>
                                            <th>{{ _lang('OPM') }}</th>
                                            <th>{{ _lang('Written') }}</th>
                                            <th>{{ _lang('WPM') }}</th>
                                            <th>{{ _lang('Practical') }}</th>
                                            <th>{{ _lang('PPM') }}</th>
                                            <th>{{ _lang('Total') }}</th> --}}
                                        </thead>
                                        <tbody>
                                            {{ csrf_field() }}
                                            @foreach ($subjects as $subject)
                                                @php
                                                    $subjectId = 'subject_ids[' . $subject->subject_id . ']';
                                                @endphp

                                                <tr>
                                                    <input type="hidden" name="schedules_id[]"
                                                        value="{{ $subject->schedules_id }}">
                                                    <input type="hidden" name="{{ $subjectId }}"
                                                        value="{{ $subject->subject_id }}">
                                                    <input type="hidden" name="class_id" value="{{ $class }}">
                                                    <input type="hidden" name="group_id" value="{{ $group }}">
                                                    <input type="hidden" name="exam_id" value="{{ $exam }}">
                                                    <input type="hidden" name="exam_type_id" value="{{ $examTypeName }}">
                                                    <input type="hidden" name="date_time" value="{{ $examDateTime }}">

                                                    <td>{{ $subject->subject_name }}</td>

                                                    @php
                                                        $inputFields = ['date', 'start_time', 'end_time', 'room'];
                                                        // $numberFields = ['objective', 'opm', 'written', 'wpm', 'practical', 'ppm', 'total'];
                                                    @endphp
                                                    @foreach ($inputFields as $name)
                                                        <td>
                                                            <input type="text" min="0" max=""
                                                                style="width: 70px; border: none; padding: 0px;"
                                                                class="{{ $name == 'date'
                                                                    ? 'form-control datepicker'
                                                                    : ($name == 'start_time'
                                                                        ? 'form-control timepicker'
                                                                        : ($name == 'end_time'
                                                                            ? 'form-control timepicker'
                                                                            : 'form-control')) }}"
                                                                id="{{ $name == 'objective'
                                                                    ? 'objID'
                                                                    : ($name == 'written'
                                                                        ? 'writtenID'
                                                                        : ($name == 'practical'
                                                                            ? 'practicalID'
                                                                            : ($name == 'total'
                                                                                ? 'totalID'
                                                                                : ''))) }}"
                                                                onkeyup="{{ $name == 'objective'
                                                                    ? 'updateOutput()'
                                                                    : ($name == 'written'
                                                                        ? 'updateOutput()'
                                                                        : ($name == 'practical'
                                                                            ? 'updateOutput()'
                                                                            : '')) }}"
                                                                value="{{ $subject->$name ?? '' }}"
                                                                name="{{ $subjectId }}[{{ $name }}]"
                                                                {{-- required --}} />
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="13">
                                                    <button type="submit" class="btn btn-primary rect-btn pull-right">
                                                        {{ _lang('Save') }}
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </form>
                        </div>

                    </div>
                @else
                    <div class="alert alert-danger">
                        <h5>{{ _lang('No Subject Assign for this class !') }}</h5>
                    </div>
                @endif

            @endif



            <!--For View Emam Routine-->
            @if (isset($subjects) && $type == 'view')
                @if (count($subjects) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="panel-title">{{ _lang('Exam Routine') }}</span>
                            <button type="button" data-print="exam_routine"
                                class="btn btn-primary btn-sm pull-right print"><i class="fa fa-print"></i>
                                {{ _lang('Print Routine') }}</button>
                        </div>

                        <div class="panel-body" id="exam_routine">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="100" class="text-center">
                                            <span class="f-20">{{ get_option('school_name') }}</span></br>
                                            <span class="f-18">{{ _lang('Exam Routine') }}</span></br>
                                            <span class="f-16">{{ _lang('Class') }}:
                                                {{ get_class_name($class) }}</span>
                                        </td>
                                    </tr>
                                </table>

                                <table class="table table-bordered">
                                    <tbody>
                                        <thead>
                                            <th>{{ _lang('Subject') }}</th>
                                            <th>{{ _lang('Date') }}</th>
                                            <th>{{ _lang('Start Time') }}</th>
                                            <th>{{ _lang('End Time') }}</th>
                                            <th>{{ _lang('Room') }}</th>
                                        </thead>
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td>{{ $subject->subject_name }}</td>
                                                <td>{{ $subject->date }}</td>
                                                <td>{{ $subject->start_time }}</td>
                                                <td>{{ $subject->end_time }}</td>
                                                <td>{{ $subject->room }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                @else
                    <div class="alert alert-danger">
                        <h5>{{ _lang('No Subject Assign for this class !') }}</h5>
                    </div>
                @endif

            @endif

        </div>
    </div>
@endsection

@section('js-script')
    <script>
        $('#dropdownData').on('change', function() {
            var selectedValue = $(this).val();
            console.log('selectedValue:', selectedValue);

            $.ajax({
                type: 'GET',
                url: '/exams/get-data-by-selection',
                data: {
                    selected_value: selectedValue
                },
                success: function(response) {

                    $('#setDateTime').val(response.data.date_time);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

    <script>
        function updateOutput() {
            // Get values from all input fields
            const input1 = parseFloat(document.getElementById('objID').value);
            const input2 = parseFloat(document.getElementById('writtenID').value);
            const input3 = parseFloat(document.getElementById('practicalID').value);

            // Calculate the sum of values
            const sum = input1 + input2 + input3;

            // Update the output field with the sum
            document.getElementById('totalID').value = sum;
        }
        window.onload = updateOutput;
    </script>
@endsection
