@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <form method="POST" action="{{ route('sms.sendReport') }}">
                    @csrf
                    <div class="">
                        <div class="col-md-3  ">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('From Date') }}</label>
                                <div class="">
                                    <input type="text" class="form-control datepicker" name="from"
                                        value="{{ old('from') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3  ">
                            <div class="form-group">

                                <label class=" control-label">{{ _lang('To Date') }}</label>
                                <div class="">
                                    <input type="text" class="form-control datepicker" name="to"
                                        value="{{ old('to') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3  ">
                            <div class="form-group">

                                <label class=" control-label">{{ _lang('User Type ') }}</label>
                                <div class="">
                                    <select class="form-control select2" name="user_type" required>
                                        <option value="">{{ _lang('Select One') }}</option>

                                        @foreach ($userTypes as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5    ">
                            <div class="form-group">

                                <button class="btn btn-success" type="submit">Show</button>

                            </div>
                        </div>
                    </div>
                </form>
                <div class="content">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Send Date') }}</th>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('Phone') }}</th>
                            <th>{{ _lang('message') }}</th>

                        </thead>
                        <tbody>
                            @foreach ($smsReports as $item)
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->user?->name }}</td>
                                    <td>{{ $item->receiver }}</td>
                                    <td>{{ $item->message }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if (isset($fromDate) && isset($toDate) && isset($type))
                        <form action="{{ route('send-sms-pdf-reports.index') }}" method="post" accept-charset="utf-8">
                            @csrf

                            <input type="hidden" name="from" value="{{ $fromDate }}">
                            <input type="hidden" name="to" value="{{ $toDate }}">
                            <input type="hidden" name="user_type" value="{{ $type }}">

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <button type="submit" style="margin-top:24px;" class="btn btn-primary rect-btn">
                                        <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                        {{ _lang('PDF Download') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
