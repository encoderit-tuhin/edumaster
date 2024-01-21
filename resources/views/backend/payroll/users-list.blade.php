@extends('layouts.backend')
<style>
    .payroll_salary_input {
        width: 100px !important;
        border: none !important;
    }

    .editable-input {
        border: 1px solid #3498db;
        background-color: #ecafaf;
        color: #333;
    }

    .readonly-input {
        border: none;
        background-color: transparent;
        color: #777;
    }

    .readonly-input-net-salary {
        border: none;
        background-color: transparent;
        color: #777;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ _lang('Payroll Assign HR List') }}</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('payroll.assign.create') }}" id="payroll-form">
                        @csrf

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th>
                                        {{-- <input type="checkbox" id="select-all"> --}}
                                    </th>
                                    <th>{{ _lang('Name') }}</th>
                                    <th>{{ _lang('Designation') }}</th>
                                    <th>{{ _lang('Net Salary') }}</th>
                                    @foreach ($salaryHeads as $salaryHead)
                                        <th>{{ __($salaryHead->name) }}
                                            ({{ $salaryHead->type == 'Addition' ? '+' : ($salaryHead->type == 'Deduction' ? '-' : '') }})
                                        </th>
                                    @endforeach
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                        @if (isset($user->userPayroll) && $user->userPayroll)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="payroll-checkbox" value="">
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->user_type }}</td>
                                                <td>
                                                    <input class="payroll_salary_input readonly-input-net-salary"
                                                        value="{{ $user->userPayroll->net_salary ?? 0 }}" disabled>
                                                </td>

                                                @php
                                                    $userPayrollId = $user->userPayroll->id;
                                                    $userSalaryHeadUserPayrolls = array_filter($salaryHeadUserPayrolls, function ($item) use ($userPayrollId) {
                                                        return $item->user_payroll_id === $userPayrollId;
                                                    });
                                                @endphp

                                                @foreach ($userSalaryHeadUserPayrolls as $payrollSalaryHead)
                                                    <td>
                                                        <input class="payroll_salary_input readonly-input"
                                                            name="payroll_heads[{{ $payrollSalaryHead->user_payroll_id }}][{{ $payrollSalaryHead->id }}]"
                                                            value="{{ $payrollSalaryHead->amount }}" readonly />
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin-left: 1%">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        $(document).ready(function() {
            $('.payroll-checkbox').click(function() {
                var isChecked = $(this).prop('checked');
                var inputFields = $(this).closest('tr').find('.payroll_salary_input');
                inputFields.prop('readonly', !isChecked);
                if (isChecked) {
                    inputFields.removeClass('readonly-input').addClass('editable-input');
                } else {
                    inputFields.removeClass('editable-input').addClass('readonly-input');
                }
            });
        });
    </script>
@endsection
