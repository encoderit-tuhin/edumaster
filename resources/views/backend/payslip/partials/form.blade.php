<div class="col-lg-4" id="payslip-{{ $type }}-form">
    <div class="card card-header text-white" style="background-color: rgb(136, 169, 214)">
        <b>
            {{ __('Generate') }} {{ ucfirst($type) }} {{ __('Wise Payslip') }}
        </b>
    </div>
    <div class="card card-body">
        <form method="post" class="validate" autocomplete="off" action="{{ route('payslip.store') }}">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}">
            <div class="col-md-12">
                <div class="form-group">
                    {!! generate_select(
                        'session_id',
                        App\AcademicYear::get()->pluck('session', 'id'),
                        __('Academic Year'),
                        old('session_id'),
                        true,
                        __('--Select--'),
                        'form-control select2',
                    ) !!}
                </div>
                @if ($type === 'class')
                    <div class="form-group">
                        {!! generate_select(
                            'class_id',
                            App\ClassModel::get()->pluck('class_name', 'id'),
                            __('Class'),
                            old('class_id'),
                            true,
                            __('--Select--'),
                            'form-control select2',
                        ) !!}
                    </div>
                @elseif ($type === 'section')
                    <div class="form-group">
                        {!! generate_select(
                            'section_id',
                            App\Section::get()->pluck('section_name', 'id'),
                            __('Section'),
                            old('section_id'),
                            true,
                            __('--Select--'),
                            'form-control select2',
                        ) !!}
                    </div>
                @elseif ($type === 'student')
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Student ID') }}</label>
                        <input class="form-control" type="text" name="student_id" required>
                    </div>
                @endif
                <div class="form-group">
                    {!! generate_select(
                        'fee_head_id',
                        App\FeeHead::get()->pluck('name', 'id'),
                        __('Fee Head'),
                        old('fee_head_id'),
                        true,
                        __('--Select--'),
                        'form-control select2',
                    ) !!}
                </div>
                <div class="form-group">
                    {!! generate_select(
                        'fee_sub_head_ids',
                        App\FeeSubHead::get()->pluck('name', 'id'),
                        __('Fee Sub Heads'),
                        old('fee_sub_head_ids'),
                        true,
                        __('--Select--'),
                        'form-control select2',
                        null,
                        null,
                        true,
                        true,
                    ) !!}
                </div>

                <div class="form-group">
                    <div class="checkbox-inline">
                        <label>
                            <input type="checkbox" name="previous_due" value="1" />
                            {{ __('Previous Due') }}
                        </label>
                    </div>
                    <div class="checkbox-inline">
                        <label>
                            <input type="checkbox" name="attendance_fine" />
                            {{ __('Attendance fine') }}
                        </label>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('Are you sure to process? Payslip will be generated for selected {{ $type !== 'student' ? $type . ' students' : $type }}.')"
                    >
                        {{ _lang('Process') }} &nbsp;
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
