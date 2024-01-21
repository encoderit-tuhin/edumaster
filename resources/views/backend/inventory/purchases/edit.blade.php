@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="panel panel-default container" data-collapsed="0">
            <div id="inventory-form" data-purchase="{{ json_encode($purchase) }}">
            </div>
        </div>
    </div>
@endsection
