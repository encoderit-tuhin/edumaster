@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title  pull-left">
                {{ _lang('Generate Payslip') }}
            </h4>
            <div class="pull-left ml-5 form-inline">
                <div class="form-group">
                    <select name="type" id="type" class="form-control">
                        <option value="">{{ _lang('--Select Payslip Type--') }}</option>
                        <option value="class">{{ _lang('Class') }}</option>
                        <option value="section">{{ _lang('Section') }}</option>
                        <option value="student">{{ _lang('Student') }}</option>
                    </select>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="row justify-content-center" id="type-payslip">
                <div class="col-4">
                    <div class="alert alert-info">
                        {{ __('Please select payslip type') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // document ready
        $(document).ready(function() {
            // on change type
            $('#type').on('change', function() {
                // get type
                var type = $(this).val();
                // check if type is not empty
                if (type !== '') {
                    // get url
                    var url = '{{ route('payslip.create.form') }}';
                    // replace :type with type
                    url = url.replace(':type', type);
                    // get ajax request
                    $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            type: type
                        },
                        success: function(data) {
                            $('#type-payslip').html(data);

                            $('.select2').select2();
                        }
                    });
                } else {
                    // empty type-payslip
                    $('#type-payslip').empty();
                }
            });
        });
    </script>
@endsection
