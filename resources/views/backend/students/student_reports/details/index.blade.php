@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab" id="myTabs">
                <li class="active">
                    <a data-toggle="tab" href="#CLASSWISE" aria-expanded="true">{{ _lang('CLASS WISE') }}</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#SECTIONWISE" aria-expanded="false">{{ _lang('SECTION WISE') }}</a>
                </li>

                <li class="">
                    <a data-toggle="tab" href="#GROUPWISE" aria-expanded="false">{{ _lang('GROUP WISE') }}</a>
                </li>

                <li class="">
                    <a data-toggle="tab" href="#CATEGORYWISE" aria-expanded="false">{{ _lang('CATEGORY WISE') }}</a>
                </li>

                <li class="">
                    <a data-toggle="tab" href="#SECTIONCATEGORYWISE"
                        aria-expanded="false">{{ _lang('SECTION CATEGORY WISE') }}</a>
                </li>

                <li class="">
                    <a data-toggle="tab" href="#AGEWISE" aria-expanded="false">{{ _lang('AGE WISE') }}</a>
                </li>

                <li class="">
                    <a data-toggle="tab" href="#GENDERWISE" aria-expanded="false">{{ _lang('GENDER WISE') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="CLASSWISE" class="tab-pane fade in active">
                    @include('backend.students.student_reports.details.partials.class_wise')
                </div>

                <div id="SECTIONWISE" class="tab-pane fade">
                    @include('backend.students.student_reports.details.partials.section_wise')
                </div>

                <div id="GROUPWISE" class="tab-pane fade">
                    @include('backend.students.student_reports.details.partials.group_wise')
                </div>

                <div id="CATEGORYWISE" class="tab-pane fade">
                    @include('backend.students.student_reports.details.partials.category_wise')
                </div>

                <div id="SECTIONCATEGORYWISE" class="tab-pane fade">
                    @include('backend.students.student_reports.details.partials.section_category_wise')
                </div>

                <div id="AGEWISE" class="tab-pane fade">
                    @include('backend.students.student_reports.details.partials.age_wise')
                </div>

                <div id="GENDERWISE" class="tab-pane fade">
                    @include('backend.students.student_reports.details.partials.gender_wise')
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
