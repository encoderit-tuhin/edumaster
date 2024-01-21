
@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ __('Sales Return List') }}</h4>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('sales.create') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-plus-circle"></i> {{ __('Sales ') }}
                        </a>

                    </div>
                </div>
                <div class="content">
                    <table class="table table-bordered data-table">
                        <thead>

                            <th>{{ __('Item name') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Sales Quantity') }}</th>
                            <th>{{ __('Return Quantity') }}</th>


                        </thead>
                        <tbody>
                            @foreach ($sales->salesReturn as $Sales)
                                <tr>

                                    <td>{{ $Sales->item->name }}</td>
                                    <td>{{ $Sales->price }}</td>
                                    <td>{{ $Sales->quantity }}</td>
                                    <td>{{ $Sales->quantity_returned }}</td>
                                    <td class="d-flex">
                                        {{-- <a href="{{ route('sales-return.show', $Sales->id) }}"
                                            class="btn btn-warning btn-xs" title="View">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a> --}}
                                        {{-- <a href="{{ route('sales.edit', $Sales->id) }}"
                                            class="btn btn-success btn-xs" title="View">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{route('sales.destroy',$Sales->id)}}" method="post">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove">
                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                        <a href="{{ route('sales-return.edit', $Sales->id) }}"
                                            class="btn btn-warning btn-xs" title="View">
                                            <i class="fa fa-reply-all" aria-hidden="true" title="return"></i>
                                        </a> --}}
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
