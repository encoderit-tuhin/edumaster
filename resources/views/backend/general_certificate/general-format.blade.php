@php
    use Carbon\Carbon;
    $now = Carbon::now();
    $today = $now->format('Y-m-d');

@endphp
@extends('layouts.pdf.index')
@section('content')
    <div class="containera" style="width:95%">
        @include('layouts.pdf.header')
        <div class="row set-water-mark" style="height:450px">
            <div class="col-12">
                <h2 class="text-center " style="text-decoration: underline;">TO WHOM IT MAY CONCERN</h2>
                <p class="mt-4" style="text-align: justify;line-height:30px">
                    This is to certify that <span class="fw700">{{ $testimonial->first_name }}
                        {{ $testimonial->last_name }} (Roll NO{{ $testimonial->roll ?? '--' }})</span>, son of <span
                        class="fw700">{{ $testimonial->father_name }} and
                        {{ $testimonial->mother_name }}</span>,
                    {{-- <span class="fw700">{{ $testimonial->Student->address }}</span> --}}
                    is a student of
                    Notre Dame College Mymensingh in <span
                        class="fw700">class-{{ $testimonial->class->class_name ?? '' }}</span>, <span
                        class="fw700">{{ $testimonial->studentGroup->group_name ?? '--' }}
                    </span>
                    group.
                </p>
                <p style="text-align: left;margin-top:50px">
                    Any assistant given to him highly appreciated
                </p>
            </div>
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
