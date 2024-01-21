<style>
    .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: -999 !important;
        background-color: #000;
    }
</style>

<div class="col-lg-12">
    <div class="panel-body">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
            <br />
        @endif

        <form action="{{ route('payslip.update.collection') }}" method="POST" autocomplete="off">
            @csrf

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="checkbox_all" id="checkbox_all"></th>
                        <th>{{ __('Invoice ID') }}</th>
                        <th>{{ __('Student ID') }}</th>
                        <th>{{ __('Student Name') }}</th>
                        <th>{{ __('Student Roll') }}</th>
                        <th>{{ __('Total Payable') }}</th>
                        <th>{{ __('Total Paid') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($collections as $collection)
                        <tr>
                            <td>
                                <input type="checkbox" name="collection_ids[]" value="{{ $collection->id }}"
                                    class="checkbox">
                            </td>
                            <td>{{ $collection->invoice_id }}</td>
                            <td>{{ $collection->student_id }}</td>
                            <td>{{ $collection->student->first_name ?? '--' }}</td>
                            <td>{{ $collection->student->studentSession->roll ?? '--' }}</td>
                            <td>{{ format_currency($collection->total_payable) }}</td>
                            <td>{{ format_currency($collection->total_paid) }}</td>
                            <td>
                                <a href="{{ route('student-collection.invoice', $collection->id) }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-download"></i> &nbsp;
                                    {{ _lang('Download') }}
                                </a>

                                {{-- Modal Collect Payment button --}}
                                @if ($collection->total_payable !== $collection->total_paid)
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#payInvoiceModal{{ $collection->id }}">
                                        <i class="fa fa-money"></i> &nbsp;
                                        {{ _lang('Collect Payment') }}
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <p class="text-danger">{{ _lang('No data found') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if (count($collections))
                <div class="text-right">
                    <button type="button" class="btn btn-primary" id="collect-payment" data-toggle="modal"
                        data-target="#collectPaymentModal">
                        <i class="fa fa-money"></i> &nbsp;
                        {{ _lang('Collect Payment') }}
                    </button>
                </div>
            @endif

            {{-- Collect payment modal for all --}}
            <div class="container mt-5">
                <!-- Modal -->
                <div class="modal" id="collectPaymentModal" tabindex="-1" aria-labelledby="collectPaymentModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="collectPaymentModalLabel">
                                    {{ __('Collect Payment') }}
                                </h4>
                                <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="modal-body col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 text center">
                                                <input type="hidden" name="type" value="multiple" />
                                                <div class="form-group">
                                                    <label class="control-label">{{ _lang('Date') }}</label>
                                                    <input class="form-control datepicker" type="text" name="date"
                                                        placeholder="Date" required />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{ _lang('Received By') }}</label>
                                                    <select class="form-control" name="ledger_id" required>
                                                        {{ create_option('accounting_ledgers', 'id', 'ledger_name', old('ledger_id')) }}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    {{ __('Close') }}
                                </button>
                                <button type="submit" class="btn btn-success">
                                    {{ __('Collect') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@foreach ($collections as $collection)
    {{-- Modal Collect Payment For single invoice --}}
    <div class="container mt-5">
        <!-- Modal -->
        <div class="modal" id="payInvoiceModal{{ $collection->id }}" tabindex="-1"
            aria-labelledby="payInvoiceModal{{ $collection->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="payInvoiceModal{{ $collection->id }}Label">
                            {{ __('Collect Payment') }}
                        </h4>
                        <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('payslip.update.collection') }}" method="POST"
                        id="form-collect-payment-{{ $collection->id }}" autocomplete="off">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="modal-body col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="type" value="single">
                                            <input type="hidden" name="student_id"
                                                value="{{ $collection->student_id }}">
                                            <input type="hidden" name="attendance_fine"
                                                value="{{ $collection->attendance_fine }}">
                                            <input type="hidden" name="session_id"
                                                value="{{ $collection->session_id }}">
                                            <input type="hidden" name="collection_id"
                                                value="{{ $collection->id }}">
                                            <input type="hidden" name="id" value="{{ $collection->id }}">
                                            <div class="form-group">
                                                <label class="control-label">{{ _lang('Waiver Amount') }}</label>
                                                <input class="form-control" type="text" name="waiver"
                                                    placeholder="Waiver" value="0.00" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{ _lang('Payable') }}</label>
                                                <input class="form-control" type="text" name="total_payable"
                                                    placeholder="Total payable"
                                                    value="{{ $collection->total_payable }}" readonly
                                                    id="total_payable_{{ $collection->id }}" />
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">{{ _lang('Paid') }}</label>
                                                <input class="form-control" type="number" name="total_paid"
                                                    placeholder="Total paid" value="{{ $collection->total_paid }}"
                                                    id="total_paid_{{ $collection->id }}"
                                                    max="{{ $collection->total_payable }}" min="0"
                                                    oninput="updateTotalDue({{ $collection->id }})" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{ _lang('Due') }}</label>
                                                <input class="form-control" type="text" name="total_due"
                                                    placeholder="Total Due" value="{{ $collection->total_due }}"
                                                    id="total_due_{{ $collection->id }}" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">{{ _lang('Date') }}</label>
                                                <input class="form-control datepicker" type="text" name="date"
                                                    placeholder="Date" value="{{ $collection->invoice_date }}"
                                                    required />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{ _lang('Note') }}</label>
                                                <textarea class="form-control" type="text" name="note" placeholder="Enter if any Note">{{ $collection->note }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{ _lang('Received By') }}</label>
                                                <select class="form-control" name="ledger_id" required>
                                                    {{ create_option('accounting_ledgers', 'id', 'ledger_name', old('ledger_id')) }}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                {{ __('Close') }}
                            </button>
                            <button type="button" class="btn btn-success"
                                onclick="validateAmount({{ $collection->id }})">
                                {{ __('Collect') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@section('scripts')
    <script>
        function updateTotalDue(id) {
            var total_payable = $('#total_payable_' + id).val();
            var total_paid = $('#total_paid_' + id).val();
            var total_due = total_payable - total_paid;
            $('#total_due_' + id).val(total_due);
        }

        function validateAmount(id) {
            var total_payable = $('#total_payable_' + id).val();
            var total_paid = $('#total_paid_' + id).val();

            if (total_paid > total_payable) {
                // alert('Paid amount can not be greater than payable amount');
                swal("Paid amount can not be greater than payable amount", {
                    icon: "warning",
                });
                return false;
            } else if (total_paid < 1) { // Handle zero and negative amount validation.
                // alert('Paid amount can not be zero');
                swal("Please enter a valid Paid amount", {
                    icon: "warning",
                });
                return false;
            } else {
                // Now submit the form by id.
                $('#form-collect-payment-' + id).submit();
            }
        }

        // Select all checkbox
        $('#checkbox_all').click(function() {
            if ($(this).is(':checked')) {
                $('.checkbox').prop('checked', true);
            } else {
                $('.checkbox').prop('checked', false);
            }
        });
    </script>
@endsection
