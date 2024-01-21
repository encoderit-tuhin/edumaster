<table class="table table-bordered data-table">
    <thead>
       <tr>
          <th scope="col"> <button type="button" onclick="checkAllInput()" class="btn btn-success btn-sm "
             id="checkAllButton"> <i class="fa fa-check" aria-hidden="true"></i> </button></th>
          <th scope="col">SL</th>
          <th scope="col">User Id</th>
          <th scope="col">Name</th>
          <th scope="col">Parent Name</th>
          <th scope="col">Phone Number</th>
       </tr>
    </thead>
    <tbody>
       @foreach ($students as $key => $item)
       <tr>
          <td scope="row">
             <input type="checkbox" value="{{ $item->phone }}" name="users[{{ $item->user_id }}]"
                checked="true">
          </td>
          <td scope="row">{{ $key + 1 }}</td>
          <td scope="row">{{ $item->user_id }}</td>
          <td>{{ $item->first_name }} {{ $item->last_name }}</td>
          <td>{{ $item->parent_name }}</td>
          <td>{{ $item->parent_phone }}</td>
       </tr>
       @endforeach
    </tbody>
 </table>