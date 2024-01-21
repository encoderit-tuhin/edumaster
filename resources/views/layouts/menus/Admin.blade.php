@php
    $user = Auth::user();
@endphp
<ul class="nav metismenu" id="menu">
    @if ($user->can('dashboard.view'))
        <li @if (Request::is('dashboard')) class="active" @endif>
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-desktop"></i>
                {{ _lang('Dashboard') }}
            </a>
        </li>
    @endif

    @if ($user->can('students.view'))
        <li>
            <a href="#"><i class="fa fa-address-card"></i>{{ _lang('Students') }}</a>
            <ul>
                @if ($user->can('students.view') || $user->can('students.create'))
                    <li
                        class="{{ Route::is('students.index') || Route::is('students.create') || Route::is('students.edit') || Route::is('students.bulk-upload') || Request::is('students/create/*') || Request::is('students-bulk-file-upload') || Request::is('vital/*') ? 'active' : '' }}">
                        <a href="{{ route('students.index') }}">
                            {{ _lang('Students') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('students.view') || $user->can('students.create'))
                    <li
                        class="{{ Route::is('student-applications.index') || Request::is('student-applications/*') ? 'active' : '' }}">
                        <a href="{{ route('student-applications.index') }}">
                            {{ _lang('Applying Students') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('students_id_password.create'))
                    <li
                        class="{{ Request::is('student-send-id-pass') || Request::is('student-send-id-pass*') ? 'active' : '' }}">
                        <a href="{{ route('student-send-id-pass.index') }}">
                            {{ _lang('Send ID/Pass') }}
                        </a>
                    </li>
                @endif


                {{-- <li
                    class="{{ Route::is('students.create') || Route::is('students.edit') || Route::is('students.bulk-upload') || Request::is('students/create/*') ? 'active' : '' }}">
                    <a href="{{ route('students.create') }}">
                        {{ _lang('Register') }}
                    </a>
                </li> --}}

                {{-- <li @if (Request::is('parents') or Request::is('parents/*')) class="active" @endif>
                    <a href="{{ route('parents.index') }}">
                        {{ _lang('Parents') }}
                    </a>
                </li> --}}

                {{-- <li @if (Request::is('students/promote') || Request::is('students/promote/*')) class="active" @endif>
                    <a href="{{ url('students/promote') }}">
                        {{ _lang('Promote Students') }}
                    </a>
                </li> --}}

                @if ($user->can('students_migration.create') || $user->can('students_migration.pushback'))
                    <li
                        class="{{ Request::is('student-migration') || Request::is('student-migration/*') || Request::is('student-migration-pushback') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Migration') }}</a>
                        <ul>
                            @if ($user->can('students_migration.create'))
                                <li @if (Request::is('student-migration') || Request::is('student-migration/*')) class="active" @endif>
                                    <a href="{{ route('student-migration.index') }}">
                                        {{ _lang('Student Migration') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('students_migration.pushback'))
                                <li @if (Request::is('student-migration-pushback')) class="active" @endif>
                                    <a href="{{ route('student-migration-pushback.index') }}">
                                        {{ _lang('Migration Pushback') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif


                @if ($user->can('students_report.summary'))
                    <li
                        class="{{ Request::is('student-list') || Request::is('gender-wise-student-list') || Request::is('religion-wise-student-list') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Summary') }}</a>
                        <ul>
                            <li @if (Request::is('student-list') || Request::is('gender-wise-student-list') || Request::is('religion-wise-student-list')) class="active" @endif>
                                <a href="{{ route('student-list.index') }}">
                                    {{ _lang('Student List') }}
                                </a>
                            </li>
                            {{-- <li @if (Request::is('student-session-list')) class="active" @endif>
                                <a href="{{ route('student-session-list') }}">
                                    {{ _lang('Student Session') }}
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                @endif
                @if ($user->can('students_report.details'))
                    <li
                        class="{{ Request::is('details-student-list') || Request::is('class-wise-student-list') || Request::is('section-wise-student-list') || Request::is('age-wise-student-list-search') || Request::is('gender-wise-student-list-search') || Request::is('at-a-glance') || Request::is('migrated-list') || Request::is('quick-search') || Request::is('quick-search/*') || Request::is('taught-list') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Details') }}</a>
                        <ul>
                            @if ($user->can('students_report.details'))
                                <li @if (Request::is('details-student-list') ||
                                        Request::is('class-wise-student-list') ||
                                        Request::is('section-wise-student-list') ||
                                        Request::is('age-wise-student-list-search') ||
                                        Request::is('gender-wise-student-list-search')) class="active" @endif>
                                    <a href="{{ route('details-student-list.index') }}">
                                        {{ _lang('Student List') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('students_report.taught'))
                                <li @if (Request::is('taught-list')) class="active" @endif>
                                    <a href="{{ route('taught-list.index') }}">
                                        {{ _lang('Taught List') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('students_report.migrated'))
                                <li @if (Request::is('migrated-list')) class="active" @endif>
                                    <a href="{{ route('migrated-list.index') }}">
                                        {{ _lang('Migrated List') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('students_report.at_a_glance'))
                                <li @if (Request::is('at-a-glance')) class="active" @endif>
                                    <a href="{{ route('at-a-glance.index') }}">
                                        {{ _lang('AT A Glance') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('students_report.quick_search'))
                                <li @if (Request::is('quick-search') || Request::is('quick-search/*')) class="active" @endif>
                                    <a href="{{ route('quick-search.index') }}">
                                        {{ _lang('Quick Search') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('students_report.details'))
                    <li class="{{ Request::is('migrated-list-report') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Reports') }}</a>
                        <ul>
                            @if ($user->can('students_report.details'))
                                <li @if (Request::is('migrated-list-report')) class="active" @endif>
                                    <a href="{{ route('migrated-list.report') }}">
                                        {{ _lang('Migration Report') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                {{-- <li
                    class="{{ Request::is('fee_types') || Request::is('invoices/create') || Request::is('invoices/class/*') || Request::is('invoices') || Request::is('student_payments') || Request::is('student_payments/class/*') ? 'active' : '' }}">
                    <a href="#">{{ _lang('Student Fees') }}</a>
                    <ul>
                        <li @if (Request::is('fee_types')) class="active" @endif>
                            <a href="{{ url('fee_types') }}">
                                {{ _lang('Fees Type') }}
                            </a>
                        </li>
                        <li @if (Request::is('invoices/create')) class="active" @endif>
                            <a href="{{ url('invoices/create') }}">
                                {{ _lang('Generate Invoice') }}
                            </a>
                        </li>
                        <li @if (Request::is('invoices') || Request::is('invoices/class/*')) class="active" @endif>
                            <a href="{{ url('invoices') }}">
                                {{ _lang('Student Invoices') }}
                            </a>
                        </li>
                        <li @if (Request::is('student_payments') || Request::is('student_payments/class/*')) class="active" @endif>
                            <a href="{{ url('student_payments') }}">
                                {{ _lang('Payment History') }}
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </li>
    @endif

    @if ($user->can('teachers.view'))
        <li
            class="{{ Request::is('teachers') || Request::is('teachers/create') || Request::is('teachers-bulk-upload') || Request::is('teachers-bulk-file-upload') || Request::is('staffs') || Request::is('staffs/create') || Request::is('staff') or (Request::is('staff/*') ? 'active' : '') }}">
            <a href="#"><i class="fa fa-users"></i>{{ _lang('Teachers & Staffs') }}</a>
            <ul>
                @if ($user->can('teachers.view'))
                    <li class="{{ Request::is('teachers') || Route::is('teachers.edit') ? 'active' : '' }}">
                        <a href="{{ route('teachers.index') }}">
                            {{ _lang('Teachers') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('teachers.create'))
                    <li @if (Request::is('teachers/create') || Request::is('teachers-bulk-upload') || Request::is('teachers-bulk-file-upload')) class="active" @endif>
                        <a href="{{ route('teachers.create') }}">
                            {{ _lang('Registration') }}
                        </a>
                    </li>
                @endif

                {{-- Assigns list --}}
                @if ($user->can('teachers.assign_subject') || $user->can('teachers.assign_class') || $user->can('teachers.assign_shift'))
                    <li
                        class="{{ Request::is('assignsubjects') || Request::is('assignsubjects/*') || Request::is('assignshifts') || Request::is('assignshifts/*') || Request::is('assignclass') || Request::is('assignclass/*') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Assign') }}</a>
                        <ul>
                            @if ($user->can('teachers.assign_subject'))
                                <li @if (Request::is('assignsubjects') or Request::is('assignsubjects/*')) class="active" @endif>
                                    <a href="{{ route('assignsubjects.index') }}">
                                        {{ _lang('Subjects') }}
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('teachers.assign_shift'))
                                <li @if (Request::is('assignshifts') or Request::is('assignshifts/*')) class="active" @endif>
                                    <a href="{{ route('assignshifts.index') }}">
                                        {{ _lang('Shifts') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('teachers.assign_class'))
                                <li @if (Request::is('assignclass') or Request::is('assignclass/*')) class="active" @endif>
                                    <a href="{{ route('assignclass.index') }}">
                                        {{ _lang('Class') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->user_type !== 'Staff')
                    @if ($user->can('staffs.create'))
                        <li @if (Request::is('staffs/create')) class="active" @endif>
                            <a href="{{ route('staffs.create') }}">
                                {{ _lang('Add Staff') }}
                            </a>
                        </li>
                    @endif
                    @if ($user->can('staffs.view'))
                        <li class="{{ Request::is('staffs') ? 'active' : '' }}">
                            <a href="{{ route('staffs.index') }}">
                                {{ _lang('Staffs') }}
                            </a>
                        </li>
                    @endif
                    @if ($user->can('staff_attendance.view') || $user->can('staff_attendance.create'))
                        <li @if (Request::is('staff') or Request::is('staff/*')) class="active" @endif>
                            <a href="{{ url('staff/attendance') }}">
                                {{ _lang('Attendance') }}
                            </a>
                        </li>
                    @endif
                @endif

                @if ($user->can('committee.view') || $user->can('committee.create'))
                    <li @if (Request::is('committee') or Request::is('committee/*')) class="active" @endif>
                        <a href="{{ route('committee.index') }}">
                            {{ _lang('Committee') }}
                        </a>
                    </li>
                @endif

                <li @if (Request::is('teachers-list')) class="active" @endif>
                    <a href="{{ route('teachers-list-report') }}" target="_blank">
                        {{ _lang('Report') }}
                    </a>
                </li>
            </ul>
        </li>
    @endif

    @if ($user->can('student_attendance.view'))
        <li
            class="{{ Request::is('student/attendance') || Request::is('exams/attendance') || Request::is('leave') || Request::is('reports/student_attendance_report') || Request::is('reports/student_attendance_report/view') }}">
            <a href="#"><i class="fa fa-check-circle"></i>{{ _lang('Student Attendance') }}</a>
            <ul>
                @if ($user->can('student_attendance.view') || $user->can('student_attendance.create'))
                    <li @if (Request::is('student') or Request::is('student/*')) class="active" @endif>
                        <a href="{{ url('student/attendance') }}">
                            {{ _lang('Student Attendance') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('exam_attendance.view') || $user->can('exam_attendance.create'))
                    <li @if (Request::is('exams/attendance')) class="active" @endif>
                        <a href="{{ url('exams/attendance') }}">
                            {{ _lang('Exam Attendance') }}
                        </a>
                    </li>
                @endif

                <li @if (Request::is('leave') || Request::is('leave/*')) class="active" @endif>
                    <a href="{{ route('leave.index') }}">
                        {{ _lang('Leave') }}
                    </a>
                </li>

                {{-- <a href="#">{{ _lang('Report') }}</a> --}}
                @if ($user->can('student_attendance_report.view'))
                    <li @if (Request::is('reports/student_attendance_report') || Request::is('reports/student_attendance_report/view')) class="active" @endif>
                        <a href="{{ url('reports/student_attendance_report') }}">
                            {{ _lang('Attendance Report') }}
                        </a>
                    </li>
                    <li @if (Request::is('reports/student_attendance_ratio') || Request::is('reports/student_attendance_ratio/view')) class="active" @endif>
                        <a href="{{ url('reports/student_attendance_ratio') }}">
                            Attendance Ratio
                        </a>
                    </li>
                @endif

                @if ($user->can('student_attendance_status_report.view'))
                    <li @if (Request::is('student_attendance_report/status')) class="active" @endif>
                        <a href="{{ route('reports.student_attendance_report.status') }}">
                            {{ _lang('Attendance Status Report') }}
                        </a>
                    </li>
                @endif

                <li @if (Request::is('student_attendance/delete')) class="active" @endif>
                    <a href="{{ route('student_attendance.delete') }}">
                        {{ _lang('Attendance Delete') }}
                    </a>
                </li>

            </ul>
        </li>
    @endif

    @if ($user->can('exam_mark.view'))
        <li>
            <a href="#"><i class="fa fa-address-card"></i>{{ _lang('Semester Exam') }}</a>
            <ul>
                {{-- @if ($user->can('exam_mark_configuration.view'))
                    <li
                        class="{{ Request::is('exams/all-exams') || Request::is('exams/schedule/create') || Request::is('exams/all-exams-id/*') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Mark Configurations') }}</a>
                        <ul>


                        </ul>
                    </li>
                @endif --}}

                @if ($user->can('exam_mark_configuration.create'))
                    <li @if (Request::is('exams/schedule/create') || Request::is('exams/all-exams-id/*')) class="active" @endif>
                        <a href="{{ url('exams/schedule/create') }}">
                            {{ _lang('Exam Routine Create') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('exam.routine'))
                    <li @if (Request::is('exams/schedule')) class="active" @endif>
                        <a href="{{ url('exams/schedule') }}">
                            {{ _lang('Exam Routine View') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('exam_mark_configuration.view'))
                    <li @if (Request::is('exams/all-exams')) class="active" @endif>
                        <a href="{{ url('exams/all-exams') }}">
                            {{ _lang('Exams') }}
                        </a>
                    </li>
                @endif

                {{-- <li
                class="{{ Request::is('exam-settings') || Request::is('exam-settings/*') || Request::is('student') || Request::is('student/*') || Request::is('exams/attendance') || Request::is('reports/student_attendance_report') || Request::is('reports/student_attendance_report/view') || Request::is('student_attendance_report/status') || Request::is('leave') || Request::is('leave/*') ? 'active' : '' }}">
                <a href="#">{{ _lang('Settings') }}</a>
                <ul>
                    <li @if (Request::is('exam-startup') or Request::is('exam-startup/*')) class="active" @endif>
                        <a href="{{ url('exam-settings/startup') }}">
                            {{ _lang('Exam Startup') }}
                        </a>
                    </li>
                    <li @if (Request::is('exams/attendance')) class="active" @endif>
                        <a href="{{ url('exams/attendance') }}">
                            {{ _lang('Exam Attendance') }}
                        </a>
                    </li>
                </ul>
            </li> --}}

                {{-- <li class="{{ Request::is('mark-update') || Request::is('mark-update/*') ? 'active' : '' }}">
                <a href="#">{{ _lang('Mark Update') }}</a>
                <ul>
                    <li @if (Request::is('mark-update') or Request::is('mark-update/*')) class="active" @endif>
                        <a href="{{ url('mark-update/section-wise') }}">
                            {{ _lang('Section Wise') }}
                        </a>
                    </li>
                    <li @if (Request::is('mark-update/subject-wise')) class="active" @endif>
                        <a href="{{ url('mark-update/subject-wise') }}">
                            {{ _lang('Subject Wise') }}
                        </a>
                    </li>
                </ul>
            </li> --}}

                {{-- <li
                class="{{ Request::is('exam-settings') || Request::is('exam-settings/*') || Request::is('student') || Request::is('student/*') || Request::is('exams/attendance') || Request::is('reports/student_attendance_report') || Request::is('reports/student_attendance_report/view') || Request::is('student_attendance_report/status') || Request::is('leave') || Request::is('leave/*') ? 'active' : '' }}">
                <a href="#">{{ _lang('Mark Delete') }}</a>
                <ul>
                    <li @if (Request::is('exam-startup') or Request::is('exam-startup/*')) class="active" @endif>
                        <a href="{{ url('exam-settings/startup') }}">
                            {{ _lang('Exam Startup') }}
                        </a>
                    </li>
                    <li @if (Request::is('exams/attendance')) class="active" @endif>
                        <a href="{{ url('exams/attendance') }}">
                            {{ _lang('Exam Attendance') }}
                        </a>
                    </li>
                </ul>
            </li> --}}

                {{-- <li
                class="{{ Request::is('exam-settings') || Request::is('exam-settings/*') || Request::is('student') || Request::is('student/*') || Request::is('exams/attendance') || Request::is('reports/student_attendance_report') || Request::is('reports/student_attendance_report/view') || Request::is('student_attendance_report/status') || Request::is('leave') || Request::is('leave/*') ? 'active' : '' }}">
                <a href="#">{{ _lang('Mark Process') }}</a>
                <ul>
                    <li @if (Request::is('exam-startup') or Request::is('exam-startup/*')) class="active" @endif>
                        <a href="{{ url('exam-settings/startup') }}">
                            {{ _lang('Exam Startup') }}
                        </a>
                    </li>
                    <li @if (Request::is('exams/attendance')) class="active" @endif>
                        <a href="{{ url('exams/attendance') }}">
                            {{ _lang('Exam Attendance') }}
                        </a>
                    </li>
                </ul>
            </li> --}}

                {{-- <li
                class="{{ Request::is('exam-settings') || Request::is('exam-settings/*') || Request::is('student') || Request::is('student/*') || Request::is('exams/attendance') || Request::is('reports/student_attendance_report') || Request::is('reports/student_attendance_report/view') || Request::is('student_attendance_report/status') || Request::is('leave') || Request::is('leave/*') ? 'active' : '' }}">
                <a href="#">{{ _lang('Result Process') }}</a>
                <ul>
                    <li @if (Request::is('exam-startup') or Request::is('exam-startup/*')) class="active" @endif>
                        <a href="{{ url('exam-settings/startup') }}">
                            {{ _lang('Exam Startup') }}
                        </a>
                    </li>
                    <li @if (Request::is('exams/attendance')) class="active" @endif>
                        <a href="{{ url('exams/attendance') }}">
                            {{ _lang('Exam Attendance') }}
                        </a>
                    </li>
                </ul>
            </li> --}}

                @if ($user->can('exam_mark.view'))
                    <li
                        class="{{ Request::is('add-or-update-mark-input') || Request::is('marks') || Request::is('marks*') || Request::is('marks/create') || Request::is('marks/rank') || Request::is('marks/rank/*') || Request::is('grades') || Request::is('mark_distributions') || Request::is('mark_distributions/*') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Marks') }}</a>
                        <ul>
                            @if ($user->can('exam_mark.create') || $user->can('exam_mark.edit'))
                                <li @if (Request::is('add-or-update-mark-input')) class="active" @endif>
                                    <a href="{{ url('add-or-update-mark-input') }}">
                                        {{ _lang('Add or Update Mark') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('exam_mark.view'))
                                <li @if (Request::is('marks') || Request::is('marks*')) class="active" @endif>
                                    <a href="{{ url('marks') }}">
                                        {{ _lang('Marks') }}
                                    </a>
                                </li>
                            @endif
                            {{-- <li @if (Request::is('marks/create')) class="active" @endif>
                            <a href="{{ url('marks/create') }}">
                                {{ _lang('Mark Register') }}
                            </a>
                        </li> --}}
                            {{-- <li @if (Request::is('marks/rank') || Request::is('marks/rank/*')) class="active" @endif>
                            <a href="{{ url('marks/rank') }}">
                                {{ _lang('Student Rank') }}
                            </a>
                        </li>
                        <li @if (Request::is('grades')) class="active" @endif>
                            <a href="{{ url('grades') }}">
                                {{ _lang('Grade Setup') }}
                            </a>
                        </li>
                        <li @if (Request::is('mark_distributions') || Request::is('mark_distributions/*')) class="active" @endif>
                            <a href="{{ url('mark_distributions') }}">
                                {{ _lang('Mark Distribution') }}
                            </a>
                        </li> --}}
                        </ul>
                    </li>
                @endif

                @if ($user->can('exam_mark.quiz_view') || $user->can('exam_mark.quiz_create'))
                    <li @if (Request::is('quiz') or Request::is('quiz/*')) class="active" @endif>
                        <a href="{{ route('quiz.index') }}">
                            {{ _lang('Quiz') }}
                        </a>
                    </li>
                @endif

                {{-- <p class="font-bold text-white bg-primary">Reports</p> --}}
                {{-- <li
                class="{{ Request::is('exam-settings') || Request::is('exam-settings/*') || Request::is('student') || Request::is('student/*') || Request::is('exams/attendance') || Request::is('reports/student_attendance_report') || Request::is('reports/student_attendance_report/view') || Request::is('student_attendance_report/status') || Request::is('leave') || Request::is('leave/*') ? 'active' : '' }}">
                <a href="#">{{ _lang('Blank Sheet') }}</a>
                <ul>
                    <li @if (Request::is('exam-startup') or Request::is('exam-startup/*')) class="active" @endif>
                        <a href="{{ url('exam-settings/startup') }}">
                            {{ _lang('Exam Startup') }}
                        </a>
                    </li>
                    <li @if (Request::is('exams/attendance')) class="active" @endif>
                        <a href="{{ url('exams/attendance') }}">
                            {{ _lang('Exam Attendance') }}
                        </a>
                    </li>
                </ul>
            </li> --}}

                {{-- <li class="{{ Request::is('merit-process') || Request::is('merit-process/*') ? 'active' : '' }}">
                <a href="#">{{ _lang('Details') }}</a>
                <ul>
                    <li @if (Request::is('merit-process') or Request::is('merit-process/*')) class="active" @endif>
                        <a href="{{ url('merit-process') }}">
                            {{ _lang('Merit Process') }}
                        </a>
                    </li>

                    <li @if (Request::is('merit-list') or Request::is('merit-list/*')) class="active" @endif>
                        <a href="{{ url('merit-list') }}">
                            {{ _lang('Merit List') }}
                        </a>
                    </li>
                    <li @if (Request::is('exams/attendance')) class="active" @endif>
                        <a href="{{ url('exams/attendance') }}">
                            {{ _lang('Exam Attendance') }}
                        </a>
                    </li>
                </ul>
            </li> --}}
            </ul>
        </li>
    @endif

    @if ($user->can('payroll.assign'))
        <li>
            <a href="#"><i class="fa fa-money"></i>{{ _lang('Payroll Management') }}</a>
            <ul>
                @if (
                    $user->can('payroll_configuration.salary_head_create') ||
                        $user->can('payroll_configuration.mapping_view') ||
                        $user->can('payroll.assign') ||
                        $user->can('payroll_configuration.salary_head_view'))
                    <li
                        class="{{ Request::is('salary-heads') || Request::is('payroll-mapping') || Request::is('payroll-assign')
                            ? 'active'
                            : '' }}">
                        <a href="#">{{ _lang('Settings') }}</a>
                        <ul>
                            @if ($user->can('payroll_configuration.salary_head_create') || $user->can('payroll_configuration.salary_head_view'))
                                <li @if (Request::is('salary-heads') or Request::is('salary-heads/*')) class="active" @endif>
                                    <a href="{{ route('salary-heads.index') }}">
                                        {{ _lang('Payroll Start Up') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('payroll_configuration.mapping_view'))
                                <li @if (Request::is('payroll-mapping') or Request::is('payroll-mapping/*')) class="active" @endif>
                                    <a href="{{ route('payroll.mapping.create') }}">
                                        {{ _lang('Payroll Mapping') }}
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('payroll.assign'))
                                <li @if (Request::is('payroll-assign') or Request::is('payroll-assign/*')) class="active" @endif>
                                    <a href="{{ route('payroll.assign.index') }}">
                                        {{ _lang('Payroll Assign') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if ($user->can('payroll.salary_slip'))
                    <li class="{{ Request::is('salary-create') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Create') }}</a>
                        <ul>
                            @if ($user->can('payroll.salary_slip'))
                                <li @if (Request::is('salary-create') or Request::is('salary-create/*')) class="active" @endif>
                                    <a href="{{ route('salary.create.index') }}">
                                        {{ _lang('Salary Slip') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (
                    $user->can('payroll.salary_payment') ||
                        $user->can('payroll.salary_advance_payment') ||
                        $user->can('payroll.salary_due_payment'))
                    <li
                        class="{{ Request::is('salary-payment-process') || Request::is('advance-salary-payment') || Request::is('due-salary-payment') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Payment') }}</a>
                        <ul>
                            @if ($user->can('payroll.salary_payment'))
                                <li @if (Request::is('salary-payment-process') or Request::is('salary-payment-process/*')) class="active" @endif>
                                    <a href="{{ route('salary.payment-process.index') }}">
                                        {{ _lang('Salary') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('payroll.salary_due_payment'))
                                <li @if (Request::is('due-salary-payment') or Request::is('due-salary-payment/*')) class="active" @endif>
                                    <a href="{{ route('due.salary.payment') }}">
                                        {{ _lang('Due') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('payroll.salary_advance_payment'))
                                <li @if (Request::is('advance-salary-payment') or Request::is('advance-salary-payment/*')) class="active" @endif>
                                    <a href="{{ route('advance.salary.payment') }}">
                                        {{ _lang('Advance') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if ($user->can('payroll.salary_return_payment'))
                    <li class="{{ Request::is('return-salary-payment') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Payment Return') }}</a>
                        <ul>
                            @if ($user->can('payroll.salary_return_payment'))
                                <li @if (Request::is('return-salary-payment') or Request::is('return-salary-payment/*')) class="active" @endif>
                                    <a href="{{ route('return.salary.payment') }}">
                                        {{ _lang('Advance Payment') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if ($user->can('payroll.salary_slip'))
                    <li class="{{ Request::is('salary-create') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Delete') }}</a>
                        <ul>
                            @if ($user->can('payroll.salary_return_payment'))
                                <li @if (Request::is('return-salary-payment') or Request::is('return-salary-payment/*')) class="active" @endif>
                                    <a href="{{ route('return.salary.payment') }}">
                                        {{ _lang('Salary Slip') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <li class="reports-nav-item">
                    {{ __('Reports') }}
                </li>

                <li
                    class="{{ Request::is('payroll/*') || Request::is('salary-statement-report') || Request::is('payment-info-report') ? 'active' : '' }}">
                    <a href="#">{{ _lang('Details') }}</a>
                    <ul>
                        <li @if (Request::is('salary-statement-report')) class="active" @endif>
                            <a href="{{ route('salary-statement-report') }}">
                                {{ _lang('Salary Statement') }}
                            </a>
                        </li>

                        <li @if (Request::is('payment-info-report')) class="active" @endif>
                            <a href="{{ route('payment-info-report') }}">
                                {{ _lang('Payment Info') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    @endif

    @if ($user->can('fees_management.quick_collection'))
        <li>
            <a href="#"><i class="fa fa-university"></i>{{ _lang('Fees Management') }}</a>
            <ul>
                @if (
                    $user->can('fees_management_configruation.startup') ||
                        $user->can('fees_management_configruation.mapping') ||
                        $user->can('fees_management_configruation.amount_config') ||
                        $user->can('fees_management_configruation.date_config') ||
                        $user->can('fees_management_configruation.waiver_config') ||
                        $user->can('fees_management_configruation.account_setting'))
                    <li
                        class="{{ Request::is('fee-head') ||
                        Request::is('fees-mapping') ||
                        Request::is('amount-config') ||
                        Request::is('date-config') ||
                        Request::is('waiver-config') ||
                        Request::is('bank-accounts') ||
                        Request::is('waivers')
                            ? 'active'
                            : '' }}">
                        <a href="#">{{ _lang('Settings') }}</a>
                        <ul>
                            @if ($user->can('fees_management_configruation.startup'))
                                <li @if (Request::is('fee-head')) class="active" @endif>
                                    <a href="{{ route('fee-head.index') }}">
                                        {{ __('Fees StartUp') }}
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('fees_management_configruation.mapping'))
                                <li @if (Request::is('fees-mapping')) class="active" @endif>
                                    <a href="{{ route('fees-mapping.index') }}">
                                        {{ __('Fees Mapping') }}
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('fees_management_configruation.amount_config'))
                                <li @if (Request::is('amount-config')) class="active" @endif>
                                    <a href="{{ route('amount-config.index') }}">
                                        {{ __('Amount Config') }}
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('fees_management_configruation.date_config'))
                                <li @if (Request::is('date-config')) class="active" @endif>
                                    <a href="{{ route('date-config.index') }}">
                                        {{ __('Date Config') }}
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('fees_management_configruation.waiver_config'))
                                <li @if (Request::is('waiver-config')) class="active" @endif>
                                    <a href="{{ route('waiver-config.index') }}">
                                        {{ __('Waiver Config') }}
                                    </a>
                                </li>

                                <li @if (Request::is('waivers')) class="active" @endif>
                                    <a href="{{ route('waivers.index') }}">
                                        {{ __('Waiver Setting') }}
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('fees_management_configruation.account_setting'))
                                <li @if (Request::is('student-fee-remove')) class="active" @endif>
                                    <a href="#"> <!-- TODO: add route link here -->
                                        {{ __('Fee Remove') }}
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('fees_management_configruation.account_setting'))
                                <li @if (Request::is('bank-accounts')) class="active" @endif>
                                    <a href="{{ route('bank-accounts.index') }}">
                                        {{ __('Account Setting') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if ($user->can('fees_management.payslip_single') || $user->can('fees_management.all_fees'))
                    <li
                        class="{{ Request::is('specific-fee') || Request::is('payslip/create') || Request::is('all-fees') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Payslip Create') }}</a>
                        <ul>
                            @if ($user->can('fees_management.payslip_single'))
                                <li @if (Request::is('payslip/create')) class="active" @endif>
                                    <a href="{{ route('payslip.create') }}">
                                        {{ __('Specific Fee') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('fees_management.all_fees'))
                                <li @if (Request::is('all-fees')) class="active" @endif>
                                    <a href="{{ route('all-fees.index') }}">
                                        {{ __('All Fees') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if ($user->can('fees_management.payslip_collection') || $user->can('fees_management.quick_collection'))
                    <li
                        class="{{ Request::is('payslip/create/collection') ||
                        Request::is('quick-collection') ||
                        Request::is('quick-collection/*')
                            ? 'active'
                            : '' }}">
                        <a href="#">{{ _lang('Fee Collect') }}</a>
                        <ul>
                            @if ($user->can('fees_management.payslip_collection'))
                                <li @if (Request::is('payslip/create/collection')) class="active" @endif>
                                    <a href="{{ route('payslip.create.collection') }}">
                                        {{ __('Payslip Collection') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('fees_management.quick_collection'))
                                <li @if (Request::is('quick-collection') || Request::is('quick-collection/*')) class="active" @endif>
                                    <a href="{{ route('quick-collection.index') }}">
                                        {{ __('Quick Collection') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    @if ($user->can('fees_management.quick_collection'))
                        <li @if (Request::is('payslip/delete/list') || Request::is('payslip/delete/list/*') || Request::is('payslip/delete/store/*')) class="active" @endif>
                            <a href="{{ route('payslip.delete.list') }}">
                                {{ __('Delete') }}
                            </a>
                        </li>
                    @endif

                    <li class="reports-nav-item">
                        {{ __('Reports') }}
                    </li>

                    <li
                        class="{{ Request::is('payment-ratio-info') || Request::is('payment-ratio-info/*') | Request::is('head-wise-payment') || Request::is('head-wise-payment/*') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Summary') }}</a>
                        <ul>
                            <li @if (Request::is('payment-ratio-info') || Request::is('payment-ratio-info/*')) class="active" @endif>
                                <a href="{{ route('payment-ratio-info') }}">
                                    {{ __('Payment Ratio') }}
                                </a>
                            </li>
                            <li @if (Request::is('head-wise-payment') || Request::is('head-wise-payment/*')) class="active" @endif>
                                <a href="{{ route('head-wise-payment') }}">
                                    {{ __('Head Wise Payment') }}
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="{{ Request::is('class-wise-payment-summary') ||
                        Request::is('fee-head-info-summary') ||
                        Request::is('fee-head-class-collection') ||
                        Request::is('monthly-paid-info') ||
                        Request::is('payment-fee-info') ||
                        Request::is('unpaid-info') ||
                        Request::is('unpaid-summery') ||
                        Request::is('head-wise-due') ||
                        Request::is('paid-invoice')
                            ? 'active'
                            : '' }}">
                        <a href="#">{{ _lang('Details') }}</a>
                        <ul>
                            @if ($user->can('fees_management.payslip_collection'))
                                <li @if (Request::is('payment-fee-info')) class="active" @endif>
                                    <a href="{{ route('payment-fee-info') }}">
                                        {{ __('Payment Info') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('fees_management.payslip_collection'))
                                <li @if (Request::is('monthly-paid-info') || Request::is('monthly-paid-info/*')) class="active" @endif>
                                    <a href="{{ route('monthly-paid-info') }}">
                                        {{ __('Paid Info') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('fees_management.payslip_collection'))
                                <li @if (Request::is('unpaid-info') || Request::is('unpaid-info/*')) class="active" @endif>
                                    <a href="{{ route('unpaid-info') }}">
                                        {{ __('Unpaid Info') }}
                                    </a>
                                </li>
                            @endif

                            {{-- @if ($user->can('fees_management.payslip_collection'))
                                <li @if (Request::is('head-wise-payment-details') || Request::is('head-wise-payment-details/*')) class="active" @endif>
                                    <a href="{{ route('head-wise-payment-details') }}">
                                        {{ __('Head Wise Payment Details') }}
                                    </a>
                                </li>
                            @endif --}}
                            @if ($user->can('fees_management.payslip_collection'))
                                <li @if (Request::is('head-wise-due') || Request::is('head-wise-due/*')) class="active" @endif>
                                    <a href="{{ route('head-wise-due') }}">
                                        {{ __('Head Wise Due') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('fees_management.payslip_collection'))
                                <li @if (Request::is('paid-invoice') || Request::is('paid-invoice/*')) class="active" @endif>
                                    <a href="{{ route('paid-invoice') }}">
                                        {{ __('Paid Fee') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('fees_management.payslip_collection'))
                                <li @if (Request::is('class-wise-payment-summary')) class="active" @endif>
                                    <a href="{{ route('class-wise-payment-summary') }}">
                                        {{ __('Class Payment Summary') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('fees_management.quick_collection'))
                                <li @if (Request::is('fee-head-info-summary') || Request::is('fee-head-info-summary/*')) class="active" @endif>
                                    <a href="{{ route('fee-head-info-summary') }}">
                                        {{ __('Fee Head Summary Info') }}
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('fees_management.quick_collection'))
                                <li @if (Request::is('fee-head-class-collection') || Request::is('fee-head-class-collection/*')) class="active" @endif>
                                    <a href="{{ route('fee-head-class-collection') }}">
                                        {{ __('Fee Head Class Collection') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('fees_management.payslip_collection'))
                                <li @if (Request::is('unpaid-summery') || Request::is('unpaid-summery/*')) class="active" @endif>
                                    <a href="{{ route('unpaid-summery') }}">
                                        {{ __('Unpaid Summery') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if ($user->can('accounting.payment_reciept'))
        <li>
            <a href="#">
                <i class="fa fa-money"></i>{{ _lang('Accounts Management') }}
            </a>
            <ul>
                <li
                    class="{{ Request::is('accounting-categories') ||
                    Request::is('accounting-categories/*') ||
                    Request::is('accounting-groups') ||
                    Request::is('accounting-groups/*') ||
                    Request::is('accounting-ledgers') ||
                    Request::is('accounting-ledgers/*') ||
                    Request::is('accounting-funds') ||
                    Request::is('accounting-funds/*')
                        ? 'active'
                        : '' }}">
                    <a href="#">{{ _lang('Settings') }}</a>
                    <ul>
                        @if ($user->can('accounting.ledgers'))
                            <li @if (Request::is('accounting-ledgers')) class="active" @endif>
                                <a href="{{ url('accounting-ledgers') }}">
                                    {{ __('Create Ledger') }}
                                </a>
                            </li>
                        @endif
                        @if ($user->can('accounting.funds'))
                            <li @if (Request::is('accounting-funds')) class="active" @endif>
                                <a href="{{ url('accounting-funds') }}">
                                    {{ __('Create Fund') }}
                                </a>
                            </li>
                        @endif
                        {{-- @if ($user->can('accounting.categories'))
                            <li @if (Request::is('accounting-categories')) class="active" @endif>
                                <a href="{{ url('accounting-categories') }}">
                                    {{ _lang('Create Category') }}
                                </a>
                            </li>
                        @endif
                        @if ($user->can('accounting.groups'))
                            <li @if (Request::is('accounting-groups')) class="active" @endif>
                                <a href="{{ url('accounting-groups') }}">
                                    {{ __('Create Group') }}
                                </a>
                            </li>
                        @endif --}}
                    </ul>
                </li>

                <li
                    class="{{ Request::is('account-transaction-payment') ||
                    Request::is('account-transaction-payment/*') ||
                    Request::is('account-contra-transfers') ||
                    Request::is('account-contra-transfers/*') ||
                    Request::is('journal-transactions') ||
                    Request::is('journal-transactions/*') ||
                    Request::is('account-fund-transfers') ||
                    Request::is('account-fund-transfers/*')
                        ? 'active'
                        : '' }}">
                    <a href="#">{{ _lang('Voucher Entry') }}</a>
                    <ul>
                        @if ($user->can('accounting.payment_reciept'))
                            <li @if (url()->full() === route('account-transaction-payment.index')) class="active" @endif>
                                <a href="{{ url('account-transaction-payment') }}">
                                    {{ __('Payment') }}
                                </a>
                            </li>
                            <li @if (url()->full() === route('account-transaction-payment.index') . '?type=receipt') class="active" @endif>
                                <a href="{{ url('account-transaction-payment') }}?type=receipt">
                                    {{ __('Receipt') }}
                                </a>
                            </li>
                        @endif

                        @if ($user->can('accounting.contra'))
                            <li @if (Request::is('account-contra-transfers')) class="active" @endif>
                                <a href="{{ url('account-contra-transfers') }}">
                                    {{ __('Contra') }}
                                </a>
                            </li>
                        @endif

                        @if ($user->can('accounting.journal'))
                            <li @if (Request::is('journal-transactions')) class="active" @endif>
                                <a href="{{ url('journal-transactions') }}">
                                    {{ __('Journal') }}
                                </a>
                            </li>
                        @endif

                        @if ($user->can('accounting.fund_transfer'))
                            <li @if (Request::is('account-fund-transfers')) class="active" @endif>
                                <a href="{{ url('account-fund-transfers') }}">
                                    {{ __('Fund Transfer') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                @if ($user->can('accounting.payment_reciept'))
                    <li class="{{ Request::is('voucher-delete') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Delete') }}</a>
                        <ul>
                            <li @if (Request::is('voucher-delete')) class="active" @endif>
                                <a href="{{ url('voucher-delete') }}">
                                    {{ __('Voucher') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (
                    $user->can('accounting_report.core_report_balance_sheet') ||
                        $user->can('accounting_report.core_report_trial_balance') ||
                        $user->can('accounting_report.core_report_income_statement') ||
                        $user->can('accounting_report.core_report_cash_summary') ||
                        $user->can('accounting_report.core_report_cash_flow_statment') ||
                        $user->can('accounting_report.core_report_book_of_account') ||
                        $user->can('accounting_report.transaction_report_voucher_wise') ||
                        $user->can('accounting_report.transaction_report_user_wise') ||
                        $user->can('accounting_report.transaction_report_ledger_wise') ||
                        $user->can('accounting_report.transaction_report_fund_wise') ||
                        $user->can('accounting_report.transaction_report_fund_trans_summary') ||
                        $user->can('accounting_report.transaction_report_fund_trans_montly'))
                    <li class="reports-nav-item">
                        {{ __('Reports') }}
                    </li>
                @endif

                @if (
                    $user->can('accounting_report.core_report_balance_sheet') ||
                        $user->can('accounting_report.core_report_trial_balance') ||
                        $user->can('accounting_report.core_report_income_statement') ||
                        $user->can('accounting_report.core_report_cash_summary') ||
                        $user->can('accounting_report.core_report_cash_flow_statment') ||
                        $user->can('accounting_report.core_report_book_of_account'))

                    <li
                        class="{{ Request::is('balance-sheet') || Request::is('trial-balance') || Request::is('income-statement') || Request::is('cash-summary') || Request::is('cash-flow-statement') || Request::is('ledger-wise') || Request::is('cash-book-account') || Request::is('fund-wise') || Request::is('fund-summary') || Request::is('fund-summary-monthly') ? 'active' : '' }}">

                        <a href="#">{{ _lang('Core Reports') }}</a>
                        <ul>
                            @if ($user->can('accounting_report.core_report_balance_sheet'))
                                <li @if (Request::is('balance-sheet')) class="active" @endif>
                                    <a href="{{ url('balance-sheet') }}">
                                        {{ _lang('Balance Sheet') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('accounting_report.core_report_trial_balance'))
                                <li @if (Request::is('trial-balance')) class="active" @endif>
                                    <a href="{{ url('trial-balance') }}">
                                        {{ __('Trial Balance') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('accounting_report.core_report_income_statement'))
                                <li @if (Request::is('income-statement/*')) class="active" @endif>
                                    <a href="{{ route('income-statement') }}">
                                        {{ __('Income Statement') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('accounting_report.core_report_cash_summary'))
                                <li @if (Request::is('cash-summary')) class="active" @endif>
                                    <a href="{{ url('cash-summary') }}">
                                        {{ __('Cash Summery') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('accounting_report.core_report_cash_flow_statment'))
                                <li @if (Request::is('cash-flow-statement')) class="active" @endif>
                                    <a href="{{ url('cash-flow-statement') }}">
                                        {{ __('Cash Flow Statement') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('accounting_report.core_report_book_of_account'))
                                <li @if (Request::is('cash-book-account')) class="active" @endif>
                                    <a href="{{ url('cash-book-account') }}">
                                        {{ __('Book of Account') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (
                    $user->can('accounting_report.transaction_report_voucher_wise') ||
                        $user->can('accounting_report.transaction_report_user_wise') ||
                        $user->can('accounting_report.transaction_report_ledger_wise') ||
                        $user->can('accounting_report.transaction_report_fund_wise') ||
                        $user->can('accounting_report.transaction_report_fund_trans_summary') ||
                        $user->can('accounting_report.transaction_report_fund_trans_montly'))
                    <li
                        class="{{ Request::is('voucher-wise') || Request::is('user-wise') || Request::is('ledger-wise') || Request::is('fund-wise') || Request::is('fund-summary') || Request::is('fund-summary-monthly') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Transaction Reports') }}</a>
                        <ul>
                            @if ($user->can('accounting_report.transaction_report_voucher_wise'))
                                <li @if (Request::is('voucher-wise')) class="active" @endif>
                                    <a href="{{ url('voucher-wise') }}">
                                        {{ __('Voucher Wise') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('accounting_report.transaction_report_user_wise'))
                                <li @if (Request::is('user-wise')) class="active" @endif>
                                    <a href="{{ url('user-wise') }}">
                                        {{ __('User Wise') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('accounting_report.transaction_report_ledger_wise'))
                                <li @if (Request::is('ledger-wise')) class="active" @endif>
                                    <a href="{{ url('ledger-wise') }}">
                                        {{ __('Ledger Wise') }}
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('accounting_report.transaction_report_fund_wise'))
                                <li @if (Request::is('fund-wise')) class="active" @endif>
                                    <a href="{{ url('fund-wise') }}">
                                        {{ __('Fund Wise') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('accounting_report.transaction_report_fund_trans_summary'))
                                <li @if (Request::is('fund-summary')) class="active" @endif>
                                    <a href="{{ url('fund-summary') }}">
                                        {{ __('Fund Tran. Summary') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('accounting_report.transaction_report_fund_trans_montly'))
                                <li @if (Request::is('fund-summary-monthly')) class="active" @endif>
                                    <a href="{{ url('fund-summary-monthly') }}">
                                        {{ __('Fund Trn. Monthly') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    {{-- <li >
        <a href="#"><i class="fa fa-credit-card"></i>{{ _lang('Inventory') }}</a>
        <ul>
            <li @if (Request::is('item-category') or Request::is('item-category/*')) class="active" @endif>
                <a href="{{ route('item-category.index') }}">
                    {{ _lang('Category') }}
                </a>
            </li>
            <li @if (Request::is('item') or Request::is('item/*')) class="active" @endif>
                <a href="{{ route('item.index') }}">
                    {{ _lang('Items') }}
                </a>
            </li>
            <li @if (Request::is('supplier') or Request::is('supplier/*')) class="active" @endif>
                <a href="{{ route('supplier.index') }}">
                    {{ _lang('Suppliers') }}
                </a>
            </li>
            <li @if (Request::is('purchases') or Request::is('purchases/*') || Request::is('purchases-return')) class="active" @endif>
                <a href="{{ route('purchases.index') }}">
                    {{ _lang('Purchase') }}
                </a>
            </li>
            <li @if (Request::is('sales') or Request::is('sales/*') || Request::is('sales-return')) class="active" @endif>
                <a href="{{ route('sales.index') }}">
                    {{ _lang('Sales') }}
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- <li>
        <a href="#"><i class="fa fa-car"></i>{{ _lang('Transport') }}</a>
        <ul>
            <li @if (Request::is('transportvehicles') or Request::is('transportvehicles/*')) class="active" @endif>
                <a href="{{ url('transportvehicles') }}">
                    {{ _lang('Vehicles') }}
                </a>
            </li>
            <li @if (Request::is('transports') or Request::is('transports/*')) class="active" @endif>
                <a href="{{ url('transports') }}">
                    {{ _lang('Transports') }}
                </a>
            </li>
            <li @if (Request::is('transportmembers') or Request::is('transportmembers/*')) class="active" @endif>
                <a href="{{ url('transportmembers') }}">
                    {{ _lang('Members') }}
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- <li>
        <a href="#"><i class="fa fa-building-o"></i>{{ _lang('Hostel') }}</a>
        <ul>
            <li @if (Request::is('hostels') or Request::is('hostels/*')) class="active" @endif>
                <a href="{{ url('hostels') }}">
                    {{ _lang('Hostel') }}
                </a>
            </li>
            <li @if (Request::is('hostelcategories') or Request::is('hostelcategories/*')) class="active" @endif>
                <a href="{{ url('hostelcategories') }}">
                    {{ _lang('Categories') }}
                </a>
            </li>
            <li @if (Request::is('hostelmembers') or Request::is('hostelmembers/*')) class="active" @endif>
                <a href="{{ url('hostelmembers') }}">
                    {{ _lang('Members') }}
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- <li>
        <a href="#"><i class="fa fa-newspaper-o"></i>{{ _lang('Examinations') }}</a>
        <ul>
            <li @if (Request::is('exams')) class="active" @endif>
                <a href="{{ url('exams') }}">
                    {{ _lang('Exam List') }}
                </a>
            </li>

            <li
                class="{{ Request::is('exams/all-exams') || Request::is('exams/schedule/create') || Request::is('exams/all-exams-id/*') ? 'active' : '' }}">
                <a href="#">{{ _lang('Exam Mark Configurations') }}</a>
                <ul>
                    <li @if (Request::is('exams/schedule/create') || Request::is('exams/all-exams-id/*')) class="active" @endif>
                        <a href="{{ url('exams/schedule/create') }}">
                            {{ _lang('Exam Mark Configure') }}
                        </a>
                    </li>
                    <li @if (Request::is('exams/all-exams')) class="active" @endif>
                        <a href="{{ url('exams/all-exams') }}">
                            {{ _lang('All Configurations') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li @if (Request::is('exams/schedule')) class="active" @endif>
                <a href="{{ url('exams/schedule') }}">
                    {{ _lang('Exam Routine') }}
                </a>
            </li>
            <li @if (Request::is('quiz') or Request::is('quiz/*')) class="active" @endif>
                <a href="{{ route('quiz.index') }}">
                    {{ _lang('Quiz') }}
                </a>
            </li>
            <li @if (Request::is('reports/exam_report') || Request::is('reports/exam_report/view')) class="active" @endif>
                <a href="{{ url('reports/exam_report') }}">
                    {{ _lang('Exam Report') }}
                </a>
            </li>
        </ul>
    </li> --}}

    @if ($user->can('academic.student_categories'))
        <li>
            <a href="#"><i class="fa fa-building-o"></i>{{ _lang('Academic') }}</a>
            <ul>
                @if ($user->can('academic.student_categories'))
                    <li @if (Request::is('student-categories') or Request::is('student-categories/*')) class="active" @endif>
                        <a href="{{ route('student-categories.index') }}">
                            {{ _lang('Student Categories') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('academic.periods'))
                    <li @if (Request::is('periods') or Request::is('periods/*')) class="active" @endif>
                        <a href="{{ route('periods.index') }}">
                            {{ _lang('Periods') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('academic.departments'))
                    <li @if (Request::is('departments') or Request::is('departments/*')) class="active" @endif>
                        <a href="{{ route('departments.index') }}">
                            {{ _lang('Departments') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('academic.classes'))
                    <li @if (Request::is('class') or Request::is('class/*')) class="active" @endif>
                        <a href="{{ route('class.index') }}">
                            {{ _lang('Class') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('academic.shifts'))
                    <li @if (Request::is('attendance-time-config') || Request::is('attendance-time-config/*')) class="active" @endif>
                        <a href="{{ route('attendance-time-config.index') }}">
                            {{ _lang('Shift') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('academic.sections'))
                    <li @if (Request::is('sections') or Request::is('sections/*')) class="active" @endif>
                        <a href="{{ route('sections.index') }}">
                            {{ _lang('Sections') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('academic.subjects'))
                    <li @if (Request::is('subjects') or Request::is('subjects/*')) class="active" @endif>
                        <a href="{{ route('subjects.index') }}">
                            {{ _lang('Subjects') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('academic.syllabuses'))
                    <li @if (Request::is('syllabus') or Request::is('syllabus/*')) class="active" @endif>
                        <a href="{{ route('syllabus.index') }}">
                            {{ _lang('Syllabus') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('academic.assignments'))
                    <li @if (Request::is('assignments') or Request::is('assignments/*')) class="active" @endif>
                        <a href="{{ route('assignments.index') }}">
                            {{ _lang('Assignments') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('academic.clubs'))
                    <li class="{{ Request::is('clubs') || Request::is('clubs/*') ? 'active' : '' }}">
                        <a href="{{ route('clubs.index') }}">
                            {{ _lang('Clubs') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('academic.student_result_reports'))
                    <li
                        class="{{ Request::is('student-result-reports') || Request::is('student-result-reports/*') ? 'active' : '' }}">
                        <a href="{{ route('student-result-reports.index') }}">
                            {{ _lang('Student Result Reports') }}
                        </a>
                    </li>
                @endif

                @if (
                    $user->can('academic.routine_management') ||
                        $user->can('academic.routine_management_class_routine') ||
                        $user->can('academic.routine_management_report'))
                    <li
                        class="{{ Request::is('class_routines') || Request::is('class_routines/*') || Request::is('reports/student_id_card') || Request::is('reports/student_id_card/view') || Request::is('reports/class_routine/view') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Routine Management') }}</a>
                        <ul>
                            @if ($user->can('academic.routine_management'))
                                <li @if (Request::is('class_routines') || Request::is('class_routines/*')) class="active" @endif>
                                    <a href="{{ url('class_routines') }}">
                                        {{ _lang('Class Routine') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('academic.routine_management_class_routine') || $user->can('academic.routine_management_report'))
                                <li>
                                    <a href="#">{{ _lang('Report') }}</a>
                                    <ul>
                                        @if ($user->can('academic.routine_management_class_routine'))
                                            <li @if (Request::is('reports/student_id_card') || Request::is('reports/student_id_card/view')) class="active" @endif>
                                                <a href="{{ url('reports/student_id_card') }}">
                                                    {{ _lang('Student ID Card') }}
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('academic.routine_management_report'))
                                            <li @if (Request::is('reports/class_routine') || Request::is('reports/class_routine/view')) class="active" @endif>
                                                <a href="{{ url('reports/class_routine') }}">
                                                    {{ _lang('Class Routine') }}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if ($user->can('library_books.create'))
        <li>
            <a href="#"><i class="fa fa-book"></i>{{ _lang('Library') }}</a>
            <ul>
                @if ($user->can('library_books.create') || $user->can('library_books.view'))
                    <li @if (Request::is('books') or Request::is('books/*') || Request::is('books-bulk-upload')) class="active" @endif>
                        <a href="{{ url('books') }}">
                            {{ _lang('Books') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('library_books.category.view') || $user->can('library_books.category.create'))
                    <li @if (Request::is('book-categories') or Request::is('book-categories/*')) class="active" @endif>
                        <a href="{{ url('book-categories') }}">
                            {{ _lang('Book Categories') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('library_books.view'))
                    <li @if (Request::is('books-qr-code') or Request::is('books-qr-code/*')) class="active" @endif>
                        <a href="{{ route('books.qr-code') }}">
                            {{ _lang('Books QR Code') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('library_books.create') || $user->can('library_books.view'))
                    <li @if (Request::is('librarymembers') or Request::is('librarymembers/*')) class="active" @endif>
                        <a href="{{ url('librarymembers') }}">
                            {{ _lang('Members / Library ID') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('library_book_issue.view') || $user->can('library_book_issue.edit'))
                    <li @if (Request::is('bookissues') or
                            Request::is('bookissues/list') or
                            Request::is('bookissues/list/*') or
                            Request::is('bookissues/*/edit')) class="active" @endif>
                        <a href="{{ url('bookissues') }}">
                            {{ _lang('Book Issue Search') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('library_book_issue.create'))
                    <li @if (Request::is('bookissues/create')) class="active" @endif>
                        <a href="{{ url('bookissues/create') }}">
                            {{ _lang('Add Book Issue') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('library_book_issue.view'))
                    <li class="{{ Request::is('bookissues/filter/all') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Reports') }}</a>
                        <ul>
                            @if ($user->can('library_book_issue.view'))
                                <li @if (Request::is('bookissues/filter/all')) class="active" @endif>
                                    <a href="{{ route('bookissues.filter') }}">
                                        {{ _lang('Book Issues Report') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if ($user->can('layouts_cetificates.testimonial'))
        <li>
            <a href="#"><i class="fa fa-newspaper-o"></i>{{ _lang('Layout & Certificates') }}</a>
            <ul>
                @if ($user->can('layouts_cetificates.testimonial'))
                    <li @if (Request::is('testimonial/create')) class="active" @endif>
                        <a href="{{ route('testimonial.create') }}">
                            {{ _lang('Testimonial') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('layouts_cetificates.transfer'))
                    <li class="{{ Request::is('tc') || Request::is('tc/*') ? 'active' : '' }}">
                        <a href="{{ route('tc.index') }}">
                            {{ _lang('Transfer Certificate') }}
                        </a>
                    </li>
                @endif
                <li
                    class="{{ Request::is('student-search-for-card-print') || Request::is('student-search-for-card-print*') ? 'active' : '' }}">
                    <a href="{{ route('student-search-for-card-print') }}">
                        {{ _lang('ID Card') }}
                    </a>
                </li>
                <li class="{{ Request::is('hsc-recommendation/create') ? 'active' : '' }}">
                    <a href="{{ route('hsc-recommendation.create') }}">
                        {{ _lang('Hsc Recommendation Latter') }}
                    </a>
                </li>
                <li class="{{ Request::is('general-certificate/create') ? 'active' : '' }}">
                    <a href="{{ route('general-certificate.create') }}">
                        {{ _lang('General') }}
                    </a>
                </li>
            </ul>
        </li>
    @endif

    @if ($user->can('configurations.system_setting'))
        <li>
            <a href="#"><i class="fa fa-cogs"></i>{{ _lang('Configurations') }}</a>
            <ul>
                @if ($user->can('configurations.system_setting'))
                    <li @if (Request::is('administration/general_settings')) class="active" @endif>
                        <a href="{{ url('administration/general_settings') }}">
                            {{ _lang('System Settings') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('configurations.academic_session'))
                    <li @if (Request::is('academic-years') or Request::is('academic-years/*')) class="active" @endif>
                        <a href="{{ route('academic-years.index') }}">
                            {{ __('Academic Session') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('configurations.student_group'))
                    <li @if (Request::is('student_groups') or Request::is('student_groups/*')) class="active" @endif>
                        <a href="{{ route('student_groups.index') }}">
                            {{ _lang('Student Group') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('configurations.system_setting'))
                    <li @if (Request::is('shift') or Request::is('shift/*')) class="active" @endif>
                        <a href="{{ route('shift.index') }}">
                            {{ _lang('Shift') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('configurations.picklist'))
                    <li @if (Request::is('picklists') || Request::is('picklists/*')) class="active" @endif>
                        <a href="{{ route('picklists.index') }}">
                            {{ _lang('Picklist Editor') }}
                        </a>
                    </li>
                @endif
                @if (
                    $user->can('configurations.users.view') ||
                        $user->can('configurations.users.create') ||
                        $user->can('configurations.roles.view') ||
                        $user->can('configurations.roles.create'))
                    <li
                        class="{{ Request::is('permission_roles') || Request::is('permission_roles/*') || Request::is('permission/control') || Request::is('permission/control/*') || Request::is('users') || Request::is('users/*') ? 'active' : '' }}">
                        <a href="#">{{ _lang('Users & Role Permissions') }}</a>
                        <ul>
                            @if ($user->can('configurations.users.view') || $user->can('configurations.users.create'))
                                <li @if (Request::is('users') or Request::is('users/*')) class="active" @endif>
                                    <a href="{{ route('users.index') }}">
                                        {{ _lang('Users') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('configurations.roles.view') || $user->can('configurations.roles.create'))
                                <li @if (Request::is('permission_roles') or Request::is('permission_roles/*')) class="active" @endif>
                                    <a href="{{ route('permission_roles.index') }}">
                                        {{ _lang('Roles') }}
                                    </a>
                                </li>
                            @endif
                            {{-- <li @if (Request::is('permission/control') || Request::is('permission/control/*')) class="active" @endif>
                                <a href="{{ url('permission/control') }}">
                                    {{ _lang('Permission Control') }}
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                @endif
                @if ($user->can('configurations.database_backup'))
                    <li @if (Request::is('administration/backup_database')) class="active" @endif>
                        <a href="{{ url('administration/backup_database') }}">
                            {{ _lang('Database Backup') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('configurations.languages'))
                    <li @if (Request::is('languages') || Request::is('languages/*')) class="active" @endif>
                        <a href="{{ route('languages.index') }}">
                            {{ _lang('Languages') }}
                        </a>
                    </li>
                @endif

                <li class="{{ Request::is('subject/config') ? 'active' : '' }}">
                    <a href="#">{{ _lang('Subject Setting') }}</a>
                    <ul>
                        <li @if (Request::is('subject/config')) class="active" @endif>
                            <a href="{{ url('subject/config') }}">
                                {{ _lang('Subject Config') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    @endif

    @if ($user->can('sms_notifications.send_sms_person_wise'))
        <li>
            <a href="#">
                <i class="fa fa-bar-chart"></i>{{ _lang('SMS & Notification') }}
            </a>
            <ul>
                {{-- <li @if (Request::is('sms/logs')) class="active" @endif>
                    <a href="{{ url('sms/logs') }}">
                        {{ _lang('SMS Log') }}
                    </a>
                </li> --}}
                @if ($user->can('sms_notifications.templates.view') || $user->can('sms_notifications.templates.create'))
                    <li @if (Request::is('sms-template') || Request::is('sms-template/*')) class="active" @endif>
                        <a href="{{ route('sms-template.index') }}">
                            {{ _lang('SMS Template') }}
                        </a>
                    </li>
                @endif
                @if (
                    $user->can('sms_notifications.phonebook.view') ||
                        $user->can('sms_notifications.phonebook.create') ||
                        $user->can('sms_notifications.phonebook_category.view') ||
                        $user->can('sms_notifications.phonebook_category.create'))
                    <li
                        class="{{ Request::is('phone-book') || Request::is('phone-book/*') || Request::is('phone-book-category') || Request::is('phone-book-category/*') ? 'active' : '' }}">
                        <a href="{{ route('phone-book-category.index') }}">
                            {{ _lang('Phone Book') }}
                        </a>
                        <ul>
                            @if ($user->can('sms_notifications.phonebook.view') || $user->can('sms_notifications.phonebook.create'))
                                <li class="{{ Request::is('phone-book') ? 'active' : '' }}">
                                    <a href="{{ route('phone-book.index') }}">
                                        {{ _lang('List') }}
                                    </a>
                                </li>
                            @endif
                            @if (
                                $user->can('sms_notifications.phonebook_category.view') ||
                                    $user->can('sms_notifications.phonebook_category.create'))
                                <li
                                    class="{{ Request::is('phone-book-category') || Request::is('phone-book-category/*') ? 'active' : '' }}">
                                    <a href="{{ route('phone-book-category.index') }}">
                                        {{ _lang('Category') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (
                    $user->can('sms_notifications.send_sms_person_wise') ||
                        $user->can('sms_notifications.send_sms_institute_wise') ||
                        $user->can('sms_notifications.send_sms_notification_wise'))
                    <li class="{{ Request::is('sms/compose') ? 'active' : '' }}">
                        <a href="{{ url('sms/compose') }}">
                            {{ _lang('Send SMS') }}
                        </a>
                        <ul>
                            @if ($user->can('sms_notifications.send_sms_person_wise'))
                                <li class="{{ Request::is('sms/compose') ? 'active' : '' }}">
                                    <a href="{{ url('sms/compose') }}">
                                        {{ _lang('Person Wise') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('sms_notifications.send_sms_institute_wise'))
                                <li class="{{ Request::is('sms/institute') ? 'active' : '' }}">
                                    <a href="#">
                                        {{ _lang('Institute Wise') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('sms_notifications.send_sms_notification_wise'))
                                <li class="{{ Request::is('sms/notification') ? 'active' : '' }}">
                                    <a href="#">
                                        {{ _lang('Notification Wise') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if ($user->can('sms_notifications.purchase_sms_view') || $user->can('sms_notifications.purchase_sms_create'))
                    <li class="{{ Request::is('sms-purchase') || Request::is('sms-purchase/*') ? 'active' : '' }}">
                        <a href="{{ route('sms-purchase.index') }}">
                            {{ _lang('Purchase SMS') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('sms_notifications.sms_summary') || $user->can('sms_notifications.sms_send_summary'))
                    <li
                        class="{{ Request::is('sms-summary-report') || Request::is('sms-send-report') ? 'active' : '' }}">
                        <a href="#">
                            {{ _lang('Report') }}
                        </a>
                        <ul>
                            @if ($user->can('sms_notifications.sms_summary'))
                                <li @if (Request::is('sms-summary-report') || Request::is('sms-summary-report')) class="active" @endif>
                                    <a href="{{ route('sms.summaryReport') }}">
                                        {{ _lang('SMS Summary') }}
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('sms_notifications.sms_send_summary'))
                                <li @if (Request::is('sms-send-report') || Request::is('sms-send-report')) class="active" @endif>
                                    <a href="{{ route('sms.sendReport') }}">
                                        {{ _lang('SMS Send Report') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if ($user->can('website_cms.posts.view'))
        <li>
            <a href="#"><i class="fa fa-newspaper-o"></i>{{ _lang('Website CMS') }}</a>
            <ul>
                <li>
                    <a href="#">{{ _lang('Notice') }}</a>
                    <ul>
                        <li @if (Request::is('notices')) class="active" @endif>
                            <a href="{{ route('notices.index') }}">
                                {{ _lang('All Notice') }}
                            </a>
                        </li>
                        <li @if (Request::is('notices/create')) class="active" @endif>
                            <a href="{{ route('notices.create') }}">
                                {{ _lang('New Notice') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">{{ _lang('Events') }}</a>
                    <ul>
                        <li @if (Request::is('events')) class="active" @endif>
                            <a href="{{ route('events.index') }}">
                                {{ _lang('All Events') }}
                            </a>
                        </li>
                        <li @if (Request::is('events/create')) class="active" @endif>
                            <a href="{{ route('events.create') }}">
                                {{ _lang('Add New Event') }}
                            </a>
                        </li>
                    </ul>
                </li>

                @if ($user->can('website_cms.posts.view') || $user->can('website_cms.posts.create'))
                    <li @if (Request::is('posts') || Request::is('posts/*')) class="active" @endif>
                        <a href="{{ route('posts.index') }}">
                            {{ _lang('Posts') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('website_cms.posts_category.view') || $user->can('website_cms.posts_category.create'))
                    <li @if (Request::is('post_categories') || Request::is('post_categories/*')) class="active" @endif>
                        <a href="{{ route('post_categories.index') }}">
                            {{ _lang('Post Category') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('website_cms.pages.view') || $user->can('website_cms.pages.create'))
                    <li @if (Request::is('pages') || Request::is('pages/*')) class="active" @endif>
                        <a href="{{ route('pages.index') }}">
                            {{ _lang('Pages') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('website_cms.sliders.view') || $user->can('website_cms.sliders.create'))
                    <li @if (Request::is('sliders') || Request::is('sliders/*')) class="active" @endif>
                        <a href="{{ route('sliders.index') }}">
                            {{ __('Sliders') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('website_cms.menus.view') || $user->can('website_cms.menus.create'))
                    <li @if (Request::is('site_navigations') || Request::is('site_navigations/*')) class="active" @endif>
                        <a href="{{ route('site_navigations.index') }}">
                            {{ _lang('Site Menu') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('website_cms.theme_options'))
                    <li @if (Request::is('website/theme_option')) class="active" @endif>
                        <a href="{{ url('website/theme_option') }}">
                            {{ _lang('Theme Option') }}
                        </a>
                    </li>
                @endif

                @if ($user->can('website_cms.medias_category.view') || $user->can('website_cms.medias_category.create'))
                    <li @if (Request::is('media-categories')) class="active" @endif>
                        <a href="{{ route('media-categories.index') }}">
                            {{ __('Media Categories') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('website_cms.medias.view') || $user->can('website_cms.medias.create'))
                    <li @if (Request::is('medias/create') || Request::is('medias')) class="active" @endif>
                        <a href="{{ route('medias.index') }}">
                            {{ __('Medias') }}
                        </a>
                    </li>
                @endif
                @if ($user->can('website_cms.contact_message.view') || $user->can('website_cms.contact_message.create'))
                    <li @if (Request::is('contact-message')) class="active" @endif>
                        <a href="{{ route('contact-message') }}">
                            {{ __('Contact Message') }}
                        </a>
                    </li>
                @endif

                <li
                    class="{{ Request::is('message/compose') || Request::is('message/inbox') || Request::is('message/outbox') ? 'active' : '' }}">
                    <a href="#">{{ _lang('Message') }} {!! count_inbox() > 0 ? '<span class="label label-danger inbox-count">' . count_inbox() . '</span>' : '' !!}</a>
                    <ul>
                        <li @if (Request::is('message/compose')) class="active" @endif>
                            <a href="{{ url('message/compose') }}">
                                {{ _lang('New Message') }}
                            </a>
                        </li>
                        <li @if (Request::is('message/inbox')) class="active" @endif>
                            <a href="{{ url('message/inbox') }}">
                                {{ _lang('Inbox Items') }}
                            </a>
                        </li>
                        <li @if (Request::is('message/outbox')) class="active" @endif>
                            <a href="{{ url('message/outbox') }}">
                                {{ _lang('Send Items') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    @endif

    {{-- @if ($user->can('reports.staff_attendance')) --}}
    <li>
        <a href="#"><i class="fa fa-bar-chart"></i>{{ _lang('Reports') }}</a>
        <ul>
            @if ($user->can('reports.staff_attendance'))
                <li @if (Request::is('reports/staff_attendance_report') || Request::is('reports/staff_attendance_report/view')) class="active" @endif>
                    <a href="{{ url('reports/staff_attendance_report') }}">
                        {{ _lang('Staff Attendance') }}
                    </a>
                </li>
            @endif
            @if ($user->can('reports.posts.progress_card'))
                <li @if (Request::is('reports/progress_card') || Request::is('reports/progress_card/view')) class="active" @endif>
                    <a href="{{ url('reports/progress_card') }}">
                        {{ _lang('Progress Card') }}
                    </a>
                </li>
            @endif
            @if ($user->can('reports.posts.income_report'))
                <li @if (Request::is('reports/income_report') || Request::is('reports/income_report/view')) class="active" @endif>
                    <a href="{{ url('reports/income_report') }}">
                        {{ _lang('Income Report') }}
                    </a>
                </li>
            @endif
            @if ($user->can('reports.posts.expense_report'))
                <li @if (Request::is('reports/expense_report') || Request::is('reports/expense_report/view')) class="active" @endif>
                    <a href="{{ url('reports/expense_report') }}">
                        {{ _lang('Expense Report') }}
                    </a>
                </li>
            @endif
            @if ($user->can('reports.posts.financial_account_balance'))
                <li @if (Request::is('reports/account_balance')) class="active" @endif>
                    <a href="{{ url('reports/account_balance') }}">
                        {{ _lang('Financial Account Balance') }}
                    </a>
                </li>
            @endif
            @if ($user->can('reports.posts.user_logs'))
                <li @if (Request::is('user-logs')) class="active" @endif>
                    <a href="{{ url('user-logs') }}">
                        {{ __('User Logs') }}
                    </a>
                </li>
            @endif
        </ul>
    </li>

    <li>
        <a href="#"><i class="fa fa-newspaper-o"></i>{{ _lang('Feedback') }}</a>
        <ul>
            @if ($user->can('website_cms.contact_message.view'))
                <li @if (Request::is('feedback/admin') || Request::is('reports/staff_attendance_report/view')) class="active" @endif>
                    <a href="{{ url('feedback/admin') }}">
                        {{ _lang('Students Feedback') }}
                    </a>
                </li>
            @endif
        </ul>
        <ul>
            <li @if (Request::is('feedback/student')) class="active" @endif>
                <a href="{{ url('feedback/student') }}">
                    {{ _lang('Teachers Feedback') }}
                </a>
            </li>
        </ul>
    </li>
    {{-- @endif --}}

    {{-- Student --}}
    {{-- @if ($user->can('student_panel.view'))
        <li @if (Request::is('student/my_assignment')) class="active" @endif>
            <a href="{{ url('student/my_assignment') }}">
                <i class="fa fa-hourglass-half"></i>
                {{ _lang('Academic Assignment') }}
            </a>
        </li>

        <li @if (Request::is('student/my_syllabus')) class="active" @endif>
            <a href="{{ url('student/my_syllabus') }}">
                <i class="fa fa-file"></i>
                {{ _lang('Academic Syllabus') }}
            </a>
        </li>

        <li @if (Request::is('student/my_profile')) class="active" @endif>
            <a href="{{ url('student/my_profile') }}">
                <i class="fa fa-user-circle-o"></i>
                {{ _lang('My Profile') }}
            </a>
        </li>

        <li @if (Request::is('student/my_subjects')) class="active" @endif>
            <a href="{{ url('student/my_subjects') }}">
                <i class="fa fa-briefcase"></i>
                {{ _lang('My Subjects') }}
            </a>
        </li>

        <li @if (Request::is('student/class_routine')) class="active" @endif>
            <a href="{{ url('student/class_routine') }}">
                <i class="fa fa-calendar"></i>
                {{ _lang('Class Routine') }}
            </a>
        </li>

        <li @if (Request::is('student/exam_routine')) class="active" @endif>
            <a href="{{ url('student/exam_routine') }}">
                <i class="fa fa-calendar"></i>
                {{ _lang('Exam Routine') }}
            </a>
        </li>

        <li @if (Request::is('student/progress_card')) class="active" @endif>
            <a href="{{ url('student/progress_card') }}">
                <i class="fa fa-bar-chart"></i>
                {{ _lang('Progress Card') }}
            </a>
        </li>

        <li>
            <a href="#"><i class="fa fa-file-text"></i>{{ _lang('My Invoice') }}</a>
            <ul>
                <li @if (Request::is('student/my_invoice')) class="active" @endif>
                    <a href="{{ url('student/my_invoice') }}">
                        {{ _lang('Unpaid Invoice') }}
                    </a>
                </li>

                <li @if (Request::is('student/my_invoice/paid')) class="active" @endif>
                    <a href="{{ url('student/my_invoice/paid') }}">
                        {{ _lang('Paid Invoice') }}
                    </a>
                </li>
            </ul>
        </li>

        <li @if (Request::is('student/payment_history')) class="active" @endif>
            <a href="{{ url('student/payment_history') }}">
                <i class="fa fa-cc"></i>
                {{ _lang('Payment History') }}
            </a>
        </li>

        <li @if (Request::is('student/library_history')) class="active" @endif>
            <a href="{{ url('student/library_history') }}">
                <i class="fa fa-book"></i>
                {{ _lang('Library History') }}
            </a>
        </li>
    @endif --}}
    {{-- Student --}}

    {{-- Teacher --}}
    {{-- @if ($user->can('teacher_panel.view'))
        <li @if (Request::is('teacher/my_profile')) class="active" @endif>
            <a href="{{ url('teacher/my_profile') }}">
                <i class="fa fa-user-circle-o"></i>
                {{ _lang('My Profile') }}
            </a>
        </li>

        <li @if (Request::is('teacher/class_schedule')) class="active" @endif>
            <a href="{{ url('teacher/class_schedule') }}">
                <i class="fa fa-calendar"></i>
                {{ _lang('Class Schedule') }}
            </a>
        </li>

        <li @if (Request::is('teacher/mark_register')) class="active" @endif>
            <a href="{{ url('teacher/mark_register') }}">
                <i class="fa fa-balance-scale"></i>
                {{ _lang('Mark Register') }}
            </a>
        </li>

        <li @if (Request::is('teacher/assignments')) class="active" @endif>
            <a href="{{ url('teacher/assignments') }}">
                <i class="fa fa-hourglass-half"></i>
                {{ _lang('Assignments') }}
            </a>
        </li>
    @endif --}}



</ul>
