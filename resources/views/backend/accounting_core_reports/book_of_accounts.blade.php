@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab" id="myTabs">
                <li class="active">
                    <a data-toggle="tab" href="#CASHBOOK" aria-expanded="true">{{ _lang('Cash Book') }}</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#BANKBOOK" aria-expanded="false">{{ _lang('Bank book') }}</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#LEDGERBOOK" aria-expanded="false">{{ _lang('Ledger Book') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="CASHBOOK" class="tab-pane fade in active">
                    @include('backend.accounting_core_reports.partials.cash_book')
                </div>

                <div id="BANKBOOK" class="tab-pane fade">
                    @include('backend.accounting_core_reports.partials.bank_book')
                </div>

                <div id="LEDGERBOOK" class="tab-pane fade">
                    @include('backend.accounting_core_reports.partials.ledger_book')
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
