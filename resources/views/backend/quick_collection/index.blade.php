@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card">
                        <form method="get" class="" autocomplete="off">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Section') }}</label>
                                    <select name="section_id" id="section_id" class="form-control select2">
                                        {{ create_option('sections', 'id', 'section_name', isset($request->section_id) ?? $request->section_id) }}
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-5">
                                <button type="submit" class="btn btn-primary">{{ _lang('Search') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if (isset($students))
                    <div class="col-lg-12">
                        <div class="panel-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ _lang('Student ID') }}</th>
                                        <th>{{ _lang('Roll No') }}</th>
                                        <th>{{ _lang('Name') }}</th>
                                        <th>{{ _lang('Class') }}</th>
                                        <th>{{ _lang('Group') }}</th>
                                        <th>{{ _lang('Category') }}</th>
                                        <th>{{ _lang('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->roll }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->class_name }}</td>
                                            <td>{{ $student->group_name }}</td>
                                            <td>
                                                {{ $student->studentCategory->name }}
                                            </td>
                                            <td>
                                                <a href="{{ route('quick-collection.show', $student->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
