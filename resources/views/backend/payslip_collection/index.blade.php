@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab">
                <li class="active"><a data-toggle="tab" href="#SINGLE" aria-expanded="true">{{ _lang('SINGLE') }}</a></li>
                <li class=""><a data-toggle="tab" href="#MULTIPLE" aria-expanded="false">{{ _lang('MULTIPLE') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="SINGLE" class="tab-pane fade in active">
                    @include('backend.payslip_collection.assign')
                </div>

                <div id="MULTIPLE" class="tab-pane fade">
                    @include('backend.payslip_collection.update')
                </div>
            </div>
        </div>
    </div>
@endsection
