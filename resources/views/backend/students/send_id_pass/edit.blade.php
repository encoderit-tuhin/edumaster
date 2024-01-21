@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Student ID/Pass</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('student-send-id-pass.update', $student->studentId) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Student ID') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $studentSession->roll ?? '' }}"
                                        readonly>

                                    <input type="hidden" class="form-control" name="form_submit" value="student_id_pass"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Password') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="password"
                                        value="{{ $student->password_static }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Phone') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone" value="{{ $student->phone }}">
                                    <input type="hidden" class="form-control" name="email" value="{{ $student->email }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Photo') }}</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control dropify"
                                        data-default-file="{{ asset('uploads/images/' . $student->image) }}" name="image"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>

                            <button class="btn btn-success float-right " type="submit">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
