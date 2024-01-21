@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Add New Supplier') }}
                    </div>
                </div>
                <div class="panel-body row">
                    <div class="col-md-8">
                        @include('backend.inventory.supplier.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
