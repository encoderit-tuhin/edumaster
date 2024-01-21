@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default no-export">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('Exam Mark Configurations') }}
                    </span>
                </div>

                <div class="panel-body">
                    <div class="row p-1">
                        <div class="col-md-3">
                            <p class="font-weight-bold">Exam Name</p>
                        </div>
                        <div class="col-md-3">
                            <p>
                                {{ $allExam->name }}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p class="font-weight-bold">Exam Start At</p>
                        </div>
                        <div class="col-md-3">
                            <p>
                                @php
                                    $dateTime = $allExam->date_time;
                                    $formatDateTime = \Carbon\Carbon::parse($dateTime)->format('Y-m-d h:i A');
                                @endphp
                                {{ $formatDateTime }}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p class="font-weight-bold">Exam Code</p>
                        </div>
                        <div class="col-md-3">
                            <p>
                                {{ $allExam->exam_code }}
                            </p>
                        </div>

                    </div>
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>{{ _lang('SL') }}</th>
                                <th>{{ _lang('Subject Name') }}</th>
                                <th>{{ _lang('Objective') }}</th>
                                <th>{{ _lang('OPM') }}</th>
                                <th>{{ _lang('Written') }}</th>
                                <th>{{ _lang('WPM') }}</th>
                                <th>{{ _lang('Practical') }}</th>
                                <th>{{ _lang('PPM') }}</th>
                                <th>{{ _lang('Total') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($examSubjectMarkConfigs as $exam)
                                <tr>
                                    <td class='iteration'>{{ $loop->iteration }}</td>
                                    <td class='subject_name'>
                                        @foreach ($subjects as $subject)
                                            @if ($subject->id == $exam->subject_id)
                                                {{ $subject->subject_name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class='objective'>{{ $exam->objective }}</td>
                                    <td class='opm'>{{ $exam->opm }}</td>
                                    <td class='written'>{{ $exam->written }}</td>
                                    <td class='wpm'>{{ $exam->wpm }}</td>
                                    <td class='practical'>{{ $exam->practical }}</td>
                                    <td class='ppm'>{{ $exam->ppm }}</td>
                                    <td class='total'>{{ $exam->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
