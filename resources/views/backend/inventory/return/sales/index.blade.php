@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ __('sales Return List') }}</h4>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('sales.create') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-plus-circle"></i> {{ __('sales ') }}
                        </a>

                    </div>
                </div>

                <div class="content">
                    <table class="table table-bordered data-table">
                        <thead>

                            <th>{{ __('customer name') }}</th>
                            <th>{{ __('Total Price') }}</th>
                            <th>{{ __('sales Date') }}</th>
                            <th>{{ __('Action') }}</th>

                        </thead>
                        <tbody>
                            @foreach ($sales as $salesItem)
                                <tr>

                                    <td>{{ $salesItem->customer?->first_name ?? 'N/A' }}</td>
                                    <td>{{ $salesItem->amount }}</td>
                                    <td>{{ $salesItem->created_at }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('sales-return.show', $salesItem->id) }}"
                                            class="btn btn-warning btn-xs" title="View">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        {{-- <a href="{{ route('sales.edit', $salesItem->id) }}"
                                            class="btn btn-success btn-xs" title="View">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{route('sales.destroy',$salesItem->id)}}" method="post">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove">
                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                        <a href="{{ route('sales-return.edit', $salesItem->id) }}"
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
