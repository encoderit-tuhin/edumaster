@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Applying Students') }}</span>
                    <div class="pull-right">
                        <a href="{{ route('student-applications.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus-circle"></i>
                            {{ _lang('New Application') }}
                        </a>
                    </div>

                    {{-- <div class="clearfix"></div>
                    @include('backend.students.modal.student-search-from') --}}
                </div>

                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Sl') }}</th>
                            <th>{{ _lang('Student\'s Name') }}</th>
                            <th>{{ _lang('College Roll') }}</th>
                            <th>{{ _lang('SSC Roll') }}</th>
                            <th>{{ _lang('District') }}</th>
                            <th>{{ _lang('Phone') }}</th>
                            <th>{{ _lang('Password') }}</th>
                            <th>{{ _lang('Group') }}</th>
                            <th>{{ _lang('Religion') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($students as $data)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        {{ $data->first_name }}
                                        <br>
                                        <img src="{{ asset('uploads/images/' . $data->image) }}" width="50px"
                                            alt="" />
                                    </td>
                                    <td>
                                        {{ $data->user->student->studentSession->roll ?? '' }}
                                    </td>
                                    <td>
                                        {{ $data->board_roll }}
                                    </td>
                                    <td>{{ $data->permanent_district }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>
                                        {{ $data->user->password_static ?? '' }}
                                    </td>
                                    <td>
                                        {{ !empty($data->group_id) ? App\StudentGroup::find($data->group_id)->group_name ?? '' : 'N/A' }}
                                    </td>
                                    <td>{{ $data->religion }}</td>
                                    <td>
                                        {{-- @if (empty($data->student_id))
                                            <a href="{{ url('students/create/' . $data->id) }}"
                                                class="btn btn-primary btn-sm">{{ _lang('Refill') }}</a>
                                        @endif --}}

                                        <a href="{{ route('student-applications.edit', $data->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>&nbsp;
                                            {{ _lang('Edit') }}
                                        </a>

                                        @if (!empty($data->student_id))
                                            <a href="{{ route('vital.edit', $data->student_id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-print"></i>&nbsp;
                                                {{ _lang('Vital') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if (isset($students) && count($students) > 0)
                        <a href="{{ route('applying-students-pdf-download.index') }}" style="margin-top:24px;"
                            class="btn btn-primary rect-btn">
                            <i class="fa fa-cloud-download" aria-hidden="true"></i>
                            {{ _lang('PDF Download') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        function showClass(elem) {
            if ($(elem).val() == "") {
                return;
            }
            window.location = "<?php echo url('student-applications/class'); ?>/" + $(elem).val();
        }
    </script>
@stop
