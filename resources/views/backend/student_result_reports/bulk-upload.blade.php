@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title pull-left">
                        {{ _lang('Result Bulk Upload') }}
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('student-result-reports.index') }}">
                            <i class="fa fa-upload"></i>
                            {{ _lang('Result List') }}
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="col-md-6">
                        <form action="{{ route('student-result-reports.store') }}" autocomplete="off"
                            class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group" style="padding: 0 15px;">
                                        <label class="control-label" style="margin: 5px 0;">
                                            {{ _lang('Excel File') }}
                                        </label>

                                        <div class="">
                                            <input type="file" class="form-control" name="xlsx_file" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info ml-5">{{ __('Submit') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                                <h4>Sample Excel Format</h4>
                            </div>
                            <div class="panel-body" style="margin: 30px 0;">
                                <a href="{{ route('student-result-reports-file-download.file') }}">
                                    <i class="fa fa-file" style="font-size: 62px;"></i>

                                    <span style="display: block; margin: 15px 0;">File Type: (.xlsx, .csv)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
