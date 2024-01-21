@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab">
                <li class="active"><a data-toggle="tab" href="#FEEAMOUNT" aria-expanded="true">{{ _lang('FEE AMOUNT') }}</a>
                </li>
                <li class=""><a data-toggle="tab" href="#ABSENTFINEAMOUNT"
                        aria-expanded="false">{{ _lang('ABSENT FINE AMOUNT') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="FEEAMOUNT" class="tab-pane fade in active">
                    @include('backend.amount_config.fee_amount')
                </div>

                <div id="ABSENTFINEAMOUNT" class="tab-pane fade">
                    @include('backend.amount_config.absent_fee_amount')
                </div>
            </div>
        </div>
    </div>
@endsection
