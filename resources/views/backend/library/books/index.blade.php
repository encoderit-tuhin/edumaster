@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Books List') }}</span>
                    <div class="pull-right" style="text-align: right;">
                        <a href="{{ route('books.create') }}" class="btn btn-info btn-sm">{{ _lang('Add New Book') }}</a>
                    </div>
                </div>
                <div class="panel-body no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Scheme No') }}</th>
                            <th>{{ _lang('Barcode') }}</th>
                            <th>{{ _lang('Book Name') }}</th>
                            <th>{{ _lang('Total Page') }}</th>
                            <th>{{ _lang('Book copy no') }}</th>
                            <th>{{ _lang('Price') }}</th>
                            <th>{{ _lang('Writer Name') }}</th>
                            <th>{{ _lang('Publisher') }}</th>
                            <th>{{ _lang('Publish Date') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($books as $data)
                                <tr>
                                    <td>{{ $data->scheme_no }}</td>
                                    <td>
                                        {!! DNS1D::getBarcodeSVG($data->scheme_no, 'C39', 1, 25, '#2A3239') !!}
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->total_page }}</td>
                                    <td>{{ $data->book_copy_no }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{{ $data->writer_name }}</td>
                                    <td>{{ $data->publisher }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>
                                        <form action="{{ route('books.destroy', $data->id) }}" method="post">
                                            <a href="{{ route('books.show', $data->id) }}" class="btn btn-info btn-xs"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{ route('books.edit', $data->id) }}"
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
