@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs setting-tab">
                <li class="active"><a data-toggle="tab" href="#general" aria-expanded="true">{{ _lang('General') }}</a></li>
                <li class=""><a data-toggle="tab" href="#admission_info" aria-expanded="false">{{ _lang('Admission Info') }}</a></li>
                <li class=""><a data-toggle="tab" href="#email" aria-expanded="false">{{ _lang('Email') }}</a></li>
                <li class=""><a data-toggle="tab" href="#sms" aria-expanded="false">{{ _lang('SMS') }}</a></li>
                <li class=""><a data-toggle="tab" href="#payment_gateway"
                        aria-expanded="false">{{ _lang('Payment Gateway') }}</a></li>
                <li class=""><a data-toggle="tab" href="#logo" aria-expanded="false">{{ _lang('Logo') }}</a></li>
                <li class=""><a data-toggle="tab" href="#appearance"
                        aria-expanded="false">{{ _lang('Appearance') }}</a></li>
            </ul>
            <div class="tab-content">

                <div id="general" class="tab-pane fade in active">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="panel-title">{{ _lang('General Settings') }}</span></div>

                        <div class="panel-body">
                            <form method="post" class="appsvan-submit params-panel" autocomplete="off"
                                action="{{ url('administration/general_settings/update') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Institute Name') }}</label>
                                        <input type="text" class="form-control" name="school_name"
                                            value="{{ get_option('school_name') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Site Title') }}</label>
                                        <input type="text" class="form-control" name="site_title"
                                            value="{{ get_option('site_title') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Phone') }}</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ get_option('phone') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Tuition Fee') }}</label>
                                        <input type="text" class="form-control" name="tutionFeePhone"
                                            value="{{ get_option('tutionFeePhone') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Exam and result') }}</label>
                                        <input type="text" class="form-control" name="examResultPhone"
                                            value="{{ get_option('examResultPhone') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Email') }}</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ get_option('email') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Currency Symbol') }}</label>
                                        <input type="text" class="form-control" name="currency_symbol"
                                            value="{{ get_option('currency_symbol') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Timezone') }}</label>
                                        <select class="form-control select2" name="timezone" required>
                                            <option value="">{{ _lang('-- Select One --') }}</option>
                                            {{ create_timezone_option(get_option('timezone')) }}
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Academic Year') }}</label>
                                        <select class="form-control select2" name="academic_year" required>
                                            {{ create_option('academic_years', 'id', 'session', get_option('academic_year')) }}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('FrontEnd Theme') }}</label>
                                        <select class="form-control select2" name="active_theme" required>
                                            {!! load_theme(get_option('active_theme')) !!}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Language') }}</label>
                                        <select class="form-control select2" name="language" required>
                                            {!! load_language(get_option('language')) !!}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Theme Direction') }}</label>
                                        <select class="form-control" name="backend_direction" required>
                                            <option value="ltr"
                                                {{ get_option('backend_direction') == 'ltr' ? 'selected' : '' }}>
                                                {{ _lang('LTR') }}</option>
                                            <option value="rtl"
                                                {{ get_option('backend_direction') == 'rtl' ? 'selected' : '' }}>
                                                {{ _lang('RTL') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Address') }}</label>
                                        <textarea class="form-control" name="address" required>{{ get_option('address') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('EIIN') }}</label>
                                        <textarea class="form-control" name="eiin_code" required>{{ get_option('eiin_code') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Google Map') }}</label>
                                        <textarea class="form-control" name="google_map" required>{{ get_option('google_map') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('On Google Map') }}</label>
                                        <textarea class="form-control" name="on_google_map" required>{{ get_option('on_google_map') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Facebook Link') }}</label>
                                        <textarea class="form-control" name="facebookLink" required>{{ get_option('facebookLink') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Institute ID') }}</label>
                                        <input type="text" class="form-control" name="institute_id"
                                            value="{{ get_option('institute_id') }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary">{{ _lang('Save Settings') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="admission_info" class="tab-pane fade in active">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="panel-title">{{ _lang('Online Admission Status') }}</span></div>

                        <div class="panel-body">
                            <form method="post" class="appsvan-submit params-panel" autocomplete="off"
                                action="{{ url('administration/general_settings/update') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="admission_display_status" class=" control-label">Online Admission Display Status</label>

                                        <select type="text" id="admission_display_status" name="admission_display_status" class="form-control select2" required>
                                            <option value="yes" {{ (get_option('admission_display_status') == 'yes') ? 'selected' : '' }}>Yes</option>
                                            <option value="no" {{ (get_option('admission_display_status') == 'no') ? 'selected' : '' }}>No</option>
                                        </select>
                                        

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary">{{ _lang('Save Settings') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div id="email" class="tab-pane fade">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="panel-title">{{ _lang('Email Settings') }}</span></div>
                        <div class="panel-body">
                            <form method="post" class="appsvan-submit params-panel" autocomplete="off"
                                action="{{ url('administration/general_settings/update') }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Mail Type') }}</label>
                                        <select class="form-control select2" name="mail_type" id="mail_type"
                                            required>
                                            <option value="mail"
                                                {{ get_option('mail_type') == 'mail' ? 'selected' : '' }}>
                                                {{ _lang('PHP Mail') }}</option>
                                            <option value="smtp"
                                                {{ get_option('mail_type') == 'smtp' ? 'selected' : '' }}>
                                                {{ _lang('SMTP') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('From Email') }}</label>
                                        <input type="text" class="form-control" name="from_email"
                                            value="{{ get_option('from_email') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('From Name') }}</label>
                                        <input type="text" class="form-control" name="from_name"
                                            value="{{ get_option('from_name') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('SMTP Host') }}</label>
                                        <input type="text" class="form-control smtp" name="smtp_host"
                                            value="{{ get_option('smtp_host') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('SMTP Port') }}</label>
                                        <input type="text" class="form-control smtp" name="smtp_port"
                                            value="{{ get_option('smtp_port') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('SMTP Username') }}</label>
                                        <input type="text" class="form-control smtp" autocomplete="off"
                                            name="smtp_username" value="{{ get_option('smtp_username') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('SMTP Password') }}</label>
                                        <input type="password" class="form-control smtp" autocomplete="off"
                                            name="smtp_password" value="{{ get_option('smtp_password') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('SMTP Encryption') }}</label>
                                        <select class="form-control smtp" name="smtp_encryption">
                                            <option value="ssl"
                                                {{ get_option('smtp_encryption') == 'ssl' ? 'selected' : '' }}>
                                                {{ _lang('SSL') }}</option>
                                            <option value="tls"
                                                {{ get_option('smtp_encryption') == 'tls' ? 'selected' : '' }}>
                                                {{ _lang('TLS') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary">{{ _lang('Save Settings') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="sms" class="tab-pane fade">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="panel-title">{{ _lang('SMS Settings') }}</span></div>
                        <div class="panel-body">
                            <form method="post" class="appsvan-submit params-panel" autocomplete="off"
                                action="{{ url('administration/general_settings/update') }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('SMS Type') }}</label>
                                        <select class="form-control select2" name="sms_type" required>
                                            <option value="nonmasking">{{ __('General SMS') }}</option>
                                            <option value="masking">{{ __('Masking SMS') }}</option>
                                        </select>
                                    </div>
                                </div>


                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('TWILIO SID') }}</label>
                                        <input type="text" class="form-control" name="TWILIO_SID"
                                            value="{{ get_option('TWILIO_SID') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6 clear">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('TWILIO TOKEN') }}</label>
                                        <input type="text" class="form-control" name="TWILIO_TOKEN"
                                            value="{{ get_option('TWILIO_TOKEN') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6 clear">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('TWILIO MOBILE NUMBER') }}</label>
                                        <input type="text" class="form-control" name="TWILIO_MOBILE"
                                            value="{{ get_option('TWILIO_MOBILE') }}" required>
                                    </div>
                                </div> --}}
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="sender_id" class=" control-label">Sender Id</label>

                                        <input type="text" id="sender_id" name="sender_id" class="form-control"
                                            required value="{{ get_option('sender_id') }}">

                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="api_key" class=" control-label">Api Key</label>

                                        <input type="text" id="api_key" name="api_key" class="form-control"
                                            required value="{{ get_option('api_key') }}">

                                    </div>

                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="sms_api" class=" control-label">SMS Api</label>

                                        <input type="text" id="sms_api" name="sms_api" class="form-control"
                                             value="{{ get_option('sms_api') }}">

                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="default_sms_gateway" class=" control-label">SMS Gateway</label>

                                        <select type="text" id="default_sms_gateway" name="default_sms_gateway" class="form-control select2" required>
                                            <option value="sms4bd" {{ (get_option('default_sms_gateway') == 'sms4bd') ? 'selected' : '' }}>SMS4BD</option>
                                            <option value="bulkSMSBD" {{ (get_option('default_sms_gateway') == 'bulkSMSBD') ? 'selected' : '' }}>Bulk SMS BD</option>
                                        </select>
                                        

                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="sms_test_mode" class=" control-label">SMS Test Mode</label>

                                        <select type="text" id="sms_test_mode" name="sms_test_mode" class="form-control select2" required>
                                            <option value="true" {{ (get_option('sms_test_mode') == 'true') ? 'selected' : '' }}>True</option>
                                            <option value="false" {{ (get_option('sms_test_mode') == 'false') ? 'selected' : '' }}>False</option>
                                        </select>
                                        

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary">{{ _lang('Save Settings') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="payment_gateway" class="tab-pane fade">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="panel-title">{{ _lang('Payment Gateway') }}</span></div>
                        <div class="panel-body">
                            <form method="post" class="appsvan-submit params-panel" autocomplete="off"
                                action="{{ url('administration/general_settings/update') }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <h5>{{ _lang('PayPal') }}</h5>
                                <div class="params-panel">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('PayPal Active') }}</label>
                                            <select class="form-control" name="paypal_active" required>
                                                <option value="Yes">{{ _lang('Yes') }}</option>
                                                <option value="No">{{ _lang('No') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('PayPal Email') }}</label>
                                            <input type="text" class="form-control" name="paypal_email"
                                                value="{{ get_option('paypal_email') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('PayPal Currency') }}</label>
                                            <select class="form-control" name="paypal_currency" required>
                                                <option value="USD">{{ _lang('USD') }}</option>
                                                <option value="EUR">{{ _lang('EUR') }}</option>
                                                <option value="AUD">{{ _lang('AUD') }}</option>
                                                <option value="CAD">{{ _lang('CAD') }}</option>
                                                <option value="NZD">{{ _lang('NZD') }}</option>
                                                <option value="GBP">{{ _lang('GBP') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <h5>{{ _lang('Stripe') }}</h5>
                                <div class="params-panel">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Stripe Active') }}</label>
                                            <select class="form-control" name="stripe_active" required>
                                                <option value="Yes">{{ _lang('Yes') }}</option>
                                                <option value="No">{{ _lang('No') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Secret Key') }}</label>
                                            <input type="text" class="form-control" name="stripe_secret_key"
                                                value="{{ get_option('stripe_secret_key') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Publishable Key') }}</label>
                                            <input type="text" class="form-control" name="stripe_publishable_key"
                                                value="{{ get_option('stripe_publishable_key') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Stripe Currency') }}</label>
                                            <select class="form-control" name="stripe_currency" required>
                                                <option value="USD">{{ _lang('USD') }}</option>
                                                <option value="EUR">{{ _lang('EUR') }}</option>
                                                <option value="AUD">{{ _lang('AUD') }}</option>
                                                <option value="CAD">{{ _lang('CAD') }}</option>
                                                <option value="NZD">{{ _lang('NZD') }}</option>
                                                <option value="GBP">{{ _lang('GBP') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                </br>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary pull-right">{{ _lang('Save Settings') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="logo" class="tab-pane fade">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="panel-title">{{ _lang('Logo Upload') }}</span></div>
                        <div class="panel-body">
                            <form method="post" class="appsvan-submit params-panel" autocomplete="off"
                                action="{{ url('administration/upload_logo') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Upload Logo') }}</label>
                                        <input type="file" class="form-control dropify" name="logo"
                                            data-max-file-size="8M"
                                            data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG"
                                            data-default-file="{{ get_logo() }}" required>
                                    </div>
                                </div>

                                </br>
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block">{{ _lang('Upload') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


                <div id="appearance" class="tab-pane fade">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="panel-title">{{ _lang('Appearance') }}</span></div>
                        <div class="panel-body">
                            <form method="post" class="params-panel" autocomplete="off"
                                action="{{ url('administration/general_settings/update') }}">

                                {{ csrf_field() }}
                                <div class="d-block">
                                    <div class="p-3 mb-4 border-bottom">
                                        <h4>{{ __('Website Appearance') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="frontend_top_header_bg_color"
                                                        class="control-label">{{ __('Top Header Background color') }}</label>
                                                    <input type="color" id="frontend_top_header_bg_color"
                                                        class="form-control" name="frontend_top_header_bg_color"
                                                        value="{{ get_option('frontend_top_header_bg_color') == '' ? '#0c2340' : get_option('frontend_top_header_bg_color') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="frontend_top_header_text_color"
                                                        class="control-label">{{ __('Top Header Text color') }}</label>
                                                    <input type="color" id="frontend_top_header_text_color"
                                                        class="form-control" name="frontend_top_header_text_color"
                                                        value="{{ get_option('frontend_top_header_text_color') == '' ? '#FFFFFF' : get_option('frontend_top_header_text_color') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="frontend_main_header_bg_color"
                                                        class="control-label">{{ __('Main Header Background color') }}</label>
                                                    <input type="color" id="frontend_main_header_bg_color"
                                                        class="form-control" name="frontend_main_header_bg_color"
                                                        value="{{ get_option('frontend_main_header_bg_color') == '' ? '#FFFFFF' : get_option('frontend_main_header_bg_color') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="frontend_main_header_text_color"
                                                        class="control-label">{{ __('Main Header Text color') }}</label>
                                                    <input type="color" id="frontend_main_header_text_color"
                                                        class="form-control" name="frontend_main_header_text_color"
                                                        value="{{ get_option('frontend_main_header_text_color') == '' ? '#000000' : get_option('frontend_main_header_text_color') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="frontend_footer_bg_color"
                                                        class="control-label">{{ __('Footer Background color') }}</label>
                                                    <input type="color" id="frontend_footer_bg_color"
                                                        class="form-control" name="frontend_footer_bg_color"
                                                        value="{{ get_option('frontend_footer_bg_color') == '' ? '#0c2340' : get_option('frontend_footer_bg_color') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="frontend_footer_text_color"
                                                        class="control-label">{{ __('Footer Text color') }}</label>
                                                    <input type="color" id="frontend_footer_text_color"
                                                        class="form-control" name="frontend_footer_text_color"
                                                        value="{{ get_option('frontend_footer_text_color') == '' ? '#FFFFFF' : get_option('frontend_footer_text_color') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="frontend_header_padding"
                                                        class="control-label">{{ __('Header Padding') }}</label>
                                                    <input type="text" id="frontend_header_padding"
                                                        class="form-control" name="frontend_header_padding"
                                                        value="{{ get_option('frontend_header_padding') }}"
                                                        placeholder="example: 10px">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="frontend_slider_height"
                                                        class="control-label">{{ __('Frontend Slider Height') }}</label>
                                                    <input type="text" id="frontend_slider_height"
                                                        class="form-control" name="frontend_slider_height"
                                                        value="{{ get_option('frontend_slider_height') }}"
                                                        placeholder="example: 500px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-3 mb-4">
                                        <h4>Application Appearance</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _lang('Sidebar Color') }}</label>
                                                    <input type="color" class="form-control" name="sidebar_color"
                                                        value="{{ get_option('sidebar_color') == '' ? '#FFFFFF' : get_option('sidebar_color') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        class="control-label">{{ _lang('Sidebar Text Color') }}</label>
                                                    <input type="color" class="form-control" name="sidebar_text_color"
                                                        value="{{ get_option('sidebar_text_color') == '' ? '#000000' : get_option('sidebar_text_color') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        class="control-label">{{ _lang('Sidebar Border Color') }}</label>
                                                    <input type="color" class="form-control"
                                                        name="sidebar_border_color"
                                                        value="{{ get_option('sidebar_border_color') == '' ? '#DDDDDD' : get_option('sidebar_border_color') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        class="control-label">{{ _lang('Active Sidebar Background') }}</label>
                                                    <input type="color" class="form-control"
                                                        name="active_sidebar_background"
                                                        value="{{ get_option('active_sidebar_background') == '' ? '#e74c3c' : get_option('active_sidebar_background') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _lang('Custom CSS') }}</label>
                                                    <textarea class="form-control" rows="8" name="custom_backend_css">{{ get_option('custom_backend_css') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ _lang('Save') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('js-script')
    <script type="text/javascript">
        if ($("#mail_type").val() != "smtp") {
            $(".smtp").prop("disabled", true);
        }
        $(document).on("change", "#mail_type", function() {
            if ($(this).val() != "smtp") {
                $(".smtp").prop("disabled", true);
            } else {
                $(".smtp").prop("disabled", false);
            }
        });
    </script>
@stop
