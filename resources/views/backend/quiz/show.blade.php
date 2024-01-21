<div>
    @if (count($quizzes) <= 0)
        <p class='text-center text-danger'>No Data Found</p>
    @else
        @if (!empty($error))
            <div class="alert alert-danger">
                <p class="text-center"> Quiz marks already Added. </p>
            </div>
        @endif
        <table class="table table-responsive border">
            <thead>
                <tr>
                    <th class="id" scope="col">Id</th>
                    <th class="name" scope="col">Name</th>
                    <th class="quiz" style="text-align: center;" colspan="2" scope="col">Quiz 1</th>
                    <th class="quiz" style="text-align: center;" colspan="2" scope="col">Quiz 2</th>
                    <th class="quiz" style="text-align: center;" colspan="2" scope="col">Quiz 3</th>
                    <th class="quiz" style="text-align: center;" colspan="2" scope="col">Quiz 4</th>
                </tr>
                <tr>
                    <th class="id" scope="col">Id</th>
                    <th class="name" scope="col">Name</th>
                    <th class="quiz" style="text-align: center;" scope="col">MCQ</th>
                    <th class="quiz" style="text-align: center;" scope="col">CQ</th>
                    <th class="quiz" style="text-align: center;" scope="col">MCQ</th>
                    <th class="quiz"style="text-align: center;" scope="col">CQ</th>
                    <th class="quiz" style="text-align: center;" scope="col">MCQ</th>
                    <th class="quiz" style="text-align: center;" scope="col">CQ</th>
                    <th class="quiz" style="text-align: center;" scope="col">MCQ</th>
                    <th class="quiz" style="text-align: center;" scope="col">CQ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $key => $quiz)
                    {{-- <tr>
                        <td class="id">{{ $quiz->id }}</td>
                        <td class="name">{{ $quiz->student->first_name }} {{ $quiz->last_name }}</td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control" disabled
                                value="{{ $quiz->quiz1 }}">
                        </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control" disabled
                                value="{{ $quiz->quiz2 }}">
                        </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control" disabled
                                value="{{ $quiz->quiz3 }}">
                        </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control" disabled
                                value="{{ $quiz->quiz4 }}">
                        </td>

                    </tr> --}}
                    <tr>
                        <td class="id">{{ $student->id }}</td>
                        <input type="hidden" name="student_id[{{ $key }}]" value="{{ $student->id }}">

                        <td class="name">{{ $student?->student?->user?->name }} </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control"
                                name="quiz1[{{ $key }}][]" placeholder="MCQ">
                        </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control"
                                name="quiz1[{{ $key }}][]" placeholder="CQ">
                        </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control"
                                name="quiz2[{{ $key }}][]" placeholder="MCQ">
                        </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control"
                                name="quiz2[{{ $key }}][]" placeholder="CQ">
                        </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control"
                                name="quiz3[{{ $key }}][]" placeholder="MCQ">
                        </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control"
                                name="quiz3[{{ $key }}][]" placeholder="CQ">
                        </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control"
                                name="quiz4[{{ $key }}][]" placeholder="MCQ">
                        </td>
                        <td class="quiz">
                            <input type="text" class="form-control-sm form-control"
                                name="quiz4[{{ $key }}][]" placeholder="CQ">
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
