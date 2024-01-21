@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab">
                <li class="active"><a data-toggle="tab" href="#ASSIGN" aria-expanded="true">{{ _lang('ASSIGN') }}</a></li>
                <li class=""><a data-toggle="tab" href="#WAIVERCONFIGLIST" aria-expanded="false">{{ _lang('WAIVER CONFIG LIST') }}</a>
                </li>

            </ul>

            <div class="tab-content">
                <div id="ASSIGN" class="tab-pane fade in active">
                    @include('backend.waiver_config.assign')
                </div>

                <div id="WAIVERCONFIGLIST" class="tab-pane fade">
                    @include('backend.waiver_config.assign_list')
                </div>
            </div>
        </div>
    </div>
@endsection
