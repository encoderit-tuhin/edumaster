@extends('layouts.backend')
@section('content')
    <div class="row container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    {{ _lang('Update Purchase') }}
                </div>
            </div>

            <div class="panel-body">
                <form action="{{ route('sms-purchase.update', $purchase->id) }}" autocomplete="off"
                    class="form-horizontal form-groups-bordered validate" method="post" accept-charset="utf-8">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ _lang('Transaction date') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control datepicker" name="transaction_date"
                                value="{{ $purchase->transaction_date }}" required>
                            <!-- `date('Y-m-d')` will provide the current date in the 'Y-m-d' format -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ _lang('Masking Type') }}</label>
                        <div class="col-sm-9">
                            <select name="masking_type" class="form-control select2" id="" required>
                                <option value="">{{ _lang('--Select--') }}</option>
                                <option value="masking" {{ $purchase->masking_type == 'masking' ? 'selected' : '' }}>Masking
                                </option>
                                <option value="nonmasking" {{ $purchase->masking_type == 'nonmasking' ? 'selected' : '' }}>Non
                                    Masking/General
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ _lang('Quantity') }}</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="no_of_sms" value="{{ $purchase->no_of_sms }}" required
                                id='no_of_sms'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ _lang('Price') }}</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="amount" id='amount' value="{{ $purchase->amount }}"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ _lang('SMS Gateway') }}</label>
                        <div class="col-sm-9">
                            <select name="sms_gateway" class="form-control select2" id="" required>
                                <option value="">{{ _lang('--Select--') }}</option>
                                <option value="bulksmsbd" {{ $purchase->sms_gateway == 'bulksmsbd' ? 'selected' : '' }}>Bulk SMS BD
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-script')


    <script>
        $('#no_of_sms').on('input', function() {
            var noOfSms = $(this).val();
            var maskingType = $('select[name="masking_type"]').val(); // Get the selected masking type

            var rate = (maskingType === 'masking') ? 0.50 : 0.25; // Set the rate based on masking type

            var calculatedAmount = rate * noOfSms;
            $('#amount').val(calculatedAmount.toFixed(2));
        });

        // Add an event listener for the masking type dropdown change
        $('select[name="masking_type"]').on('change', function() {
            var noOfSms = $('#no_of_sms').val();
            var maskingType = $(this).val();

            var rate = (maskingType === 'masking') ? 0.50 : 0.25;

            var calculatedAmount = rate * noOfSms;
            $('#amount').val(calculatedAmount.toFixed(2));
        });
    </script>
@stop
