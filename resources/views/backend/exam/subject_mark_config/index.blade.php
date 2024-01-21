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
        justify-content: space-between;
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
        margin-left: 50px;
    }
    .form_input_add_remove .right__form_g,
    .form_input_add_remove .left__form_g{
        width: calc(50% - 25px);
    }
    .container_add_item .form_group .btn_remove{
        min-width: 45px;
        margin-left: 20px;
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
                    <form class="form_input_add_remove form-horizontal form-groups-bordered validate">
                        <div class="row_d">
                            <div class="left__form_g">
                                <div class="form_group exam_name">
                                    <label class="control-label left_col" for="">Exam Name</label>
                                </div>
                                <div class="form_group">
                                    <input class="form-control right_col" type="text" name="" id="" />
                                </div>
                            </div>
                            <div class="right__form_g">
                                <div class="form_group">
                                    <label class="control-label left_col" for="">Sub Exam Name</label>
                                    <div class="right_col text-end">
                                        <button class="btn btn-info" type="button" onclick="addInputDiv()">
                                            Add
                                        </button>
                                    </div>
                                </div>
                                <div class="container_add_item right_col">
                                    <div class="form_group">
                                        <input class="form-control" type="text" name="" id="" />
                                        <button class="btn btn-danger btn-xs btn_remove" onclick="removeInputItem(this)">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>{{ _lang('SL') }}</th>
                                <th>{{ _lang('Exam Name') }}</th>
                                <th>{{ _lang('Exam Start At	') }}</th>
                                <th>{{ _lang('Class') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($examSubjectMarkConfigs as $exam)
                                <tr>
                                    <td class='exam_name'>{{ $loop->iteration }}</td>
                                    <td class='exam_name'>
                                        @foreach ($allExams as $examName)
                                            @if ($examName->id == $exam->exam_id)
                                                {{$examName->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class='date_time'>
                                        @php
                                            $dateTime =  $exam->date_time;
                                            $formatDateTime = \Carbon\Carbon::parse($dateTime)->format('Y-m-d h:i A');
                                        @endphp
                                            {{ $formatDateTime }}
                                    </td>
                                    <td class='class'>
                                        @foreach ($allclasses as $className)
                                            @if ($className->id == $exam->class_id)
                                                {{$className->class_name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class='action'><a href="{{ route('exams.all-exams-id', ['exam_id' => $exam->exam_id, 'class_id' => $exam->class_id]) }}"><i class="fa fa-eye"></i></a></td>
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
      <input class="form-control" type="text" name="" id="" />
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
