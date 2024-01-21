@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab">
                <li class="active"><a data-toggle="tab" href="#ASSIGN" aria-expanded="true">{{ _lang('ASSIGN') }}</a></li>
                <li class=""><a data-toggle="tab" href="#DATECONFIG" aria-expanded="false">{{ _lang('DATE CONFIG LIST') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="ASSIGN" class="tab-pane fade in active">
                    @include('backend.date_config.assign')
                </div>

                <div id="DATECONFIG" class="tab-pane fade">
                    @include('backend.date_config.update')
                </div>
            </div>
        </div>
    </div>
@endsection
