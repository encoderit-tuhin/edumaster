@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Payment Info') }}</s>
                </div>
                <div class="card-body">
                    <form action="{{ route('payment-fee-info') }}" method="get">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('Year') }}</label>
                                        <select name="year" id="year" class="form-control select2">
                                            @for ($i = 2023; $i < 2100; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">{{ _lang('Sections') }}</label>

                                        <select class="form-control select2" name="section_id">
                                            {{ create_option('sections', 'id', 'section_name', old('section_id')) }}
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-info mt-4">{{ _lang('Search') }}</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (isset($students) && !empty($students) && count($students) > 0)
                <div class="card-border">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <div>
                            {{-- <p> Month <strong>{{ $fromDate }}</strong> --}}
                            </p>
                        </div>

                        <div>
                            <p class="">Total Found: <strong>{{ count($students) ?? 0 }}</strong></p>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered data-table">
                            <thead>
                                <th>{{ _lang('Student ID') }}</th>
                                <th>{{ _lang('Roll') }}</th>
                                <th>{{ _lang('Name') }}</th>
                                <th>{{ _lang('Paid Amount') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($students as $data)
                                    <tr>
                                        <td class="text-right">{{ $data->student_id }}</td>
                                        <td class="text-right">{{ $data->roll }}</td>
                                        <td class="text-right">{{ $data->name }}</td>
                                        <td class="text-right">{{ $data->paid_amount }}</td>
                                        <td><a href="{{ route('payment-details-info',$data->student_id) }}"><i class="fa fa-eye"
                                                    aria-hidden="true">View</i></a></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
