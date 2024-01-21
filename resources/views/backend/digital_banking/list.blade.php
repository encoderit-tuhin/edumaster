@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default no-export">
                <div class="panel-heading"><span class="panel-title">{{ _lang('List Payment Method') }}</span>
                    <a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="{{ _lang('Add Payment Method') }}"
                        href="{{ route('bank-accounts.create') }}">{{ _lang('Add New') }}</a>
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
                                <th>{{ _lang('Acc Holder Name') }}</th>
                                <th>{{ _lang('Bank') }}</th>
                                <th>{{ _lang('Branch') }}</th>
                                <th>{{ _lang('Account No') }}</th>
                                <th>{{ _lang('Balance') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bank_accounts as $bank_account)
                                <tr id="row_{{ $bank_account->id }}">
                                    <td>{{ $bank_account->acc_holder_name }}</td>
                                    <td>{{ $bank_account->bank }}</td>
                                    <td>{{ $bank_account->branch }}</td>
                                    <td>{{ $bank_account->account_no }}</td>
                                    <td>{{ $bank_account->balance }}</td>

                                    <td>
                                        <form action="{{ route('bank-accounts.destroy', $bank_account->id) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                        {{-- <form action="{{ route('bank-accounts.destroy', $bank_account->id) }}"
                                            method="post">
                                            <a href="{{ route('bank-accounts.edit', $bank_account->id) }}"
                                                data-title="{{ _lang('Update Payment Method') }}"
                                                class="btn btn-warning btn-sm ajax-modal">{{ _lang('Edit') }}</a>
                                            <a href="{{ route('bank-accounts.show', $bank_account->id) }}"
                                                data-title="{{ _lang('View Payment Method') }}"
                                                class="btn btn-info btn-sm ajax-modal">{{ _lang('View') }}</a>
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm btn-remove"
                                                type="submit">{{ _lang('Delete') }}</button>
                                        </form> --}}
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
