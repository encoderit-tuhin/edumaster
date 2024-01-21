@extends('layouts.backend')
@section('content')
    <div class="row">
        <form action="{{ route('merit-process.store') }}" class="validate" autocomplete="off" method="post"
            accept-charset="utf-8">
            @csrf
            <div class="container card">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                {{ _lang('Merit Process') }}
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="col-md-6">
                                <div class="form-group" id="exam-select">
                                    <label class="control-label">{{ _lang('Select Exam') }}</label>
                                    <select name="exam_id" id='exam-id' class="form-control select2" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('exams', 'id', 'name', old('exam_id')) }}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 student-section ">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Select Class') }}</label>
                                    <select name="class_id" id="class_id" required
                                        class="form-control select2">
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('classes', 'id', 'class_name', old('class_id')) }}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Process</button>
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
    <script type="text/javascript"></script>
@stop
