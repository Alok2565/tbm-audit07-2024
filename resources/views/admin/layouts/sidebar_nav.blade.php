<div class="leftside-menu">
    <!-- Brand Logo Light -->
    <a href="{{ url('/') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{asset('public/assets/images/icmr_main_logo.png')}}" alt="logo" style="width:160px; height:65px">
        </span>
        <span class="logo-sm">
            <img src="{{asset('public/assets/images/icmr_main_logo.png')}}" alt="small logo" style="width: 60px; height:60px;margin-left: -15px;">
        </span>
    </a>
    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>
    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-item">
                <a href="{{route('admin.dashboard')}}" class="side-nav-link">
                    <i class="uil uil-dashboard"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            {{-- <li class="side-nav-item">
                <a href="javascript:void(0)" class="side-nav-link">
                    <i class="fa fa-user"></i>
                    <span> Profiles </span>
                </a> --}}
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBanner" aria-expanded="false" aria-controls="sidebarBanner" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span>Home Banner Slider </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBanner">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.view_banner')}}" class="side-nav-link">All Banner Slider</a>
                        </li>
                        <li>
                            <a href="{{route('admin.add_banner')}}" class="side-nav-link">Add New</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarUser" aria-expanded="false" aria-controls="sidebarBanner" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span>Users</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUser">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('icmr.registations')}}" class="side-nav-link">Add ICMR Officers</a>
                        </li>
                        <li>
                            <a href="{{route('committee.registations')}}" class="side-nav-link">Add Committee Members</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li class="side-nav-item">
                <a href="{{route('admin.importers')}}" class="side-nav-link">
                    <i class="mdi mdi-application-import"></i>
                    <span> List of Import Application</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('admin.exporters')}}" class="side-nav-link">
                    <i class="mdi mdi-application-export"></i>
                    <span> List of Export Application</span>
                </a>
            </li> --}}

            {{-- <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="mdi mdi-archive-eye"></i>
                    <span> View Status </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="mdi mdi-chart-areaspline"></i>
                    <span> Reports </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{url('imp-exp/download-noc')}}" class="side-nav-link">
                    <i class="mdi mdi-download-box"></i>
                    <span> Download NOC </span>
                </a>
            </li> --}}
            {{-- <li class="side-nav-item">
                <a href="{{ asset('assets/backend/images/exporter/declarationby-recipient-of-samples.pdf') }}" class="side-nav-link" target="_blank">
                    <i class="mdi mdi-download-box"></i>
                    <span> Declaration of Recipient </span>
                </a>
            </li> --}}

            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarNoc" aria-expanded="false" aria-controls="sidebaimpexp" class="side-nav-link">
                    <i class="mdi mdi-chart-areaspline"></i>
                    <span>List of NOC Issued </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarNoc">
                    <ul class="side-nav-second-level">
                        <li>
                           <a href="javascript:void(0)">NOC of Import</a>
                        </li>
                        <li>
                         <a href="javascript:void(0)">NOC of Export</a>

                        </li>
                    </ul>
                </div>
            </li> --}}


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
