@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="panel panel-default container" data-collapsed="0">
            <div id="sales-form" data-sales="{{ json_encode($sales) }}">
            </div>
        </div>
    </div>
@endsection
