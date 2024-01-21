@extends('layouts.backend')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">{{ __('Message List') }}</span>

                </div>
                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Message') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($contactsMessage as $message)
                                <tr>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->phone }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->created_at }}</td>

                                    <td>
                                        @if ($message->isSeen === 1)
                                            <span class='text-info text-uppercase'>{{ __('Read') }}</span>
                                        @else
                                            <span class='text-danger text-uppercase'>{{ __('Unread') }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($message->isSeen === 1)
                                            <i class="fa fa-check text-success" aria-hidden="true" title="read"></i>
                                        @else
                                            <a href="{{ route('contact-message-change-status', $message->id) }}"
                                                class="btn btn-warning btn-xs" title="unread">

                                                <i class="fa fa-inbox" aria-hidden="true"></i>
                                            </a>
                                        @endif
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
