@php
    use Carbon\Carbon;
    $date = Carbon::createFromFormat('Y-m-d', $tc->left_date);
    $formattedDate = $date->format('F Y');
@endphp
@extends('layouts.pdf.index')
@section('content')
    <div class="container form-view" style="width:95%">
        <header style="height: 220px" id="testimonial-header">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 33.33%;">
                        <div style="font-size: 13px">
                            <li class="fw700">নটর ডেম কলেজ, ময়মনসিংহ</li>
                            <li>পি.ও. বক্স নম্বর ৩৬, বাড়েরা</li>
                            <li>ময়মনসিংহ-২২০০, বাংলাদেশ</li>
                            <li>ফোন:০১৫৫২৩৪২১৩১,
                                ০১৯৮৭০০৯১০০
                            </li>
                            <li class="fw700">EIIN: 137031</li>
                        </div>
                    </td>
                    <td style="width: 33.33%; text-align: center;"> 
                        <img src="{{ get_logo() }}" alt="" style="height: 100px;">
                    </td>
                    <td style="width: 33.33%;">
                        <div style="font-size: 15px">
                            <li class="fw700">Notre Dame College Mymensingh</li>
                            <li>P.O Box No. 36,Barera</li>
                            <li>Mymensingh-2200,Bangladesh</li>
                            <li>Tel:01552342131,
                                01987009100
                            </li>
                            <li class="fw700">College Code:7314</li>
                        </div>
                    </td>
                </tr>
            </table>
            <hr style="border-top: 4px solid black; margin-top: 20px;">
        </header>
        <div class="row set-water-mark" style="height:450px">
            <div class="col-12">
                <h2 class="text-center " style="text-decoration: underline;">TRANSFER CERTIFICATE</h2>
                <div style="display: flex;   " class="justify-between">
                    <p class="fw700 float-left" style=""> SL No. {{ $tc->id }}</p>
                    <p class="fw700 float-right"> College Roll. {{ $student->roll }}</p>
                </div>
                <p class="mt-4" style="text-align: justify;line-height:40px;margin-top:40px">
                    This is to certify that <span class="fw700">{{ $student->first_name }}
                        {{ $student->last_name }}</span> son of <span class="fw700">{{ $student->father_name }} and
                        {{ $student->mother_name }}</span>
                    an inhabitant of <span class="fw700">{{ $student->present_address }}</span> has been a student of
                    Notre Dame College Mymensingh in <span class="fw700">{{ $student->studentGroup->group_name ?? '--' }}
                        Group</span>.
                    At the time of leaving the college he was in the
                    <span class="fw700">{{ $student->class?->class_name }} class</span> that his conduct has been <span
                        class="fw700">good</span> </span>and

                    that all sums due by him to the college have been paid as per college rule up to the end of the month of
                    <span class="fw700"> {{ $formattedDate }}</span>
                </p>
            </div>
        </div>
        <footer class="d-flex justify-content-end " style="text-align: left;margin-top:20px" id="testimonial-footer">
            <div>
                <span>Sincerly</span> <br>
                <div style="text-align:left;margin-top:50px"> <span>
                        Dr. Fr. Thadeus Hembrom, CSC </span><br>
                    <span>Principal</span><br>
                    <span>Notre Dame College Mymensingh</span>
                </div>
            </div>
        </footer>
    </div>
@endsection
@section('scripts')
    <script>
        function hideHeaderFooter() {
            document.getElementById("testimonial-header").style.visibility = "hidden";
            document.getElementById("testimonial-footer").style.visibility = "hidden";

        }

        function showHeaderFooter() {
            document.getElementById("testimonial-header").style.visibility = "visible";
            document.getElementById("testimonial-footer").style.visibility = "visible";

        }
    </script>
@endsection
