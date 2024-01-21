@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('Edit Shift') }}
                    </span>
                </div>
                <div class="panel-body">
                    <form action="{{ route('shift.update', $shift->id) }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ _lang('Name') }}</label>
                                <input type="text" class="form-control" name="name" required
                                    value="{{$shift->name ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info">{{ _lang('Edit Shift') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
