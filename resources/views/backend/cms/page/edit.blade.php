@extends('layouts.backend')

@section('content')
    <div class="row">

        <form method="post" class="validate" autocomplete="off" action="{{ action('PageController@update', $id) }}"
            enctype="multipart/form-data">

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-11">
                        <ul class="nav nav-tabs">
                            <li class="active" style="flex: 1 1 auto; text-align: center">
                                <a href="#tab1" data-toggle="tab">
                                    <img src="{{ asset('backend/img/country-image/en.png') }}" height="11" class="mr-1"
                                        style="margin-right: .25rem!important;">
                                    <span>{{ __('English') }}</span>
                                </a>
                            </li>

                            <li style="flex: 1 1 auto; text-align: center">
                                <a href="#tab2" data-toggle="tab">
                                    <img src="{{ asset('backend/img/country-image/bd.png') }}" height="11" class="mr-1"
                                        style="margin-right: .25rem!important; vertical-align: middle; border-style:none;">
                                    <span>{{ __('Bangla') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1">
                        <ul class="nav nav-tabs" style="float: right;">
                            <li style="flex: 1 1 auto; text-align: center">
                                <a href="#tab-settings" data-toggle="tab">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="panel-title">{{ __('Update Page') }}</span>
                            </div>

                            <div class="panel-body">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Page Title') }}</label>
                                        <input type="text" class="form-control" name="page_title[]"
                                            value="{{ $page->content[0]->page_title }}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Page Content') }}</label>
                                        <textarea class="form-control summernote" name="page_content[]">{{ $page->content[0]->page_content }}</textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="page_content_id[]" value="{{ $page->content[0]->id }}">
                                <input type="hidden" name="language[]" value="en">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Seo Meta Keywords') }}</label>
                                        <textarea class="form-control" name="seo_meta_keywords[]">{{ $page->content[0]->seo_meta_keywords }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Seo Meta Description') }}</label>
                                        <textarea class="form-control" name="seo_meta_description[]">{{ $page->content[0]->seo_meta_description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary pull-right">{{ __('Update Page') }}</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!--End Col-9-->

                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ __('Page Setting') }}</div>

                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('URL Slug') }}</label>
                                        <input type="text" class="form-control" name="slug"
                                            value="{{ $page->slug }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Page Status') }}</label>
                                        <select class="form-control select2" name="page_status">
                                            <option value="publish"
                                                {{ $page->page_status == 'publish' ? 'selected' : '' }}>
                                                {{ __('Publish') }}</option>
                                            <option value="draft" {{ $page->page_status == 'draft' ? 'selected' : '' }}>
                                                {{ __('Draft') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Is Section') }}</label>
                                        <select class="form-control select2" name="is_section">
                                            <option {{ $page->is_section == '0' ? 'selected' : '' }} value="0">
                                                {{ __('No') }}</option>
                                            <option {{ $page->is_section == '1' ? 'selected' : '' }} value="1">
                                                {{ __('Yes') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Page Template') }}</label>
                                        <select class="form-control select2" id="page_template" name="page_template">
                                            <option value="default">{{ __('Default ') }}</option>
                                            {!! load_custom_template() !!}
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Featured Image') }}</label>
                                        <input type="file" class="dropify" name="featured_image"
                                            data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG"
                                            data-show-remove="false"
                                            data-default-file="{{ asset('uploads/media/' . $page->featured_image) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab2">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="panel-title">{{ __('Update Page') }}</span>
                            </div>

                            <div class="panel-body">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Page Title') }}</label>
                                        <input type="text" class="form-control" name="page_title[]"
                                            value="{{ $page->content[1]->page_title }}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Page Content') }}</label>
                                        <textarea class="form-control summernote" name="page_content[]">{{ $page->content[1]->page_content }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Seo Meta Keywords') }}</label>
                                        <textarea class="form-control" name="seo_meta_keywords[]">{{ $page->content[1]->seo_meta_keywords }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Seo Meta Description') }}</label>
                                        <textarea class="form-control" name="seo_meta_description[]">{{ $page->content[1]->seo_meta_description }}</textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="page_content_id[]" value="{{ $page->content[1]->id }}">
                                <input type="hidden" name="language[]" value="bn">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary pull-right">{{ __('Update Page') }}</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!--End Col-9-->


                </div>

                <div class="tab-pane" id="tab-settings">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="panel-title">{{ __('Update Page Settings') }}</span>
                            </div>

                            <div class="panel-body">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="col-md-12">
                                    <h5>{{ __('Page Sections') }}</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 200px;">{{ __('Section') }}</th>
                                                <th>{{ __('Background') }}</th>
                                                <th>{{ __('Page ordering') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pageSections as $pageSection)
                                                <tr>
                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" value="1"
                                                                name="home_page_settings[{{ $pageSection['key'] }}][enabled]"
                                                                {{ $pageSection['enabled'] ? 'checked' : '' }}>
                                                            <span class="slider round"></span>
                                                            <span class="label">{{ $pageSection['label'] }}<span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <input type="color"
                                                            name="home_page_settings[{{ $pageSection['key'] }}][background]"
                                                            value="{{ $pageSection['background'] }}">
                                                    </td>
                                                    <td>
                                                        <input type="number"
                                                            name="home_page_settings[{{ $pageSection['key'] }}][order]"
                                                            value="{{ $pageSection['order'] }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary pull-right">{{ __('Update Page Settings') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--End Col-9-->
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js-script')
    <script>
        $("#page_category").val("{{ $page->category_id }}");
        $("#page_template").val("{{ $page->page_template }}");
    </script>
@endsection
