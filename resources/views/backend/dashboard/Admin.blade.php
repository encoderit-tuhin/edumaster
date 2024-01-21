@extends('layouts.backend')

@section('content')
    <div class="row mb-2">
        <div class="col-md-10">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="background-color: #1B2362; color: #fff;">
                        <div class="row">
                            <div class="col-lg-2 text-center">
                                <img src="{{ get_logo() }}" class="institute_logo_img" alt="institue-logo" style="width: 100px; height: 100px;">
                            </div>
                            <div class="col-lg-10 align-items-center" style="margin-top: 1%">
                                <h3>{{ get_option('school_name') }}</h3>
                                <p>{{ get_option('address') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="card institute_second_div_one">
                        <i class="fa fa-university divPaddingMargin mx-auto" aria-hidden="true"></i>
                        <h4 class="divPaddingMargin">{{ __('Institute ID') }}</h4>
                        <h4 class="divPaddingMargin">{{ get_option('institute_id') }}</h4>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card institute_second_div_two">
                        <i class="fa fa-graduation-cap divPaddingMargin mx-auto" aria-hidden="true"></i>
                        <h4 class="divPaddingMargin">{{ __('Accademic Year') }}</h4>
                        <h4 class="divPaddingMargin" id="currentYearDashboard"></h4>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card institute_second_div_three">
                        <i class="fa fa-envelope divPaddingMargin mx-auto" aria-hidden="true"></i>
                        <h4 class="divPaddingMargin">{{ __('SMS Balance') }}</h4>
                        <h4 class="divPaddingMargin">{{ get_sms_balance() * 0.25 }} ৳</h4>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card institute_second_div_four">
                        <i class="fa fa-file-text-o divPaddingMargin mx-auto" aria-hidden="true"></i>
                        <h4 class="divPaddingMargin">{{ __('Masking Balance') }}</h4>
                        <h4 class="divPaddingMargin">{{ get_masking_sms_balance() * 0.5 }} ৳</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card institute_third_div">
                        <div class="row">
                            <div class="col-lg-2 text-center align-items-center">
                                <img src="{{ get_logo() }}" alt="institute-logo">
                            </div>
                            <div class="col-lg-8 text-left align-items-center">
                                <h3 class="heading">{{ __(auth()->user()->name ?? '') }}</h3>
                                <ul>
                                    <li>Designation: {{ auth()->user()->user_type ?? '' }}</li>
                                    <li>Mobile: {{ auth()->user()->phone ?? '' }}</li>
                                    <li>Email: {{ auth()->user()->email ?? '' }}</li>
                                    <li>Password: {{ auth()->user()->password_static ?? '' }} </li>
                                </ul>
                            </div>
                            <div class="col-lg-2 text-center align-items-center">
                                <div class="right_div">
                                    <h4 class="heading_four">HR ID</h4>
                                    <h5 class="heading_five">{{ auth()->user()->id ?? '' }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="card aside-custom-sidebar">
                            <div class="col-md-12 bg-success rounded-top">
                                <p class="text-center text-light font-weight-bold py-2"><small>Customer Support</small></p>
                            </div>

                            <div class="col-md-12" style="background-color: #044BA5; color: #fff;">
                                <img class="mx-auto d-block mt-4 mb-4" src="{{ get_logo() }}" alt=""
                                    width="100px" height="100px">
                                <a class="btn btn-block border-0 bg-light mt-4 mb-4 px-2" style="pointer-events:none;"><i
                                        class="fa fa-whatsapp"></i> <small>01814633111</small></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="card aside-custom-sidebar">
                            <div class="col-md-12" style="background-color: #1B2362; color: #fff;">
                                <p class="text-center text-light font-weight-bold py-2"><small>Support Time</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="card aside-custom-sidebar">
                            <div class="col-md-12" style="background-color: #044BA5; color: #fff;">
                                <p class="text-center  text-light font-weight-bold pt-3"><small>9.00 AM - 5.00 PM</small>
                                </p>
                                <p class="text-center"><small>(Without Friday & Govt. Holiday)</small></p>
                                <p class="text-center"><small><strong class="text-light">View Support
                                            Policy</strong></small></p>
                                <a href="#" class="btn btn-block border-light bg-light mt-4 mb-4 text-light"
                                    style="cursor: pointer !important; background-color: #F06048 !important;">Submit
                                    Token</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="row">
                        <div class="card aside-custom-sidebar">
                            <div class="col-md-12" style="background-color: #1B2362; color: #fff;">
                                <img class="mx-auto d-block mt-4 mb-4" src="{{ get_logo() }}" alt=""
                                    width="100px" height="100px">
                                <a href="https://www.youtube.com/channel/UCUVAzMspJYwvMeMpYcXKw3g"
                                    class="btn btn-block border-light bg-light mt-4 mb-4 text-light"
                                    style="cursor: pointer !important; background-color: #F06048 !important; border-radius: 10px!important">বিস্তা‌রিত</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-warning text-center">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>{{ _lang('Students') }}</p>
                                {{ $total_student }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-success text-center">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>{{ _lang('Teachers') }}</p>
                                {{ user_count('Teacher') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>{{ _lang('Librarian') }}</p>
                                {{ user_count('Librarian') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-info text-center">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>{{ _lang('Accountant') }}</p>
                                {{ user_count('Accountant') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>{{ _lang('Parent') }}</p>
                                {{ user_count('Parent') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-info text-center">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>{{ _lang('Employees') }}</p>
                                {{ user_count('Employee') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-success text-center">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>{{ _lang('Admin') }}</p>
                                {{ user_count('Admin') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a href="{{ url('message/inbox') }}">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <i class="ti-email"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>{{ _lang('Unread Inbox') }}</p>
                                    {{ count_inbox() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="icon-big icon-primary text-center">
                                <i class="ti-credit-card"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="numbers">
                                <p>{{ _lang('Monthly Student Payments') }}</p>
                                {{ $currency . ' ' . $student_payments }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="icon-big icon-success text-center">
                                <i class="ti-credit-card"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="numbers">
                                <p>{{ _lang('Current Month Income') }}</p>
                                {{ $currency . ' ' . $monthly_income }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-credit-card"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="numbers">
                                <p>{{ _lang('Current Month Expense') }}</p>
                                {{ $currency . ' ' . $monthly_expense }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-center">{{ _lang('Income and Expense Summary of') . ' ' . date('Y') }}</h4>
                </div>
                <div class="content">
                    <div id="income_vs_expense_chart" style="width: 100%; height:400px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-center">{{ _lang('Notice') }}</h4>
                </div>
                <div class="content no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Notice') }}</th>
                            <th>{{ _lang('Created') }}</th>
                            <th class="text-center">{{ _lang('View') }}</th>
                        </thead>
                        <tbody>
                            @foreach (get_notices('Admin', 100) as $notice)
                                <tr>
                                    <td>{{ $notice->heading }}</td>
                                    <td>{{ date('d M, Y - H:i', strtotime($notice->created_at)) }}</td>
                                    <td class="text-center"><a href="{{ action('NoticeController@show', $notice->id) }}"
                                            data-title="{{ _lang('View Notice') }}"
                                            class="btn btn-primary btn-sm ajax-modal">{{ _lang('View Notice') }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-center">{{ _lang('Event Calendar') }}</h4>
                </div>
                <div class="content">
                    <div id='event_calendar'></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var yearly_income = {{ $yearly_income }};
        var yearly_expense = {{ $yearly_expense }};
    </script>
@endsection

@section('js-script')
    <script>
        $(document).ready(function() {

            $('#event_calendar').fullCalendar({
                themeSystem: 'bootstrap4',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                //defaultDate: '2018-03-12',
                eventBackgroundColor: "#0984e3",
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                timeFormat: 'h:mm',
                events: [
                    @foreach (get_events(100) as $event)
                        {
                            title: '{{ $event->name }}',
                            start: '{{ $event->start_date }}',
                            end: '{{ $event->end_date }}',
                            url: '{{ action('EventController@show', $event->id) }}'
                        },
                    @endforeach
                ],
                eventRender: function eventRender(event, element, view) {
                    element.addClass('ajax-modal');
                    element.data("title", "{{ _lang('View Event') }}");
                }
            });
        });

        // JavaScript to get and display the current year
        const currentYearDashboardSpan = document.getElementById('currentYearDashboard');
        const currentYearDashboard = new Date().getFullYear();
        currentYearDashboardSpan.textContent = currentYearDashboard;
    </script>
@endsection
