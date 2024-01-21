@extends('layouts.backend')

@section('styles')
    <style>
        .media-buttons-row {
            display: flex;
            font-size: 12px;
        }

        .custom-text-button.delete-button {
            color: #dc3545;
        }

        .custom-text-button.copy-button {
            color: #ffc107;
        }

        .custom-text-button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            padding: 0;
            margin-right: 5px;
        }

        .custom-text-link {
            color: #007bff;
            text-decoration: none;
            margin-right: 5px;
        }

        .separator {
            color: #000;
            margin-right: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ __('Media List') }}
                    </span>
                </div>

                <div class="panel-body no-export">
                    <div class="row">
                        <form action="{{ route('medias.filter') }}" method="POST">
                            @csrf

                            <div class="col-md-2">
                                <select class="form-control" name="type">
                                    <option {{ Session::get('document_file_type') === 'all' ? 'selected' : '' }}
                                        value="all">{{ __('All Media items') }}
                                    </option>
                                    <option {{ Session::get('document_file_type') === 'image' ? 'selected' : '' }}
                                        value="image">{{ __('Image') }}</option>
                                    <option {{ Session::get('document_file_type') === 'audio' ? 'selected' : '' }}
                                        value="audio">{{ __('Audio') }}</option>
                                    <option {{ Session::get('document_file_type') === 'video' ? 'selected' : '' }}
                                        value="video">{{ __('Video') }}</option>
                                    <option {{ Session::get('document_file_type') === 'document' ? 'selected' : '' }}
                                        value="document">
                                        {{ __('Documents') }}</option>
                                </select>
                            </div>
                            <div class="col-md-2">

                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Filter') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                        <div class="col-md-8">
                            <div class="input-group" style="margin-left: auto">
                                <a href="{{ route('medias.create') }}" class="btn btn-success">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ __('Add New') }}
                                </a>
                            </div>
                        </div>
                    </div>


                    <table class="table data-table">
                        <thead>
                            <tr>
                                <th width="5%">
                                    <input type="checkbox" class="check-all" name="checkedAll">
                                </th>
                                <th width="55%">{{ __('File') }}</th>
                                <th width="10%">{{ __('Author') }}</th>
                                <th width="10%">{{ __('File Type') }}</th>
                                <th width="10%">{{ __('Year') }}</th>
                                <th width="10%">{{ __('Date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medias as $data)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkbox-item" name="mediaCheckbox[]"
                                            value="{{ $data->id }}">
                                    </td>

                                    <td class="media-item">
                                        <div class="" style="display:flex;">
                                            <div class="media-thumbnail">

                                                @if ($data->type === 'image')
                                                    {{-- @if ($data->media_category_id == 17)
                                                        <img src="{{ asset('uploads/mujib_galleries/' . $data->file) }}"
                                                            width="100px" alt="{{ $data->file }}"
                                                            style="margin: 15px 15px 15px 0">
                                                    @else --}}
                                                    <img src="{{ asset('uploads/media_files/' . $data->file) }}"
                                                        width="100px" alt="{{ $data->file }}"
                                                        style="margin: 15px 15px 15px 0">
                                                    {{-- @endif --}}
                                                @elseif ($data->type === 'video')
                                                    {{-- @if ($data->is_url === '1')
                                                        <iframe width="100px" height="50px" src="{{ $data->file }}"
                                                            frameborder="0" allowfullscreen=""></iframe>
                                                    @endif

                                                    @if ($data->is_url === '0') --}}
                                                    <video controls width="100px" style="margin: 15px 15px 15px 0">
                                                        <source src="{{ asset('uploads/media_files/' . $data->file) }}"
                                                            type="video/mp4">
                                                    </video>
                                                    {{-- @endif --}}
                                                @elseif ($data->type === 'document')
                                                    <div style="margin: 0 40px;">
                                                        <a href="{{ asset('uploads/media_files/' . $data->file) }}"
                                                            target="_blank">
                                                            <i class="fa fa-file" style="font-size: 48px;"></i>
                                                        </a>
                                                    </div>
                                                @else
                                                @endif
                                            </div>

                                            <div class="media-info">
                                                <ul
                                                    style="list-style: none; margin: 0; padding:0; margin-top: 5px; margin-bottom: 10px;">
                                                    <li>{{ $data->title }}</li>
                                                    <li>{{ $data->file }}</li>
                                                </ul>

                                                <div class="media-buttons-row">
                                                    <a href="{{ route('medias.edit', $data->id) }}"
                                                        class="custom-text-link">Edit</a>


                                                    <span class="separator">|</span>

                                                    <form action="{{ route('medias.destroy', $data->id) }}" method="post"
                                                        class="delete-form">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                        <button type="submit" class="custom-text-button text-danger"
                                                            style="color:red;">Delete
                                                            Permanently</button>
                                                    </form>

                                                    @if ($data->is_url === '0')
                                                        <span class="separator">|</span>

                                                        <a href="{{ asset('uploads/media_files/' . $data->file) }}"
                                                            class="custom-text-link" target="_blank"
                                                            id="viewLink_{{ $data->id }}">View</a>

                                                        <span class="separator">|</span>

                                                        <button class="custom-text-button copy-url-button"
                                                            data-link="#viewLink_{{ $data->id }}">Copy URL</button>

                                                        <span class="separator">|</span>

                                                        <a href="{{ asset('uploads/media_files/' . $data->file) }}"
                                                            class="custom-text-link" download>Download</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                    <td>{{ $data->user->name }}</td>

                                    <td>
                                        {{ $data->type }}
                                    </td>

                                    <td>
                                        {{ $data->year }}
                                    </td>

                                    <td>{{ $data->uploaded_on }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        function showClass(elem) {
            if ($(elem).val() == "") {
                return;
            }
            window.location = "<?php echo url('medias/class'); ?>/" + $(elem).val();
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const copyButtons = document.querySelectorAll(".copy-url-button");

            copyButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    const linkId = this.getAttribute("data-link");
                    const viewLink = document.querySelector(linkId);
                    const tempInput = document.createElement("input");
                    tempInput.value = viewLink.getAttribute("href");

                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand("copy");

                    document.body.removeChild(tempInput);
                    alert("URL copied to clipboard: " + tempInput.value);
                });
            });


            const checkAllCheckbox = document.querySelector(".check-all");
            const checkboxItems = document.querySelectorAll(".checkbox-item");

            checkAllCheckbox.addEventListener("click", function() {
                const isChecked = this.checked;

                checkboxItems.forEach(function(checkbox) {
                    checkbox.checked = isChecked;
                });
            });
        });
    </script>
@stop
