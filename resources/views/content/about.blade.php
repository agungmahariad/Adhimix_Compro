@extends('layout.statis')
@section('title','Adhimix - About')
@section('content')
<main role="main" class="about std">

      <div class="block pheader" style="background: url({{ asset('asset/img/office.jpg') }}) center no-repeat; background-size: cover;">
        <div class="container">
          <div class="ptitle wow fadeIn" data-wow-delay="0s">
            <h1>Company Introduction</h1>
            <p>Know us Better</p>
          </div>
        </div>
      </div>

      <div class="block">
        <div class="container">
          <div class="section-title wow fadeIn" data-wow-delay="0s">
            <h2>Company Profile</h2>
            <h3>“Always be trusted and becoming reliable partner in creating value by delivering high quality products.”</h3>
          </div>
          <div class="row">
            <div class="col-md-6 wow slideInLeft" data-wow-delay="0s">
              <p>
                 PT. Adhimix Precast Indonesia has grown to become the most reliable sources for national class readymix and precast concrete in Indonesia. As one of major supplier readymix concrete without affiliated or subsidized by Cement Producer Company or Construction Company.
              </p>
              <p>
                Previously PT. Adhimix Precast Indonesia was division of PT. Adhi Karya (Persero) Tbk. On year 2002 became PT. Adhimix Precast Indonesia, which focusing on ready mix and precast concrete business. Restructuring its business and changed the logo and values, Company strived exist in concrete materials supplier.
              </p>
              <p>
                ICC, which stands for Integrity, Commitment and Care, three key values of company, inherent within each and every individual and management team for running business and serving our valuable customers.
              </p>
              <p>
                We are continuously delivering a high quality product and excellence services with international standards. Supported by solid management team and qualified personnel, Company is confident for facing challenges and business dynamics in the future, and ready to compete on ASEAN economic community era as well.  
              </p>  
            </div>
            <div class="col-md-6 wow slideInRight" data-wow-delay="0.2s">
              <img src="{{ asset('media/images/photo_profile.jpg') }}">  
            </div>
          </div>
        </div>
      </div>

      <div class="block">
        <div class="container">
          <div class="section-title wow fadeIn" data-wow-delay="0s">
            <h2>Visi dan Misi</h2>
          </div>
          <div class="row">
            <div class="col-md-6 wow slideInLeft" data-wow-delay="0s">
              <h4>Vision</h4>
              <p>
                To become prominent company in concrete industry, construction and investment by fulfil customers, shareholders and employee satisfaction through Human Capital development, Technology oriented, and internal business process improvement in order to maintain sustainable growth.
              </p>
              <h4>Mission</h4>  
              <ul>
                <li>Increasing high value for shareholder</li>
                <li>Fulfilment Customer needs with reliable products and services</li>
                <li>Creating secure working environment for employee, enhancing welfare and giving opportunity for development</li>
                <li>Developing efficient and effective business process to enhance competitiveness</li>
                <li>Enhancing partnership with business partner base on equality principle</li>
                <li>Keeping business environment by avoiding unhealthy competition</li>
                <li>Maintaining balance environment with pay attention to environmental and social impact.</li>
            </div>
            <div class="col-md-6 wow slideInRight" data-wow-delay="0.2s">
              <img src="{{ asset('media/images/value-01.gif') }}">  
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