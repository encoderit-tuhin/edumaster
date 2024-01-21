<form method="post" class="ajax-submit" autocomplete="off" action="{{ route('periods.update', $period->id) }}">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">

    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">{{ _lang('Period') }}</label>
            <input type="text" class="form-control" name="period" value="{{ $period->period }}" required>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">{{ _lang('Update') }}</button>
        </div>
    </div>
</form>
