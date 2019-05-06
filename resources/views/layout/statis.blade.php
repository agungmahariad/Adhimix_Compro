@php
use App\Content;
@endphp
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{ asset('asset/img/logo-adhimix.png') }}">

  <title>@yield('title')</title>

  <!-- Theme core -->
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/animate.min.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/fonts/font-hlv.css') }}" rel="stylesheet">


    <!-- Vendor CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <script type="text/javascript" src="{{ asset('vendor/scrollmagic/assets/js/lib/greensock/TweenMax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/scrollmagic/scrollmagic/uncompressed/ScrollMagic.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js') }}"></script>
    <!-- <script type="text/javascript" src="vendor/scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js"></script> -->

    <script>
      // init controller
      var controller = new ScrollMagic.Controller();
    </script>

    <!-- Swiper -->
    <link rel="stylesheet" href="{{ asset('vendor/swiper/css/swiper.min.css') }}">

    <!-- WoWJS -->
    <link rel="stylesheet" href="{{ asset('vendor/wowjs/css/libs/animate.css') }}">

    <!-- Dropdown Hover -->
    <link rel="stylesheet" href="{{ asset('vendor/dropdown-hover/css/bootstrap-dropdownhover.css') }}">

    <!-- Responsive Navbar -->
    <link rel="stylesheet" href="{{ asset('vendor/responsive-navbar/css/bootstrap-4-navbar.css') }}">
    <script src="{{ asset('backend/sweetAlert.js') }}"></script>
    <!-- Custom styles for this template -->
    <link href="{{ asset('asset/core.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/templates.css') }}" rel="stylesheet">
  <style type="text/css">
  .hide{
    display: none;
  }
  li.dropdown:hover > .dropdown-menu {
    display: block;
  }
</style>
</head>

<body>
  <header>      
      <div class="navbar-top">
        <div class="container-fluid">
          <div class="navbar-content-top">
            <div class="item"><img src="{{ asset('asset/img/order.png') }}"></div>
            <div class="item"><img src="{{ asset('asset/img/call.png') }}"></div>
            <div class="item">
              <ul class="social-links">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('') }}"><img src="{{ asset('asset/img/logo-adhimix.png') }}"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
	    <li class="nav-item">
		<a href="{{ url('') }}" class="nav-link">Home</a>
	    </li>
            @foreach ($data['mother'] as $e)
            @if ($e->contentName!=="Line of Bussiness")
            @php
            $no = 0;
            @endphp
            @foreach ($data['child'] as $child)
            @if ($e->idContent==$child->parent)
            @php
            $no++;
            @endphp
            @endif
            @endforeach
            @if ($no > 0)
            <li class="nav-item dropdown"><a href="@if ($e->activeLink==1)
              {{ url("page/".$e->slug) }}
              @else
              #
              @endif"  class="nav-link dropdown-toggle">{{ $e->contentName }}</a>
              <ul class="dropdown-menu">
                @php
                foreach ($data['child'] as $child) {
                  if ($child->parent==$e->idContent) {
                    $i = 0;
                    foreach ($data['child'] as $x) {
                      if ($x->parent==$child->idContent) {
                        $i++;
                      }
                    }
                    @endphp
                    @if ($i>0)
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="@if ($child->activeLink==1)
                        {{ url("page/".$child->slug) }}
                        @else
                        #
                        @endif">{{ $child->contentName }} <b style="float: right;font-weight: bolder">o</b></a>
                        <ul class="dropdown-menu">
                          @foreach ($data['child'] as $cucu)
                          @if ($child->idContent == $cucu->parent)
                          <li><a href="@if ($cucu->activeLink==1)
                            {{ url("page/".$cucu->slug) }}
                            @else
                            #
                            @endif" class="dropdown-item">{{ $cucu->contentName }}</a></li>
                            @endif
                            @endforeach
                          </ul>
                        </li>
                        @else 
                        <li><a class="dropdown-item" style="" href="@if ($child->activeLink==1)
                          {{ url("page/".$child->slug) }}
                          @else
                          #
                          @endif">{{ $child->contentName }}</a></li>
                          @endif
                          @php
                        }
                      } 
                      @endphp
                    </ul>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="@if ($e->activeLink==1)
                      {{ url("page/".$e->slug) }}
                      @else
                      #
                      @endif">{{ $e->contentName }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="{{ url('page/'.$e->slug) }}" data-toggle="dropdown">{{ $e->contentName }}</a>
                      <ul class="dropdown-menu" style="width:870px;height: auto;float: left;">
                        @foreach ($data['child'] as $child)
                        @if ($child->parent==$e->idContent)
                        <li style="float: left;">
                          <center>
                            <a href="{{ url('page/'.$child->slug) }}" class="dropdown-item">{{ $child->contentName }}</a>
                            <hr>
                          </center>
                          <ul style="list-style: none;">
                            @foreach ($data['child'] as $cucu)
                            @if ($cucu->parent==$child->idContent)
                            <li><a class="dropdown-item" href="{{ url('page/'.$cucu->slug) }}">{{ $cucu->contentName }}</a></li>
                            @endif
                            @endforeach
                          </ul>
                          @php
                          
                          @endphp
                        </li>
                        @endif
                        @endforeach
                      </li>
                    </ul>
                  </li>
                  @endif
                  @endforeach
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                  </li>
                </ul>
              </div>
        </div>
      </nav>
    </header>

        <div class="page-wrapper" id="finish" style="min-height: 500px">
          @yield('content')
        </div>

    <footer style="position: relative; bottom: 0; width: 100%;">
      <div class="footer-area">
        <div class="container">
          <div class="row">            
            <div class="col-md-8">
              <div class="row">
                <div class="col-sm-6 col-md-4">
                  <h4>Company</h4>
                  <ul class="menu-links">
                    <li><a href="company.html">Company</a></li>
                    <li><a href="update.html">Updates</a></li>
                    <li><a href="career.html">Work with Us</a></li>
                  </ul>    
                </div>
                <div class="col-sm-6 col-md-4">
                  <h4>Products</h4>
                  <ul class="menu-links">
                    <li><a href="showcase.html">Showcase</a></li>
                    <li><a href="service.html">Services</a></li>
                  </ul>    
                </div>
                <div class="col-sm-6 col-md-4">
                  <h4>Support</h4>
                  <ul class="menu-links">
                    <li><a href="contact.html">Contact Us</a></li>
                  </ul>  
                  <ul class="social-links">
                    <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                  </ul>  
                </div>
              </div>
            </div>  
            <div class="col-md-4">
              <div class="footer-copy">
                Copyright &copy 2018 Adhimix. 
                <br>Built with love in Indonesia 
                <br>All rights reserved. 
              </div>
            </div>          
          </div>
        </div>  
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->

    <script src="{{ asset('asset/js/customs.js') }}"></script>

    <!-- Swiper -->
    <script src="{{ asset('vendor/swiper/js/swiper.min.js') }}"></script>

    @if (session('success')!==null)
    <script>
      swal('Sukses!','{{ session('success') }}','success');
    </script>
    @endif
    @if (session('error')!==null)
      <script>
        swal('Gagal!','{{ session('error') }}','error');
      </script>
    @endif

    <!-- WowJS -->  
    <script src="{{ asset('vendor/wowjs/dist/wow.js') }}"></script>
    <script>
      wow = new WOW(
        {
          animateClass: 'animated',
          offset:       100,
          callback:     function(box) {
            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
          }
        }
      );
      wow.init();
    </script>

    <!-- Responsive Navbar -->
    <script src="{{ asset('vendor/responsive-navbar/js/bootstrap-4-navbar.js') }}"></script>

    <!-- Dropdown Hover -->
    <script src="{{ asset('vendor/dropdown-hover/js/bootstrap-dropdownhover.min.js') }}"></script>
  </body>
</html>