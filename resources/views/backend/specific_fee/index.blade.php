@extends('layouts.backend')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <span class="panel-title"> <strong>{{ _lang('Payslip Create (Fee Wise)') }}</strong> </span>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <form method="get" class="" autocomplete="off">
                            @csrf

                            <div class="card-header">
                                <h4>Class Wise</h4>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Academic Year') }}</label>
                                            <select class="form-control select2" name="academic_year" required>
                                                {{ create_option('academic_years', 'id', 'session', get_option('academic_year')) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Class') }}</label>
                                            <select name="class_id" id="class_id" class="form-control select2">
                                                {{ create_option('classes', 'id', 'class_name', old('class_id')) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Fee Head') }}</label>
                                            <div class="">
                                                <select name="fee_head_id" id="fee_head_id" class="form-control select2">
                                                    {{ create_option('fee_heads', 'id', 'name', old('name')) }}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Fee Sub Head') }}</label>
                                            <div class="">
                                                <select name="fee_sub_head_id" id="fee_sub_head_id"
                                                    class="form-control select2">
                                                    {{ create_option('fee_sub_heads', 'id', 'name', old('name')) }}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="checkbox" name="" class="col-md-1 text-left mt-3">
                                        <div class="col-md-9">
                                            <p>Previous Due</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="checkbox" name="" class="col-md-1 text-left mt-3">
                                        <div class="col-md-9">
                                            <p>Attendance Fine</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i>
                                    {{ _lang('Create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <form method="get" class="" autocomplete="off">
                            @csrf

                            <div class="card-header">
                                <h4>Section Wise</h4>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Academic Year') }}</label>
                                            <select class="form-control select2" name="academic_year" required>
                                                {{ create_option('academic_years', 'id', 'session', get_option('academic_year')) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Section') }}</label>
                                            <select name="section_id" id="section_id" class="form-control select2">
                                                {{ create_option('sections', 'id', 'section_name', isset($request->section_id) ?? $request->section_id) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Fee Head') }}</label>
                                            <div class="">
                                                <select name="fee_head_id" id="fee_head_id" class="form-control select2">
                                                    {{ create_option('fee_heads', 'id', 'name', old('name')) }}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Fee Sub Head') }}</label>
                                            <div class="">
                                                <select name="fee_sub_head_id" id="fee_sub_head_id"
                                                    class="form-control select2">
                                                    {{ create_option('fee_sub_heads', 'id', 'name', old('name')) }}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="checkbox" name="" class="col-md-1 text-left mt-3">
                                        <div class="col-md-9">
                                            <p>Previous Due</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="checkbox" name="" class="col-md-1 text-left mt-3">
                                        <div class="col-md-9">
                                            <p>Attendance Fine</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i>
                                    {{ _lang('Create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <form method="get" class="" autocomplete="off">
                            @csrf

                            <div class="card-header">
                                <h4>Student ID Wise</h4>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Academic Year') }}</label>
                                            <select class="form-control select2" name="academic_year" required>
                                                {{ create_option('academic_years', 'id', 'session', get_option('academic_year')) }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Student ID') }}</label>
                                            <div class="">
                                                <input type="text" name="student_id" value=""
                                                    class="form-control" placeholder="Enter Student ID">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Fee Head') }}</label>
                                            <div class="">
                                                <select name="fee_head_id" id="fee_head_id" class="form-control select2">
                                                    {{ create_option('fee_heads', 'id', 'name', old('name')) }}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Fee Sub Head') }}</label>
                                            <div class="">
                                                <select name="fee_sub_head_id" id="fee_sub_head_id"
                                                    class="form-control select2">
                                                    {{ create_option('fee_sub_heads', 'id', 'name', old('name')) }}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="checkbox" name="" class="col-md-1 text-left mt-3">
                                        <div class="col-md-9">
                                            <p>Previous Due</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="checkbox" name="" class="col-md-1 text-left mt-3">
                                        <div class="col-md-9">
                                            <p>Attendance Fine</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i>
                                    {{ _lang('Create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
