@extends('layouts.backend')
@section('content')
    <div class="row justify-content-between">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('New Purchase') }}
                    </div>
                </div>

                <div class="panel-body">
                    <form action="{{ route('sms-purchase.store') }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ _lang('Quantity') }}</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="no_of_sms" value="{{ old('no_of_sms') }}"
                                    required id='no_of_sms'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ _lang('Price') }}</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="amount" id='amount'
                                    value="{{ old('amount') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ _lang('Transaction date') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker" name="transaction_date"
                                    value="{{ old('transaction_date', date('Y-m-d')) }}" required>
                                <!-- `date('Y-m-d')` will provide the current date in the 'Y-m-d' format -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ _lang('Masking Type') }}</label>
                            <div class="col-sm-9">
                                <select name="masking_type" class="form-control select2" id="" required>
                                    <option value="nonmasking">Non Masking/General</option>
                                    <option value="masking">Masking</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ _lang('SMS Gateway') }}</label>
                            <div class="col-sm-9">
                                <select name="sms_gateway" class="form-control select2" id="" required>
                                    {{-- <option value="">{{ _lang('--Select--') }}</option> --}}
                                    <option value="bulksmsbd">Bulk SMS BD</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Purchases') }}
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('SMS Gateway') }}</th>
                            <th>{{ _lang('Transaction Date') }}</th>
                            <th>{{ _lang('Price') }}</th>
                            <th>{{ _lang('Quantity') }}</th>
                            <th>{{ _lang('Maskinhg/Non Masking') }}</th>
                            {{-- <th>{{ _lang('Action') }}</th> --}}
                        </thead>
                        <tbody>
                            @if (isset($smsPurchases))
                                @foreach ($smsPurchases as $data)
                                    <tr>

                                        <td>{{ $data->sms_gateway }}</td>
                                        <td>{{ $data->transaction_date }}</td>
                                        <td>{{ $data->amount }}</td>
                                        <td>
                                            {{ $data->no_of_sms }}
                                        </td>
                                        <td>
                                            {{ $data->masking_type }}
                                        </td>
                                        {{-- <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    {{ _lang('Action') }}
                                                </a>
                                                <ul class="dropdown-menu notification-items">
                                                    <li>
                                                        <a href="{{ route('sms-purchase.show', $data->id) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                            {{ _lang('View') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('sms-purchase.edit', $data->id) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                            {{ _lang('Edit') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('sms-purchase.destroy', $data->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item"
                                                                onclick="return confirm('Are you sure to delete ?')">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>
                                                    </li>

                                                </ul>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-danger">No Student Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
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
