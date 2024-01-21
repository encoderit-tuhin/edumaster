@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab">
                <li class="active"><a data-toggle="tab" href="#CLASS_WISE" aria-expanded="true">{{ _lang('CLASS WISE') }}</a></li>
                <li class=""><a data-toggle="tab" href="#SECTION_WISE" aria-expanded="false">{{ _lang('SECTION WISE') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="CLASS_WISE" class="tab-pane fade in active">
                    @include('backend.marks.merit.partial.merit_list_class_wise')
                </div>

                <div id="SECTION_WISE" class="tab-pane fade">
                    @include('backend.marks.merit.partial.merit_list_section_wise')
                </div>
            </div>
        </div>
    </div>
@endsection
