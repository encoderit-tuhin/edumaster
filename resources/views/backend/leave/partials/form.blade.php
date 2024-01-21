<form action="{{ $formAction }}" method="post" autocomplete="off" class="form-horizontal validate"
    enctype="multipart/form-data">
    @csrf
    {{ $methodField }}


    <div class="form-group">
        <label class="col-sm-3 control-label">{{ _lang('Leave Type') }}</label>
        <div class="col-sm-9">
            <select class="form-control  select2" name="student_id">
                <option value="">{{ _lang('--Select--') }}</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}"
                        {{ isset($leave->student_id) && intval($leave->student_id) === intval($student->id) ? 'selected' : '' }}>
                        {{ $student->first_name }} {{ $student->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">{{ _lang('From Date') }}</label>
        <div class="col-sm-9">
            <input type="text" class="form-control datepicker" name="from_date" id='from-date'
                value="{{ $leave->from_date ?? old('from_date') }}" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">{{ _lang('To Date') }}</label>
        <div class="col-sm-9">
            <input type="text" class="form-control datepicker" name="to_date" id='to-date'
                value="{{ $leave->to_date ?? old('to_date') }}" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">{{ _lang('Reason') }}</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="reason" value="{{ $leave->reason ?? old('reason') }}"
                required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">{{ _lang('Leave Type') }}</label>
        <div class="col-sm-9">
            <select class="form-control  select2" name="leave_type">
                <option value="">{{ _lang('--Select--') }}</option>
                @foreach ($leaveTypes as $type)
                    <option value="{{ $type->id }}"
                        {{ isset($leave->leave_type) && intval($leave->leave_type) === intval($type->id) ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    @if (!is_null($leavesStatuses) && is_array($leavesStatuses))
        <div class="form-group">
            <label class="col-sm-3 control-label">{{ _lang('Leave Status') }}</label>
            <div class="col-sm-9">
                <select class="form-control select2" name="status">
                    @foreach ($leavesStatuses as $leaveStatusKey => $leaveStatus)
                        <option value="{{ $leaveStatusKey }}"
                            {{ isset($leave->status) && $leave->status === $leaveStatusKey ? 'selected' : '' }}>
                            {{ $leaveStatus }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-info">
                {{ __('Submit') }}
            </button>
        </div>
    </div>
</form>
