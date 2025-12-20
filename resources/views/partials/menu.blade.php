<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('slider_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-image c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.slider.title') }}
                </a>
            </li>
        @endcan
        @can('team_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-star-half-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.team.title') }}
                </a>
            </li>
        @endcan
        @can('partner_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.partners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/partners") || request()->is("admin/partners/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-handshake c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.partner.title') }}
                </a>
            </li>
        @endcan
        @can('award_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.awards.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/awards") || request()->is("admin/awards/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.award.title') }}
                </a>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/settings*") ? "c-show" : "" }} {{ request()->is("admin/goals*") ? "c-show" : "" }} {{ request()->is("admin/jobs*") ? "c-show" : "" }} {{ request()->is("admin/categories*") ? "c-show" : "" }} {{ request()->is("admin/tags*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title_singular') }}
                            </a>
                        </li>
                    @endcan
                    @can('goal_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.goals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/goals") || request()->is("admin/goals/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.goal.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('job_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.jobs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jobs") || request()->is("admin/jobs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-md c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.job.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-justify c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tags") || request()->is("admin/tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tag.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('program_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/programs*") ? "c-show" : "" }} {{ request()->is("admin/program-timelines*") ? "c-show" : "" }} {{ request()->is("admin/program-teams*") ? "c-show" : "" }} {{ request()->is("admin/program-goals*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-industry c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.programManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('program_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.programs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/programs") || request()->is("admin/programs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.program.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('program_timeline_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.program-timelines.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/program-timelines") || request()->is("admin/program-timelines/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.programTimeline.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('program_team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.program-teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/program-teams") || request()->is("admin/program-teams/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-teamspeak c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.programTeam.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('program_goal_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.program-goals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/program-goals") || request()->is("admin/program-goals/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-spinner c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.programGoal.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('employment_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.employments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/employments") || request()->is("admin/employments/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user-tag c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.employment.title') }}
                </a>
            </li>
        @endcan
        @can('contact_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contact.title') }}
                </a>
            </li>
        @endcan
        @can('hawkma_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/hawkma-categories*") ? "c-show" : "" }} {{ request()->is("admin/hawkmas*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-file c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.hawkmaManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('hawkma_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.hawkma-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hawkma-categories") || request()->is("admin/hawkma-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-balance-scale c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hawkmaCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('hawkma_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.hawkmas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hawkmas") || request()->is("admin/hawkmas/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-clipboard c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hawkma.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('report_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/report-categories*") ? "c-show" : "" }} {{ request()->is("admin/reports*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.reportManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('report_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.report-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/report-categories") || request()->is("admin/report-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reports") || request()->is("admin/reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.report.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('media_center_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/newss*") ? "c-show" : "" }} {{ request()->is("admin/galleries*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-compact-disc c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.mediaCenter.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('news_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.newss.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/newss") || request()->is("admin/newss/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.news.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('gallery_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.galleries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/galleries") || request()->is("admin/galleries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-images c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.gallery.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>