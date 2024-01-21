@php
    use Carbon\Carbon;
    $now = Carbon::now();
    $today = $now->format('Y-m-d');

@endphp<header style="height: 220px" id="testimonial-header">
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
    <p class="fw700 float-right">Date: {{ $today }}</p>
</header>
