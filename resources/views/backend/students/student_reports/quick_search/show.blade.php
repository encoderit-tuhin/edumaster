@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <p>Profile of <span class="text-danger">{{ $student->first_name }} {{ $student->last_name }}</span></p>
            </div>
            <div>
                <a href="{{ route('student-report.download', $student->student_id) }}">Download this profile as Pdf</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs setting-tab" id="myTabs">
                        <li class="active">
                            <a data-toggle="tab" href="#PROFILE" aria-expanded="true">{{ _lang('PROFILE') }}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#ATTENDANCE" aria-expanded="false">{{ _lang('ATTENDANCE') }}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#EXAM" aria-expanded="false">{{ _lang('EXAM') }}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#CLASSTEST" aria-expanded="false">{{ _lang('CLASS TEST') }}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#ROUTINE" aria-expanded="false">{{ _lang('ROUTINE') }}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#SUBJECT" aria-expanded="false">{{ _lang('SUBJECT') }}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#ACCOUNTS" aria-expanded="false">{{ _lang('ACCOUNTS') }}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#INVENTORY" aria-expanded="false">{{ _lang('INVENTORY') }}</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="PROFILE" class="tab-pane fade in active">
                            @include('backend.students.student_reports.quick_search.partials.profile')
                        </div>

                        <div id="ATTENDANCE" class="tab-pane fade">
                            @include('backend.students.student_reports.quick_search.partials.attendance')
                        </div>

                        <div id="EXAM" class="tab-pane fade">
                            @include('backend.students.student_reports.quick_search.partials.exam')
                        </div>

                        <div id="CLASSTEST" class="tab-pane fade">
                            @include('backend.students.student_reports.quick_search.partials.class_test')
                        </div>

                        <div id="ROUTINE" class="tab-pane fade">
                            @include('backend.students.student_reports.quick_search.partials.routine')
                        </div>

                        <div id="SUBJECT" class="tab-pane fade">
                            @include('backend.students.student_reports.quick_search.partials.subject')
                        </div>

                        <div id="ACCOUNTS" class="tab-pane fade">
                            @include('backend.students.student_reports.quick_search.partials.accounts')
                        </div>

                        <div id="INVENTORY" class="tab-pane fade">
                            @include('backend.students.student_reports.quick_search.partials.inventory')
                        </div>
                    </div>
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

    <script>
        function openTab(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.getElementById("defaultOpen").click();
    </script>
@endsection
