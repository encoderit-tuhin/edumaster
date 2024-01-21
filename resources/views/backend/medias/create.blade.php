@extends('layouts.backend')

@section('styles')
    <style>
        /* CSS for the modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
@endsection
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
                    <form action="{{ route('medias.store') }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf

                        <div class="form-group">
                            <div class="col-sm-6">
                                <div id="fileUpload">
                                    <label class="control-label">{{ __('File Upload') }}</label>
                                    <input type="file" class="form-control dropify" name="file" id="fileInput"
                                        required>
                                </div>

                                <input type="checkbox" class="" name="file_checked" id="fileCheckbox"
                                    style="margin-right: 5px;">
                                <label class="control-label">{{ __('Video URL Link') }}</label>

                                <div id="urlUpload" style="display: none;">
                                    <label class="control-label">{{ __('URL Link') }}</label>
                                    <input type="text" placeholder="https://www.youtube.com" class="form-control"
                                        name="url_link" id="fileUrlInput" required />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">
                                        {{ __('Category') }}
                                        <i class="fa fa-plus" type="button" id="openModalButton"></i>

                                    </div>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option readonly value="">{{ __('Select Category') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;" id="subcategoryContainer">
                                    <div class="col-sm-3 text-right">
                                        {{ __('Sub Category') }}
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="subcategory-div">
                                            <select class="form-control" name="subcategory_id" id="subcategory_id">
                                                <option readonly value="">{{ __('Select Subcategory') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('Year') }}</div>
                                    <div class="col-sm-9">
                                        <input name="year" type="text" class="form-control"
                                            value="{{ old('year', date('Y')) }}" />
                                    </div>
                                </div>

                                <ul style="list-style: none; margin: 5px 0">
                                    <li><strong>{{ __('Uploaded On') }}: </strong> <span id="uploaded-on"></span></li>
                                    <li><strong>{{ __('Uploaded by') }}: </strong> <span id="uploaded-by"></span></li>
                                    <li><strong>{{ __('File Name') }}: </strong> <span id="file-name"></span></li>
                                    <li><strong>{{ __('File Type') }}: </strong> <span id="file-type"></span></li>
                                    <li><strong>{{ __('File Size') }}: </strong> <span id="file-size"></span></li>
                                    <li><strong>{{ __('Dimensions') }}: </strong> <span id="dimensions"></span></li>

                                    <input type="hidden" name="uploaded_on" id="hidden-uploaded-on" value="">
                                    <input type="hidden" name="uploaded_by" id="hidden-uploaded-by" value="">
                                    <input type="hidden" name="file_name" id="hidden-file-name" value="">
                                    <input type="hidden" name="file_type" id="hidden-file-type" value="">
                                    <input type="hidden" name="file_size" id="hidden-file-size" value="">
                                    <input type="hidden" name="dimensions" id="hidden-dimensions" value="">

                                </ul>
                                <hr>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('Alternative Text') }} </div>
                                    <div class="col-sm-9">
                                        <textarea name="alt_text" class="form-control" rows="4" cols="4"></textarea>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('Title') }}</div>
                                    <div class="col-sm-9">
                                        <input name="title" type="text" class="form-control" />
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('Caption') }}</div>
                                    <div class="col-sm-9">
                                        <textarea name="caption" class="form-control" rows="4" cols="4"></textarea>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('Description') }}</div>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="form-control" rows="4" cols="4"></textarea>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-3 text-right">{{ __('File URL') }} </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="file_url" class="form-control" id="file_url" />
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


                    <!-- Category Modal Start -->
                    <div id="customModal" class="modal">
                        <div class="modal-content">
                            <form id="categoryForm" method="post">
                                @csrf
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="exampleModal1Label">{{ __('New Category') }}</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="category" class="control-label">
                                                {{ __('Category') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="category"
                                                placeholder="Enter category" value="{{ old('category') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default"
                                        id="closeModalButton">{{ __('Close') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- Category Modal End -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    @include('backend.medias.create_script_file')
@endsection
