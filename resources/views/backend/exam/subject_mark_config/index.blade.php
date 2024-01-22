@extends('layouts.backend')

@section('content')
<style>
    .row_d{
        display: flex;
        flex-wrap: wrap;
    }
    .form_input_add_remove .form_group{
        display: flex;
        align-items: center;
        margin: 7px 0;
    }
    .form_input_add_remove .form_group label {
        padding-top: 0;
        white-space: nowrap;
    }
    .form_input_add_remove .row_d{
        margin-bottom: 50px;
    }
    .form_input_add_remove .right__form_g{
        width: 57%;
    }
    .form_input_add_remove .left__form_g{
        margin-right: 50px;
        width: calc(43% - 50px);
    }
    .container_add_item .form_group .btn_remove{
        min-width: 45px;
        margin-left: auto;
    }
    .form_input_add_remove .left_col{
        margin-right: 20px;
    }
    .form_input_add_remove .right_col{
        margin-left: auto;
    }
    .exam_name{
        min-height: 34px;
    }
    .form_input_add_remove .right__form_g .form_group .w_40
    {
        width: 42%;
        margin-right: 15px;
    }
</style>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default no-export">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('Exam Configurations') }}
                    </span>

                </div>
                <div class="panel-body">
                    <form method="post" action="{{ route('subexam') }}"class="form_input_add_remove form-horizontal form-groups-bordered validate">
                       @csrf
                        <div class="row_d">
                            <div class="left__form_g">
                                <div class="form_group exam_name">
                                    <label class="control-label left_col" for="">Exam Name</label>
                                </div>
                                <div class="form_group">
                                    <input class="form-control right_col" type="text" name="name" id="" />
                                </div>
                            </div>
                            <div class="right__form_g">
                                <div class="form_group">
                                    <div class="w_40">
                                        <label class="control-label left_col" for="">Sub Exam Name</label>
                                    </div>
                                    <div class="w_40">
                                        <label class="control-label left_col" for="">Percentage</label>
                                    </div>
                                    <div class="right_col text-end">
                                        <button class="btn btn-info" type="button" onclick="addInputDiv()">
                                            Add
                                        </button>
                                    </div>
                                </div>
                                <div class="container_add_item right_col">
                                    <div class="form_group">
                                        <div class="w_40">
                                            <input class="form-control" type="text" name="subname[]" id="" />
                                        </div>
                                        <div class="w_40">
                                            <input class="form-control" type="text" name="marks[]" id="" />
                                        </div>
                                         <button class="btn btn-danger btn-xs btn_remove" onclick="removeInputItem(this)">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <input type="submit" class="btn btn-success" value="Apply">
                        </div>
                    </form>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>{{ _lang('SL') }}</th>
                                <th>{{ _lang('Exam Name') }}</th>
                                <th>{{ _lang('Sub Exam') }}</th>
                                <th>{{ _lang('Marks') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($subexams as $exam)
                                <tr>
                                    <td class='exam_name'>{{ $loop->iteration }}</td>
                                    <td class='exam_name'>
                                        {{ $exam->exam->name }}
                                    </td>
                                    <td class='subname'>
                                        {{$exam->subname}}
                                    </td>
                                    <td class='class'>
                                        {{$exam->marks}}
                                    </td>
                                    <td>
                                        <form action="{{ route('subexam.delete', ['id' => $exam->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this subexam?')">
                                            @csrf
                                            @method('DELETE') <!-- Add this line to specify the DELETE method -->
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                       </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>

<script>
  function addInputDiv() {
    var createNewItem = document.createElement("div");
    createNewItem.classList.add('form_group');
    createNewItem.innerHTML =
      `
      <div class="w_40">
        <input class="form-control" type="text" name="subname[]" id="" />
      </div>
      <div class="w_40">
        <input class="form-control" type="text" name="marks[]" id="" />
      </div>
      <button class="btn btn-danger btn-xs btn_remove" onclick="removeInputItem(this)">
           <i class="fa fa-trash" aria-hidden="true"></i>
       </button>

      `;

    document.querySelector(".container_add_item").appendChild(createNewItem);
  }

  function removeInputItem(btn) {
    var parentDiv = btn.parentNode;
    parentDiv.parentNode.removeChild(parentDiv);
  }
</script>
@endsection
