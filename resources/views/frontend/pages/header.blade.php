<header class="bdr-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="logosection">
                    <li class="d-flex">
                        {{-- <img src="{{asset('public/assets/images/Ministry_of_Health_India.svg')}}" alt="Ministry of Health India" class="img-fluid"> --}}
                        <img src="{{ asset('public/assets/images/satyam-dark.png') }}" alt="" width="65"
                            height="95">
                        <a class="mt-3 text-dark" href="{{ url('/') }}">
                            <span class="grid"><strong>स्वास्थ्य अनुसंधान विभाग</strong><br />Department of Health
                                Research</span>

                        </a>
                    </li>

                    <li> <span class="extra-logo">
                            <span class="projectNmae">Transfer of Human Biological Material (THBM)</span>
                        </span></li>
                    <li><span class="extra-logo float-end">
                            <img src="{{ asset('public/assets/images/Indian_Council_of_Medical_Research_Logo.svg') }}"
                                alt="Indian Council of Medical Research" class="img-fluid">
                        </span>

                    </li>
                </ul>

            </div>
        </div>
    </div>

    <main>
        <nav class="navbar navbar-expand-lg navbar-dark nav-bg" aria-label="Fifth navbar example">
            <div class="container">
              {{-- <a class="navbar-brand" href="#">Expand at lg</a> --}}
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('about-us') }}">About Us</a>
                  </li>
				  <li class="nav-item">
                    <a class="nav-link" target="_blank" href="{{ asset('public/assets/backend/tbm_manual.pdf') }}">User Manual</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a>
                  </li>
                  {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown05">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li> --}}
                </ul>
                @guest
                <ul class="navbar-nav gap-1">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Register
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('impexp.registations') }}">Importer/Exporter</a></li>
                      {{-- <li><a class="dropdown-item" href="{{ route('icmr.registations') }}">ICMR gov. officers</a></li>
                      <li><a class="dropdown-item" href="{{ route('committee.registations') }}">Committee Members</a></li> --}}
                    </ul>
                  </div>
                  <div class="dropdown">
                    <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Login
                    </a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('imp-exp.login') }}">Import/Export Login</a></li>
                      <li><a class="dropdown-item" href="{{ route('icmr.login') }}">ICMR Officers</a></li>
                      <li><a class="dropdown-item" href="{{ route('committee.login') }}">Committee Members</a></li>
                    </ul>
                  </div>
                  @else
                  <ul class="dropdown d-flex">
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                      </li>
                  </ul>
              </div>
            </ul>
              @endguest
            </div>
          </nav>
    </main>
</header>
