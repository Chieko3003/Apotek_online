</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  
  <div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar site-navbar-target" role="banner">

      <div class="container mb-3">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto">
            <a href="index.html">CERIA<span class="text-primary">.</span></a>
          </div>
          <div class="site-quick-contact d-none d-lg-flex ml-auto ">
            <div class="d-flex site-info align-items-center mr-5">
              <span class="block-icon mr-3"><span class="icon-map-marker text-yellow"></span></span>
              <span>34 Street Name, City Name Here, <br> United States</span>
            </div>
            <div class="d-flex site-info align-items-center">
              <span class="block-icon mr-3"><span class="icon-clock-o"></span></span>
              <span>Sunday - Friday 8:00AM - 4:00PM <br> Saturday CLOSED</span>
              {{-- <img src="{{asset('backend/images/profile/genshin.jpg')}}" alt="Profile" class="ms-3" style="width: 40px; height: 40px; border-radius: 50%;"> --}}
              <div class="dropdown ms-3">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{asset('backend/images/profile/genshin.jpg')}}" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%;">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="">Data Diri</a>
                  <a class="dropdown-item" href="{{ route('newlogout') }}">Logout</a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="container">
        <div class="menu-wrap d-flex align-items-center">
          <span class="d-inline-block d-lg-none"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-black"></span></a></span>

            

            <nav class="site-navigation text-left mr-auto d-none d-lg-block" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto ">
                <li class="active"><a href="{{route('homelogin.index')}}" class="nav-link">Home</a></li>
                <li><a href="{{route('storelogin.index')}}" class="nav-link">Store</a></li>
                <li>
                  <button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4" id="dropdownMenuReference"
                    data-toggle="dropdown">More Obat</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">Obat keras/resep</a>
                    <a class="dropdown-item" href="#">Obat bebas terbatas</a>
                    <a class="dropdown-item" href="#">Obat bebas</a>
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href="#">Price, low to high</a>
                    <a class="dropdown-item" href="#">Price, high to low</a> --}}
                  </div>
                </li>
                {{-- <li><a href="{{route('newregister')}}" class="nav-link">Register</a></li> --}}
                {{-- <li><a href="gallery.html" class="nav-link">Gallery</a></li> --}}
                {{-- <li><a href="pricing.html" class="nav-link">Pricing</a></li> --}}
                {{-- <li><a href="contact.html" class="nav-link">Contact</a></li> --}}
              </ul>
            </nav>

            <div class="top-social ml-auto">
              <a href="#"><span class="icon-facebook text-teal"></span></a>
              <a href="#"><span class="icon-twitter text-success"></span></a>
              <a href="#"><span class="icon-linkedin text-yellow"></span></a>
            </div>
        </div>
      </div>
    </header>

    <div class="ftco-blocks-cover-1">
       
      <div class="site-section-cover overlay">
        <div class="container">
          <div class="row align-items-center ">
            <div class="col-md-5 mt-5 pt-5">
              <span class="text-cursive h5 text-red">Welcome To Our Website</span>
              <span class="text-cursive h5 text-red">
            
              </span>
              <h1 class="mb-3 font-weight-bold text-teal">APOTEK CERIA</h1>
              <p>Keluarga sehat hari haripun ceria</p>
              <p class="mt-5"><a href="{{route('storelogin.index')}}" class="btn btn-primary py-4 btn-custom-1">Learn More</a></p>
            </div>
            <div class="col-md-6 ml-auto align-self-end">
              <img src="{{asset('frontend/images/wlcm.jpg')}}" alt="Image" class="img-fluid">
              
            </div>
          </div>
        </div>
      </div>
    </div>