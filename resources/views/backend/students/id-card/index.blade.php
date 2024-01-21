@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Students List') }}</span>
                    {{-- <div class="pull-right">
                        <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus-circle"></i>&nbsp;
                            {{ _lang('Add New Student') }}
                        </a>
                    </div> --}}
                    <div class="clearfix"></div>
                </div>
                <form id="search_form" class="mt-3 params-panel validate" method="get" autocomplete="off"
                    accept-charset="utf-8" action="{{ route('student-list-for-card-print') }}">

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="class_id_select">{{ _lang('Class') }}</label>
                            <select name="class_id" id="class_id_select" class="form-control select2" required>
                                <option value="">{{ _lang('Select One') }}</option>
                                {{ create_option('classes', 'id', 'class_name', request()->class_id) }}
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">{{ _lang('Group') }}</label>
                            <select name="group_id" class="form-control select2">
                                <option value="">{{ _lang('Select One') }}</option>
                                {{ create_option('student_groups', 'id', 'group_name', request()->group_id) }}
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">{{ _lang('Section') }}</label>
                            <select name="section_id" class="form-control select2">
                                <option value="">{{ _lang('Select One') }}</option>
                                {{ create_option('sections', 'id', 'section_name', request()->section_id) }}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class=" control-label">{{ _lang('Card Validity Date') }}</label>

                            <input type="text" class="form-control datepicker" name="validity" required>

                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="form-group">
                            <button type="submit" style="margin-top:24px;"
                                class="btn btn-primary btn-block rect-btn">{{ _lang('Search') }}</button>
                        </div>
                    </div>
                </form>

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
