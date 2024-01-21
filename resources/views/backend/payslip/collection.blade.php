@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab">
                <li class="{{ empty(request()->type) || request()->type === 'single' ? 'active' : '' }}">
                    <a href="{{ route('payslip.create.collection') }}?type=single" aria-expanded="true">
                        {{ _lang('SINGLE') }}
                    </a>
                </li>
                <li class="{{ request()->type === 'multiple' ? 'active' : '' }}">
                    <a href="{{ route('payslip.create.collection') }}?type=multiple" aria-expanded="false">
                        {{ _lang('MULTIPLE') }}
                    </a>
                </li>
            </ul>

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <form method="get" class="" autocomplete="off"
                                action="{{ route('payslip.create.collection') }}?type={{ request()->type }}">
                                <input type="hidden" name="type" value="{{ request()->type ?? 'single' }}" />
                                @if (request()->type === 'single' || empty(request()->type))
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Student ID') }}</label>
                                            <input class="form-control" type="number" name="student_id"
                                                placeholder="Student ID" value="{{ request()->student_id }}" required />
                                        </div>
                                    </div>
                                @elseif (request()->type === 'multiple')
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! generate_select(
                                                        'session_id',
                                                        App\AcademicYear::get()->pluck('session', 'id'),
                                                        __('Academic Year'),
                                                        request()->session_id,
                                                        true,
                                                        __('--Select--'),
                                                        'form-control select2',
                                                    ) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- class --}}
                                                    {!! generate_select(
                                                        'class_id',
                                                        App\ClassModel::get()->pluck('class_name', 'id'),
                                                        __('Class'),
                                                        request()->class_id,
                                                        false,
                                                        __('--Select--'),
                                                        'form-control select2',
                                                    ) !!}
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- section --}}
                                                    {!! generate_select(
                                                        'section_id',
                                                        App\Section::get()->pluck('section_name', 'id'),
                                                        __('Section'),
                                                        request()->section_id,
                                                        false,
                                                        __('--Select--'),
                                                        'form-control select2',
                                                    ) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ _lang('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                @include('backend.payslip.partials.collection-list', [
                    'type' => request()->type ?? 'single',
                    'collections' => $collections ?? [],
                ])
            </div>
        </div>
    </div>
@endsection
