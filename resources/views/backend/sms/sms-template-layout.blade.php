<div class="col-md-6">
    <div class="form-group">
        <label>{{ _lang('SMS Template') }}</label>
        <select name="" id="sms-template" class="form-control select2 {{ $type }}" required>
            <option value="">{{ _lang('--Select--') }}</option>
            @foreach ($smsTemplates as $item)
                <option data-template="{{ $item->description }}" value="{{ $item->id }}">
                    {{ _lang($item->name) }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label class="control-label">{{ _lang('Message') }} ( {{ _lang('MAX 300') }})</label>
        <textarea id="message_content_{{ $type }}" class="form-control" name="body" required>{{ old('body') }}</textarea>
    </div>
</div>
