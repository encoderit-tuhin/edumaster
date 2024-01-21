@extends('layouts.backend')
<style>
    .payroll_salary_input {
        width: 100px !important;
        border: none !important;
    }

    .editable-input {
        border: 1px solid #3498db;
        background-color: #fff;
        color: #333;
    }

    .readonly-input {
        border: none;
        background-color: transparent;
        color: #777;
    }

    .table th {
        width: 90px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Salary Payment') }}</span>
                </div>

                <div class="panel-body">
                    <div class="row" style="margin-bottom: 15px; margin-left: 0px;">
                        <form method="POST" action="{{ route('salary.payment-process.search') }}">
                            @csrf
                            <div class="col-md-2">
                                <select class="form-control" name="year">
                                    <option value="">--Select Year--</option>
                                    <option {{ isset($year) && $year == '2020' ? 'selected' : '' }} value="2020">2020
                                    </option>
                                    <option {{ isset($year) && $year == '2021' ? 'selected' : '' }} value="2021">2021
                                    </option>
                                    <option {{ isset($year) && $year == '2022' ? 'selected' : '' }} value="2022">2022
                                    </option>
                                    <option {{ isset($year) && $year == '2023' ? 'selected' : '' }} value="2023">2023
                                    </option>
                                    <option {{ isset($year) && $year == '2024' ? 'selected' : '' }} value="2024">2024
                                    </option>
                                    <option {{ isset($year) && $year == '2025' ? 'selected' : '' }} value="2025">2025
                                    </option>
                                    <option {{ isset($year) && $year == '2026' ? 'selected' : '' }} value="2026">2026
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select class="form-control select2" name="month">
                                    <option value="">--Select Month--</option>
                                    <option {{ isset($month) && $month == '1' ? 'selected' : '' }} value="1">Jan
                                    </option>
                                    <option {{ isset($month) && $month == '2' ? 'selected' : '' }} value="2">Feb
                                    </option>
                                    <option {{ isset($month) && $month == '3' ? 'selected' : '' }} value="3">Mar
                                    </option>
                                    <option {{ isset($month) && $month == '4' ? 'selected' : '' }} value="4">Apr
                                    </option>
                                    <option {{ isset($month) && $month == '5' ? 'selected' : '' }} value="5">May
                                    </option>
                                    <option {{ isset($month) && $month == '6' ? 'selected' : '' }} value="6">Jun
                                    </option>
                                    <option {{ isset($month) && $month == '7' ? 'selected' : '' }} value="7">Jul
                                    </option>
                                    <option {{ isset($month) && $month == '8' ? 'selected' : '' }} value="8">Aug
                                    </option>
                                    <option {{ isset($month) && $month == '9' ? 'selected' : '' }} value="9">Sep
                                    </option>
                                    <option {{ isset($month) && $month == '10' ? 'selected' : '' }} value="10">Oct
                                    </option>
                                    <option {{ isset($month) && $month == '11' ? 'selected' : '' }} value="11">Nov
                                    </option>
                                    <option {{ isset($month) && $month == '12' ? 'selected' : '' }} value="12">Dec
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success">{{ __('Search') }}</button>
                            </div>
                        </form>
                    </div>

                    @if (isset($year) && isset($month))
                        <form method="POST" action="{{ route('salary.payment-process.create') }}" id="salary-form"
                            style="font-size: 10px !important;">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <input type="hidden" name="year" value="{{ $year }}">
                                    <input type="hidden" name="month" value="{{ $month }}">
                                    <thead>
                                        <th style="width: 90px;">
                                            <input type="checkbox" id="select-all">
                                        </th>
                                        <th style="width: 90px;">{{ _lang('Name') }}</th>
                                        <th>{{ _lang('Designation') }}</th>

                                        @foreach ($salaryHeads as $salaryHead)
                                            <th>{{ __($salaryHead->name) }}
                                                ({{ $salaryHead->type == 'Addition' ? '+' : ($salaryHead->type == 'Deduction' ? '-' : '') }})
                                            </th>
                                        @endforeach

                                        <th>
                                            {{ _lang('Due') }}
                                        </th>

                                        <th>{{ _lang('Net Salary') }}</th>

                                        <th>
                                            {{ _lang('Payable') }}
                                        </th>

                                        <th>
                                            {{ _lang('Paid') }}
                                        </th>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user)
                                            @if (isset($user->userPayroll) && $user->userPayroll)
                                                @if (isset($user->payslipSalary) && $user->payslipSalary)
                                                    @foreach ($user->payslipSalary as $payslipSalary)
                                                        @if ($payslipSalary->year == $year && $payslipSalary->month == $month && $payslipSalary->is_paid !== '1')
                                                            <tr>
                                                                <td style="width: 90px;">
                                                                    <input type="checkbox" class="salary-checkbox"
                                                                        name="user_id[]" value="{{ $user->id }}">
                                                                </td>

                                                                <td>{{ $user->name }}</td>

                                                                <td>{{ $user->user_type }}</td>

                                                                @php
                                                                    $userPayrollId = $user->userPayroll->id;
                                                                    $userSalaryHeadUserPayrolls = array_filter($salaryHeadUserPayrolls, function ($item) use ($userPayrollId) {
                                                                        return $item->user_payroll_id === $userPayrollId;
                                                                    });
                                                                @endphp

                                                                @foreach ($userSalaryHeadUserPayrolls as $payrollSalaryHead)
                                                                    <td>
                                                                        <input class="payroll_salary_input readonly-input"
                                                                            value="{{ $payrollSalaryHead->amount }}"
                                                                            readonly />
                                                                    </td>
                                                                @endforeach

                                                                @php
                                                                    $duAmount = 0;
                                                                    $payableAmount = 0;
                                                                    $duAmount = $user->userPayroll->current_due - $user->userPayroll->current_advance;
                                                                    $payableAmount = $user->userPayroll->net_salary + $duAmount;
                                                                @endphp

                                                                <td>
                                                                    <input name="due[]"
                                                                        class="payroll_salary_input readonly-input"
                                                                        value="{{ $duAmount ?? 0 }}" readonly>
                                                                </td>

                                                                <td>
                                                                    <input class="payroll_salary_input readonly-input"
                                                                        name="net_salary[]"
                                                                        value="{{ $user->userPayroll->net_salary ?? 0 }}"
                                                                        readonly>
                                                                </td>

                                                                <td>
                                                                    <input name="payable[]"
                                                                        class="payroll_salary_input readonly-input"
                                                                        value="{{ $payableAmount ?? 0 }}" readonly>
                                                                </td>

                                                                <td>
                                                                    <input name="paid_amount[]"
                                                                        class="payroll_salary_input readonly-input"
                                                                        value="0" max="{{ $payableAmount ?? 0 }}">
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="float: right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    {{ __('Process') }}</button>

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    {{ __('Delete') }}
                                </button>

                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                    {{ __('Download PDF') }}</button>
                            </div>

                            <div style="clear: both;"></div>

                        </form>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        $(document).ready(function() {
            $("#select-all").click(function() {
                var isChecked = $(this).prop("checked");
                $(".salary-checkbox").prop("checked", isChecked);
            });

            $(".salary-checkbox").click(function() {
                var allChecked = $(".salary-checkbox:checked").length === $(".salary-checkbox").length;
                $("#select-all").prop("checked", allChecked);
            });

            var form = document.getElementById('salary-form');
            form.addEventListener('submit', function(event) {
                var atLeastOneChecked = [...document.querySelectorAll('.salary-checkbox')].some(
                    checkbox => checkbox.checked);
                if (!atLeastOneChecked) {
                    event.preventDefault();
                    alert('Please select at least one salary.');
                }
            });
        });
    </script>
@endsection
