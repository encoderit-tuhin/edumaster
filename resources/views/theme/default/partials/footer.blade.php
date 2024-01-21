<!-- footer section start -->
@php
    $menuItems = $footerNavigation->navigation_items->toArray();

    // Create an empty array to store the hierarchical structure
    $hierarchicalMenu = [];

    // Organize menu items into a hierarchical structure
    foreach ($menuItems as $menuItem) {
        $parentId = $menuItem['parent_id'];
        if ($parentId == 0) {
            // If parent_id is 0, it's a top-level menu item
        $hierarchicalMenu[$menuItem['id']] = $menuItem;
    } else {
        // If parent_id is not 0, it's a child menu item
            if (!isset($hierarchicalMenu[$parentId]['children'])) {
                // Create an array to store children if it doesn't exist
            $hierarchicalMenu[$parentId]['children'] = [];
        }
        $hierarchicalMenu[$parentId]['children'][] = $menuItem;
        }
    }
@endphp
<footer class="footer_section"
    style="background: {{ get_option('frontend_footer_bg_color') }}; color:{{ get_option('frontend_footer_text_color') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="company_info">
                    <a href="" class="footer_brand">
                        <img src="{{ get_logo() }}" alt="">
                        <div class="title">
                            <h5 style="color:{{ get_option('frontend_footer_text_color') }}">
                                {{ _lang(get_option('school_name')) }}
                            </h5>
                        </div>
                    </a>
                    <p style="color:{{ get_option('frontend_footer_text_color') }}">{!! get_option('eiin_code') !!}</p>
                    <p style="color:{{ get_option('frontend_footer_text_color') }}"><i
                            class="fas fa-map-marker-alt"></i> {!! get_option('address') !!}</p><br>
                    <p style="color:{{ get_option('frontend_footer_text_color') }}"><strong>{{ __('Phone') }}</strong>
                        :
                        <a style="color:{{ get_option('frontend_footer_text_color') }}"
                            href="tel:{{ __('Tuition Fee') }}: {!! get_option('tutionFeePhone') !!}<br>{{ __('Exam And Result') }}: {!! get_option('examResultPhone') !!} ">{{ __('Tuition Fee') }}:
                            {!! get_option('tutionFeePhone') !!}<br>{{ __('Exam And Result') }}: {!! get_option('examResultPhone') !!} </a>
                    </p>
                    <p style="color:{{ get_option('frontend_footer_text_color') }}">
                        <strong>{{ __('Email') }}</strong> :
                        <a style="color:{{ get_option('frontend_footer_text_color') }}"
                            href="mailto:{!! get_option('email') !!}<br>{{ __('Director of Guidance') }} : {!! get_option('phone') !!}">{!! get_option('email') !!}<br>{{ __('Director of Guidance') }}:
                            {!! get_option('phone') !!}</a>
                    </p>
                    <ul class="social_link">
                        <li>
                            <a href=" {!! get_option('facebookLink') !!}" target="_blank" class="facebook"
                                style="color:{{ get_option('frontend_footer_text_color') }}">
                                <i class="icon ion-logo-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" target="_blank" class="youtube"
                                style="color:{{ get_option('frontend_footer_text_color') }}">
                                <i class="icon ion-logo-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9 col-sm-6 mt-5">
                <div class="company_info">
                    <div class="row">
                        @foreach ($hierarchicalMenu as $navItem)
                            <div class="col-lg-4 col-sm-4">
                                <div class="company_info">
                                    <h3 style="color:{{ get_option('frontend_footer_text_color') }}">
                                        {{ __($navItem['menu_label']) }}
                                    </h3>
                                    <ul class="quick_link">
                                        @foreach ($navItem['children'] as $child)
                                            <li>
                                                <a href="{{ url($child['link']) }}"
                                                    style="color:{{ get_option('frontend_footer_text_color') }}">
                                                    {{ __($child['menu_label']) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer section end -->

<!-- second footer start -->
<footer class="second_footer">
    <div class="container">
        <div class="ft_content" style="background:{{ get_option('frontend_footer_bg_color') }}">
            <p style="color:#fff !important;">
                © 2023 Notre Dame College Mymensingh - All
                Right Reserved.
            </p>
            <p style="color:{{ get_option('frontend_footer_text_color') }}">Developed By
                <a style="color:{{ get_option('frontend_footer_text_color') }}" href="https://www.digitalsoftbd.com/"
                    target="_blank">
                    DigitalSoftLtd
                </a>
            </p>
        </div>
    </div>
</footer>
<!-- second footer end -->
