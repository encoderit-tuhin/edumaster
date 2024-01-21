<form action="{{ route('supplier.store') }}" method="post" autocomplete="off" class="form-horizontal validate"
    enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="col-sm-3 control-label">{{ _lang('Name') }}</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">{{ _lang('Phone') }}</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">{{ _lang('Email') }}</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">{{ _lang('Address') }}</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-info">{{__("Save")}}</button>
        </div>
    </div>
</form>
