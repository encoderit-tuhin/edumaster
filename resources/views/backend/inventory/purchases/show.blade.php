@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ __('Supplier') }}: {{ $transaction->supplier->name }}</h4>
                    </div>

                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('purchases.create') }}" class="btn btn-info btn-sm">{{ __('Purchase ') }}</a>
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
                                <th>{{ __('Purchase Date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction->purchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->item?->name }}</td>
                                    <td>{{ $purchase->price }}</td>
                                    <td>{{ $purchase->quantity }}</td>
                                    <td>{{ $purchase->total }}</td>
                                    <td>{{ $purchase->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
