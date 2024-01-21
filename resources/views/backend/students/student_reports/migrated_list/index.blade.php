@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card">
                                <form class="" method="post" action="{{ route('migrated-list.search') }}"
                                    autocomplete="off" accept-charset="utf-8">
                                    @csrf

                                    <input type="hidden" name="form_type" value="section_wise">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Academic Year') }}</label>
                                            <select class="form-control select2" name="academic_year_id" required>
                                                {{ create_option('academic_years', 'id', 'session', $academicYearId) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Section') }}</label>
                                            <select class="form-control select2" name="section_id" required>
                                                <option value="">Select one</option>
                                                <option value="all" {{ $sectionId == 'all' ? 'selected' : '' }}>All
                                                </option>
                                                {{ create_option('sections', 'id', 'section_name', $sectionId) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" style="margin-top:28px;"
                                                class="btn btn-primary btn-block rect-btn">{{ _lang('Search') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="panel-body">
                                <table class="table table-bordered data-table">

                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>{{ _lang('Student ID') }}</th>
                                            <th>{{ _lang('Roll') }}</th>
                                            <th>{{ _lang('Name') }}</th>
                                            <th>{{ _lang('Previous Section') }}</th>
                                            <th>{{ _lang('Gender') }}</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @if (isset($migratedLists))
                                            @foreach ($migratedLists as $student)
                                                <tr>
                                                    <td>
                                                        {{ $student->studentID }}
                                                    </td>
                                                    <td>
                                                        {{ $student->student_roll }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-capitalize">{{ $student->student_first_name }}</span>
                                                        <span
                                                            class="text-capitalize">{{ $student->student_last_name }}</span>
                                                    </td>
                                                    <td>
                                                        {{ $student->student_section_name }}
                                                    </td>
                                                    <td>
                                                        {{ $student->student_gender }}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-danger">No Student Found</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>

                                @if (isset($academicYearId) && isset($sectionId))
                                    <form action="{{ route('student-migration.download') }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="form_type" value="section_wise">
                                        <input type="hidden" name="academic_year_id" value="{{ $academicYearId }}">
                                        <input type="hidden" name="section_id" value="{{ $sectionId }}">
                                        <button type="submit" style="margin-top:24px;" class="btn btn-primary rect-btn">
                                            <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                            {{ _lang('PDF Download') }}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
