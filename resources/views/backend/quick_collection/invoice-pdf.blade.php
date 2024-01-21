@extends('layouts.pdf.index')

@section('styles')
    <style>
        .form-view {
            width: 1122px;
            height: auto;
            background: #fff;
            padding: 10px;
            margin: 0px auto;
            padding-top: 10px;
            font-size: 11px;
        }

        tbody td,
        thead th {
            text-align: left;
        }

        /* tbody tr's first td */
        tbody tr td:first-child {
            min-width: 140px;
        }
    </style>
@endsection
@php
    $copies = [
        'institute' => 'Institute',
        'student' => 'Student',
    ];
@endphp
@section('content-download')
    <div class="noprint print-download-buttons">
        <button type="button" class="btn-download" onclick="downloadPdf()">
            <img src="{{ asset('icons/download.png') }}" alt="" style="width: 15px; margin-right: 10px;">
            {{ __('Download') }}
        </button>
        @include('layouts.pdf.print-button')
    </div>
    <div style="clear: both;"></div>
@endsection
@section('content')
    <div class="container" style="width:100%">
        <div class="d-flex justify-center">
            @foreach ($copies as $copyFor)
                <div
                    style="border-right: {{ $copyFor !== 'Student' ? '2px' : '0px' }} dashed #000; flex: 1; padding: 10px;">
                    @include('backend.quick_collection.partials.header', ['copy_for' => $copyFor])

                    <div class="text-center">
                        <h2 class="m-0 p-0" style="border-bottom: 1px solid; display:inline-block;">
                            Student Pay-slip
                        </h2>

                        <div style="border: 1px solid #000; padding: 10px; margin-top: 20px;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Student ID</td>
                                        <td>: {{ $studentCollection->student->id ?? '--' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>: {{ $studentCollection->student->first_name ?? '--' }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>Class-Shift</td>
                                        <td>: </td>
                                    </tr> --}}
                                    <tr>
                                        <td>Roll</td>
                                        <td>: {{ $studentCollection->student->studentSession->roll ?? '--' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Academic Year</td>
                                        <td>: {{ App\AcademicYear::find($studentCollection->session_id)->session ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Payslip ID</td>
                                        <td>: {{ $studentCollection->invoice_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Generated Date</td>
                                        <td>
                                            : {{ $studentCollection->created_at->format('Y-m-d') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <h3 class="m-0 p-0 bold text-left" style="margin-top: 20px; font-size: 12px;">
                                Payable includes waiver & fine
                            </h3>

                            <table class="table table-bordered" style="margin-top: 10px;">
                                <thead>
                                    <tr>
                                        <th>Fee Head</th>
                                        <th>Details</th>
                                        <th>Waiver</th>
                                        <th>Fine</th>
                                        <th style="width: 50px;">Payable</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentCollection->details as $detail)
                                        <tr>
                                            <td>{{ $detail->feeHead->name ?? '-' }}</td>
                                            <td>
                                                @foreach ($detail->subHeads as $feeSubhead)
                                                    @if (!empty($feeSubhead->feeSubHead->name))
                                                        {{ $feeSubhead->feeSubHead->name . (!$loop->last ? ',' : '') }}
                                                    @else
                                                        --
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ format_currency($detail->waiver) }}</td>
                                            <td>{{ format_currency($detail->fine_payable) }}</td>
                                            <td>{{ format_currency($detail->total_payable) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" class="text-right">Attendance Fine</td>
                                        <td>{{ format_currency($studentCollection->attendance_fine) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right bold">Total</td>
                                        <td class="bold">{{ format_currency($studentCollection->total_payable) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-left">
                                            In Word: {{ convert_amount_to_words($studentCollection->total_payable) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex" style="margin-top: -10px;">
                                <p class="p-0 m-0" style="font-size: 10px;">Powered by Squartup</p>
                                <p class="p-0 m-0" style="font-size: 10px;">This is a Software Generated Receipt</p>
                            </div>
                        </div>

                        <div class="d-flex" style="margin-top: 20px;">
                            <div>
                                @php
                                    $texts = "ID: $studentCollection->student_id\n";
                                    $texts .= 'Name: ' . $studentCollection->student->first_name . " \n";
                                    $texts .= "Payslip ID: $studentCollection->invoice_id\n";
                                    $texts .= 'Generated Date: ' . $studentCollection->created_at->format('Y-m-d') . " \n";
                                    $texts .= "Fee Head\tDetails\tPayable\n";
                                    foreach ($studentCollection->details as $detail) {
                                        $texts .= $detail->feeHead->name . "\t";
                                        foreach ($detail->subHeads as $feeSubhead) {
                                            if (!empty($feeSubhead->feeSubHead->name)) {
                                                $texts .= $feeSubhead->feeSubHead->name . (!$loop->last ? ',' : '') . "\t";
                                            } else {
                                                $texts .= "--\t";
                                            }
                                        }
                                        $texts .= format_currency($detail->total_payable) . "\n";
                                    }

                                    $texts .= "Total\t\t" . format_currency($studentCollection->total_payable) . "\n";
                                    $texts .= 'In Word: ' . convert_amount_to_words($studentCollection->total_payable) . "\n";
                                @endphp

                                {!! QrCode::size(100)->encoding('UTF-8')->generate($texts) !!}
                            </div>
                            <div style="margin-top: 40px;">
                                ---------------- <br>
                                Received By
                            </div>
                        </div>
                        <div class="text-left">
                            Created by: {{ $studentCollection->creator->name ?? '--' }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        /**
         * Download PDF
         *
         * @param {string} fileName timestamp default
         * @param {string} elementId
         */
        function downloadPdf(fileName = 'Student Collection - {{ $studentCollection->invoice_id }} ', elementId =
            'print_vh') {
            var element = document.getElementById(elementId);

            if (fileName == null) {
                fileName = new Date().getTime();
            }

            // Give a name.
            var opt = {
                margin: 0,
                filename: fileName + '.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 3,
                    dpi: 96,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A4',
                    orientation: 'landscape'
                },
                pagebreak: {
                    before: '.page2el'
                }
            };

            // New Promise-based usage:
            html2pdf().set(opt).from(element).save();
        }
    </script>
@endsection
