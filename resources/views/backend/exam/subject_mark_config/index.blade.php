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
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>{{ _lang('SL') }}</th>
                                <th>{{ _lang('Exam Name') }}</th>
                                <th>{{ _lang('Exam Start At	') }}</th>
                                <th>{{ _lang('Class') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($examSubjectMarkConfigs as $exam)
                                <tr>
                                    <td class='exam_name'>{{ $loop->iteration }}</td>
                                    <td class='exam_name'>
                                        @foreach ($allExams as $examName)
                                            @if ($examName->id == $exam->exam_id)
                                                {{$examName->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class='date_time'>
                                        @php
                                            $dateTime =  $exam->date_time;
                                            $formatDateTime = \Carbon\Carbon::parse($dateTime)->format('Y-m-d h:i A');
                                        @endphp
                                            {{ $formatDateTime }}
                                    </td>
                                    <td class='class'>
                                        @foreach ($allclasses as $className)
                                            @if ($className->id == $exam->class_id)
                                                {{$className->class_name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class='action'><a href="{{ route('exams.all-exams-id', ['exam_id' => $exam->exam_id, 'class_id' => $exam->class_id]) }}"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
