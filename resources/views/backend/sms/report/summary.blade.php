@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ _lang('Summary Report') }}</h4>
                    </div>

                </div>
                <div class="content">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('User') }}</th>
                            <th>{{ _lang('Count') }}</th>

                        </thead>
                        <tbody>
                            @foreach ($smsSummary as $item)
                                <tr>


                                    <td>{{ $item->user_type }}</td>
                                    <td>{{ $item->total }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
