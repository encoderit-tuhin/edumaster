@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ __('Customer') }}: {{ $transaction->customer?->first_name }}</h4>
                    </div>

                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('sales.create') }}" class="btn btn-info btn-sm">{{ __('sales ') }}</a>
                    </div>
                </div>
                <div class="content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('Item name') }}</th>
                                <th>{{ __('Item  Price ') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Total Price') }}</th>
                                <th>{{ __('sales Date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction->items as $item)
                                <tr>
                                    <td>{{ $item->item?->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
