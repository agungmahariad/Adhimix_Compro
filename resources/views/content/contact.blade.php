@extends('layout.statis')
@section('title','Adhimix - Contact')
@section('content')
<main role="main" class="about std">

      <div class="block pheader" style="background: url({{ asset('asset/img/contact.jpg') }}) center no-repeat; background-size: cover;">
        <div class="container">
          <div class="ptitle wow fadeIn" data-wow-delay="0s">
            <h1>Contact</h1>
          </div>
        </div>
      </div>

      <div class="block">
        <div class="container">
          <div class="section-title wow fadeIn" data-wow-delay="0s">
          </div>
          <div class="row">
            <div class="col-md-6 wow slideInLeft" data-wow-delay="0s">
              <ul style="list-style: none;">
              	<h2 style="color : red;">Contact Information</h2>
              	<li>
              		<i class="fa fa-map"></i>
              		Graha Anugerah 3<sup>rd</sup> Floor<br>
        					Jl. Raya Ps. Minggu No. 17 A<br>
        					Pancoran Jakarta Selatan 12780<br>
        					Indonesia.<br>
        					Fax. (62-21) 799 1666
				        </li><br>
        				<li>
        					<i class="fa fa-phone"></i>
        					<a href="tel://62211500636" style="color: black; text-decoration: none;">(62-21) 1500.636</a>
        				</li><br>
        				<li>
        					<i class="fa fa-paper-plane"></i>
        					<a href="mailto:beton@adhimix.co.id" style="color: black; text-decoration: none;">beton@adhimix.co.id</a>
        				</li><br>
        				<li class="url">
        					<i class="fa fa-globe"></i>
        					<a href="{{ url('') }}" style="color: black; text-decoration: none;">www.adhimix.co.id</a>
        				</li>
        				<li><br>
        					<img src="{{ asset('asset/img/btn_plantloc.png') }}">
        				</li>
              </ul>
            </div>
            <div class="col-md-6 wow slideInRight" data-wow-delay="0.2s">
              <h2>Get In Touch</h2>
              <form method="post" action="{{ url('add-contact') }}">
                @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" name="firstname" placeholder="Your firstname" class="form-control" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" name="lastname" placeholder="Your lastname" class="form-control" required="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" name="email" placeholder="Your email address" class="form-control" required="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" name="subject" placeholder="Your subject of this message" class="form-control" required="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" required="" name="comment" style="height: 220px;" placeholder="Say something..."></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-danger">Send Message</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="block cl-white closer full wow fadeIn" data-wow-delay="0.2s" style="display: none;">
        <div class="container">
          <h1>We are ready</h1>
          <p>
            Like nothing you've seen. Reach us today & experience our service!
          </p>
          <div class="btn-area">
            <div class="btn btn-main btn-lg">Call Us</div>
          </div>
        </div>
      </div>  

    </main><!-- /.container -->
	@endsection