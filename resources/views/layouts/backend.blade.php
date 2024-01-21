<!doctype html>
<html lang="{{ app()->getLocale() }}">

@php
    // get asset_version from version.json file in root directory
    try {
        $version = json_decode(file_get_contents(base_path('version.json')), true);
    } catch (\Throwable $th) {
        //throw $th;
    } finally {
        $asset_version = isset($version['asset_version']) ? $version['asset_version'] : time();
    }
@endphp

<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('uploads') }}/images/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('uploads') }}/images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ get_option('site_title') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    {{-- Bootstrap-5 --}}
    <link href="{{ asset('backend') }}/css/bootstrap5.min.css" rel="stylesheet" />

    <!-- TODO: Upgrade to Bootstrap-5     -->
    <link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Datatable core CSS     -->
    <link href="{{ asset('backend') }}/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="{{ asset('backend') }}/css/animate.min.css" rel="stylesheet" />
    <!-- bootstrap-datepicker library -->
    <link href="{{ asset('backend') }}/css/bootstrap-datepicker.css" rel="stylesheet" />
    <!-- Select 2 library -->
    <link href="{{ asset('backend') }}/css/select2.css" rel="stylesheet" />
    <!-- Dropify library -->
    <link href="{{ asset('backend') }}/css/dropify.min.css" rel="stylesheet" />
    <!--  Quill editor    -->
    <link href="{{ asset('backend') }}/css/summernote.css" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link href="{{ asset('backend') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/fonts.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/themify-icons.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/toastr.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/nice-select.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/fullcalendar.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/metisMenu.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!--  Style CSS -->
    <link href="{{ asset('backend') }}/css/style.css?v={{ $asset_version }}" rel="stylesheet" />

    @yield('styles')

    @if (get_option('backend_direction') == 'rtl')
        <link href="{{ asset('backend') }}/css/RTL.css" rel="stylesheet" />
    @endif
    <script type="text/javascript">
        var direction = "{{ get_option('backend_direction') }}";
    </script>

    @include('layouts.css.dynamic_css')
    @viteReactRefresh
    @vite('resources/js/index.tsx')
</head>

<body>
    <!-- Main Modal -->
    <div id="main_modal" class="modal animated bounceInDown" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="modal-btn btn btn-danger btn-sm pull-right" data-dismiss="modal"><i
                            class="glyphicon glyphicon-remove-circle"></i> {{ _lang('Exit') }}</button>
                    <button type="button" id="modal-fullscreen" class="modal-btn btn btn-primary btn-sm pull-right"><i
                            class="glyphicon glyphicon-fullscreen"></i> {{ _lang('Full Screen') }}</button>
                    <h5 class="modal-title"></h5>
                </div>
                <div class="alert alert-danger" style="display:none; margin: 15px;"></div>
                <div class="alert alert-success" style="display:none; margin: 15px;"></div>
                <div class="modal-body" style="overflow:hidden;"></div>
            </div>

        </div>
    </div>

    <div id="preloader">
        <div class="bar"></div>
    </div>

    <div class="wrapper animated fadeIn">
        <div class="sidebar" data-background-color="white" data-active-color="danger">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="{{ route('dashboard') }}" class="simple-text">
                        {{ get_option('school_name') }}
                    </a>

                    <div class="institute_and_year_div">
                        <div class="institute_and_year_child_div div_one">
                            <h4 class="institute_div_heading">
                                Institute ID</h4>
                            <span class="institute_div_span">{{ get_option('institute_id') }}</span>
                        </div>
                        <div class="institute_and_year_child_div">
                            <h4 class="institute_div_heading">
                                Current Year</h4>
                            <span class="institute_div_span" id="currentYear"></span>
                        </div>
                    </div>
                </div>
                @include('layouts.menus.Admin')
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle mobile-nav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        {{-- <a class="navbar-brand" href="#">{{ _lang('Dashboard') }}</a> --}}
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right d-block">
                            <li>
                                <a href="{{ route('index') }}" target="_blank">
                                    <i class="ti-eye"></i>
                                    <p>{{ _lang('Visit Website') }}</p>
                                </a>
                            </li>
                            @if (Auth::user()->user_type == 'Admin')
                                <li>
                                    <select class="select_class" onchange="changeSession(this);"
                                        style="margin-top: 22px;">
                                        @foreach (get_table('academic_years') as $session)
                                            <option value="{{ $session->id }}"
                                                {{ $session->id == get_option('academic_year') ? 'selected' : '' }}>
                                                {{ _lang('Session') }} ({{ $session->year }})</option>
                                        @endforeach
                                    </select>
                                </li>
                            @endif

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p class="notification">{!! count_inbox() > 0 ? '<span class="notification-count">' . count_inbox() . '</span>' : '' !!}</p>
                                    <p>{{ _lang('Message') }}</p>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu notification-items">
                                    @foreach (inbox_items() as $message)
                                        <li><a class="ajax-modal"
                                                href="{{ url('message/inbox/' . $message->id) }}">{{ $message->subject }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-user"></i>
                                    <p>{{ _lang('Hi') . ', ' . Auth::user()->name }}</p>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('profile/my_profile') }}"
                                            data-title="{{ _lang('Profile') }}">{{ _lang('Profile') }}</a></li>
                                    <li><a href="{{ url('profile/edit') }}"
                                            data-title="{{ _lang('Edit Profile') }}">{{ _lang('Update Profile') }}</a>
                                    </li>
                                    <li><a href="{{ url('profile/changepassword') }}"
                                            data-title="{{ _lang('Change Password') }}">{{ _lang('Change Password') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    @if (!Request::is('dashboard'))
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ url('dashboard') }}">
                                    <i class="ti-home"></i> {{ _lang('Dashboard') }}
                                </a>
                            </li>

                            @php $segments = ''; @endphp
                            @foreach (Request::segments() as $segment)
                                @if ($segment == 'dashboard')
                                    @php continue; @endphp
                                @endif
                                @php $segments .= '/'.$segment; @endphp
                                <li>
                                    <a href="{{ url($segments) }}">{{ ucwords(str_replace('_', ' ', $segment)) }}</a>
                                </li>
                            @endforeach
                        </ol>
                    @endif

                    @yield('content')
                </div>
            </div>
            {{-- <div class="content bg-dark">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-center">@copy2023</p>
                    </div>
                </div>
            </div> --}}

            <footer class="footer-content">
                {{-- <section style="background-color: #000000; padding: 15px 0px; border-radius: 15px;"
                    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                        <span>
                            <strong class="text-light">Developed by
                                <a href="https://squartup.com" target="_blank">Squartup</a>
                            </strong>
                        </span>
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div>
                        <a style="font-size: 20px;" href="" class="me-4 text-reset">
                            <i class="fa fa-globe text-light"></i>
                        </a>
                        <a style="font-size: 20px;" href="" class="me-4 text-reset">
                            <i class="fa fa-facebook text-light"></i>
                        </a>
                        <a style="font-size: 20px;" href="" class="me-4 text-reset">
                            <i class="fa fa-linkedin text-light"></i>
                        </a>
                        <a style="font-size: 20px;" href="" class="me-4 text-reset">
                            <i class="fa fa-youtube text-light"></i>
                        </a>
                        <a style="font-size: 20px;" href="" class="me-4 text-reset">
                            <i class="fa fa-instagram text-light"></i>
                        </a>
                    </div>
                    <!-- Right -->
                </section> --}}
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script type="text/javascript" src="{{ asset('backend') }}/js/jquery.min.js"></script>

<script type="text/javascript" src="{{ asset('backend') }}/js/bootstrap.min.js"></script>
<!--  Charts Plugin -->
<script type="text/javascript" src="{{ asset('backend') }}/js/echarts.min.js"></script>
<!--  Notifications Plugin    -->
<script type="text/javascript" src="{{ asset('backend') }}/js/bootstrap-notify.js"></script>
<!--  DataTable Plugin    -->
<script type="text/javascript" src="{{ asset('backend') }}/js/jquery.dataTables.min.js"></script>
<!--  Select 2 Plugin    -->
<script type="text/javascript" src="{{ asset('backend') }}/js/select2.min.js"></script>
<!--  jQuery Validation   -->
<script type="text/javascript" src="{{ asset('backend') }}/js/jquery.validate.min.js"></script>
<!--  Bootstrap Datepicker  -->
<script type="text/javascript" src="{{ asset('backend') }}/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="{{ asset('backend') }}/js/jquery.mask.min.js"></script>
<!--  Summernote editor    -->
<script type="text/javascript" src="{{ asset('backend') }}/js/summernote.js"></script>
<!--  Dropify  -->
<script type="text/javascript" src="{{ asset('backend') }}/js/dropify.min.js"></script>
<script type="text/javascript" src="{{ asset('backend') }}/js/toastr.js"></script>
<script type="text/javascript" src="{{ asset('backend') }}/js/jquery.nice-select.min.js"></script>
<script type="text/javascript" src="{{ asset('backend') }}/js/print.js"></script>
<script type="text/javascript" src="{{ asset('backend') }}/js/jquery.nestable.js"></script>

<script src="{{ asset('backend') }}/js/metisMenu.min.js"></script>
<script src="{{ asset('backend') }}/js/moment.min.js"></script>
<script src="{{ asset('backend') }}/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="{{ asset('backend') }}/js/fullcalendar.min.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script type="text/javascript" src="{{ asset('backend') }}/js/script.js?v={{ $asset_version }}"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->

<script type="text/javascript" src="{{ asset('backend') }}/js/dashboard.js?v={{ $asset_version }}"></script>
<script type="text/javascript" src="{{ asset('backend') }}/js/custom.js?v={{ $asset_version }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- JS -->
@yield('js-script')
@yield('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        // JavaScript to get and display the current year
        const currentYearSpan = document.getElementById('currentYear');
        const currentYear = new Date().getFullYear();
        currentYearSpan.textContent = currentYear;

        // @if (Request::is('dashboard') && \Auth::user()->user_type == 'Admin')
        //     dashboard.admin_init();
        // @elseif (Request::is('dashboard') && \Auth::user()->user_type == 'Accountant')
        //     dashboard.accountant_init();
        // @elseif (!Request::is('dashboard'))
        //     $(".navbar-brand").html($(".title").html());
        //     $(".navbar-brand").html($(".panel-title").html());
        //     $("#last_link").html($(".navbar-brand").html());
        // @endif

        $(".data-table").DataTable({
            responsive: true,
            "bAutoWidth": false,
            "ordering": false,
            "pageLength": 20,
            "language": {
                "decimal": "",
                "emptyTable": "{{ _lang('No Data Found') }}",
                "info": "{{ _lang('Showing') }} _START_ {{ _lang('to') }} _END_ {{ _lang('of') }} _TOTAL_ {{ _lang('Entries') }}",
                "infoEmpty": "{{ _lang('Showing 0 To 0 Of 0 Entries') }}",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "{{ _lang('Show') }} _MENU_ {{ _lang('Entries') }}",
                "loadingRecords": "{{ _lang('Loading...') }}",
                "processing": "{{ _lang('Processing...') }}",
                "search": "{{ _lang('Search') }}",
                "zeroRecords": "{{ _lang('No matching records found') }}",
                "paginate": {
                    "first": "{{ _lang('First') }}",
                    "last": "{{ _lang('Last') }}",
                    "next": "{{ _lang('Next') }}",
                    "previous": "{{ _lang('Previous') }}"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            },
            dom: 'Blfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });

        //Show Success Message
        @if (Session::has('success'))
            Command: toastr["success"]("{{ session('success') }}")
        @endif

        //Show Single Error Message
        @if (Session::has('error'))
            Command: toastr["error"]("{{ session('error') }}")
        @endif


        <?php $i = 0; ?>

        @foreach ($errors->all() as $error)
            Command: toastr["error"]("{{ $error }}");

            var name = "{{ $errors->keys()[$i] }}";

            $("input[name='" + name + "']").addClass('error');
            $("select[name='" + name + "'] + span").addClass('error');

            $("input[name='" + name + "'], select[name='" + name + "']").parent().append(
                "<span class='v-error'>{{ $error }}</span>");

            <?php $i++; ?>
        @endforeach

    });

    function changeSession(elem) {
        if ($(elem).val() == "") {
            return;
        }
        // window.location = "<?php echo url('administration/change_session'); ?>/" + $(elem).val();
    }

    $("#menu li").each(function() {
        var elem = $(this);
        if ($(elem).has("ul").length > 0) {
            if ($(elem).find("ul").has("li").length === 0) {
                $(elem).remove();
            }
        }
    });


    if ($(".notification-items").has("li").length === 0) {
        $(".notification-items").append("<li><a href='#'>No Message Found !</a></li>");
    }
</script>

<script>
    $(document).ready(function() {
        // Initialize the start datepicker
        $('#from-date').datepicker({
            format: 'yyyy-mm-dd', // Set your desired date format
            todayHighlight: true, // Highlight today's date
        });

        // Initialize the end datepicker
        $('#to-date').datepicker({
            format: 'yyyy-mm-dd', // Set your desired date format
            todayHighlight: true, // Highlight today's date
        });

        // When the start date changes, update the end date's minimum selectable date
        $('#from-date').on('changeDate', function(e) {
            // Get the selected start date
            var selectedStartDate = e.date;

            // Update the end date's minimum selectable date to be the selected start date
            $('#to-date').datepicker('setStartDate', selectedStartDate);
        });
    });
</script>

<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>

</html>
