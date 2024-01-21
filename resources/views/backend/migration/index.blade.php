@extends('layouts.backend')
@section('content')
    <div class="row">
        <form action="{{ route('student-migration.store') }}" class="validate" autocomplete="off" method="post"
            accept-charset="utf-8">
            @csrf
            <div class="container card">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                @if ($type == 'pushback')
                                    {{ _lang('Student Migration Pushback') }}
                                @else
                                    {{ _lang('Student Migration') }}
                                @endif

                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="col-md-6">
                                <div class="form-group" id="class-select">
                                    <label class="control-label">{{ _lang('Select Class') }}</label>
                                    <select name="class_id" id='class-id' class="form-control select2" required
                                        onchange="getSection();">
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('classes', 'id', 'class_name', old('class_id')) }}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 student-section ">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Select Section') }}</label>
                                    <select name="section_id" onchange="get_students();" id="section_id" required
                                        class="form-control select2">
                                        <option value="">{{ _lang('Select One') }}</option>
                                    </select>
                                </div>
                            </div>
                            @if ($type == 'pushback')
                                <div class="col-md-6 " style="display: none">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Migration Type') }}</label>
                                        <select required name="type" class="form-control select2">
                                            <option value="pushback" selected>Push Back</option>
                                        </select>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Migration Type') }}</label>
                                        <select required name="type" class="form-control select2">
                                            <option value="">---Select----</option>
                                            <option value="withmarit">With Merit Position</option>
                                            <option value="withoutmerit">With Out Merit Position</option>
                                        </select>
                                    </div>
                                </div>
                            @endif

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                   
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ _lang('User List') }}</div>
                    <div class="panel-body" id="user_list">
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="container ">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success  float-right" data-toggle="modal" id='modal-show-button'
                        style="display: none" data-target="#exampleModal">
                        Process
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Student Migration</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Year ') }}</label>
                                            <select class="form-control select2" name="academic_year" required>
                                                {{ create_option('academic_years', 'id', 'session', get_option('academic_year')) }}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" id="class-select">
                                            <label class="control-label">{{ _lang('Select Class') }}</label>
                                            <select name="migrate_class_id" id='class-id' class="form-control select2"
                                                required onchange="getMigrateSection();">
                                                <option value="">{{ _lang('Select One') }}</option>
                                                {{ create_option('classes', 'id', 'class_name', old('migrate_class_id')) }}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Group ') }}</label>
                                            <select name="group_id" id="group" class="form-control select2">
                                                <option value="">{{ _lang('Select One') }}</option>
                                                {{ create_option('student_groups', 'id', 'group_name', old('group')) }}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 student-section ">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Select Section') }}</label>
                                            <select name="migrate_section_id" id="section_id" required
                                                class="form-control select2">
                                                <option value="">{{ _lang('Select One') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">{{ _lang('Submit') }}</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </form>
    </div>
@endsection
<style>
    .modal {
        top: 150px !important;

    }

    .modal-backdrop {
        position: fixed;
        top: 10;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: -999 !important;
        background-color: #000;
    }
</style>
@section('js-script')
    <script type="text/javascript">
        function getSection() {

            if ($('select[name=class_id]').val() != "") {
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
                    success: function(data) {
                        $("#preloader").css("display", "none");
                        $('select[name=section_id]').html(data);
                    }
                });
            }
        }

        function getMigrateSection() {

            if ($('select[name=migrate_class_id]').val() != "") {
                var _token = $('input[name=_token]').val();
                var class_id = $('select[name=migrate_class_id]').val();
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
                    success: function(data) {
                        $("#preloader").css("display", "none");
                        $('select[name=migrate_section_id]').html(data);
                    }
                });
            }
        }

        function get_students() {
            var class_id = "/" + $('select[name=class_id]').val();
            var section_id = "/" + $('select[name=section_id]').val();
            var link = "{{ url('students/get_students/migration') }}" + class_id + section_id;
            console.log('link', link)
            $.ajax({
                type: "get",
                url: link,
                // beforeSend: function() {
                //     $("#preloader").css("display", "block");
                // },
                success: function(data) {

                    $('#modal-show-button').show();
                    $('#user_list').html(data);


                }
            });

        }


        // function checkAllInput() {
        //     var checkboxes = document.getElementsByClassName("user-checkbox");
        //     console.log('checkboxes', checkboxes)

        //     for (var i = 0; i < checkboxes.length; i++) {
        //         checkboxes[i].checked = true;
        //     }
        // }

        // $(document).ready(function() {
        //     $("#student-select-all").click(function() {
        //         var isChecked = $(this).prop("checked");
        //         $(".student-checkbox").prop("checked", isChecked);
        //     });

        //     $(".student-checkbox").click(function() {
        //         var allChecked = $(".student-checkbox:checked").length === $(".student-checkbox").length;
        //         $("#student-select-all").prop("checked", allChecked);
        //     });
        // });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on("click", "#student-select-all", function() {
                var isChecked = $(this).prop("checked");
                $(".student-checkbox").prop("checked", isChecked);
            });

            $(document).on("click", ".student-checkbox", function() {
                var allChecked = $(".student-checkbox:checked").length === $(".student-checkbox").length;
                $("#student-select-all").prop("checked", allChecked);
            });
        });
    </script>
@stop
