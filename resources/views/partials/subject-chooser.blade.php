<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th colspan="6">{{ __('Compulsory') }}</th>
            <th>{{ __('Optional') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($compulsory_subjects as $compulsory_subject)
                <th>{{ $compulsory_subject->subject_name ?? '--' }}</th>
            @endforeach

            <th>
                {!! generate_select(
                    'elective_subject',
                    $elective_or_optional_subjects->pluck('subject_name', 'id')->toArray(),
                    null,
                    get_old_value($student, 'elective_subject'),
                    true,
                    __('--Select--'),
                    'form-control',
                    'elective_subject',
                    'setElectiveSubjectCode(this.options[this.selectedIndex].value)'
                ) !!}
            </th>
            <th>
                {!! generate_select(
                    'optional_subject',
                    $elective_or_optional_subjects->pluck('subject_name', 'id')->toArray(),
                    null,
                    get_old_value($student, 'optional_subject'),
                    true,
                    __('--Select--'),
                    'form-control',
                    'optional_subject',
                    'setOptionalSubjectCode(this.options[this.selectedIndex].value)'
                ) !!}
            </th>
        </tr>
        <tr>
            @foreach ($compulsory_subjects as $compulsory_subject)
                <td>{{ $compulsory_subject->subject_code ?? '--' }}</td>
            @endforeach
            <td>
                <span id="elective_subject_code">
                    {{ $student->electiveSubject->subject_code ?? '--' }}
                </span>
            </td>
            <td>
                <span id="optional_subject_code">
                    {{ $student->optionalSubject->subject_code ?? '--' }}
                </span>
            </td>
        </tr>
    </tbody>
</table>


<script>
    function setElectiveSubjectCode(id) {
        const electiveSubjectCode = JSON.parse(`{!! $elective_or_optional_subjects->pluck('subject_code', 'id') !!}`);
        document.getElementById("elective_subject_code").innerHTML = electiveSubjectCode[id];
    }

    function setOptionalSubjectCode(id) {
        const optionalSubjectCode = JSON.parse(`{!! $elective_or_optional_subjects->pluck('subject_code', 'id') !!}`);
        document.getElementById("optional_subject_code").innerHTML = optionalSubjectCode[id];
    }
</script>