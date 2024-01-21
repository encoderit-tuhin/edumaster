<table class="table table-bordered data-table">
    <thead>
       <tr>
          {{-- <th scope="col"> <button type="button" onclick="checkAllInput()" class="btn btn-success btn-sm "
             id="checkAllButton"> <i class="fa fa-check" aria-hidden="true"></i> </button></th> --}}
         <th scope="col"><input type="checkbox" class="mb-3" id="student-select-all"></th>
          <th scope="col">User Id</th>
          <th scope="col">Name</th>
          <th scope="col">Roll</th>
          <th scope="col">Reg No</th>
          <th scope="col">Class </th>
          <th scope="col">Section </th>
          <th scope="col">Group </th>
          <th scope="col">New Roll</th>
       </tr>
    </thead>
    <tbody>
       @foreach ($students as $key => $item)
       <tr>
          <th scope="row">
                <input type="checkbox" class="student-checkbox" name="users[{{$key}}]"
                value="{{ $item->user_id }}">
          </th>
          <td scope="row">{{ $item->user_id }}</td>
          <td>{{ $item->first_name }} {{ $item->last_name }}</td>
          <td>{{ $item->roll }}<input type="number" hidden value="{{ $item->roll }}" name="prev_roll[{{$key }}]"></td>
          <td>{{ $item->register_no }} <input type="text" hidden value="{{$item->register_no}}" name="register_no[{{$key}}]"></td>
          <td>{{ $item->studentSession?->class?->class_name }} <input type="number" hidden value="{{ $item->studentSession?->class->id}}" name="class_id[{{$key}}]"></td>
          <td>
             {{ $item->studentSession?->section?->section_name }}
             {{-- <input type="number" hidden value="{{$item->studentSession?->section?->id}}" name="section_id[{{$key}}]"> --}}
          </td>
          <td>
             {{ $item->studentGroup?->group_name }}
             {{-- <input type="number" hidden value="{{$item->studentGroup?->id}}" name="group_id[{{$key}}]"> --}}
          </td>
          <td> 
             <input type="number" value="{{$item->roll }}" name="new_roll[{{$key}}]" id="" class="form-control">
          </td>
         
             <input type="number" value="{{$item->studentSession->id }}" name="session_table_id[{{$key}}]" id="" hidden class="form-control">
         
       </tr>
       @endforeach
    </tbody>
</table>