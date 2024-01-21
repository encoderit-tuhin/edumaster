@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ _lang('Club List') }}</h4>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('clubs.create') }}" class="btn btn-info btn-sm">{{ _lang('Add New Club') }}</a>
                    </div>
                </div>
                <div class="content">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Logo') }}</th>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('slogan') }}</th>
                            <th>{{ _lang('Banner') }}</th>
                            <th>{{ _lang('Foundation Day') }}</th>
                            <th>{{ _lang('Status') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($clubs as $data)
                                <tr>
                                    <td><img src="{{ asset('uploads/images/clubs/' . $data->logo) }}" width="50px"
                                            alt=""></td>
                                    <td>{{ $data->name }}</td>

                                    <td>{{ $data->slogan }}</td>
                                    <td><img src="{{ asset('uploads/images/clubs/' . $data->banner_image) }}"
                                            width="50px" alt=""></td>
                                    <td>{{ $data->foundation_date }}</td>
                                    <td>
                                        {{ $data->status == 1 ? 'Active' : 'Inactive' }}
                                        <br>
                                        <form action="{{ route('clubs.updateStatus') }}" method="post">
                                            @csrf
                                            <input type="number" value="{{ $data->id }}" name="id" hidden>
                                            <input type="hidden" name="status" value="{{ $data->status == 1 ? 0 : 1 }}">
                                            <button type="submit"
                                                class="btn btn-sm {{ $data->status == 1 ? 'btn-danger' : 'btn-success' }}">
                                                {{ $data->status == 1 ? 'Disable' : 'Enable' }}
                                            </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('clubs.destroy', $data->id) }}" method="post">
                                            <a href="{{ route('clubs.show', $data->id) }}" class="btn btn-info btn-xs"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{ route('clubs.edit', $data->id) }}"
                                                class="btn btn-warning btn-xs"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
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
