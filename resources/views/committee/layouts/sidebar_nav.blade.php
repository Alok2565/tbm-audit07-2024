<div class="leftside-menu">
    <!-- Brand Logo Light -->
    <a href="{{ url('/') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('public/assets/images/icmr_main_logo.png') }}" alt="logo" style="width:160px; height:65px">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('public/assets/images/icmr_main_logo.png') }}" alt="small logo"
                style="width: 60px; height:60px;margin-left: -15px;">
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
                <a href="{{ url('committee/dashboard') }}" class="side-nav-link">
                    <i class="uil uil-dashboard"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            {{-- <li class="side-nav-item">
                <a href="{{ URL('committee/import') }}" class="side-nav-link">
                    <i class="mdi mdi-application-import"></i>
                    <span> Import Application</span>
                </a>
            </li> --}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#Export" aria-expanded="false" aria-controls="Export"
                    class="side-nav-link">
                    <i class="mdi mdi-application-export"></i>
                    <span> Export Application</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="Export">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{url('committee/exporter')}}"><i class="mdi mdi-application-export"></i> Fresh Application Received for Comments</a>
                        </li>
						<li>
                            <a href="{{url('committee/reject-export')}}"><i class="mdi mdi-application-export"></i> Applications with Decision</a>
                        </li>
						<li>
                            <a href="{{url('committee/approve-export')}}"><i class="mdi mdi-application-export"></i> Approve Applications</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li class="side-nav-item">
                <a href="{{ url('committee/exporter') }}" class="side-nav-link">
                    <i class="mdi mdi-application-export"></i>
                    <span> Export Application</span>
                </a>
            </li>
            <li>
                <a href="{{url('icmr/exporter')}}"><i class="mdi mdi-application-export"></i> Applications Received</a>
            </li> --}}

            <!--<li class="side-nav-item">
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
                <a data-bs-toggle="collapse" href="#icmrNoc" aria-expanded="false" aria-controls="icmrNoc"
                    class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> NOC Issued </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="icmrNoc">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('committee.noc_importer_list')}}">NOC Importer</a>
                        </li>
                        <li>
                            <a href="{{route('committee.noc_exporter_list')}}">NOC Exporter</a>
                        </li>
                    </ul>
                </div>
            </li>-->


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
