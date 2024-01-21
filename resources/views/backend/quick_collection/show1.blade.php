@extends('layouts.backend')

<style>
    /* Custom CSS to remove borders */
    .no-border tr,
    .no-border td {
        border: none !important;
    }

    .card {
        padding: 0px !important;
    }

    .table-responsive th,
    .table-responsive td {
        font-size: 11px !important;
        padding: 4px !important;
    }

    .table-responsive th {
        background: #00075e !important;
        color: #fff;
    }

    .table-responsive input {
        padding: 1px !important;
    }

    .academic-section {
        background-color: #f4f3ef;
        border-radius: 10px;
        padding: 10px;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" class="validate" autocomplete="off" action="{{ route('quick-collection.store') }}"
                        autocomplete="off">
                        @csrf

                        <div class="row p-4">
                            <div class="col-lg-6">
                                <div class="col-lg-8 academic-section">
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
                                            <label class="control-label">{{ _lang('Student ID') }}</label>
                                            <input class="form-control" type="number" name="student_id"
                                                value="{{ $studentSession->student->id }}" placeholder="Student ID" required
                                                readonly />
                                        </div>
                                    </div>
                                    {{-- TODO: Hide for now. --}}
                                    <div class="col-md-12 py-3">
                                        <input type="checkbox" name="" class="col-md-1 text-left">
                                        <div class="col-md-9">
                                            <p>Attendance Fine</p>
                                        </div>
                                    </div>

                                    <div class="col-md-12 py-3">
                                        <input type="checkbox" name="" class="col-md-1 text-left">
                                        <div class="col-md-9">
                                            <p>Previous Due</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary">Back</button>
                                        <button type="button" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ asset('uploads/images/' . $studentSession->student->user->image) }}"
                                                class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <p>Student ID</p>
                                        </div>
                                        <div class="card-footer">
                                            @isset($studentSession->student->id)
                                                {{ $studentSession->student->id }}
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                // dd($studentSession->student->user->image);
                            @endphp
                            <div class="col-lg-6">
                                <table class="table no-border">
                                    <tr>
                                        <td>Student's Name</td>
                                        <td> <span>:</span>
                                            @isset($studentSession->student->first_name)
                                                {{ $studentSession->student->first_name . ' ' . ($studentSession->student->last_name ?? '') }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Student Roll</td>
                                        <td> <span>:</span>
                                            @isset($studentSession->roll)
                                                {{ $studentSession->roll }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Section</td>
                                        <td> <span>:</span>
                                            @isset($studentSession->section->section_name)
                                                {{ $studentSession->section->section_name }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Group</td>
                                        <td> <span>:</span>
                                            @isset($studentSession->student->studentGroup->group_name)
                                                {{ $studentSession->student->studentGroup->group_name }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Father's Name</td>
                                        <td> <span>:</span>
                                            @isset($studentSession->student->parent->parent_name)
                                                {{ $studentSession->student->parent->parent_name }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td> <span>:</span>
                                            @isset($studentSession->student->studentCategory->name)
                                                {{ $studentSession->student->studentCategory->name }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile No.</td>
                                        <td> <span>:</span>
                                            @isset($studentSession->student->phone)
                                                {{ $studentSession->student->phone }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </table>
                            </div>

                        </div>

                        <div class="row" style="margin-top: 50px;">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" id="checkbox-all" />
                                                </th>
                                                <th><b>{{ _lang('Fee Head') }}</b></th>
                                                <th>{{ _lang('Select Fee Sub Head') }}</th>
                                                <th>{{ _lang('Total Due') }}</th>
                                                <th>{{ _lang('Total Paid') }}</th>
                                                <th>{{ _lang('Waiver') }}</th>
                                                <th>{{ _lang('Fine Payable') }}</th>
                                                <th>{{ _lang('Fee Payable') }}</th>
                                                <th>{{ _lang('Fee & Fine Payable') }}</th>
                                                <th>{{ _lang('Prev Due Payable') }}</th>
                                                <th>{{ _lang('Prev Due Paid') }}</th>
                                                <th>{{ _lang('Total Payable') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($feeHeads as $feeHead)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox"
                                                            name="fee_heads[{{ $feeHead->id }}][fee_head_id]"
                                                            value="{{ $feeHead->id }}" class="fee-head-id">
                                                    </td>
                                                    <td><b>{{ $feeHead->name }}</b></td>
                                                    <td style="width: 220px;">
                                                        <input type="hidden" name="fee_sub_head_id"
                                                            value="{{ $feeHead->id }}">
                                                        <select name="fee_heads[{{ $feeHead->id }}][sub_head_ids][]"
                                                            id="sub_head_id_{{ $feeHead->id }}"
                                                            class="sub_head_ids form-control select2" multiple
                                                            onchange="getFeeAmount(this.value, {{ $feeHead->id }})">
                                                            <option value="">{{ __('--Select--') }}</option>
                                                            @foreach ($feeHead->feeSubHeads as $subHead)
                                                                <option value="{{ $subHead->id }}">
                                                                    {{ $subHead->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <span id="sub_head_due_amount_{{ $feeHead->id }}">
                                                            0
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="fee_heads[{{ $feeHead->id }}][total_paid]"
                                                            id="total_paid_{{ $feeHead->id }}" min="0" />
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="fee_heads[{{ $feeHead->id }}][waiver]"
                                                            id="waiver_{{ $feeHead->id }}" min="0" />
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="fee_heads[{{ $feeHead->id }}][fine_payable]"
                                                            id="fine_payable_{{ $feeHead->id }}" readonly />
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="fee_heads[{{ $feeHead->id }}][fee_payable]"
                                                            id="fee_payable_{{ $feeHead->id }}" readonly />
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="fee_heads[{{ $feeHead->id }}][fee_and_fine_payable]"
                                                            id="fee_and_fine_payable_{{ $feeHead->id }}" readonly />
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="fee_heads[{{ $feeHead->id }}][previous_due_payable]"
                                                            id="previous_due_payable_{{ $feeHead->id }}" readonly />
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="fee_heads[{{ $feeHead->id }}][previous_due_paid]"
                                                            id="previous_due_paid_{{ $feeHead->id }}" readonly />
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="fee_heads[{{ $feeHead->id }}][total_payable]"
                                                            id="total_payable_{{ $feeHead->id }}" readonly />
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="12" class="text-center">
                                                        <h6>
                                                            {{ _lang('No Fee Head Found. Please create or configure fee head first.') }}
                                                        </h6>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 50px;">
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="card text-center border-danger">
                                        <div class="card-header bg-danger text-white">
                                            <h6 class="p-3">
                                                {{ __('Attendance Fine') }}
                                            </h6>
                                        </div>
                                        <div class="card-body py-5">
                                            <p class="card-text">{{ format_currency(0) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card text-center border-warning">
                                        <div class="card-header bg-warning text-white">
                                            <h6 class="p-3">{{ __('Total Paid') }}</h6>
                                        </div>
                                        <div class="card-body py-5">
                                            <input type="hidden" name="total_paid" id="total_paid">
                                            <p class="card-text" id="total_paid_print">{{ format_currency(0) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card text-center border-success">
                                        <div class="card-header bg-success text-white">
                                            <h6 class="p-3">{{ __('Total Payable') }}</h6>
                                        </div>
                                        <div class="card-body py-5">
                                            <input type="hidden" name="total_payable" id="total_payable">
                                            <p class="card-text" id="total_payable_print">{{ format_currency(0) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card text-center border-info">
                                        <div class="card-header bg-info text-white">
                                            <h6 class="p-3">{{ __('Grand Due Amount') }}</h6>
                                        </div>
                                        <div class="card-body py-5">
                                            <input type="hidden" name="total_due" id="total_due">
                                            <p class="card-text" id="total_due_print">{{ format_currency(0) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Payment Date') }}</label>
                                    <input class="form-control datepicker" type="text" name="date"
                                        value="{{ old('date') }}" required />
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Paid By') }}</label>
                                        <select class="form-control select2" name="ledger_id" required>
                                            <option value="">
                                                {{ _lang('--Select Account--') }}
                                            </option>
                                            {{ create_option('accounting_ledgers', 'id', 'ledger_name', old('ledger_id')) }}
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang(' Send SMS Notification?') }}</label> <br>
                                        <input type="radio" name="sms_sent">
                                    </div>
                                </div> --}}
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <textarea class="form-control" type="text" name="note" cols="4" rows="8"
                                        placeholder="{{ __('Enter Notes (if any)') }}">{{ old('note') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">{{ _lang('Process to Collection') }}
                                    </button>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Script Section --}}
@section('scripts')
    <script>
        // On click checkbox-all, check all checkboxes by class fee-head-id
        $('#checkbox-all').click(function() {
            if ($(this).is(':checked')) {
                $('.fee-head-id').prop('checked', true);
            } else {
                $('.fee-head-id').prop('checked', false);
            }

            getSummaryAmount();
        });

        // on change chekbox fee-head-id, we'll call run the function getSummaryAmount()
        $('.fee-head-id').change(function() {
            getSummaryAmount();
        });

        // on change any value of input, we'll call run the function getSummaryAmount()
        $('input').change(function() {
            getSummaryAmount();
        });


        // on click fee-sub-head-id, we'll call the API to get the fee amounts.

        function getFeeAmount(subHeadId, feeHeadId) {
            var selectElement = $('.sub_head_ids')?.[0];
            var subHeadIds = Array.from(selectElement.options)
                .filter(option => option.selected)
                .map(option => option.value);

            $.ajax({
                url: "{{ route('student-collection.sub-head-wise-calculation') }}",
                type: 'POST',
                data: {
                    fee_sub_head_ids: subHeadIds,
                    fee_head_id: feeHeadId,
                    student_id: '{{ $studentSession->student->id }}',
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);

                    // Fill table data.
                    $('#sub_head_due_amount_' + feeHeadId).html(response.due_amount);
                    $('#total_paid_' + feeHeadId).val(response.total_paid);
                    $('#waiver_' + feeHeadId).val(response.waiver);
                    $('#fine_payable_' + feeHeadId).val(response.fine_payable);
                    $('#fee_payable_' + feeHeadId).val(response.fee_payable);
                    $('#fee_and_fine_payable_' + feeHeadId).val(response.fee_and_fine_payable);
                    $('#previous_due_payable_' + feeHeadId).val(response.previous_due_payable);
                    $('#previous_due_paid_' + feeHeadId).val(response.previous_due_paid);
                    $('#total_payable_' + feeHeadId).val(response.total_payable);

                    // Fill totals data.
                    getSummaryAmount();
                }
            });
        }

        function getSummaryAmount() {
            var totalPaid = 0;
            var totalPayable = 0;
            var totalDue = 0;

            $('.fee-head-id').each(function() {
                if ($(this).is(':checked')) {
                    var feeHeadId = $(this).val();
                    var feeHeadId = $(this).val();
                    var paidAmount = $('#total_paid_' + feeHeadId).val();
                    var waiver = $('#waiver_' + feeHeadId).val();
                    var totalPayableAmount = $('#total_payable_' + feeHeadId).val();
                    var dueAmount = $('#sub_head_due_amount_' + feeHeadId).html();

                    totalPaid += paidAmount ? parseFloat(paidAmount) : 0;
                    totalPayable += totalPayableAmount ? parseFloat(totalPayableAmount) : 0;
                    totalDue += dueAmount ? parseFloat(dueAmount) : 0;

                    // if waiver is not empty, then we'll calculate the payable amount.
                    if (waiver) {
                        totalPaid = totalPaid - parseFloat(waiver);
                        totalPayable = totalPayable - parseFloat(waiver);
                    }
                }
            });

            $('#total_paid').val(totalPaid);
            $('#total_paid_print').html('৳' + totalPaid);
            $('#total_payable').val(totalPayable);
            $('#total_payable_print').html('৳' + totalPayable);
            $('#total_due').val(totalDue);
            $('#total_due_print').html('৳' + totalDue);
        }
    </script>
@endsection
