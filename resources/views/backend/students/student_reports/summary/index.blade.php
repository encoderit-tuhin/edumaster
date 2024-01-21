@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab" id="myTabs">
                <li class="active">
                    <a data-toggle="tab" href="#TOTALSTUDENTS" aria-expanded="true">{{ _lang('TOTAL STUDENTS') }}</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#GENDERINFO" aria-expanded="false">{{ _lang('GENDER INFO') }}</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#RELIGIONINFO" aria-expanded="false">{{ _lang('RELIGION INFO') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="TOTALSTUDENTS" class="tab-pane fade in active">
                    @include('backend.students.student_reports.summary.partials.total_students')
                </div>

                <div id="GENDERINFO" class="tab-pane fade">
                    @include('backend.students.student_reports.summary.partials.gender_info')
                </div>

                <div id="RELIGIONINFO" class="tab-pane fade">
                    @include('backend.students.student_reports.summary.partials.religion_info')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        $(document).ready(function() {
            // Retrieve the active tab from local storage
            var activeTab = localStorage.getItem('activeTab');

            // If there is an active tab, switch to it
            if (activeTab) {
                $('#myTabs a[href="#' + activeTab + '"]').tab('show');
            }

            // Handle tab click event
            $('#myTabs a').on('shown.bs.tab', function(e) {
                // Get the href of the clicked tab
                var activeTab = $(e.target).attr('href').substr(1);

                // Store the active tab in local storage
                localStorage.setItem('activeTab', activeTab);
            });
        });
    </script>
@endsection
