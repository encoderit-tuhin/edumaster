@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ __('Update Media') }}
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('medias.update', $media->id) }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <div class="col-sm-6">
                                @if ($media->is_url === '0')
                                    <label class="control-label">{{ __('File Upload') }}</label>
                                    <input type="file" class="form-control dropify" name="file"
                                        data-default-file="{{ asset('uploads/media_files/' . $media->file) }}" required>
                                @endif

                                @if ($media->is_url === '1')
                                    <label class="control-label">{{ __('URL Link') }}</label>
                                    <input type="text" placeholder="https://www.youtube.com" class="form-control"
                                        name="url_link" id="fileUrlInput" value="{{ $media->file }}" required />
                                @endif
                            </div>

                            <div class="col-sm-6">

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">
                                        {{ __('Categoy') }}
                                        <i class="fa fa-plus" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal1" data-bs-whatever="@mdo"></i>

                                    </div>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option readonly value="">Select Category</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">Year</div>
                                    <div class="col-sm-9">
                                        <input name="year" type="text" class="form-control"
                                            value="{{ $media->year }}" />
                                    </div>
                                </div>

                                <ul style="list-style: none; margin: 5px 0">
                                    <li><strong>{{ __('Uploaded On') }}: </strong> <span
                                            id="uploaded-on">{{ $media->uploaded_on }}</span></li>
                                    <li>
                                        <strong>{{ __('Uploaded by') }}: </strong>
                                        <span>{{ $media->user->name }}</span>
                                    </li>

                                    <li><strong>{{ __('File Name') }}: </strong> <span
                                            id="file-name">{{ $media->file_name }}</span>
                                    </li>
                                    <li><strong>{{ __('File Type') }}: </strong> <span
                                            id="file-type">{{ $media->file_type }}</span>
                                    </li>
                                    <li><strong>{{ __('File Size') }}: </strong> <span
                                            id="file-size">{{ $media->file_size }}</span>
                                    </li>
                                    <li><strong>{{ __('Dimensions') }}: </strong> <span
                                            id="dimensions">{{ $media->dimensions }}</span>
                                    </li>

                                    <input type="hidden" name="uploaded_on" id="hidden-uploaded-on"
                                        value="{{ $media->uploaded_on }}">
                                    <input type="hidden" name="uploaded_by" value="{{ $media->uploaded_by }}">
                                    <input type="hidden" name="file_name" id="hidden-file-name"
                                        value="{{ $media->file_name }}">
                                    <input type="hidden" name="file_type" id="hidden-file-type"
                                        value="{{ $media->file_type }}">
                                    <input type="hidden" name="file_size" id="hidden-file-size"
                                        value="{{ $media->file_size }}">
                                    <input type="hidden" name="dimensions" id="hidden-dimensions"
                                        value="{{ $media->dimensions }}">

                                </ul>
                                <hr>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('Alternative Text') }}</div>
                                    <div class="col-sm-9">
                                        <textarea name="alt_text" class="form-control" rows="4" cols="4">{{ $media->alt_text }}</textarea>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('Title') }}</div>
                                    <div class="col-sm-9">
                                        <input name="title" type="text" class="form-control"
                                            value="{{ $media->title }}" />
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('Caption') }}</div>
                                    <div class="col-sm-9">
                                        <textarea name="caption" class="form-control" rows="4" cols="4">{{ $media->caption }}</textarea>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('Description') }}</div>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="form-control" rows="4" cols="4">{{ $media->description }}</textarea>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('File URL') }}</div>
                                    <div class="col-sm-9">
                                        <input type="text" name="file_url" class="form-control" id="file_url"
                                            value="{{ $media->file_url }}" />
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right"></div>
                                    <div class="col-sm-9">
                                        <button type="button" id="copyButton">{{ __('Copy URL to Clipboard') }}</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info">{{ __('Update Media') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    @include('backend.medias.edit_script_file')
@endsection
