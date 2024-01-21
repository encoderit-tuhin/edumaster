@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Students List') }}</span>
                    <div class="pull-right">
                        <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus-circle"></i>&nbsp;
                            {{ _lang('Add New Student') }}
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    @include('backend.students.modal.student-search-from')
                </div>

                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Profile') }}</th>
                            <th>{{ _lang('Roll') }}</th>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('Class') }}</th>
                            <th>{{ _lang('Section') }}</th>
                            <th>{{ _lang('Group') }}</th>
                            <th>{{ _lang('Phone No') }}</th>
                            <th>{{ _lang('Status') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @if (isset($students))
                                @foreach ($students as $data)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('uploads/images/' . $data->image) }}" width="50px"
                                                alt="">
                                        </td>
                                        <td>{{ $data->studentSession->roll }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->studentSession->class->class_name }}</td>
                                        <td>
                                            {{ $data->studentSession->section->section_name }}
                                        </td>
                                        <td>
                                            {{ $data->group_name }}
                                        </td>

                                        <td>{{ $data->email }}</td>

                                        <td>
                                            <span
                                                class="badge {{ $data->student_status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $data->student_status == 1 ? 'Enable' : 'Disable' }}
                                            </span>
                                        </td>


                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    {{ _lang('Action') }}
                                                </a>
                                                <ul class="dropdown-menu notification-items">
                                                    <li>
                                                        <a href="{{ route('students.show', $data->id) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                            {{ _lang('View') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('students.edit', $data->id) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                            {{ _lang('Edit') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        @if ($data->student_status == 1)
                                                            <a href="{{ route('students.status-disable', $data->id) }}"
                                                                class="dropdown-item">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                                {{ _lang('Disable') }}
                                                            </a>
                                                        @endif

                                                        @if ($data->student_status == 0)
                                                            <a href="{{ route('students.status-enable', $data->id) }}"
                                                                class="dropdown-item">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                                {{ _lang('Enable') }}
                                                            </a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('students.destroy', $data->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item"
                                                                onclick="return confirm('Are you sure to delete ?')">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('vital.edit', $data->studentSession->student_id) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                            {{ _lang('Vital') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('students/id_card/' . $data->id) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                            {{ _lang('Download ID Card') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-danger">{{ __('No Students Found') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    @if (isset($students) && count($students) > 0)
                        @include('backend.students.modal.student-pdf-download-from')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        $("#class_id_select").change(function() {
            var class_id = $(this).val();
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
        });
    </script>
@stop
