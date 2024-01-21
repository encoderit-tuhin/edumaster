@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('Committee Members List') }}
                    </span>
                    <div class="pull-right">
                        <a href="{{ route('committee.create') }}"
                            class="btn btn-primary btn-sm">{{ _lang('Add New Committee Member') }}</a>
                    </div>
                    <div class="clearfix"></div>

                </div>

                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('Phone') }}</th>
                            <th>{{ _lang('Post') }}</th>
                            <th>{{ _lang('Address') }}</th>
                            <th>{{ _lang('From Year') }}</th>
                            <th>{{ _lang('To Year') }}</th>
                            <th>{{ _lang('Photo') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @if (isset($committees))
                                @foreach ($committees as $committee)
                                    <tr>
                                        
                                        <td>{{ $committee->name }}</td>
                                        <td>{{ $committee->phone}}</td>
                                        <td>
                                            {{ $committee->post }}
                                        </td>
                                        <td>
                                            {{ $committee->address }}
                                        </td>
                                        <td>{{ $committee->year_from }}</td>
                                        <td>{{ $committee->year_to }}</td>
                                        <td>
                                            <img src="{{ asset( $committee->photo) }}" width="50px"
                                                alt="">
                                        </td>
                                     
                                        <td>
                                            <form action="{{ route('committee.destroy', $committee->id) }}" method="post">
                                                {{-- <a href="{{ route('committee.show', $committee->id) }}"
                                                    class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a> --}}
                                                <a href="{{ route('committee.edit', $committee->id) }}"
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
                            @else
                                <tr>
                                    <td colspan="7" class="text-danger">No  Member Found</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

