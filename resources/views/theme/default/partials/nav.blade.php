<!-- navbar nav start -->
@php
    // top
    $top_navigation_items = $topNavigation->navigation_items->toArray();
    $length = count($top_navigation_items);
    $topNavigationHalfLength = ceil($length / 2);
    $firstHalf = array_slice($top_navigation_items, 0, $topNavigationHalfLength);
    $secondHalf = array_slice($top_navigation_items, $topNavigationHalfLength);
    // header
    // Your array of menu items
    $menuItems = $headerNavigation->navigation_items->toArray();
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
    // header divided
    $header_navigation_items = $hierarchicalMenu;
    $hedaerLength = count($header_navigation_items);
    $headerNavigationHalfLength = ceil($hedaerLength / 2);
    $headerFirstHalf = array_slice($header_navigation_items, 0, $headerNavigationHalfLength);
    $headerSecondHalf = array_slice($header_navigation_items, $headerNavigationHalfLength);
    // Now $firstHalf and $secondHalf contain the two equal parts of the array.
@endphp
<nav class="fixed-top">
    <!-- contact nav -->
    <div class="contact_nav" style="background: {{ get_option('frontend_top_header_bg_color') }};">
        <div class="container">
            <div class="cnav_content">
                <ul class="top_link">
                    @foreach ($firstHalf as $navigation)
                        <li>
                            <a href="{{ url($navigation['link']) }}"
                                style="color: {{ get_option('frontend_top_header_text_color') }};">
                                {{ __($navigation['menu_label']) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <ul class="top_link">
                    @foreach ($secondHalf as $navigation)
                        <li>
                            <a href="{{ url($navigation['link']) }}"
                                style="color: {{ get_option('frontend_top_header_text_color') }};">
                                {{ __($navigation['menu_label']) }}
                            </a>
                        </li>
                    @endforeach
                    @include('theme.default.partials.language-chooser')
                </ul>
            </div>
        </div>
    </div>
    <!-- main nav -->
    <div class="navbar navbar-expand-lg" style="background: {{ get_option('frontend_main_header_bg_color') }};">
        <div class="container">
            <a class="mobile_brand d-lg-none d-block" href="{{ url('/') }}">
                <img src="{{ get_logo() }}" alt="">
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav">
                <i class="icon ion-ios-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="nav"
                style="padding:{{ get_option('frontend_header_padding') == '' ? '10px' : get_option('frontend_header_padding') }}">
                <ul class="navbar-nav">
                    @foreach ($headerFirstHalf as $headerNav)
                        <li class="dropdown">
                            @if (empty($headerNav['children']))
                                <a href="{{ url($headerNav['link']) }}" class="nav-link"
                                    style="color: {{ get_option('frontend_main_header_text_color') }};">
                                    {{ __($headerNav['menu_label']) }}
                                </a>
                            @else
                                <span class="nav-link " data-toggle="dropdown" aria-expanded="false">
                                    {{ __($headerNav['menu_label']) }}
                                </span>

                                @isset($headerNav['children'])
                                    <ul class="dropdown-menu"
                                        style="background: {{ get_option('frontend_main_header_bg_color') }};">
                                        @foreach ($headerNav['children'] as $childItem)
                                            <li style="padding: 0 10px;">
                                                <a href="{{ url($childItem['link']) }}"
                                                    style="color: {{ get_option('frontend_main_header_text_color') }};">
                                                    {{ __($childItem['menu_label']) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endisset
                            @endif
                        </li>
                    @endforeach
                </ul>
                <div class="banner_logo d-lg-block d-none" style="margin-top: 8px; height: 50px;">
                    <a class="brand_link" href="/">
                        <img src="{{ get_logo() }}" alt="">
                        <span class="brand_title">
                            <h5>{{ __('Notre Dame College') }}</h5>
                            <h5>{{ __('Mymensingh') }}</h5>
                        </span>
                    </a>
                </div>
                <ul class="navbar-nav" style="background: {{ get_option('frontend_main_header_bg_color') }};">
                    @foreach ($headerSecondHalf as $headerNav)
                        <li class="dropdown">
                            <span class="nav-link " data-toggle="dropdown" aria-expanded="false"> <a
                                    href="{{ url($headerNav['link']) }}" class="nav-link"
                                    style="color: {{ get_option('frontend_main_header_text_color') }};">
                                    {{ __($headerNav['menu_label']) }} </a>
                            </span>
                            @isset($headerNav['children'])
                                <ul class="dropdown-menu"
                                    style="background: {{ get_option('frontend_main_header_bg_color') }};">
                                    @foreach ($headerNav['children'] as $childItem)
                                        <li style="padding: 0 10px;">
                                            <a href="{{ url($childItem['link']) }}"
                                                style="color: {{ get_option('frontend_main_header_text_color') }};">
                                                {{ __($childItem['menu_label']) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endisset
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- navbar nav end -->
