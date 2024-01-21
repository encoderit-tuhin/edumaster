<form action=""></form>
<table class="table table-bordered data-table">
    <thead>
        <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Name</th>
            <th scope="col">Roll</th>
            <th scope="col">Exam Name</th>
            <th scope="col">Mark</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $key => $item)
            <tr>
                {{-- <th scope="row">
             <input type="checkbox" value="{{ $item->id }}" name="users[{{$key}}]"
                checked="true">
          </th> --}}
                <th scope="row">{{ $item->id }} </th>
                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                <td>{{ $item->roll }}<input type="number" hidden value="{{ $item->roll }}"
                        name="prev_roll[{{ $key }}]"></td>
                <td>{{ $item->exam_name }}<input type="number" hidden value="{{ $item->exam_id }}" name="exam_id"></td>
                <td>
                    <input type="number" name="mark" id="" class="form-control">
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
<button type="submit" class="btn btn-primary">Submit</button>
