<div id="BASICINFOMATION" class="tabcontent">
    <div class="row">
        <div class="col-md-12">
            <table class="table no-border">
                <tr>
                    <td>Student ID</td>
                    <td> <span>:</span>
                        @isset($student->id)
                            {{ $student->id }}
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td> <span>:</span>
                        @isset($student->first_name)
                            {{ $student->first_name . ' ' . ($student->last_name ?? '') }}
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td> <span>:</span>
                        @isset($student->gender)
                            {{ $student->gender }}
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>Religion</td>
                    <td> <span>:</span>
                        @isset($student->religion)
                            {{ $student->religion }}
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td> <span>:</span>
                        @isset($student->birthday)
                            {{ $student->birthday }}
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>Birth Certificate No</td>
                    <td> <span>:</span>
                        ---
                    </td>
                </tr>
                <tr>
                    <td>Father's Name</td>
                    <td> <span>:</span>
                        @isset($student->father_name)
                            {{ $student->father_name }}
                        @endisset
                    </td>
                </tr>

                <tr>
                    <td> Father's NID</td>
                    <td> <span>:</span>
                        ---
                    </td>
                </tr>

                <tr>
                    <td>Mother's Name</td>
                    <td> <span>:</span>
                        @isset($student->mother_name)
                            {{ $student->mother_name }}
                        @endisset
                    </td>
                </tr>

                <tr>
                    <td>Mother's NID</td>
                    <td> <span>:</span>
                        ---
                    </td>
                </tr>

                <tr>
                    <td>Guardian Mobile</td>
                    <td> <span>:</span>
                        ---
                    </td>
                </tr>

                <tr>
                    <td>Student Email</td>
                    <td> <span>:</span>
                        @isset($student->email)
                            {{ $student->email }}
                        @endisset
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
