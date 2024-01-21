@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('Student Attendance Status Report') }}
                    </span>
                </div>
                <div class="panel-body">
                    <form id="search_form" class="params-panel validate"
                        action="{{ route('reports.student_attendance_report.status') }}" method="post" autocomplete="off"
                        accept-charset="utf-8">
                        @csrf
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Class') }}</label>
                                <select name="class_id" class="form-control select2" onChange="getData(this.value);"
                                    required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option('classes', 'id', 'class_name', $class_id) }}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Section') }}</label>
                                <select name="section_id" class="form-control select2" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option('sections', 'id', 'section_name', $section_id, ['class_id=' => $class_id]) }}
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Attendance Status') }}</label>
                                <select class="form-control" name="status">
                                    <option value="">-- Select One --</option>
                                    <option {{ $status == '1' ? 'selected' : '' }} value="1">Present</option>
                                    <option {{ $status == '2' ? 'selected' : '' }} value="2">Absent</option>
                                    <option {{ $status == '3' ? 'selected' : '' }} value="3">Late</option>
                                    <option {{ $status == '4' ? 'selected' : '' }} value="4">Holiday</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <button type="submit" style="margin-top:24px;"
                                    class="btn btn-primary btn-block rect-btn">{{ _lang('View Report') }}</button>
                            </div>
                        </div>
                    </form>



                    @if (isset($report_data))
                        <div class="col-md-12 params-panel" id="attendance">
                            <button type="button" data-print="attendance"
                                class="btn btn-primary btn-sm pull-right print"><i class="fa fa-print"></i>
                                {{ _lang('Print Report') }}</button>
                            <div class="text-center clear">
                                {{ get_option('school_name') }}
                                <br>
                                {{ _lang('Attendance Report for Class') }} {{ $class }}
                                <br>
                                {{ _lang('Section') . ' ' . $section }}
                                </br>
                                </br>
                                </br>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        {{-- <tr>
										<th>Day</th>
										@for ($month = 1; $month <= 12; $month++)
											<th>{{ date('M', strtotime('2023-' . $month . '-01')) }}</th>
										@endfor
									</tr> --}}

                                        <th>Day</th>
                                        <th>Jan</th>
                                        <th>Feb</th>
                                        <th>Mar</th>
                                        <th>Apr</th>
                                        <th>May</th>
                                        <th>Jun</th>
                                        <th>Jul</th>
                                        <th>Aug</th>
                                        <th>Sep</th>
                                        <th>Oct</th>
                                        <th>Nov</th>
                                        <th>Dec</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($day = 1; $day <= 31; $day++)
                                        <tr>
                                            <td>{{ $day }}</td>
                                            @for ($month = 1; $month <= 12; $month++)
                                                <td>
                                                    @php
                                                        $attendanceCounts = ['P' => null, 'A' => null, 'L' => null, 'H' => null];
                                                    @endphp
                                                    @foreach ($report_data as $attendance)
                                                        @if (date('m', strtotime($attendance->date)) == $month && date('d', strtotime($attendance->date)) == $day)
                                                            @php
                                                                switch ($attendance->attendance) {
                                                                    case '1':
                                                                        $attendanceCounts['P']++;
                                                                        break;
                                                                    case '2':
                                                                        $attendanceCounts['A']++;
                                                                        break;
                                                                    case '3':
                                                                        $attendanceCounts['L']++;
                                                                        break;
                                                                    case '4':
                                                                        $attendanceCounts['H']++;
                                                                        break;
                                                                    default:
                                                                        $attendanceCounts['-']++;
                                                                        break;
                                                                }
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    {{ isset($attendanceCounts['P']) ? $attendanceCounts['P'] : '' }}
                                                    {{ isset($attendanceCounts['A']) ? $attendanceCounts['A'] : '' }}
                                                    {{ isset($attendanceCounts['L']) ? $attendanceCounts['L'] : '' }}
                                                    {{ isset($attendanceCounts['H']) ? $attendanceCounts['H'] : '' }}
                                                </td>
                                            @endfor
                                        </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                    @endif

                </div><!--End panel-->
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js-script')
    <script type="text/javascript">
        function getData(val) {
            var _token = $('input[name=_token]').val();
            var class_id = $('select[name=class_id]').val();
            $.ajax({
                type: "POST",
                url: "{{ url('sections/section') }}",
                data: {
                    _token: _token,
                    class_id: class_id
                },
                beforeSend: function() {
                    $("#preloader").css("display", "block");
                },
                success: function(sections) {
                    $("#preloader").css("display", "none");
                    $('select[name=section_id]').html(sections);
                }
            });
        }
    </script>
@stop
