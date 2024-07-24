<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Form Advanced | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="assets/images/favicon.ico"> --}}

        <!-- Select2 css -->
        <link href="{{ asset('back/assets/vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Theme Config Js -->
        <script src="{{ asset('back/assets/js/hyper-config.js') }}"></script>

        <!-- App css -->
        <link href="{{ asset('back/assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{ asset('back/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">


            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar container-fluid">
                    <div class="d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Topbar Brand Logo -->
                        <div class="logo-topbar">
                            <!-- Logo light -->
                            <a href="index.html" class="logo-light">
                                <span class="logo-lg">
                                    <img src="assets/images/logo.png" alt="logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="small logo">
                                </span>
                            </a>

                            <!-- Logo Dark -->
                            <a href="index.html" class="logo-dark">
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="dark logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="assets/images/logo-dark-sm.png" alt="small logo">
                                </span>
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>

                        <!-- Horizontal Menu Toggle Button -->
                        <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>

                        <!-- Topbar Search Form -->
                        <div class="app-search dropdown d-none d-lg-block">
                            <form>
                                <div class="input-group">
                                    <input type="search" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn btn-primary" type="submit">Search</button>
                                </div>
                            </form>

                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-notes font-16 me-1"></i>
                                    <span>Analytics Report</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-life-ring font-16 me-1"></i>
                                    <span>How can I help you?</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-cog font-16 me-1"></i>
                                    <span>User profile settings</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Erwin Brown</h5>
                                                <span class="font-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                                <span class="font-12 mb-0">Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-3">
                        <li class="dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ri-search-line font-22"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="12">
                                <span class="align-middle d-none d-lg-inline-block">English</span> <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ri-notification-3-line font-22"></i>
                                <span class="noti-icon-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                                <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                                <small>Clear All</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-3" style="max-height: 300px;" data-simplebar>

                                    <h5 class="text-muted font-13 fw-normal mt-2">Today</h5>
                                    <!-- item-->

                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Datacorp <small class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-info">
                                                        <i class="mdi mdi-account-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Admin <small class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">New user registered</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon">
                                                        <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Cristina Pride <small class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next meeting</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon">
                                                        <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                                    <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and awesome design</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <div class="text-center">
                                        <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                    </div>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="dropdown d-none d-sm-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ri-apps-2-line font-22"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                                <div class="p-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/slack.png" alt="slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/github.png" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                                <span>Dropbox</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/g-suite.png" alt="G Suite">
                                                <span>G Suite</span>
                                            </a>
                                        </div>
                                    </div> <!-- end row-->
                                </div>

                            </div>
                        </li>

                        <li class="d-none d-sm-inline-block">
                            <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                                <i class="ri-settings-3-line font-22"></i>
                            </a>
                        </li>

                        <li class="d-none d-sm-inline-block">
                            <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Theme Mode">
                                <i class="ri-moon-line font-22"></i>
                            </div>
                        </li>


                        <li class="d-none d-md-inline-block">
                            <a class="nav-link" href="" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line font-22"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                                </span>
                                <span class="d-lg-flex flex-column gap-1 d-none">
                                    <h5 class="my-0">Dominic Keller</h5>
                                    <h6 class="my-0 fw-normal">Founder</h6>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="mdi mdi-account-edit me-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="mdi mdi-lifebuoy me-1"></i>
                                    <span>Support</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="mdi mdi-lock-outline me-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- Brand Logo Light -->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo.png" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-dark-sm.png" alt="small logo">
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
                    <!-- Leftbar User -->
                    <div class="leftbar-user">
                        <a href="pages-profile.html">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name mt-2">Dominic Keller</span>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title">Navigation</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span class="badge bg-success float-end">5</span>
                                <span> Dashboards </span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="dashboard-analytics.html">Analytics</a>
                                    </li>
                                    <li>
                                        <a href="index.html">Ecommerce</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-projects.html">Projects</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-crm.html">CRM</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-wallet.html">E-Wallet</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-title">Apps</li>

                        <li class="side-nav-item">
                            <a href="apps-calendar.html" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Calendar </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> Chat </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                                <i class="uil uil-tachometer-fast"></i>
                                <span class="badge bg-danger text-white float-end">New</span>
                                <span> CRM </span>
                            </a>
                            <div class="collapse" id="sidebarCrm">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="crm-projects.html">Projects</a>
                                    </li>
                                    <li>
                                        <a href="crm-orders-list.html">Orders List</a>
                                    </li>
                                    <li>
                                        <a href="crm-clients.html">Clients</a>
                                    </li>
                                    <li>
                                        <a href="crm-management.html">Management</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Ecommerce </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="apps-ecommerce-products.html">Products</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-products-details.html">Products Details</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-orders.html">Orders</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-orders-details.html">Order Details</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-customers.html">Customers</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-shopping-cart.html">Shopping Cart</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-checkout.html">Checkout</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-sellers.html">Sellers</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                                <i class="uil-envelope"></i>
                                <span> Email </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEmail">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="apps-email-inbox.html">Inbox</a>
                                    </li>
                                    <li>
                                        <a href="apps-email-read.html">Read Email</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span> Projects </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarProjects">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="apps-projects-list.html">List</a>
                                    </li>
                                    <li>
                                        <a href="apps-projects-details.html">Details</a>
                                    </li>
                                    <li>
                                        <a href="apps-projects-gantt.html">Gantt <span class="badge rounded-pill bg-light text-dark font-10 float-end">New</span></a>
                                    </li>
                                    <li>
                                        <a href="apps-projects-add.html">Create Project</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="apps-social-feed.html" class="side-nav-link">
                                <i class="uil-rss"></i>
                                <span> Social Feed </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> Tasks </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="apps-tasks.html">List</a>
                                    </li>
                                    <li>
                                        <a href="apps-tasks-details.html">Details</a>
                                    </li>
                                    <li>
                                        <a href="apps-kanban.html">Kanban Board</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="apps-file-manager.html" class="side-nav-link">
                                <i class="uil-folder-plus"></i>
                                <span> File Manager </span>
                            </a>
                        </li>

                        <li class="side-nav-title">Custom</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                                <i class="uil-copy-alt"></i>
                                <span> Pages </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="pages-profile.html">Profile</a>
                                    </li>
                                    <li>
                                        <a href="pages-profile-2.html">Profile 2</a>
                                    </li>
                                    <li>
                                        <a href="pages-invoice.html">Invoice</a>
                                    </li>
                                    <li>
                                        <a href="pages-faq.html">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="pages-pricing.html">Pricing</a>
                                    </li>
                                    <li>
                                        <a href="pages-maintenance.html">Maintenance</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                            <span> Authentication </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesAuth">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="pages-login.html">Login</a>
                                                </li>
                                                <li>
                                                    <a href="pages-login-2.html">Login 2</a>
                                                </li>
                                                <li>
                                                    <a href="pages-register.html">Register</a>
                                                </li>
                                                <li>
                                                    <a href="pages-register-2.html">Register 2</a>
                                                </li>
                                                <li>
                                                    <a href="pages-logout.html">Logout</a>
                                                </li>
                                                <li>
                                                    <a href="pages-logout-2.html">Logout 2</a>
                                                </li>
                                                <li>
                                                    <a href="pages-recoverpw.html">Recover Password</a>
                                                </li>
                                                <li>
                                                    <a href="pages-recoverpw-2.html">Recover Password 2</a>
                                                </li>
                                                <li>
                                                    <a href="pages-lock-screen.html">Lock Screen</a>
                                                </li>
                                                <li>
                                                    <a href="pages-lock-screen-2.html">Lock Screen 2</a>
                                                </li>
                                                <li>
                                                    <a href="pages-confirm-mail.html">Confirm Mail</a>
                                                </li>
                                                <li>
                                                    <a href="pages-confirm-mail-2.html">Confirm Mail 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false" aria-controls="sidebarPagesError">
                                            <span> Error </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesError">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="pages-404.html">Error 404</a>
                                                </li>
                                                <li>
                                                    <a href="pages-404-alt.html">Error 404-alt</a>
                                                </li>
                                                <li>
                                                    <a href="pages-500.html">Error 500</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="pages-starter.html">Starter Page</a>
                                    </li>
                                    <li>
                                        <a href="pages-preloader.html">With Preloader</a>
                                    </li>
                                    <li>
                                        <a href="pages-timeline.html">Timeline</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="landing.html" target="_blank" class="side-nav-link">
                                <i class="uil-globe"></i>
                                <span class="badge bg-secondary text-light float-end">New</span>
                                <span> Landing </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                                <i class="uil-window"></i>
                                <span> Layouts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarLayouts">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="layouts-horizontal.html" target="_blank">Horizontal</a>
                                    </li>
                                    <li>
                                        <a href="layouts-detached.html" target="_blank">Detached</a>
                                    </li>
                                    <li>
                                        <a href="layouts-full.html" target="_blank">Full View</a>
                                    </li>
                                    <li>
                                        <a href="layouts-fullscreen.html" target="_blank">Fullscreen View</a>
                                    </li>
                                    <li>
                                        <a href="layouts-hover.html" target="_blank">Hover Menu</a>
                                    </li>
                                    <li>
                                        <a href="layouts-compact.html" target="_blank">Compact</a>
                                    </li>
                                    <li>
                                        <a href="layouts-icon-view.html" target="_blank">Icon View</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-title">Components</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">
                                <i class="uil-box"></i>
                                <span> Base UI </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseUI">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="ui-accordions.html">Accordions & Collapse</a>
                                    </li>
                                    <li>
                                        <a href="ui-alerts.html">Alerts</a>
                                    </li>
                                    <li>
                                        <a href="ui-avatars.html">Avatars</a>
                                    </li>
                                    <li>
                                        <a href="ui-badges.html">Badges</a>
                                    </li>
                                    <li>
                                        <a href="ui-breadcrumb.html">Breadcrumb</a>
                                    </li>
                                    <li>
                                        <a href="ui-buttons.html">Buttons</a>
                                    </li>
                                    <li>
                                        <a href="ui-cards.html">Cards</a>
                                    </li>
                                    <li>
                                        <a href="ui-carousel.html">Carousel</a>
                                    </li>
                                    <li>
                                        <a href="ui-dropdowns.html">Dropdowns</a>
                                    </li>
                                    <li>
                                        <a href="ui-embed-video.html">Embed Video</a>
                                    </li>
                                    <li>
                                        <a href="ui-grid.html">Grid</a>
                                    </li>
                                    <li>
                                        <a href="ui-list-group.html">List Group</a>
                                    </li>
                                    <li>
                                        <a href="ui-modals.html">Modals</a>
                                    </li>
                                    <li>
                                        <a href="ui-notifications.html">Notifications</a>
                                    </li>
                                    <li>
                                        <a href="ui-offcanvas.html">Offcanvas</a>
                                    </li>
                                    <li>
                                        <a href="ui-placeholders.html">Placeholders</a>
                                    </li>
                                    <li>
                                        <a href="ui-pagination.html">Pagination</a>
                                    </li>
                                    <li>
                                        <a href="ui-popovers.html">Popovers</a>
                                    </li>
                                    <li>
                                        <a href="ui-progress.html">Progress</a>
                                    </li>
                                    <li>
                                        <a href="ui-ribbons.html">Ribbons</a>
                                    </li>
                                    <li>
                                        <a href="ui-spinners.html">Spinners</a>
                                    </li>
                                    <li>
                                        <a href="ui-tabs.html">Tabs</a>
                                    </li>
                                    <li>
                                        <a href="ui-tooltips.html">Tooltips</a>
                                    </li>
                                    <li>
                                        <a href="ui-typography.html">Typography</a>
                                    </li>
                                    <li>
                                        <a href="ui-utilities.html">Utilities</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false" aria-controls="sidebarExtendedUI" class="side-nav-link">
                                <i class="uil-package"></i>
                                <span> Extended UI </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarExtendedUI">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="extended-dragula.html">Dragula</a>
                                    </li>
                                    <li>
                                        <a href="extended-range-slider.html">Range Slider</a>
                                    </li>
                                    <li>
                                        <a href="extended-ratings.html">Ratings</a>
                                    </li>
                                    <li>
                                        <a href="extended-scrollbar.html">Scrollbar</a>
                                    </li>
                                    <li>
                                        <a href="extended-scrollspy.html">Scrollspy</a>
                                    </li>
                                    <li>
                                        <a href="extended-treeview.html">Treeview</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="widgets.html" class="side-nav-link">
                                <i class="uil-layer-group"></i>
                                <span> Widgets </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">
                                <i class="uil-streering"></i>
                                <span> Icons </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarIcons">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="icons-remixicons.html">Remix Icons</a>
                                    </li>
                                    <li>
                                        <a href="icons-mdi.html">Material Design</a>
                                    </li>
                                    <li>
                                        <a href="icons-unicons.html">Unicons</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
                                <i class="uil-chart"></i>
                                <span> Charts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCharts">
                                <ul class="side-nav-second-level">
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarApexCharts" aria-expanded="false" aria-controls="sidebarApexCharts">
                                            <span> Apex Charts </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarApexCharts">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="charts-apex-area.html">Area</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-bar.html">Bar</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-bubble.html">Bubble</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-candlestick.html">Candlestick</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-column.html">Column</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-heatmap.html">Heatmap</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-line.html">Line</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-mixed.html">Mixed</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-timeline.html">Timeline</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-boxplot.html">Boxplot</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-treemap.html">Treemap</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-pie.html">Pie</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-radar.html">Radar</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-radialbar.html">RadialBar</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-scatter.html">Scatter</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-polar-area.html">Polar Area</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-sparklines.html">Sparklines</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarChartJSCharts" aria-expanded="false" aria-controls="sidebarChartJSCharts">
                                            <span> ChartJS </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarChartJSCharts">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="charts-chartjs-area.html">Area</a>
                                                </li>
                                                <li>
                                                    <a href="charts-chartjs-bar.html">Bar</a>
                                                </li>
                                                <li>
                                                    <a href="charts-chartjs-line.html">Line</a>
                                                </li>
                                                <li>
                                                    <a href="charts-chartjs-other.html">Other</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="charts-brite.html">Britecharts</a>
                                    </li>
                                    <li>
                                        <a href="charts-sparkline.html">Sparklines</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                                <i class="uil-document-layout-center"></i>
                                <span> Forms </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarForms">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="form-elements.html">Basic Elements</a>
                                    </li>
                                    <li>
                                        <a href="form-advanced.html">Form Advanced</a>
                                    </li>
                                    <li>
                                        <a href="form-validation.html">Validation</a>
                                    </li>
                                    <li>
                                        <a href="form-wizard.html">Wizard</a>
                                    </li>
                                    <li>
                                        <a href="form-fileuploads.html">File Uploads</a>
                                    </li>
                                    <li>
                                        <a href="form-editors.html">Editors</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                                <i class="uil-table"></i>
                                <span> Tables </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTables">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="tables-basic.html">Basic Tables</a>
                                    </li>
                                    <li>
                                        <a href="tables-datatable.html">Data Tables</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                                <i class="uil-location-point"></i>
                                <span> Maps </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMaps">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="maps-google.html">Google Maps</a>
                                    </li>
                                    <li>
                                        <a href="maps-vector.html">Vector Maps</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                                <i class="uil-folder-plus"></i>
                                <span> Multi Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMultiLevel">
                                <ul class="side-nav-second-level">
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel">
                                            <span> Second Level </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarSecondLevel">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">Item 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel">
                                            <span> Third Level </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarThirdLevel">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 1</a>
                                                </li>
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false" aria-controls="sidebarFourthLevel">
                                                        <span> Item 2 </span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="sidebarFourthLevel">
                                                        <ul class="side-nav-forth-level">
                                                            <li>
                                                                <a href="javascript: void(0);">Item 2.1</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: void(0);">Item 2.2</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <!-- Help Box -->
                        <div class="help-box text-white text-center">
                            <a href="javascript: void(0);" class="float-end close-btn text-white">
                                <i class="mdi mdi-close"></i>
                            </a>
                            <img src="assets/images/svg/help-icon.svg" height="90" alt="Helper Icon Image" />
                            <h5 class="mt-3">Unlimited Access</h5>
                            <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
                            <a href="javascript: void(0);" class="btn btn-secondary btn-sm">Upgrade</a>
                        </div>
                        <!-- end Help Box -->


                    </ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->


            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Form Advanced</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Form Advanced</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Select2</h4>
                                        <p class="text-muted font-14">Select2 gives you a customizable select box with support for searching, tagging, remote data sets, infinite scrolling, and many other highly used options.</p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#select2-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#select2-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="select2-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p class="mb-1 fw-bold text-muted">Single Select</p>
                                                        <p class="text-muted font-14">
                                                            Select2 can take a regular select box like this...
                                                        </p>

                                                        <select class="form-control select2" data-toggle="select2">
                                                            <option>Select</option>
                                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                                <option value="AK">Alaska</option>
                                                                <option value="HI">Hawaii</option>
                                                            </optgroup>
                                                            <optgroup label="Pacific Time Zone">
                                                                <option value="CA">California</option>
                                                                <option value="NV">Nevada</option>
                                                                <option value="OR">Oregon</option>
                                                                <option value="WA">Washington</option>
                                                            </optgroup>
                                                            <optgroup label="Mountain Time Zone">
                                                                <option value="AZ">Arizona</option>
                                                                <option value="CO">Colorado</option>
                                                                <option value="ID">Idaho</option>
                                                                <option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option>
                                                                <option value="NM">New Mexico</option>
                                                                <option value="ND">North Dakota</option>
                                                                <option value="UT">Utah</option>
                                                                <option value="WY">Wyoming</option>
                                                            </optgroup>
                                                            <optgroup label="Central Time Zone">
                                                                <option value="AL">Alabama</option>
                                                                <option value="AR">Arkansas</option>
                                                                <option value="IL">Illinois</option>
                                                                <option value="IA">Iowa</option>
                                                                <option value="KS">Kansas</option>
                                                                <option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option>
                                                                <option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option>
                                                                <option value="MO">Missouri</option>
                                                                <option value="OK">Oklahoma</option>
                                                                <option value="SD">South Dakota</option>
                                                                <option value="TX">Texas</option>
                                                                <option value="TN">Tennessee</option>
                                                                <option value="WI">Wisconsin</option>
                                                            </optgroup>
                                                            <optgroup label="Eastern Time Zone">
                                                                <option value="CT">Connecticut</option>
                                                                <option value="DE">Delaware</option>
                                                                <option value="FL">Florida</option>
                                                                <option value="GA">Georgia</option>
                                                                <option value="IN">Indiana</option>
                                                                <option value="ME">Maine</option>
                                                                <option value="MD">Maryland</option>
                                                                <option value="MA">Massachusetts</option>
                                                                <option value="MI">Michigan</option>
                                                                <option value="NH">New Hampshire</option>
                                                                <option value="NJ">New Jersey</option>
                                                                <option value="NY">New York</option>
                                                                <option value="NC">North Carolina</option>
                                                                <option value="OH">Ohio</option>
                                                                <option value="PA">Pennsylvania</option>
                                                                <option value="RI">Rhode Island</option>
                                                                <option value="SC">South Carolina</option>
                                                                <option value="VT">Vermont</option>
                                                                <option value="VA">Virginia</option>
                                                                <option value="WV">West Virginia</option>
                                                            </optgroup>
                                                        </select>
                                                    </div> <!-- end col -->

                                                    <div class="col-lg-6">
                                                        <p class="mb-1 fw-bold text-muted">Multiple Select</p>
                                                        <p class="text-muted font-14">
                                                            Select2 can take a regular select box like this...
                                                        </p>

                                                        <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                                <option value="AK">Alaska</option>
                                                                <option value="HI">Hawaii</option>
                                                            </optgroup>
                                                            <optgroup label="Pacific Time Zone">
                                                                <option value="CA">California</option>
                                                                <option value="NV">Nevada</option>
                                                                <option value="OR">Oregon</option>
                                                                <option value="WA">Washington</option>
                                                            </optgroup>
                                                            <optgroup label="Mountain Time Zone">
                                                                <option value="AZ">Arizona</option>
                                                                <option value="CO">Colorado</option>
                                                                <option value="ID">Idaho</option>
                                                                <option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option>
                                                                <option value="NM">New Mexico</option>
                                                                <option value="ND">North Dakota</option>
                                                                <option value="UT">Utah</option>
                                                                <option value="WY">Wyoming</option>
                                                            </optgroup>
                                                            <optgroup label="Central Time Zone">
                                                                <option value="AL">Alabama</option>
                                                                <option value="AR">Arkansas</option>
                                                                <option value="IL">Illinois</option>
                                                                <option value="IA">Iowa</option>
                                                                <option value="KS">Kansas</option>
                                                                <option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option>
                                                                <option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option>
                                                                <option value="MO">Missouri</option>
                                                                <option value="OK">Oklahoma</option>
                                                                <option value="SD">South Dakota</option>
                                                                <option value="TX">Texas</option>
                                                                <option value="TN">Tennessee</option>
                                                                <option value="WI">Wisconsin</option>
                                                            </optgroup>
                                                            <optgroup label="Eastern Time Zone">
                                                                <option value="CT">Connecticut</option>
                                                                <option value="DE">Delaware</option>
                                                                <option value="FL">Florida</option>
                                                                <option value="GA">Georgia</option>
                                                                <option value="IN">Indiana</option>
                                                                <option value="ME">Maine</option>
                                                                <option value="MD">Maryland</option>
                                                                <option value="MA">Massachusetts</option>
                                                                <option value="MI">Michigan</option>
                                                                <option value="NH">New Hampshire</option>
                                                                <option value="NJ">New Jersey</option>
                                                                <option value="NY">New York</option>
                                                                <option value="NC">North Carolina</option>
                                                                <option value="OH">Ohio</option>
                                                                <option value="PA">Pennsylvania</option>
                                                                <option value="RI">Rhode Island</option>
                                                                <option value="SC">South Carolina</option>
                                                                <option value="VT">Vermont</option>
                                                                <option value="VA">Virginia</option>
                                                                <option value="WV">West Virginia</option>
                                                            </optgroup>
                                                        </select>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="select2-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Select2 css --&gt;
                                                        &lt;link href=&quot;assets/vendor/select2/css/select2.min.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; /&gt;

                                                        &lt;!--  Select2 Js --&gt;
                                                        &lt;script src=&quot;assets/vendor/select2/js/select2.min.js&quot;&gt;&lt;/script&gt;

                                                        &lt;!-- Single Select --&gt;
                                                        &lt;select class=&quot;form-control select2&quot; data-toggle=&quot;select2&quot;&gt;
                                                            &lt;option&gt;Select&lt;/option&gt;
                                                            &lt;optgroup label=&quot;Alaskan/Hawaiian Time Zone&quot;&gt;
                                                                &lt;option value=&quot;AK&quot;&gt;Alaska&lt;/option&gt;
                                                                &lt;option value=&quot;HI&quot;&gt;Hawaii&lt;/option&gt;
                                                            &lt;/optgroup&gt;
                                                            &lt;optgroup label=&quot;Pacific Time Zone&quot;&gt;
                                                                &lt;option value=&quot;CA&quot;&gt;California&lt;/option&gt;
                                                                &lt;option value=&quot;NV&quot;&gt;Nevada&lt;/option&gt;
                                                                &lt;option value=&quot;OR&quot;&gt;Oregon&lt;/option&gt;
                                                                &lt;option value=&quot;WA&quot;&gt;Washington&lt;/option&gt;
                                                            &lt;/optgroup&gt;
                                                        &lt;/select&gt;

                                                        &lt;!-- Multiple Select --&gt;
                                                        &lt;select class=&quot;select2 form-control select2-multiple&quot; data-toggle=&quot;select2&quot; multiple=&quot;multiple&quot; data-placeholder=&quot;Choose ...&quot;&gt;
                                                            &lt;optgroup label=&quot;Alaskan/Hawaiian Time Zone&quot;&gt;
                                                                &lt;option value=&quot;AK&quot;&gt;Alaska&lt;/option&gt;
                                                                &lt;option value=&quot;HI&quot;&gt;Hawaii&lt;/option&gt;
                                                            &lt;/optgroup&gt;
                                                            &lt;optgroup label=&quot;Pacific Time Zone&quot;&gt;
                                                                &lt;option value=&quot;CA&quot;&gt;California&lt;/option&gt;
                                                                &lt;option value=&quot;NV&quot;&gt;Nevada&lt;/option&gt;
                                                                &lt;option value=&quot;OR&quot;&gt;Oregon&lt;/option&gt;
                                                                &lt;option value=&quot;WA&quot;&gt;Washington&lt;/option&gt;
                                                            &lt;/optgroup&gt;
                                                            &lt;optgroup label=&quot;Mountain Time Zone&quot;&gt;
                                                                &lt;option value=&quot;AZ&quot;&gt;Arizona&lt;/option&gt;
                                                                &lt;option value=&quot;CO&quot;&gt;Colorado&lt;/option&gt;
                                                                &lt;option value=&quot;ID&quot;&gt;Idaho&lt;/option&gt;
                                                                &lt;option value=&quot;MT&quot;&gt;Montana&lt;/option&gt;
                                                                &lt;option value=&quot;NE&quot;&gt;Nebraska&lt;/option&gt;
                                                                &lt;option value=&quot;NM&quot;&gt;New Mexico&lt;/option&gt;
                                                                &lt;option value=&quot;ND&quot;&gt;North Dakota&lt;/option&gt;
                                                                &lt;option value=&quot;UT&quot;&gt;Utah&lt;/option&gt;
                                                                &lt;option value=&quot;WY&quot;&gt;Wyoming&lt;/option&gt;
                                                            &lt;/optgroup&gt;
                                                        &lt;/select&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Date Range Picker</h4>
                                        <p class="text-muted font-14">
                                            A JavaScript component for choosing date ranges, dates and times.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#daterange-picker-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#daterange-picker-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="daterange-picker-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <!-- Date Range -->
                                                        <div class="mb-3">
                                                            <label class="form-label">Date Range</label>
                                                            <input type="text" class="form-control date" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <!-- Date Range Picker With Times -->
                                                        <div class="mb-3">
                                                            <label class="form-label">Date Range Picker With Times</label>
                                                            <input type="text" class="form-control date" id="daterangetime" data-toggle="date-picker" data-time-picker="true" data-locale="{'format': 'DD/MM hh:mm A'}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <!-- Single Date Picker -->
                                                        <div>
                                                            <label class="form-label">Single Date Picker</label>
                                                            <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <!-- Predefined Date Ranges -->
                                                        <div>
                                                            <label class="form-label">Predefined Date Ranges</label>
                                                            <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light">
                                                                <i class="mdi mdi-calendar"></i>&nbsp;
                                                                <span id="selectedValue"></span> <i class="mdi mdi-menu-down"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="daterange-picker-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Daterangepicker css --&gt;
                                                        &lt;link rel=&quot;stylesheet&quot; href=&quot;assets/vendor/daterangepicker/daterangepicker.css&quot; type=&quot;text/css&quot; /&gt;

                                                        &lt;!-- Daterangepicker js --&gt;
                                                        &lt;script src=&quot;assets/vendor/daterangepicker/moment.min.js&quot;&gt;&lt;/script&gt;
                                                        &lt;script src=&quot;assets/vendor/daterangepicker/daterangepicker.js&quot;&gt;&lt;/script&gt;

                                                        &lt;!-- Date Range --&gt;
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Date Range&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control date&quot; id=&quot;singledaterange&quot; data-toggle=&quot;date-picker&quot; data-cancel-class=&quot;btn-warning&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Date Range Picker With Times --&gt;
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Date Range Picker With Times&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control date&quot; id=&quot;daterangetime&quot; data-toggle=&quot;date-picker&quot; data-time-picker=&quot;true&quot; data-locale=&quot;{'format': 'DD/MM hh:mm A'}&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Single Date Picker --&gt;
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Single Date Picker&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control date&quot; id=&quot;birthdatepicker&quot; data-toggle=&quot;date-picker&quot; data-single-date-picker=&quot;true&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Predefined Date Ranges --&gt;
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Predefined Date Ranges&lt;/label&gt;
                                                            &lt;div id=&quot;reportrange&quot; class=&quot;form-control&quot; data-toggle=&quot;date-picker-range&quot; data-target-display=&quot;#selectedValue&quot;  data-cancel-class=&quot;btn-light&quot;&gt;
                                                                &lt;i class=&quot;mdi mdi-calendar&quot;&gt;&lt;/i&gt;&amp;nbsp;
                                                                &lt;span id=&quot;selectedValue&quot;&gt;&lt;/span&gt; &lt;i class=&quot;mdi mdi-menu-down&quot;&gt;&lt;/i&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Switch</h4>
                                        <p class="text-muted font-14">
                                            Here are a few types of switches.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-4">
                                            <li class="nav-item">
                                                <a href="#switches-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#switches-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="switches-preview">
                                                <!-- without label-->
                                                <input type="checkbox" id="switch0" data-switch="none"/>
                                                <label for="switch0" data-on-label="" data-off-label=""></label>

                                                <!-- Bool Switch-->
                                                <input type="checkbox" id="switch1" checked data-switch="bool"/>
                                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>

                                                <!-- Primary Switch-->
                                                <input type="checkbox" id="switch2" checked data-switch="primary"/>
                                                <label for="switch2" data-on-label="On" data-off-label="Off"></label>

                                                <!-- Success Switch-->
                                                <input type="checkbox" id="switch3" checked data-switch="success"/>
                                                <label for="switch3" data-on-label="Yes" data-off-label="No"></label>

                                                <!-- Info Switch-->
                                                <input type="checkbox" id="switch4" checked data-switch="info"/>
                                                <label for="switch4" data-on-label="On" data-off-label="Off"></label>

                                                <!-- Warning Switch-->
                                                <input type="checkbox" id="switch5" checked data-switch="warning"/>
                                                <label for="switch5" data-on-label="Yes" data-off-label="No"></label>

                                                <!-- Danger Switch-->
                                                <input type="checkbox" id="switch6" checked data-switch="danger"/>
                                                <label for="switch6" data-on-label="On" data-off-label="Off"></label>

                                                <!-- Dark Switch-->
                                                <input type="checkbox" id="switch7" checked data-switch="secondary"/>
                                                <label for="switch7" data-on-label="Yes" data-off-label="No"></label>

                                                <!-- Disbled Switch-->
                                                <input type="checkbox" id="switchdis" data-switch="primary" checked disabled/>
                                                <label for="switchdis" data-on-label="On" data-off-label="Off"></label>

                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="switches-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Without label--&gt;
                                                        &lt;input type=&quot;checkbox&quot; id=&quot;switch0&quot; data-switch=&quot;none&quot;/&gt;
                                                        &lt;label for=&quot;switch0&quot; data-on-label=&quot;&quot; data-off-label=&quot;&quot;&gt;&lt;/label&gt;

                                                        &lt;!-- Bool Switch--&gt;
                                                        &lt;input type=&quot;checkbox&quot; id=&quot;switch1&quot; checked data-switch=&quot;bool&quot;/&gt;
                                                        &lt;label for=&quot;switch1&quot; data-on-label=&quot;On&quot; data-off-label=&quot;Off&quot;&gt;&lt;/label&gt;

                                                        &lt;!-- Primary Switch--&gt;
                                                        &lt;input type=&quot;checkbox&quot; id=&quot;switch2&quot; checked data-switch=&quot;primary&quot;/&gt;
                                                        &lt;label for=&quot;switch2&quot; data-on-label=&quot;On&quot; data-off-label=&quot;Off&quot;&gt;&lt;/label&gt;

                                                        &lt;!-- Success Switch--&gt;
                                                        &lt;input type=&quot;checkbox&quot; id=&quot;switch3&quot; checked data-switch=&quot;success&quot;/&gt;
                                                        &lt;label for=&quot;switch3&quot; data-on-label=&quot;Yes&quot; data-off-label=&quot;No&quot;&gt;&lt;/label&gt;

                                                        &lt;!-- Info Switch--&gt;
                                                        &lt;input type=&quot;checkbox&quot; id=&quot;switch4&quot; checked data-switch=&quot;info&quot;/&gt;
                                                        &lt;label for=&quot;switch4&quot; data-on-label=&quot;On&quot; data-off-label=&quot;Off&quot;&gt;&lt;/label&gt;

                                                        &lt;!-- Warning Switch--&gt;
                                                        &lt;input type=&quot;checkbox&quot; id=&quot;switch5&quot; checked data-switch=&quot;warning&quot;/&gt;
                                                        &lt;label for=&quot;switch5&quot; data-on-label=&quot;Yes&quot; data-off-label=&quot;No&quot;&gt;&lt;/label&gt;

                                                        &lt;!-- Danger Switch--&gt;
                                                        &lt;input type=&quot;checkbox&quot; id=&quot;switch6&quot; checked data-switch=&quot;danger&quot;/&gt;
                                                        &lt;label for=&quot;switch6&quot; data-on-label=&quot;On&quot; data-off-label=&quot;Off&quot;&gt;&lt;/label&gt;

                                                        &lt;!-- Dark Switch--&gt;
                                                        &lt;input type=&quot;checkbox&quot; id=&quot;switch7&quot; checked data-switch=&quot;secondary&quot;/&gt;
                                                        &lt;label for=&quot;switch7&quot; data-on-label=&quot;Yes&quot; data-off-label=&quot;No&quot;&gt;&lt;/label&gt;

                                                        &lt;!-- Disbled Switch--&gt;
                                                        &lt;input type=&quot;checkbox&quot; id=&quot;switchdis&quot; data-switch=&quot;primary&quot; checked disabled/&gt;
                                                        &lt;label for=&quot;switchdis&quot; data-on-label=&quot;On&quot; data-off-label=&quot;Off&quot;&gt;&lt;/label&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Bootstrap Datepicker</h4>
                                        <p class="text-muted font-14">
                                            Bootstrap-datepicker provides a flexible datepicker widget in the Bootstrap style.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#datepicker-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#datepicker-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="datepicker-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3 position-relative" id="datepicker1">
                                                            <label class="form-label">Date Picker</label>
                                                            <input type="text" class="form-control" data-provide="datepicker" data-date-today-highlight="true" data-date-container="#datepicker1">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3 position-relative" id="datepicker2">
                                                            <label class="form-label">Date View</label>
                                                            <input type="text" class="form-control" data-provide="datepicker" data-date-format="d-M-yyyy" data-date-container="#datepicker2">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3 position-relative" id="datepicker3">
                                                            <label class="form-label">Multi Datepicker</label>
                                                            <input type="text" class="form-control" data-provide="datepicker" data-date-multidate="true" data-date-container="#datepicker3">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3 position-relative" id="datepicker4">
                                                            <label class="form-label">Autoclose</label>
                                                            <input type="text" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3 position-relative" id="datepicker5">
                                                            <label class="form-label">Month View</label>
                                                            <input type="text" class="form-control" data-provide="datepicker" data-date-format="MM yyyy" data-date-min-view-mode="1" data-date-container="#datepicker5">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3 position-relative" id="datepicker6">
                                                            <label class="form-label">Year View</label>
                                                            <input type="text" class="form-control" data-provide="datepicker" data-date-min-view-mode="2" data-date-container="#datepicker6">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label class="form-label">Inline Datepicker</label>
                                                            <div data-provide="datepicker-inline"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="datepicker-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Bootstrap Datepicker css --&gt;
                                                        &lt;link href=&quot;assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; /&gt;

                                                        &lt;!-- Bootstrap Datepicker js --&gt;
                                                        &lt;script src=&quot;assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js&quot;&gt;&lt;/script&gt;

                                                        &lt;!-- Date Picker --&gt;
                                                        &lt;div class=&quot;mb-3 position-relative&quot; id=&quot;datepicker1&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Date Picker&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;datepicker&quot; data-date-container=&quot;#datepicker1&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Date View --&gt;
                                                        &lt;div class=&quot;mb-3 position-relative&quot; id=&quot;datepicker2&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Date View&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;datepicker&quot; data-date-format=&quot;d-M-yyyy&quot; data-date-container=&quot;#datepicker2&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Multi Datepicker --&gt;
                                                        &lt;div class=&quot;mb-3 position-relative&quot; id=&quot;datepicker3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Multi Datepicker&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;datepicker&quot; data-date-multidate=&quot;true&quot; data-date-container=&quot;#datepicker3&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Autoclose --&gt;
                                                        &lt;div class=&quot;mb-3 position-relative&quot; id=&quot;datepicker4&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Autoclose&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;datepicker&quot; data-date-autoclose=&quot;true&quot; data-date-container=&quot;#datepicker4&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Month View --&gt;
                                                        &lt;div class=&quot;mb-3 position-relative&quot; id=&quot;datepicker5&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Month View&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;datepicker&quot; data-date-format=&quot;MM yyyy&quot; data-date-min-view-mode=&quot;1&quot; data-date-container=&quot;#datepicker5&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Year View --&gt;
                                                        &lt;div class=&quot;mb-3 position-relative&quot; id=&quot;datepicker6&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Year View&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;datepicker&quot; data-date-min-view-mode=&quot;2&quot; data-date-container=&quot;#datepicker6&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;!-- Inline Datepicker --&gt;
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Inline Datepicker&lt;/label&gt;
                                                            &lt;div data-provide=&quot;datepicker-inline&quot;&gt;&lt;/div&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Flatpickr - Date picker</h4>
                                        <p class="text-muted font-14">A lightweight and powerful datetimepicker</p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#flatpickr-datepicker-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#flatpickr-datepicker-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="flatpickr-datepicker-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Basic</label>
                                                            <input type="text" id="basic-datepicker" class="form-control" placeholder="Basic datepicker">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Date & Time</label>
                                                            <input type="text" id="datetime-datepicker" class="form-control" placeholder="Date and Time">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Human-friendly Dates</label>
                                                            <input type="text" id="humanfd-datepicker" class="form-control" placeholder="October 9, 2018">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">MinDate and MaxDate</label>
                                                            <input type="text" id="minmax-datepicker" class="form-control" placeholder="mindate - maxdate">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Disabling dates</label>
                                                            <input type="text" id="disable-datepicker" class="form-control" placeholder="Disabling dates">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Selecting multiple dates</label>
                                                            <input type="text" id="multiple-datepicker" class="form-control" placeholder="Multiple dates">
                                                        </div>

                                                    </div> <!-- end col -->

                                                    <div class="col-lg-6 mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label class="form-label">Selecting multiple dates - Conjunction</label>
                                                            <input type="text" id="conjunction-datepicker" class="form-control" placeholder="2018-10-10 :: 2018-10-11">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Range Calendar</label>
                                                            <input type="text" id="range-datepicker" class="form-control" placeholder="2018-10-03 to 2018-10-10">
                                                        </div>

                                                        <div>
                                                            <label class="form-label">Inline Calendar</label>
                                                            <input type="text" id="inline-datepicker" class="form-control" placeholder="Inline calendar">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="flatpickr-datepicker-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Basic&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;basic-datepicker&quot; class=&quot;form-control&quot; placeholder=&quot;Basic datepicker&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Date &amp; Time&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;datetime-datepicker&quot; class=&quot;form-control&quot; placeholder=&quot;Date and Time&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Human-friendly Dates&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;humanfd-datepicker&quot; class=&quot;form-control&quot; placeholder=&quot;October 9, 2018&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;MinDate and MaxDate&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;minmax-datepicker&quot; class=&quot;form-control&quot; placeholder=&quot;mindate - maxdate&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Disabling dates&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;disable-datepicker&quot; class=&quot;form-control&quot; placeholder=&quot;Disabling dates&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Selecting multiple dates&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;multiple-datepicker&quot; class=&quot;form-control&quot; placeholder=&quot;Multiple dates&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Selecting multiple dates - Conjunction&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;conjunction-datepicker&quot; class=&quot;form-control&quot; placeholder=&quot;2018-10-10 :: 2018-10-11&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Range Calendar&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;range-datepicker&quot; class=&quot;form-control&quot; placeholder=&quot;2018-10-03 to 2018-10-10&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Inline Calendar&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; id=&quot;inline-datepicker&quot; class=&quot;form-control&quot; placeholder=&quot;Inline calendar&quot;&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Flatpickr - Time Picker </h4>
                                        <p class="text-muted font-14">A lightweight and powerful datetimepicker</p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#timepicker-flatpickr-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#timepicker-flatpickr-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="timepicker-flatpickr-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Default Time Picker</label>
                                                            <div class="input-group">
                                                                <input id="basic-timepicker" type="text" class="form-control" placeholder="Basic timepicker">
                                                                <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="mb-0">
                                                            <label class="form-label">24-hour Time Picker</label>
                                                            <div class="input-group">
                                                                <input id="24hours-timepicker" type="text" class="form-control" placeholder="16:21">
                                                                <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->

                                                    <div class="col-lg-6 mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label class="form-label">Time Picker w/ Limits</label>
                                                            <div class="input-group">
                                                                <input id="minmax-timepicker" type="text" class="form-control" placeholder="Limits">
                                                                <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="mb-0">
                                                            <label class="form-label">Preloading Time</label>
                                                            <div class="input-group">
                                                                <input id="preloading-timepicker" type="text" class="form-control" placeholder="Pick a time">
                                                                <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="timepicker-flatpickr-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Default Time Picker&lt;/label&gt;
                                                            &lt;div class=&quot;input-group&quot;&gt;
                                                                &lt;input id=&quot;basic-timepicker&quot; type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Basic timepicker&quot;&gt;
                                                                &lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;ri-time-line&quot;&gt;&lt;/i&gt;&lt;/span&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-0&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;24-hour Time Picker&lt;/label&gt;
                                                            &lt;div class=&quot;input-group&quot;&gt;
                                                                &lt;input id=&quot;24hours-timepicker&quot; type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;16:21&quot;&gt;
                                                                &lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;ri-time-line&quot;&gt;&lt;/i&gt;&lt;/span&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Time Picker w/ Limits&lt;/label&gt;
                                                            &lt;div class=&quot;input-group&quot;&gt;
                                                                &lt;input id=&quot;minmax-timepicker&quot; type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Limits&quot;&gt;
                                                                &lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;ri-time-line&quot;&gt;&lt;/i&gt;&lt;/span&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-0&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Preloading Time&lt;/label&gt;
                                                            &lt;div class=&quot;input-group&quot;&gt;
                                                                &lt;input id=&quot;preloading-timepicker&quot; type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Pick a time&quot;&gt;
                                                                &lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;ri-time-line&quot;&gt;&lt;/i&gt;&lt;/span&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Input Masks</h4>
                                        <p class="text-muted font-14">
                                            A jQuery Plugin to make masks on form fields and HTML elements.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#input-masks-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#input-masks-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="input-masks-preview">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <form action="#">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000">
                                                                <span class="font-13 text-muted">e.g "DD/MM/YYYY"</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Hour</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00:00:00">
                                                                <span class="font-13 text-muted">e.g "HH:MM:SS"</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Date & Hour</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000 00:00:00">
                                                                <span class="font-13 text-muted">e.g "DD/MM/YYYY HH:MM:SS"</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">ZIP Code</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00000-000">
                                                                <span class="font-13 text-muted">e.g "xxxxx-xxx"</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Crazy Zip Code</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="0-00-00-00">
                                                                <span class="font-13 text-muted">e.g "x-xx-xx-xx"</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Money</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true">
                                                                <span class="font-13 text-muted">e.g "Your money"</span>
                                                            </div>
                                                            <div>
                                                                <label class="form-label">Money 2</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="#.##0,00" data-reverse="true">
                                                                <span class="font-13 text-muted">e.g "#.##0,00"</span>
                                                            </div>

                                                        </form>
                                                    </div> <!-- end col -->

                                                    <div class="col-md-6">
                                                        <form action="#">
                                                            <div class="mb-3">
                                                                <label class="form-label">Telephone</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="0000-0000">
                                                                <span class="font-13 text-muted">e.g "xxxx-xxxx"</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Telephone with Code Area</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(00) 0000-0000">
                                                                <span class="font-13 text-muted">e.g "(xx) xxxx-xxxx"</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">US Telephone</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(000) 000-0000">
                                                                <span class="font-13 text-muted">e.g "(xxx) xxx-xxxx"</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">São Paulo Celphones</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(00) 00000-0000">
                                                                <span class="font-13 text-muted">e.g "(xx) xxxxx-xxxx"</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">CPF</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000-00" data-reverse="true">
                                                                <span class="font-13 text-muted">e.g "xxx.xxx.xxxx-xx"</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">CNPJ</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00.000.000/0000-00" data-reverse="true">
                                                                <span class="font-13 text-muted">e.g "xx.xxx.xxx/xxxx-xx"</span>
                                                            </div>
                                                            <div>
                                                                <label class="form-label">IP Address</label>
                                                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="099.099.099.099" data-reverse="true">
                                                                <span class="font-13 text-muted">e.g "xxx.xxx.xxx.xxx"</span>
                                                            </div>
                                                        </form>
                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="input-masks-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Input Mask js --&gt;
                                                        &lt;script src=&quot;assets/vendor/jquery-mask-plugin/jquery.mask.min.js&quot;&gt;&lt;/script&gt;
                                                    </span>

                                                    <span class="html escape">
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Date&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;00/00/0000&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;DD/MM/YYYY&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Hour&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;00:00:00&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;HH:MM:SS&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Date &amp; Hour&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;00/00/0000 00:00:00&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;DD/MM/YYYY HH:MM:SS&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;ZIP Code&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;00000-000&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;xxxxx-xxx&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Crazy Zip Code&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;0-00-00-00&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;x-xx-xx-xx&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Money&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;000.000.000.000.000,00&quot; data-reverse=&quot;true&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;Your money&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Money 2&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;#.##0,00&quot; data-reverse=&quot;true&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;#.##0,00&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Telephone&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;0000-0000&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;xxxx-xxxx&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Telephone with Code Area&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;(00) 0000-0000&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;(xx) xxxx-xxxx&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;US Telephone&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;(000) 000-0000&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;(xxx) xxx-xxxx&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;S&atilde;o Paulo Celphones&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;(00) 00000-0000&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;(xx) xxxxx-xxxx&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;CPF&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;000.000.000-00&quot; data-reverse=&quot;true&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;xxx.xxx.xxxx-xx&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;CNPJ&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;00.000.000/0000-00&quot; data-reverse=&quot;true&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;xx.xxx.xxx/xxxx-xx&quot;&lt;/span&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;IP Address&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-toggle=&quot;input-mask&quot; data-mask-format=&quot;099.099.099.099&quot; data-reverse=&quot;true&quot;&gt;
                                                            &lt;span class=&quot;font-13 text-muted&quot;&gt;e.g &quot;xxx.xxx.xxx.xxx&quot;&lt;/span&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Bootstrap Touchspin</h4>
                                        <p class="text-muted font-14">
                                            A mobile and touch friendly input spinner component for Bootstrap.
                                            Specify attribute <code>data-toggle="touchspin"</code> and your input would be conveterted into touch friendly spinner.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#touchspin-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#touchspin-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="touchspin-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Using data attributes</label>
                                                            <input data-toggle="touchspin" type="text" value="55">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Example with postfix (large)</label>
                                                            <input data-toggle="touchspin" value="18.20" type="text" data-step="0.1" data-decimals="2" data-bts-postfix="%">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">With prefix</label>
                                                            <input data-toggle="touchspin" type="text" data-bts-prefix="$">
                                                        </div>

                                                        <div class="mb-0">
                                                            <label class="form-label">Change button class</label>
                                                            <input data-toggle="touchspin" value="77" type="text" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-info">
                                                        </div>
                                                    </div> <!-- end col -->

                                                    <div class="col-lg-6 mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label class="form-label">Init with empty value:</label>
                                                            <input data-toggle="touchspin" type="text">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Max value - (Default value 100)</label>
                                                            <input data-toggle="touchspin" data-bts-max="500" value="128" data-btn-vertical="true" type="text">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">With prefix and postfix button</label>
                                                            <input data-toggle="touchspin" data-bts-prefix="A Button" data-bts-prefix-extra-class="btn btn-light"  data-bts-postfix="A Button" data-bts-postfix-extra-class="btn btn-light" type="text">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="touchspin-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Bootstrap Touchspin css --&gt;
                                                        &lt;link href=&quot;assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; /&gt;

                                                        &lt;!-- Bootstrap Touchspin js --&gt;
                                                        &lt;script src=&quot;assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js&quot;&gt;&lt;/script&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Using data attributes&lt;/label&gt;
                                                            &lt;input data-toggle=&quot;touchspin&quot; type=&quot;text&quot; value=&quot;55&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Example with postfix (large)&lt;/label&gt;
                                                            &lt;input data-toggle=&quot;touchspin&quot; value=&quot;18.20&quot; type=&quot;text&quot; data-step=&quot;0.1&quot; data-decimals=&quot;2&quot; data-bts-postfix=&quot;%&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;With prefix&lt;/label&gt;
                                                            &lt;input data-toggle=&quot;touchspin&quot; type=&quot;text&quot; data-bts-prefix=&quot;$&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Change button class&lt;/label&gt;
                                                            &lt;input data-toggle=&quot;touchspin&quot; value=&quot;77&quot; type=&quot;text&quot; data-bts-button-down-class=&quot;btn btn-danger&quot; data-bts-button-up-class=&quot;btn btn-info&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Init with empty value:&lt;/label&gt;
                                                            &lt;input data-toggle=&quot;touchspin&quot; type=&quot;text&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Max value - (Default value 100)&lt;/label&gt;
                                                            &lt;input data-toggle=&quot;touchspin&quot; data-bts-max=&quot;500&quot; value=&quot;128&quot; data-btn-vertical=&quot;true&quot; type=&quot;text&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;With prefix and postfix button&lt;/label&gt;
                                                            &lt;input data-toggle=&quot;touchspin&quot; data-bts-prefix=&quot;A Button&quot; data-bts-prefix-extra-class=&quot;btn btn-light&quot;  data-bts-postfix=&quot;A Button&quot; data-bts-postfix-extra-class=&quot;btn btn-light&quot; type=&quot;text&quot;&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Bootstrap Maxlength</h4>
                                        <p class="text-muted font-14">
                                            Uses the HTML5 attribute "maxlength" to work. Just specify <code>data-toggle="maxlength"</code> attribute
                                            to have maxlength indication on any input.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#maxlength-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#maxlength-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="maxlength-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Default usage</label>
                                                            <p class="text-muted font-13">
                                                                The badge will show up by default when the remaining chars are 10 or less:
                                                            </p>
                                                            <input type="text" class="form-control" maxlength="25" data-toggle="maxlength">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Threshold value</label>
                                                            <p class="text-muted font-13">
                                                                Satrt displaying the indication when reached to some threshhold. Specift the data attribute <code>threshold</code>. E.g.
                                                                <code>data-threshold="12"</code>
                                                            </p>
                                                            <input type="text" class="form-control" maxlength="25" data-toggle="maxlength" data-threshold="12">
                                                        </div>
                                                    </div> <!-- end col -->

                                                    <div class="col-lg-6 mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label class="form-label">Position</label>
                                                            <p class="text-muted font-13">
                                                                All you need to do is specify the data attribute <code>placement</code>. The possible positions are left, top, right, bottom-right, top-right, top-left,
                                                                bottom, bottom-left and centered-right. If none is specified, the positioning will be defauted to 'bottom'.
                                                                E.g. <code>data-placement="top"</code>
                                                            </p>
                                                            <input type="text" class="form-control" maxlength="25" data-toggle="maxlength" data-placement="top">
                                                        </div>

                                                        <div>
                                                            <label class="form-label">Textareas</label>
                                                            <p class="text-muted font-13">
                                                                Bootstrap maxlength supports textarea as well as inputs. Even on old IE.
                                                            </p>
                                                            <textarea data-toggle="maxlength" class="form-control" maxlength="225" rows="3"
                                                                placeholder="This textarea has a limit of 225 chars."></textarea>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="maxlength-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Bootstrap Maxlength js --&gt;
                                                        &lt;script src=&quot;assets/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js&quot;&gt;&lt;/script&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Default usage&lt;/label&gt;
                                                            &lt;p class=&quot;text-muted font-13&quot;&gt;
                                                                The badge will show up by default when the remaining chars are 10 or less:
                                                            &lt;/p&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; maxlength=&quot;25&quot; data-toggle=&quot;maxlength&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Threshold value&lt;/label&gt;
                                                            &lt;p class=&quot;text-muted font-13&quot;&gt;
                                                                Satrt displaying the indication when reached to some threshhold. Specift the data attribute &lt;code&gt;threshold&lt;/code&gt;. E.g.
                                                                &lt;code&gt;data-threshold=&quot;12&quot;&lt;/code&gt;
                                                            &lt;/p&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; maxlength=&quot;25&quot; data-toggle=&quot;maxlength&quot; data-threshold=&quot;12&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Position&lt;/label&gt;
                                                            &lt;p class=&quot;text-muted font-13&quot;&gt;
                                                                All you need to do is specify the data attribute &lt;code&gt;placement&lt;/code&gt;. The possible positions are left, top, right, bottom-right, top-right, top-left,
                                                                bottom, bottom-left and centered-right. If none is specified, the positioning will be defauted to 'bottom'.
                                                                E.g. &lt;code&gt;data-placement=&quot;top&quot;&lt;/code&gt;
                                                            &lt;/p&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; maxlength=&quot;25&quot; data-toggle=&quot;maxlength&quot; data-placement=&quot;top&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Textareas&lt;/label&gt;
                                                            &lt;p class=&quot;text-muted font-13&quot;&gt;
                                                                Bootstrap maxlength supports textarea as well as inputs. Even on old IE.
                                                            &lt;/p&gt;
                                                            &lt;textarea data-toggle=&quot;maxlength&quot; class=&quot;form-control&quot; maxlength=&quot;225&quot; rows=&quot;3&quot;
                                                                placeholder=&quot;This textarea has a limit of 225 chars.&quot;&gt;&lt;/textarea&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Timepicker</h4>
                                        <p class="text-muted font-14">
                                            Easily select a time for a text input using your mouse or keyboards arrow keys. Specify attribute <code>data-toggle="timepicker"</code>
                                            and you would have nice timepicker input element.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#timepicker-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#timepicker-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="timepicker-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Default Time Picker</label>
                                                            <div class="input-group" id="timepicker-input-group1">
                                                                <input id="timepicker" type="text" class="form-control" data-provide="timepicker">
                                                                <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="mb-0">
                                                            <label class="form-label">24 Hour Mode Time Picker E.g. <code>data-show-meridian="false"</code></label>
                                                            <div class="input-group" id="timepicker-input-group2">
                                                                <input id="timepicker2" type="text" class="form-control" data-provide='timepicker' data-show-meridian="false" >
                                                                <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->

                                                    <div class="col-lg-6 mt-3 mt-lg-0">
                                                        <div class="mb-0">
                                                            <label class="form-label">Specify a step for the minute field E.g. <code>data-minute-step="5"</code></label>
                                                            <div class="input-group" id="timepicker-input-group3">
                                                                <input id="timepicker3" type="text" class="form-control" data-provide='timepicker' data-minute-step="5">
                                                                <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="timepicker-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Bootstrap Timepicker css --&gt;
                                                        &lt;link href=&quot;assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; /&gt;

                                                        &lt;!-- Bootstrap Timepicker js --&gt;
                                                        &lt;script src=&quot;assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js&quot;&gt;&lt;/script&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Default Time Picker&lt;/label&gt;
                                                            &lt;div class=&quot;input-group&quot; id=&quot;timepicker-input-group1&quot;&gt;
                                                                &lt;input id=&quot;timepicker&quot; type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;timepicker&quot;&gt;
                                                                &lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;ri-time-line&quot;&gt;&lt;/i&gt;&lt;/span&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-0&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;24 Hour Mode Time Picker E.g. &lt;code&gt;data-show-meridian=&quot;false&quot;&lt;/code&gt;&lt;/label&gt;
                                                            &lt;div class=&quot;input-group&quot; id=&quot;timepicker-input-group2&quot;&gt;
                                                                &lt;input id=&quot;timepicker2&quot; type=&quot;text&quot; class=&quot;form-control&quot; data-provide='timepicker' data-show-meridian=&quot;false&quot; &gt;
                                                                &lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;ri-time-line&quot;&gt;&lt;/i&gt;&lt;/span&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-0&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Specify a step for the minute field E.g. &lt;code&gt;data-minute-step=&quot;5&quot;&lt;/code&gt;&lt;/label&gt;
                                                            &lt;div class=&quot;input-group&quot; id=&quot;timepicker-input-group3&quot;&gt;
                                                                &lt;input id=&quot;timepicker3&quot; type=&quot;text&quot; class=&quot;form-control&quot; data-provide='timepicker' data-minute-step=&quot;5&quot;&gt;
                                                                &lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;ri-time-line&quot;&gt;&lt;/i&gt;&lt;/span&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Typeahead</h4>
                                        <p class="text-muted font-14">
                                            Typeahead.js is a fast and fully-featured autocomplete library.
                                        </p>

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            <li class="nav-item">
                                                <a href="#typeahead-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Preview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#typeahead-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    Code
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="typeahead-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">The Basics</label>
                                                            <input type="text" class="form-control" data-provide="typeahead" id="the-basics" placeholder="Basic Example">
                                                        </div>
                                                    </div> <!-- end col -->

                                                    <div class="col-lg-6 mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label class="form-label">Bloodhound (Suggestion Engine)</label>
                                                            <input id="bloodhound" class="form-control" type="text" placeholder="States of USA">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Prefetch</label>
                                                            <input type="text" class="form-control" data-provide="typeahead" id="prefetch" placeholder="States of USA">
                                                        </div>
                                                    </div> <!-- end col -->

                                                    <div class="col-lg-6 mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label class="form-label">Remote</label>
                                                            <input type="text" class="form-control" data-provide="typeahead" id="remote" placeholder="States of USA">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Custom Templates</label>
                                                            <input id="custom-templates" class="form-control" type="text" placeholder="States of USA">
                                                        </div>
                                                    </div> <!-- end col -->

                                                    <div class="col-lg-6 mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label class="form-label">Default Suggestions</label>
                                                            <input type="text" class="form-control" data-provide="typeahead" id="default-suggestions">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-0">
                                                            <label class="form-label">Multiple Datasets</label>
                                                            <input type="text" class="form-control" data-provide="typeahead" id="multiple-datasets">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div> <!-- end preview-->

                                            <div class="tab-pane code" id="typeahead-code">
                                                <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Typehead --&gt;
                                                        &lt;script src=&quot;assets/vendor/handlebars/handlebars.min.js&quot;&gt;&lt;/script&gt;
                                                        &lt;script src=&quot;assets/vendor/typeahead.js/typeahead.bundle.min.js&quot;&gt;&lt;/script&gt;

                                                        &lt;!-- Typehead Demo js --&gt;
                                                        &lt;script src=&quot;assets/js/pages/demo.typehead.js&quot;&gt;&lt;/script&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;The Basics&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;typeahead&quot; id=&quot;the-basics&quot; placeholder=&quot;Basic Example&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Bloodhound (Suggestion Engine)&lt;/label&gt;
                                                            &lt;input id=&quot;bloodhound&quot; class=&quot;form-control&quot; type=&quot;text&quot; placeholder=&quot;States of USA&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Prefetch&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;typeahead&quot; id=&quot;prefetch&quot; placeholder=&quot;States of USA&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Remote&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;typeahead&quot; id=&quot;remote&quot; placeholder=&quot;States of USA&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Custom Templates&lt;/label&gt;
                                                            &lt;input id=&quot;custom-templates&quot; class=&quot;form-control&quot; type=&quot;text&quot; placeholder=&quot;States of USA&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Default Suggestions&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;typeahead&quot; id=&quot;default-suggestions&quot;&gt;
                                                        &lt;/div&gt;

                                                        &lt;div class=&quot;mb-3&quot;&gt;
                                                            &lt;label class=&quot;form-label&quot;&gt;Multiple Datasets&lt;/label&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; data-provide=&quot;typeahead&quot; id=&quot;multiple-datasets&quot;&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                <h5 class="text-white m-0">Theme Settings</h5>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="card mb-0 p-3">
                        <h5 class="mt-0 font-16 fw-bold mb-3">Choose Layout</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Vertical</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                            </span>
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Horizontal</h5>
                            </div>
                        </div>

                        <h5 class="my-3 font-16 fw-bold">Color Scheme</h5>

                        <div class="colorscheme-cardradio">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-theme" id="layout-color-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-color-light">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-secondary-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column bg-white rounded-2">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>

                                            <div id="topnav-color" class="bg-white rounded-2 h-100">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    </span>
                                                    <span class="d-flex h-100 flex-column bg-white rounded-2">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-theme" id="layout-color-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100 bg-black" for="layout-color-dark">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light-lighten d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-secondary-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light-lighten d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>

                                            <div id="topnav-color">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light-lighten d-flex p-1 align-items-center border-bottom border-opacity-25 border-primary border-opacity-25">
                                                        <span class="d-block p-1 bg-secondary-lighten rounded me-1"></span>
                                                        <span class="d-block border border-primary border-opacity-25 border-3 rounded ms-auto"></span>
                                                        <span class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                        <span class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                        <span class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                    </span>
                                                    <span class="bg-light-lighten d-block p-1"></span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-width">
                            <h5 class="my-3 font-16 fw-bold">Layout Mode</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-fluid" value="fluid">
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-fluid">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-secondary-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column rounded-2">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>

                                            <div id="topnav-color">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    </span>
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                                </div>
                                <div class="col-4" id="layout-boxed">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-boxed" value="boxed">
                                        <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-mode-boxed">
                                            <div id="sidebar-size" class="border-start border-end">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-secondary-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column rounded-2">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>

                                            <div id="topnav-color" class="border-start border-end h-100">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    </span>
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                </div>

                                <div class="col-4" id="layout-detached">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-mode" id="data-layout-detached" value="detached">
                                        <label class="form-check-label p-0 avatar-md w-100" for="data-layout-detached">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-flex p-1 align-items-center border-bottom ">
                                                    <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                </span>
                                                <span class="d-flex h-100 p-1 px-2">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                            </span>

                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Detached</h5>
                                </div>
                            </div>
                        </div>

                        <h5 class="my-3 font-16 fw-bold">Topbar Color</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                        <div id="sidebar-size">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>

                                        <div id="topnav-color">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                    <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                </span>
                                                <span class="bg-light d-block p-1"></span>
                                            </span>
                                        </div>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4" style="--ct-dark-rgb: 64,73,84;">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                        <div id="sidebar-size">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-primary-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-dark d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>

                                        <div id="topnav-color">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-dark d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                    <span class="d-block p-1 bg-primary-lighten rounded me-1"></span>
                                                    <span class="d-block border border-primary border-opacity-25 border-3 rounded ms-auto"></span>
                                                    <span class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                    <span class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                    <span class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                </span>
                                                <span class="bg-light d-block p-1"></span>
                                            </span>
                                        </div>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-brand" value="brand">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-brand">
                                        <div id="sidebar-size">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-primary bg-gradient d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>

                                        <div id="topnav-color">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-primary bg-gradient d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                    <span class="d-block p-1 bg-light opacity-25 rounded me-1"></span>
                                                    <span class="d-block border border-3 border opacity-25 rounded ms-auto"></span>
                                                    <span class="d-block border border-3 border opacity-25 rounded ms-1"></span>
                                                    <span class="d-block border border-3 border opacity-25 rounded ms-1"></span>
                                                    <span class="d-block border border-3 border opacity-25 rounded ms-1"></span>
                                                </span>
                                                <span class="bg-light d-block p-1"></span>
                                            </span>
                                        </div>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Brand</h5>
                            </div>
                        </div>

                        <div>
                            <h5 class="my-3 font-16 fw-bold">Menu Color</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-light">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>

                                            <div id="topnav-color">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    </span>
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                                </div>

                                <div class="col-4" style="--ct-dark-rgb: 64,73,84; --ct-border-color: #dee2e6;">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-dark">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-dark d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-secondary-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>

                                            <div id="topnav-color">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-primary border-opacity-25">
                                                        <span class="d-block p-1 bg-primary-lighten rounded me-1"></span>
                                                        <span class="d-block border border-secondary rounded border-opacity-25 border-3 ms-auto"></span>
                                                        <span class="d-block border border-secondary rounded border-opacity-25 border-3 ms-1"></span>
                                                        <span class="d-block border border-secondary rounded border-opacity-25 border-3 ms-1"></span>
                                                        <span class="d-block border border-secondary rounded border-opacity-25 border-3 ms-1"></span>
                                                    </span>
                                                    <span class="bg-dark d-block p-1"></span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-brand" value="brand">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-brand">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-primary bg-gradient d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                            <span class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>

                                            <div id="topnav-color">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-flex p-1 align-items-center border-bottom border-secondary">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    </span>
                                                    <span class="bg-primary bg-gradient d-block p-1"></span>
                                                </span>
                                            </div>

                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Brand</h5>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-size">
                            <h5 class="my-3 font-16 fw-bold">Sidebar Size</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-default" value="default">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-default">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-compact" value="compact">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-compact">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-small" value="condensed">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end flex-column" style="padding: 2px;">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-small-hover" value="sm-hover">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small-hover">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end flex-column" style="padding: 2px;">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Hover View</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-full" value="full">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-full">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-fullscreen" value="fullscreen">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-fullscreen">
                                            <span class="d-flex h-100">
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Fullscreen Layout</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-position">
                            <h5 class="my-3 font-16 fw-bold">Layout Position</h5>

                            <div class="btn-group radio" role="group">
                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                                <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                                <label class="btn btn-soft-primary w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>

                        <div id="sidebar-user">
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <label class="font-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="sidebar-user" id="sidebaruser-check">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="offcanvas-footer border-top p-3 text-center">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                    </div>
                    <div class="col-6">
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/" target="_blank" role="button" class="btn btn-primary w-100">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendor js -->
        <script src="{{ asset('back/assets/js/vendor.min.js') }}"></script>

        <!-- Code Highlight js -->
        <script src="assets/vendor/highlightjs/highlight.pack.min.js"></script>
        <script src="assets/vendor/clipboard/clipboard.min.js"></script>
        <script src="{{ asset('back/assets/js/hyper-syntax.js') }}"></script>

        <!--  Select2 Plugin Js -->
        <script src="{{ asset('back/assets/vendor/select2/js/select2.min.js') }}"></script>

        <!-- Typehead Demo js -->
        <script src="{{ asset('back/assets/js/pages/demo.typehead.js') }}"></script>

        <!-- Timepicker Demo js -->
        <script src="{{ asset('back/assets/js/pages/demo.timepicker.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('back/assets/js/app.min.js') }}"></script>

    </body>
</html>
