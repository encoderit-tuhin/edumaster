@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab">
                <li class="active"><a data-toggle="tab" href="#feeHead" aria-expanded="true">{{ _lang('Fee mapping') }}</a></li>
                <li class=""><a data-toggle="tab" href="#feeSubHead"
                        aria-expanded="false">{{ _lang('Fee fine mapping') }}</a>
                </li>
                <li class=""><a data-toggle="tab" href="#feeWaiver"
                        aria-expanded="false">{{ _lang('Digital fees config') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="feeHead" class="tab-pane fade in active">
                    @include('backend.fees_mapping.fee_mapping')
                </div>

                <div id="feeSubHead" class="tab-pane fade">
                    @include('backend.fees_mapping.fee_fine_mapping')
                </div>

                <div id="feeWaiver" class="tab-pane fade">
                    @include('backend.fees_mapping.digital_fee_config')
                </div>
            </div>
        </div>
    </div>
@endsection
