
<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">

                <li class="{{ $nav == 'dashboard' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-dashboard') }}" class="{{ $nav == 'dashboard' ? 'active' : '' }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="{{ $nav == 'filemanager' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-filemanager') }}" class="{{ $nav == 'filemanager' ? 'active' : '' }}">
                        <i class="mdi mdi-folder-cog"></i>
                        <span> File Manager </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Leads</li>

                <li class="{{ $nav == 'lead' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-leads') }}" class="{{ $nav == 'lead' ? 'active' : '' }}">
                        <i class="mdi mdi-account-multiple"></i>
                        <span> Leads </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Main Pages</li>
               
                <li class="{{ $nav == 'service' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-service') }}" class="{{ $nav == 'service' ? 'active' : '' }}">
                        <i class="mdi mdi-buffer"></i>
                        <span> Services </span>
                    </a>
                </li>

                <li class="{{ $nav == 'product' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-product') }}" class="{{ $nav == 'product' ? 'active' : '' }}">
                        <i class="mdi mdi-cube-scan"></i>
                        <span> Products </span>
                    </a>
                </li>

                <li class="{{ $nav == 'landing' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-landing-pages') }}" class="{{ $nav == 'landing' ? 'active' : '' }}">
                        <i class="mdi mdi-buffer"></i>
                        <span> Landing Pages </span>
                    </a>
                </li>

                <li class="{{ $nav == 'blog' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-blog') }}" class="{{ $nav == 'blog' ? 'active' : '' }}">
                        <i class="mdi mdi-blogger"></i>
                        <span> Blogs </span>
                    </a>
                </li>

                <li class="{{ $nav == 'faq' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-faq') }}" class="{{ $nav == 'faq' ? 'active' : '' }}">
                        <i class="mdi mdi-help-box"></i>
                        <span> FAQs</span>
                    </a>
                </li>

                <li class="menu-title mt-2">Page Sections</li>

                <li class="{{ $nav == 'pagesection' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-pagesection') }}" class="{{ $nav == 'pagesection' ? 'active' : '' }}">
                        <i class="mdi mdi-vector-intersection"></i>
                        <span> Page Sections </span>
                    </a>
                </li>

                <li class="{{ $nav == 'banner' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-banner') }}" class="{{ $nav == 'banner' ? 'active' : '' }}">
                        <i class="mdi mdi-file-image-outline"></i>
                        <span> Page Banners </span>
                    </a>
                </li>

                <li class="{{ $nav == 'workprocess' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-workprocess') }}" class="{{ $nav == 'workprocess' ? 'active' : '' }}">
                        <i class="mdi mdi-debug-step-over"></i>
                        <span>Work Process</span>
                    </a>
                </li>

                <li class="{{ $nav == 'cta' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-cta') }}" class="{{ $nav == 'cta' ? 'active' : '' }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> CTAs</span>
                    </a>
                </li>
                
                <li class="{{ $nav == 'testimonial' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-testimonial') }}" class="{{ $nav == 'testimonial' ? 'active' : '' }}">
                        <i class="mdi mdi-account-tie-voice-outline"></i>
                        <span> Testimonials </span>
                    </a>
                </li>

                <li class="{{ $nav == 'team' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-team') }}" class="{{ $nav == 'team' ? 'active' : '' }}">
                        <i class="mdi mdi-account-star"></i>
                        <span> Team Members </span>
                    </a>
                </li>

                <li class="{{ $nav == 'client' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-client') }}" class="{{ $nav == 'client' ? 'active' : '' }}">
                        <i class="mdi mdi-account"></i>
                        <span> Clients </span>
                    </a>
                </li>

                <li class="{{ $nav == 'counter' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-counter') }}" class="{{ $nav == 'counter' ? 'active' : '' }}">
                        <i class="mdi mdi-counter"></i>
                        <span> Counters & Stats </span>
                    </a>
                </li>

                <li class="menu-title mt-2">CMS</li>
                
                <li class="{{ $nav == 'cms' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-cms') }}" class="{{ $nav == 'cms' ? 'active' : '' }}">
                        <i class="mdi mdi-book-open-page-variant"></i>
                        <span> CMS Pages </span>
                    </a>
                </li>

                <li class="menu-title mt-2">General Configuration</li>

                <li class="{{ $nav == 'seo' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-seo') }}" class="{{ $nav == 'seo' ? 'active' : '' }}">
                        <i class="mdi mdi-earth"></i>
                        <span> SEO Management </span>
                    </a>
                </li>

                <li class="{{ $nav == 'social-links' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-social-links') }}" class="{{ $nav == 'social-links' ? 'active' : '' }}">
                        <i class="mdi mdi-share-variant-outline"></i>
                        <span> Social Links </span>
                    </a>
                </li>

                <li class="{{ $nav == 'setting' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin-setting') }}" class="{{ $nav == 'setting' ? 'active' : '' }}">
                        <i class="mdi mdi-cogs"></i>
                        <span> Site Settings </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>