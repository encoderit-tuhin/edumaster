@php
    use Carbon\Carbon;
@endphp

@extends('layouts.pdf.index')

@section('content-download')
    <div class="noprint print-download-buttons">
        @include('layouts.pdf.print-button')
        <button type="button" class="btn-hide-header" style="padding: 10px" onclick="hideIdCardBackSide()">
            {{ __('Show Front Side') }}
        </button>
        <button type="button" class="btn-hide-header" style="padding: 10px" onclick="showIdCardBackSide()">
            {{ __('Show Back Side') }}
        </button>
    </div>
    <div style="clear: both;"></div>
@endsection

@section('content')
    <style>
        .fw700 {
            font-weight: 700
        }

        * {
            padding: 0%;
            margin: 0%
        }

        .text-center {
            text-align: center
        }

        .d-flex1 {
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            gap: 60px;


        }

        .form-view {
            height: 100%;
            width: 750px;
        }

        .id-card-back-footer li {
            text-align: center
        }
    </style>
    <div class="">
        @foreach ($students as $key => $student)
            <div style="float:left; margin: 15px 20px 35px 20px; height: 300px; width: 200px; background: #6FB9D4;border-radius:7px ; "
                class="show-id-card-front-side">
                <div id="id_card">
                    <div class="">
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 20%;">
                                    <img src="{{ get_logo() }}" alt="" style="height: 100%; width: 100%;">
                                </td>
                                <td style="width: 80%;">
                                    <p class="fw700 text-center" style="font-size:17px; ">{{ get_option('school_name') }}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-1">
                        <p class="text-center fw700" style="background: #D2DE7A; padding: 5px; font-size: 17px;">
                            {{ _lang('Student ID Card') }}
                        </p>
                    </div>
                    <div class="image" style="text-align: center; margin-top: 10px;">
                        <img src="{{ asset('uploads/images/' . $student->image) }}" alt="" style="height: 68px;">
                    </div>
                    <div class="text-center" style="margin-top: 5px;">
                        <p class="fw700" style="height: 37px;">
                            <span>{{ $student->first_name . ' ' . $student->last_name }}</span>
                        </p>
                        <p class="fw700">
                            <span class="lbl">{{ _lang('Roll No') }} :</span>
                            <span>{{ $student->roll }}</span>
                        </p>
                        <p class="fw700">
                            <span class="lbl">{{ _lang('Valid') }} :</span>
                            <span>{{ Carbon::parse($validity_date)->format('d M Y') }}</span>
                        </p>
                    </div>
                </div>
                <div class="d-flex" style="padding: 10px; margin-top: 10px;">
                    <span style="background: white">
                        @php
                            // Generate the barcode for each student
                            $text = $student->roll; // You can use a unique identifier for the student here
                            $barcode = new Picqer\Barcode\BarcodeGeneratorPNG();
                            $barcodeImage = $barcode->getBarcode($text, $barcode::TYPE_CODE_128);
                        @endphp
                        <img src="data:image/png;base64,{{ base64_encode($barcodeImage) }}" alt=""
                            style="height: 15px; width: 60px; display: block; margin: 0 auto;">
                        <!-- Display text under the barcode -->
                        <p style="text-align: center; font-size:12px;padding:0%">{{ $text }}</p>
                    </span>
                    <span>
                        <img src="{{ asset('uploads/teachers/principal-sign.png') }}" alt=""
                            style="height: 20px;width:60px">
                        <p style="text-align: center; font-size:12px;padding:0%">
                            Principal
                        </p>
                    </span>
                </div>
            </div>
            <div style="float:left; margin: 15px 20px 35px 20px; height: 300px; width: 200px; background:rgb(245, 243, 243); display:none"
                class="show-id-card-back-side">
                <div style="padding: 5px;">
                    <div class="text-center">
                        <img src="{{ get_logo() }}" alt="" style="height: 55px;" class="text-center">
                    </div>
                    <div style="height: 50px;font-size:12px;line-height:15px">
                        <li> Guidance: 01814633111, 01971163130</li>
                        <li> Academic Office&nbsp;&nbsp;:01987009100</li>
                        <li> Tuition Fee &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:01841442370</li>
                        <li> Exam Office &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:01841442371</li>
                    </div>
                    <p style="margin-top:15px;  font-weight:500;  text-align: justify;"> Anyone finding
                        this lost Identity Card is requested to return to the principal.
                    </p>
                    <br>
                    <div style="height: 50px; font-size: 12px; line-height: 15px;" class="text-center id-card-back-footer">
                        <li class="fw700">Notre Dame College Mymensingh</li>
                        <li>Dhaka Bypass, Barera</li>
                        <li>Mymensingh-2200</li>
                        <li>Phone: 01814633111</li>
                        <li class="fw700">Web: <a href="http://www.ndcm.edu.bd">http://www.ndcm.edu.bd</a></li>
                    </div>

                </div>
            </div>

            @if ($key != 0 && ($key + 1) % 9 == 0)
                <div class="clearfix"></div>
                <div class="page2el" style="margin: 10px;">
                </div>
            @endif
        @endforeach
    </div>
@endsection
@section('scripts')
    <script>
        function showIdCardBackSide() {
            console.log('1 :>> ');
            var backSideElements = document.getElementsByClassName("show-id-card-back-side");
            var frontSideElements = document.getElementsByClassName("show-id-card-front-side");

            // Loop through the collection of elements with the specified class and set their display style
            for (var i = 0; i < backSideElements.length; i++) {
                backSideElements[i].style.display = "block";
            }

            for (var j = 0; j < frontSideElements.length; j++) {
                frontSideElements[j].style.display = "none";
            }
        }

        function hideIdCardBackSide() {
            console.log('3 :>> ');
            var backSideElements = document.getElementsByClassName("show-id-card-back-side");
            var frontSideElements = document.getElementsByClassName("show-id-card-front-side");

            // Loop through the collection of elements with the specified class and set their display style
            for (var i = 0; i < backSideElements.length; i++) {
                backSideElements[i].style.display = "none";
            }

            for (var j = 0; j < frontSideElements.length; j++) {
                frontSideElements[j].style.display = "block";
            }
        }
    </script>
@endsection
