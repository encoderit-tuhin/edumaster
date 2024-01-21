@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('Delete Invoice') }}
                    </span>
                </div>
                <div class="panel-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <form method="get" class="" autocomplete="off"
                                action="{{ route('payslip.delete.list') }}?type={{ request()->type }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Invoice ID') }}</label>
                                        <input class="form-control" type="text" name="invoice_id"
                                            placeholder="Invoice ID" value="{{ request()->invoice_id }}" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ _lang('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                @include('backend.payslip.partials.collection-delete', [
                    'collections' => $collection ? [$collection] : [],
                ])
            </div>
        </div>
    </div>
@endsection
