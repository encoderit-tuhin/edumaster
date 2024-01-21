<table class="table table-bordered routine-table" id="classic_routine">
    <tbody>
        <tr>
            <td colspan="100" class="text-center">
                <span class="f-20">{{ __(get_option('school_name')) }}</span></br>
                <span class="f-18">{{ _lang('Class Routine') }}</span></br>
                <span class="f-18">{{ _lang('Class') }}: {{ __($class->class_name) }}</span> |
                <span class="f-18">{{ _lang('Section') }}:
                    {{ __($section->section_name) }}
                </span>
            </td>
        </tr>
        @foreach ($routine as $key => $data)
            <tr>
                <td>{{ __($key) }}</td>
                @php
                    $i = 1;
                    $j = 1;
                @endphp

                @foreach ($data as $field)
                    @if ($field->start_time > 0)
                        <td>
                            <strong>{{ $field->subject_name }}</strong>
                            </br>
                            {{ _lang('Teacher') }} - {{ isset($field->teacher) }}
                            </br>
                            {{ $field->start_time }} - {{ $field->end_time }}
                        </td>
                        @php($i++)
                    @endif

                    @if ($j == count($data))
                        @for ($l = $i; $l <= count($data); $l++)
                            <td>&nbsp;</br>&nbsp;</br>&nbsp;</td>
                        @endfor
                    @endif

                    @php($j++)
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
