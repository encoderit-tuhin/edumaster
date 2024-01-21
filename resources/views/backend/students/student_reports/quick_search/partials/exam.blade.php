 <div class="panel panel-default">
     <div class="panel-body">
         @include('backend.students.student_reports.quick_search.partials.student_info')


         @if (isset($exams) && isset($subjects))
             <div class="row">
                 <div class="col-lg-12">
                     <table class="table table-bordered report-card">
                         <thead>
                             <tr>
                                 <th rowspan="2">{{ _lang('Subject') }}</th>
                                 @foreach ($exams as $exam)
                                     <th colspan="{{ count($mark_head) }}" style="background:#bdc3c7;text-align:center">
                                         <b>{{ $exam->name }}</b>
                                     </th>
                                 @endforeach
                                 <th rowspan="2">{{ _lang('Total') }}</th>
                                 <th rowspan="2">{{ _lang('Grade') }}</th>
                                 <th rowspan="2">{{ _lang('Point') }}</th>
                             </tr>

                             <tr>
                                 @foreach ($exams as $exam)
                                     @foreach ($mark_head as $mh)
                                         <th style="background:#bdc3c7">{{ $mh->mark_type }}</th>
                                     @endforeach
                                 @endforeach
                             </tr>
                         </thead>
                         <tbody>
                             @php $total = 0; @endphp
                             @php $total_subject = 0; @endphp

                             @foreach ($subjects as $subject)
                                 @php $row_total=0; @endphp
                                 @php $point=0; @endphp
                                 @php $grade=0; @endphp
                                 <tr>
                                     <td>{{ $subject->subject_name }}</td>
                                     @foreach ($exams as $exam)
                                         @foreach ($mark_details[$subject->id][$exam->exam_id] ?? [] as $md)
                                             @php
                                                 $row_total = $row_total + $md->mark_value;
                                                 $point = get_point($row_total);
                                                 $grade = get_grade($row_total);
                                             @endphp
                                             <td style="text-align:center">{{ $md->mark_value }}</td>
                                         @endforeach
                                         @php $total_subject = count($exams)  @endphp
                                     @endforeach
                                     <td colspan="2"></td>
                                     <td>{{ $row_total }}</td>
                                     <td>{{ $grade }}</td>
                                     <td>{{ $point }}</td>
                                 </tr>
                                 @php $total = $total + $row_total; @endphp
                             @endforeach
                             <tr>
                                 <td colspan="100%" style="text-align:center">
                                     <h5>{!! _lang('Total Marks') . ' : <b>' . $total . '</b>' !!}</h5>
                                 </td>
                             </tr>

                             <tr>
                                 <td colspan="100%" style="text-align:center">
                                     <h5>{!! _lang('Average Marks') .
                                         ' : <b>' .
                                         ($total_subject != 0 ? number_format($total / $total_subject, 2) : 'N/A') .
                                         '</b>' !!}</h5>

                                 </td>
                             </tr>

                             <tr>
                                 <td colspan="100%" style="text-align:center">
                                     <h5>{!! _lang('Average Marks') .
                                         ' : <b>' .
                                         ($total_subject != 0 ? get_point($total / $total_subject) : 'N/A') .
                                         '</b>' !!} </h5>
                                 </td>
                             </tr>

                             <tr>
                                 <td colspan="100%" style="text-align:center">
                                     <h5>{!! _lang('Average Marks') .
                                         ' : <b>' .
                                         ($total_subject != 0 ? get_grade($total / $total_subject) : 'N/A') .
                                         '</b>' !!}</h5>
                                 </td>
                             </tr>

                         </tbody>
                     </table>
                 </div>
             </div>
         @endif

     </div>
 </div>
