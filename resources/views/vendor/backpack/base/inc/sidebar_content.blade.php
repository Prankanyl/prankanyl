<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-address-book"></i>{{ __('sidebar.cms') }}</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('article') }}'><i class='nav-icon la la-archive'></i>{{ __('sidebar.articles') }}</a></li>
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper-o"></i>{{ __('sidebar.crm') }}</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('project') }}'><i class='nav-icon la la-desktop'></i>{{ __('sidebar.projects') }}</a></li>

    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cogs"></i>{{ __('sidebar.settings') }}</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i>{{ __('sidebar.general_settings') }}</a>
            <ul class="nav-dropdown-items">
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-share-alt-square'></i>{{ __('sidebar.site_settings') }}</a></li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('site-information') }}'><i class='nav-icon la la-info'></i>{{ __('sidebar.site_information') }}</a></li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('social-network') }}'><i class='nav-icon la la-facebook'></i>{{ __('sidebar.social_networks') }}</a></li>
            </ul>
        </li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i>{{ __('sidebar.article_settings') }}</a>
            <ul class="nav-dropdown-items">
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('article-category') }}'><i class='nav-icon la la-clipboard'></i>{{ __('sidebar.article_categories') }}</a></li>
            </ul>
        </li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i>{{ __('sidebar.project_settings') }}</a>
            <ul class="nav-dropdown-items">
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('project-category') }}'><i class='nav-icon la la-clipboard'></i>{{ __('sidebar.project_categories') }}</a></li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('project-type') }}'><i class='nav-icon la la-copy'></i>{{ __('sidebar.project_types') }}</a></li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('development-tool') }}'><i class='nav-icon la la-tools'></i>{{ __('sidebar.development_tools') }}</a></li>
            </ul>
        </li>
    </ul>
</li>

