@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card">
                                <form class="" method="post" action="{{ route('migrated-list.report') }}"
                                    autocomplete="off" accept-charset="utf-8">
                                    @csrf

                                    <input type="hidden" name="form_type" value="section_wise">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Academic Year') }}</label>
                                            <select class="form-control select2" name="academic_year_id" required>
                                                {{ create_option('academic_years', 'id', 'session') }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Section') }}</label>
                                            <select class="form-control select2" name="section_id" required>
                                                <option value="">Select one</option>
                                                <option value="all">All</option>
                                                {{ create_option('sections', 'id', 'section_name') }}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" style="margin-top:28px;"
                                                class="btn btn-primary btn-block rect-btn">{{ _lang('View Report') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
