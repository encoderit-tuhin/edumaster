@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div calss="header">
                    <h4 class="title">{{ __('New Supplier') }}</h4>
                </div>
                <div class="content">
                    @include('backend.inventory.supplier.partials.form')
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ __('Supplier List') }}</h4>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('supplier.create') }}"
                            class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('  Add Supplier ') }}</a>
                    </div>
                </div>
                <div class="content">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->address }}</td>



                                    <td>
                                        @if ($supplier->status === 1)
                                            <span class='text-info text-uppercase'>{{__("Active")}}</span>
                                        @else
                                            <span class='text-danger text-uppercase'>{{__("Inactive")}}</span>
                                        @endif
                                    </td>



                                    <td>
                                        {{-- <form action="{{ '' }}" method="post">
                                            @csrf
                                            @if ($supplier->status === 1)
                                                <button type="submit" value="0" name="status"
                                                    class="btn btn-success btn-xs btn-remove">
                                                    <i class="fa fa-check" aria-hidden="true" title="Active"></i>
                                                </button>
                                            @endif --}}

                                            <a href="{{ route('supplier.edit', $supplier->id) }}"
                                                class="btn btn-warning btn-xs" title="View">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>

                                            {{-- @if ($supplier->status === 0)
                                                <button type="submit" value="1" name="status"
                                                    class="btn btn-success btn-xs btn-remove">
                                                    <i class="fa fa-check" aria-hidden="true" title="Deactive"></i>
                                                </button>
                                            @endif --}}
                                        {{-- </form> --}}
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
