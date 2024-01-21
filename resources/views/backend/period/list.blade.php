@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default no-export">
                <div class="panel-heading"><span class="panel-title">{{ _lang('List Period') }}</span>
                    <a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="{{ _lang('Add Period') }}"
                        href="{{ route('periods.create') }}">{{ _lang('Add New') }}</a>
                </div>

                <div class="panel-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                        <br />
                    @endif
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>{{ _lang('SL No') }}</th>
                                <th>{{ _lang('Period') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periods->sortBy('serial_no') as $period)
                                <tr id="row_{{ $period->id }}">
                                    <td>{{ $period->serial_no }}</td>
                                    <td>{{ $period->period }}</td>
                                    <td>
                                        <form action="{{ route('periods.destroy', $period->id) }}" method="post">
                                            <a href="{{ route('periods.edit', $period->id) }}"
                                                data-title="{{ _lang('Update Period') }}"
                                                class="btn btn-warning btn-sm">{{ _lang('Edit') }}</a>

                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm btn-remove"
                                                type="submit">{{ _lang('Delete') }}</button>
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
