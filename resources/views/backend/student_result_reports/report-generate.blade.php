@php
    use Carbon\Carbon;
    $now = Carbon::now();
    $today = $now->format('Y-m-d');
@endphp
@extends('layouts.pdf.index')
@section('content')
    <div class="containera" style="width:95%">
        @include('layouts.pdf.header')

        <div class="row " style="height:450px">
            <h2 style="text-align: center">PROGRESS REPORT</h2>
            <hr>

            <table style="margin-bottom: 50px; width: 100%;">
                <tr>
                    <td style="width: 40%">
                        <table>
                            <tr>
                                <td>
                                    Name of Student
                                </td>
                                <td>:</td>
                                <td>{{ $studentData->name }}</td>
                            </tr>
                            <tr>
                                <td>Father's Name</td>
                                <td>:</td>
                                <td>{{ $studentData->father_name }}</td>

                            </tr>
                            <tr>
                                <td> Mother's Name</td>
                                <td>:</td>
                                <td>{{ $studentData->mother_name }}</td>
                            </tr>
                            <tr>
                                <td>Student ID</td>
                                <td>:</td>
                                <td>{{ $studentData->student_id }}</td>
                            </tr>
                            <tr>
                                <td>Roll No.</td>
                                <td>:</td>
                                <td>{{ $studentData->roll_no }}</td>
                            </tr>
                            <tr>
                                <td>Class : </td>
                            </tr>

                        </table>
                    </td>

                    <td style="width: 30%">
                        <table style="width: 100%">
                            <tr>
                                <td>Exam: </td>
                            </tr>
                            <tr>
                                <td>Year/Session: </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="border: 1px solid black;">
                <tr style="border: 1px solid black;">
                    <th style="border: 1px solid black;">Name Of Subjects</th>
                    <th style="border: 1px solid black;">Excellent</th>
                    <th style="border: 1px solid black;">Good</th>
                    <th style="border: 1px solid black;">Average</th>
                    <th style="border: 1px solid black;">Need to improve</th>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Bangla</td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">English</td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Mathmatics</td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">General Knowledge</td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Drawing</td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                    <td style="border: 1px solid black;"></td>
                </tr>
            </table>

        </div>
        <footer class="d-flex justify-content-end " style="text-align: left;margin-top:50px" id="testimonial-footer">
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
