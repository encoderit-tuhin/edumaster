@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card">
                                <form class="" method="post" action="{{ route('taught-list.search') }}"
                                    autocomplete="off" accept-charset="utf-8">
                                    @csrf

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Class') }}</label>
                                            <select class="form-control select2" name="class_id" required>
                                                {{ create_option('classes', 'id', 'class_name', $classId) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Group') }}</label>
                                            <select class="form-control select2" name="group_id" required>
                                                {{ create_option('student_groups', 'id', 'group_name', $groupId) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Exam Name') }}</label>
                                            <select class="form-control select2" name="exam_id" required>
                                                {{ create_option('exams', 'id', 'name', $examId) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Session') }}</label>
                                            <select class="form-control select2" name="academic_year_id" required>
                                                {{ create_option('academic_years', 'id', 'session', $academicYearId) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <button type="submit" style="margin-top:24px;"
                                                        class="btn btn-primary btn-block rect-btn">{{ _lang('Search') }}</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="panel-body">
                                {{-- table --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
