@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ __('Purchase List') }}</h4>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('purchases.create') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-plus-circle"></i> {{ __('Purchase') }}
                        </a>
                        <a href="{{ route('purchases-return.index') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-plus-circle"></i> {{ __('Purchase Return list') }}
                        </a>
                    </div>
                </div>
                <div class="content">
                    <table class="table table-bordered data-table">
                        <thead>

                            <th>{{ __('Supplier name') }}</th>
                            <th>{{ __('Total Price') }}</th>
                            <th>{{ __('Purchase Date') }}</th>
                            <th>{{ __('Action') }}</th>

                        </thead>
                        <tbody>
                            @foreach ($purchases as $purchase)
                                <tr>

                                    <td>{{ $purchase->supplier?->name ?? 'N/A' }}</td>
                                    <td>{{ $purchase->amount }}</td>
                                    <td>{{ $purchase->created_at }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('purchases.show', $purchase->id) }}"
                                            class="btn btn-warning btn-xs" title="View">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('purchases.edit', $purchase->id) }}"
                                            class="btn btn-success btn-xs" title="View">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{route('purchases.destroy',$purchase->id)}}" method="post">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove">
                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                        <a href="{{ route('purchases-return.edit', $purchase->id) }}"
                                            class="btn btn-warning btn-xs" title="View">
                                            <i class="fa fa-reply-all" aria-hidden="true" title="return"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
