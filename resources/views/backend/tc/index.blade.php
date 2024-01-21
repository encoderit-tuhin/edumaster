@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card panel panel-default">
                <div class="panel-heading">
                    <div class="col-md-6 ">
                        <span class="panel-title">{{ _lang('List') }}</span>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('tc.create') }}" class="btn btn-info btn-sm">{{ _lang('TC Application') }}</a>
                    </div>
                </div>
                <div class="content">
                    <div class="panel-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <th>{{ _lang('Student Id') }}</th>
                                <th>{{ _lang('Student Name ') }}</th>
                                <th>{{ _lang('Reason') }}</th>
                                <th>{{ _lang('Issue Date') }}</th>
                                <th>{{ _lang('Left Date') }}</th>

                                <th>{{ _lang('Action') }}</th>
                            </thead>
                            <tbody>
                                @if (isset($tcs) && count($tcs) > 0)
                                    @foreach ($tcs as $data)
                                        <tr>
                                            <td>{{ $data->student_id }}</td>
                                            <td>{{ optional($data->Student)->first_name }}
                                                {{ optional($data->Student)->last_name }}</td>
                                            <td>{{ $data->reason }}</td>

                                            <td>{{ $data->issue_date }}</td>
                                            <td>{{ $data->left_date }}</td>
                                            <td>
                                                <form action="{{ route('tc.destroy', $data->id) }}" method="POST">
                                                    <a href="{{ route('tc.pdf', $data->id) }}"
                                                        class="btn btn-warning btn-xs" title="download">
                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                    </a>


                                                    <a href="{{ route('tc.edit', $data->id) }}"> <i class="fa fa-pencil"
                                                            aria-hidden="true"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs btn-remove"><i
                                                            class="fa fa-trash" aria-hidden="true"></i> </button>

                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-danger text-center">{{ __('No TC Found') }}</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
