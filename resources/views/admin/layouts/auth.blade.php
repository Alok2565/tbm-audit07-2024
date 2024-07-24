<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--meta http-equiv="Content-Security-Policy" content="default-src https:" /-->
    <title>@yield('title') | Biological Human Sample</title>
    <link href="{{ asset('public/assets/css') }}/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('public/assets/css') }}/frontend.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('public/assets/backend/css/auth.css') }}">
</head>
<body class="lh-100 bg-gray">

	<header class="bdr-top">
      <div class="container">
            <div class="row">
                <div class="col-sm-12">
                   <ul class="logosection">
                        <li>
                            <img src="{{asset('public/assets/images/Ministry_of_Health_India.svg')}}" alt="Ministry of Health India" class="img-fluid">
                        </li>
                        <li>
                            <!-- <img src="" class="img-fluid"> -->
                            <span class="projectNmae">Biological Human Sample Import and Export System</span>
                        </li>
                        <li>
                            <img src="{{asset('public/assets/images/Indian_Council_of_Medical_Research_Logo.svg')}}" alt="Indian Council of Medical Research" class="img-fluid">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

	<nav class="navbar navbar-expand-lg nav-bg">
	  <div class="container">

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="/">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="/aboutus">About Us</a>
			</li>
			<!-- <li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Dropdown
			  </a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="#">Action</a></li>
				<li><a class="dropdown-item" href="#">Another action</a></li>
			  </ul>
			</li> -->
			<li class="nav-item">
			  <a class="nav-link" href="/contactus">Contact Us</a>
			</li>
		  </ul>






                @guest

					<div class="dropdown d-flex">
					  <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						Login
					  </button>
					  <ul class="dropdown-menu">
						<li><a class="dropdown-item" href="{{ route('imp-exp.login') }}">Import/Export Login</a></li>
						<li><a class="dropdown-item" href="{{ route('login') }}">ICMR Login</a></li>
						<!-- <li><a class="dropdown-item" href="{{ route('login') }}">Approval Officer Login</a></li> -->
					  </ul>
					</div>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('impexp.register') }}">Register</a>
                    </li>

                    @else
						 <ul class="dropdown d-flex">
											<li class="nav-item">
												<a class="nav-link" href="{{ route('imp-exp.login') }}">Logout</a>
											</li>
						</ul>
                    @endguest



		</div>
	  </div>
	</nav>

	<main>
		<div class="container">
			@yield('content')
		</div>
	</main>

	<footer class="footer">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="footerLogo">
                        <li>
                            <a href="">
                                <img src="{{asset('public/assets/images/NIC-logo.svg')}}" class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('public/assets/images/Digital.svg')}}" class="img-fluid">
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <article class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p>Website contents are being maintained by Ministry of Health and Family Welfare, Government of India.
                            Website has been designed, developed, maintained and hosted by <a href="https://www.nic.in/" target="_blank">  National Informatics Centre (NIC) </a> </p>
                    </div>
                </div>
            </div>
        </article>

    </footer>

	 <script src="{{ asset('public/assets/js') }}/bootstrap.bundle.min.js"></script>
	 <script src="{{ asset('public/assets/js') }}/jquery.min.js"></script>

</body>
</html>
