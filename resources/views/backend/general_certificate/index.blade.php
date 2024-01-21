@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">{{ _lang('Testimonial List') }}</h4>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('testimonial.create') }}"
                            class="btn btn-info btn-sm">{{ _lang('Testimonial Application') }}</a>
                    </div>
                </div>
                <div class="content">
                    <div class="panel-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <th>{{ _lang('Id') }}</th>
                                <th>{{ _lang('Student Name ') }}</th>
                                <th>{{ _lang('Board') }}</th>
                                <th>{{ _lang('Exam Name') }}</th>
                                <th>{{ _lang('Reg No') }}</th>
                                <th>{{ _lang('Roll No') }}</th>
                                <th>{{ _lang('GPA') }}</th>
                                <th>{{ _lang('Grade') }}</th>
                                <th>{{ _lang('Passing Year') }}</th>
                                <th>{{ _lang('Issue Date') }}</th>

                                <th>{{ _lang('Action') }}</th>
                            </thead>
                            <tbody>
                                @if (isset($testimonials) && count($testimonials) > 0)
                                    @foreach ($testimonials as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ optional($data->Student)->first_name }}
                                                {{ optional($data->Student)->last_name }}</td>
                                            <td>{{ $data->board_name }}</td>
                                            <td>{{ $data->exam_name }}</td>
                                            <td>{{ $data->board_reg_no }}</td>
                                            <td>{{ $data->board_roll_no }}</td>
                                            <td>{{ $data->gpa }}</td>
                                            <td>{{ $data->grade }}</td>
                                            <td>{{ $data->passing_year }}</td>
                                            <td>{{ $data->issue_date }}</td>
                                            <td>
                                                <form action="{{ route('testimonial.destroy', $data->id) }}"
                                                    method="POST">
                                                    <a href="{{ route('testimonial.pdf', $data->id) }}"
                                                        class="btn btn-warning btn-xs" title="download">
                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                    </a>


                                                    <a href="{{ route('testimonial.edit', $data->id) }}"> <i
                                                            class="fa fa-pencil" aria-hidden="true"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs btn-remove"><i
                                                            class="fa fa-trash" aria-hidden="true"></i> </button>

                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-danger">No Testimonials Found</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
