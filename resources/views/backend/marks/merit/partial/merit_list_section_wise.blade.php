<style>
    .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: -999 !important;
        background-color: #000;
    }
</style>

<div class="panel panel-default">
    <div class="panel-heading"><span class="panel-title">{{ _lang('Section Wise') }}</span></div>

    <div class="panel-body">
        <div class="row">

            <div class="col-lg-12">
                <form method="get" class="" autocomplete="off">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Academic Year') }}</label>
                                <select class="form-control select2" name="academic_year" required>
                                    {{ create_option('academic_years', 'id', 'session', get_option('academic_year')) }}
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Group') }}</label>
                                <div class="">
                                    <select name="group" id="group" class="form-control select2">
                                        {{ create_option('classes', 'id', 'class_name', isset($request->group) ?? $request->group) }}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Section') }}</label>
                                <select name="section_id" id="section_id" class="form-control select2">
                                    {{ create_option('sections', 'id', 'section_name', isset($request->section_id) ?? $request->section_id) }}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Student Category') }}</label>
                                <select name="student_category_id" id="student_category" class="form-control select2">
                                    {{ create_option('student_categories', 'id', 'name', isset($request->student_category_id) ?? $request->student_category_id) }}
                                </select>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">{{ _lang('Search') }}</button>
                        </div>
                    </div>
                </form>
            </div>


            @if (isset($students) && count($students) > 0)
                <div class="col-lg-12">
                    <div class="panel-body">
                        <form action="{{ route('waiver-config.store') }}" class="validate" autocomplete="off"
                            method="post" accept-charset="utf-8">
                            @csrf

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="select-all">
                                        </th>
                                        <th>{{ _lang('Student ID') }}</th>
                                        <th>{{ _lang('Roll No') }}</th>
                                        <th>{{ _lang('Name') }}</th>
                                        <th>{{ _lang('Group') }}</th>
                                        <th>{{ _lang('Category') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="waiver-checkbox" value="">
                                            </td>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->roll }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->group_name }}</td>
                                            <td>
                                                {{ $student->studentCategory->name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                <div class="tfoot">
                                    <tr>
                                        <td>
                                            <div class="col-md-12">
                                                <button id="processButton" type="button" class="btn btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal">{{ _lang('Process') }}</button>
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                            </table>

                            {{-- Modal Start --}}
                            <div class="container mt-5">
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Assign Waiver</h4>
                                                <button type="button" class="close text-right" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label">{{ _lang('Fee Head') }}</label>
                                                            <select name="fee_head_id" id="fee_head_id"
                                                                class="form-control select2">
                                                                {{ create_option('fee_heads', 'id', 'name', old('name')) }}
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <span>Amount : </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label">{{ _lang('Waiver Category') }}</label>
                                                            <select name="wavier_id" id="wavier"
                                                                class="form-control select2">
                                                                {{ create_option('waivers', 'id', 'waiver', isset($request->wavier_id) ?? $request->wavier_id) }}
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label
                                                                class="control-label">{{ _lang('Waiver Amount') }}</label>
                                                            <input type="number" class="form-control"
                                                                name="waiver_amount" value="0" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal End --}}

                        </form>

                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@section('js-script')
    <script>
        $(document).ready(function() {
            $("#select-all").click(function() {
                var isChecked = $(this).prop("checked");
                $(".waiver-checkbox").prop("checked", isChecked);
            });

            $(".waiver-checkbox").click(function() {
                var allChecked = $(".waiver-checkbox:checked").length === $(".waiver-checkbox").length;
                $("#select-all").prop("checked", allChecked);
            });

            var form = document.getElementById('salary-form');
            form.addEventListener('submit', function(event) {
                var atLeastOneChecked = [...document.querySelectorAll('.waiver-checkbox')].some(
                    checkbox => checkbox.checked);
                if (!atLeastOneChecked) {
                    event.preventDefault();
                    alert('Please select at least one salary.');
                }
            });
        });
    </script>
@endsection
