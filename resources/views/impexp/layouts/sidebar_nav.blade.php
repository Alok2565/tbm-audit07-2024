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
                <a href="{{ route('imp-exp.dashboard') }}" class="side-nav-link">
                    <i class="uil uil-dashboard"></i>
                    <span> Dashboard</span>
                </a>
            </li>
            {{-- <li class="side-nav-item">
                <a href="{{URL('imp-exp/import')}}" class="side-nav-link">
                    <i class="mdi mdi-application-import"></i>
                    <span> Import Application form</span>
                </a>
            </li> --}}


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebaimpexp" aria-expanded="false" aria-controls="sidebaimpexp" class="side-nav-link">
                    <i class="mdi mdi-application-export"></i>
                    <span>Export Application form </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebaimpexp">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{url('imp-exp/add-exporter')}}"><i class="mdi mdi-application-export"></i> Apply for new NOC</a>
                        </li>
						<li>
                            <a href="{{url('imp-exp/exporter')}}"><i class="mdi mdi-application-export"></i> Applications under review</a>
                        </li>

                            <li>
                            <a href="{{url('imp-exp/pending-exporter')}}"><i class="mdi mdi-application-export"></i> Decision on Submitted<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Applications</a>
                        </li>
						<!-- <li>
                            <a href="{{url('imp-exp/pending-exporter')}}"><i class="mdi mdi-application-export"></i> Pending Applications</a>
                        </li> -->
						<li>
                            <a href="{{url('imp-exp/reject-exporter')}}"><i class="mdi mdi-application-export"></i> Reject Applications</a>
                        </li>
                        <li>
                            <a href="{{url('imp-exp/exporter/draft')}}"><i class="mdi mdi-application-export"></i> Draft Applications</a>
                        </li>
                    </ul>
                </div>
            </li>
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
                <a href="{{url('imp-exp/download-noc')}}" class="side-nav-link">
                    <i class="mdi mdi-download-box"></i>
                    <span> Download NOC </span>
                </a>
            </li>-->
            <li class="side-nav-item">
                <a href="{{ asset('public/assets/backend/images/exporter/declaration-by-recipient-of-samples.docx') }}" class="side-nav-link" target="_blank">
                    <i class="mdi mdi-download-box"></i>
                    <span> Format for Declaration<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;of Recipient </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarNoc" aria-expanded="false" aria-controls="sidebaimpexp" class="side-nav-link">
                    <i class="mdi mdi-chart-areaspline"></i>
                    <span>Decision</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarNoc">
                    <ul class="side-nav-second-level">
                        {{-- <li>
                            <a href="{{route('importer.noc_list')}}"> <i class="mdi mdi-chart-areaspline"></i> NOC of Import</a>
                        </li> --}}
                        <li>
                            {{-- <a href="{{url('imp-exp/noc-exporter')}}">NOC of Export</a> --}}
                            <a href="{{route('impexp.exporter.noc_list')}}"><i class="mdi mdi-chart-areaspline"></i> Export NOC Issued</a>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
