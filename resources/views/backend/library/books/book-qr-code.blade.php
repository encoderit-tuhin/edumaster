@extends('layouts.backend')
@section('styles')
    <style>
        /* Define a page break after every 2 items (i.e., every row) */
        @media print {

            /* Define styles for the printable content */
            #printable-table-qr-code {
                display: flex;
                justify-content: space-between;
                margin-bottom: 30px;
            }

            .qr-code:nth-child(2n+1) {
                page-break-after: always;
            }
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ __('Books QR Code') }}</h4>
                    </div>
                </div>

                <div class="content no-export">

                    <form action="{{ route('book-ids.store') }}" method="post" autocomplete="off"
                        class="form-horizontal validate" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="control-label">{{ _lang('Books Select') }}</label>
                            <select class="form-control select2" name="book_ids[]" multiple="multiple">
                                @php
                                    $bookDataById = empty($bookData) ? collect([]) : collect($bookData)->keyBy('id');
                                @endphp

                                @foreach ($books as $book)
                                    @php
                                        $selected = $bookDataById->has($book->id) ? 'selected' : '';
                                    @endphp
                                    <option {{ $selected }} value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Books Search</button>
                            </div>
                        </div>
                    </form>

                    <div class="header">
                        <!-- Add this button where you want it -->
                        <button class="btn btn-primary" id="print-button" onclick="printTable()">Print QR Codes</button>
                    </div>

                    @if (isset($bookData))
                        <div id="">
                            <table class="table table-bordered ">
                                <thead>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Code') }}</th>
                                    <th>{{ __('Code QR') }}</th>
                                </thead>
                                <tbody>

                                    @foreach ($bookData as $book)
                                        <tr>
                                            <td>{{ $book['id'] }}</td>
                                            <td>{{ $book['name'] }}</td>
                                            <td>{{ $book['code'] }}</td>
                                            <td>
                                                <div class="text-center">
                                                    {!! QrCode::size(50)->generate($book['code']) !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div id="printable-table-qr-code"
                            style="display: none; flex-direction: row; justify-content: space-between; flex-wrap: wrap;">
                            @foreach ($bookData as $book)
                                <div class="qr-code" style="margin-bottom: 30px; flex-basis: calc(50% - 15px);">
                                    <div class="text-center">
                                        {!! QrCode::size(300)->generate($book['code']) !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        function printTable() {
            // Show the printable content
            document.getElementById('printable-table-qr-code').style.display = 'flex';
            var printContent = document.getElementById('printable-table-qr-code').innerHTML;
            var printWindow = window.open('', '', 'width=600,height=600');

            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print QR Codes</title></head><body>');
            printWindow.document.write(printContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            printWindow.print();
            printWindow.onafterprint = function() {
                printWindow.close();
                document.getElementById('printable-table-qr-code').style.display = 'none';
            };
        }
    </script>
@endsection
