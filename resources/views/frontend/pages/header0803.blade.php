<header class="bdr-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="logosection">
                    <li class="d-flex">
                        {{-- <img src="{{asset('assets/images/Ministry_of_Health_India.svg')}}" alt="Ministry of Health India" class="img-fluid"> --}}
                        <img src="{{ asset('assets/images/satyam-dark.png') }}" alt="" width="65"
                            height="95">
                        <a class="mt-3 text-dark" href="{{ url('/') }}">
                            <span class="grid"><strong>स्वास्थ्य अनुसंधान विभाग</strong><br />Department of Health
                                Research</span>

                        </a>
                    </li>

                    <li> <span class="extra-logo">
                            <span class="projectNmae">Transfer of Human Biological Material (THBM) Portal</span>
                        </span></li>
                    <li><span class="extra-logo float-end">
                            <img src="{{ asset('assets/images/Indian_Council_of_Medical_Research_Logo.svg') }}"
                                alt="Indian Council of Medical Research" class="img-fluid">
                        </span>

                    </li>
                </ul>

            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg nav-bg">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a>
                    </li>

                </ul>
                @guest
                    <div class="dropdown m-1">
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Register
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('impexp.registations') }}">Importer/Exporter</a>
                            </li>
                            {{-- <li><a class="dropdown-item" href="{{ route('icmr.registations') }}">ICMR gov. officers</a></li>
                            <li><a class="dropdown-item" href="{{ route('committee.registations') }}">ICMR Committee</a></li> --}}
                        </ul>
                    </div>
                    <div class="dropdown m-1">
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('imp-exp.login') }}">Import/Export Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('icmr.login') }}">ICMR Officers</a></li>
                            <li><a class="dropdown-item" href="{{ route('committee.login') }}">ICMR Committee</a></li>
                        </ul>
                    </div>
                @else
                    <ul class="dropdown d-flex">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                @endguest



            </div>
        </div>
    </nav>
</header>
