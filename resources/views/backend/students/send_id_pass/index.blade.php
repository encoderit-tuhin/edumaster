@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="float-start my-3">
                        <span class="panel-title">{{ _lang('Students List') }}</span>

                    </div>

                    <div class="float-end my-3"></div>
                    <div class="clearfix"></div>

                    @include('backend.students.modal.student-search-from')
                </div>

                <div class="panel-body">
                    <form action="{{ route('student-send-id-pass.store') }}" method="POST" id="student-id-pass-form">
                        @csrf

                        <table class="table table-bordered data-table">
                            <thead>
                                <th>
                                    <input type="checkbox" id="student-select-all">
                                </th>
                                <th>{{ _lang('SL No') }}</th>
                                <th>{{ _lang('Profile') }}</th>
                                <th>{{ _lang('Group') }}</th>
                                <th>{{ _lang('Section') }}</th>
                                <th>{{ _lang('Mobile') }}</th>
                                <th>{{ _lang('Student ID') }}</th>
                                <th>{{ _lang('Password') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </thead>
                            <tbody>
                                @if (isset($students))
                                    @foreach ($students as $data)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="student-checkbox" name="student_ids[]"
                                                    value="{{ $data->id }}">

                                                @error('student_ids')
                                                    <span class="text-danger">Please cheked</span>
                                                @enderror
                                            </td>

                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>

                                            <td>
                                                <img src="{{ asset('uploads/images/' . $data->image) }}" width="50px"
                                                    alt="">
                                            </td>

                                            <td>
                                                {{ $data->group_name }}
                                            </td>

                                            <td>
                                                {{ $data->studentSession->section->section_name }}
                                            </td>

                                            <td>
                                                {{ $data->phone }}
                                            </td>

                                            <td>
                                                {{ $data->studentSession->roll }}
                                            </td>

                                            <td>
                                                {{ $data->password_static }}
                                            </td>

                                            <td>
                                                <a href="{{ route('student-send-id-pass.edit', $data->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>

                                                </a>
                                                <a href="{{ route('student-send-id-pass.delete', $data->id) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
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

                        <button type="submit" class="btn btn-success btn-sm">{{ __('Send SMS') }}</button>
                    </form>

                    @if (isset($students) && count($students) > 0)
                        @include('backend.students.send_id_pass.student-pdf-download-from')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        $(document).ready(function() {
            $("#student-select-all").click(function() {
                var isChecked = $(this).prop("checked");
                $(".student-checkbox").prop("checked", isChecked);
            });

            $(".student-checkbox").click(function() {
                var allChecked = $(".student-checkbox:checked").length === $(".student-checkbox").length;
                $("#student-select-all").prop("checked", allChecked);
            });

            var form = document.getElementById('student-id-pass-form');

            form.addEventListener('submit', function(event) {
                var atLeastOneChecked = [...document.querySelectorAll('.student-checkbox')].some(
                    checkbox => checkbox.checked);
                if (!atLeastOneChecked) {
                    event.preventDefault();
                    alert('Please select at least one salary.');
                }
            });
        });

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
@endsection
