@extends('layout.statis')
@section('title','Adhimix - Dashboard')

@section('content')
<main role="main" class="homepage">

      <div class="block bigopt">
        <div class="caption opt">
          <div class="valign-wrap">
            <div class="valign">
              <div class="container wow fadeIn" data-wow-delay="0.3s">
                <div class="opt-text">
                  <div class="text-wrapper">
                    <h2>INTEGRITY <i>•</i> COMMITMENT <i>•</i> CARE</h2>
                  </div>
                  <div class="text-wrapper">
                    <p>
                      Honesty, hard work, discipline, dedication and integrity are the major values continuously developed by PT. Adhimix Precast Indonesia to improve skillful and knowledgeable human resources in achieving productivity.
                    </p>
                  </div>
                </div>
                <div class="opt-container">
                  <div class="row">
                    <div class="item">
                      <a href="#">
                        <div class="icon ani">
                          <img class="o" src="public/asset/img/bg-opt-o.png">
                          <img class="h" src="public/asset/img/bg-opt-h.png">
                        </div>
                        <label>
                        	<img src="public/asset/img/ic-support.png">
                        	<p>Customer <span>Support</span></p>
                        </label>
                      </a>
                    </div>
                    <div class="item">
                      <a href="#">
                        <div class="icon ani">
                          <img class="o" src="public/asset/img/bg-opt-o.png">
                          <img class="h" src="public/asset/img/bg-opt-h.png">
                        </div>
                        <label>
                          <img src="public/asset/img/ic-vendor.png">
                          <p>Vendor <span>Area</span></p>
                        </label>
                      </a>
                    </div>
                    <div class="item">
                      <a href="#">
                        <div class="icon ani">
                          <img class="o" src="public/asset/img/bg-opt-o.png">
                          <img class="h" src="public/asset/img/bg-opt-h.png">
                        </div>
                        <label>
                          <img src="public/asset/img/ic-corporate.png">
                          <p>Retail <span>Area</span></p>
                        </label>
                      </a>
                    </div>
                    <div class="item">
                      <a href="#">
                        <div class="icon ani">
                          <img class="o" src="public/asset/img/bg-opt-o.png">
                          <img class="h" src="public/asset/img/bg-opt-h.png">
                        </div>
                        <label>
                          <img src="public/asset/img/ic-corporate.png">
                          <p>Corporate <span>Site</span></p>
                        </label>
                      </a>
                    </div>
                  </div>                  
                </div>  
              </div>
            </div>
          </div> 
        </div>     
      </div> 


      <div class="block" style="display: none;">        
        <div class="row">
          <div class="col-sm-12">
            <div class="scene-wrapper scene-highlight">
              <div id="play01"></div>
              <div id="play02"></div>
              <div class="aniholder">
                <div id="animateicon" class="obj"><img src="{{ asset('asset/img/img-helmet.png') }}"></div>
                <div id="animatetxt-01" class="obj">
                  <div class="text-wrapper">
                    <h2>INTEGRITY • COMMITMENT • CARE</h2>
                  </div>
                </div>
                <div id="animatetxt-02" class="obj">
                  <div class="text-wrapper">
                    <p>
                      Honesty, hard work, discipline, dedication and integrity are the major values continuously developed by PT. Adhimix Precast Indonesia to improve skillful and knowledgeable human resources in achieving productivity.
                    </p>
                  </div>
                </div>
                <div id="animatetxt-03" class="obj">
                  <div class="text-wrapper">
                    <div class="btn-area"><a href="#" class="btn btn-main btn-large">What make us different &nbsp; <i class="fas fa-long-arrow-alt-right"></i></a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </div>      

        <script>         
          
          // build tween
          var tween = TweenMax.fromTo("#animateicon", 1,
            {top: -300, opacity: 0},
            {top: 0, opacity: 1, repeat: 0, yoyo: true, ease: Circ.easeInOut}
          );

          // build scene
          var scene = new ScrollMagic.Scene({triggerElement: "#play01", duration: 0, offset: 0})
          .setTween(tween)
          .addIndicators({name: "loop"}) // add indicators (requires plugin)
          .addTo(controller);

          // build tween
          var tween = TweenMax.fromTo("#animatetxt-01", 1,
            {right: -500, opacity: 0},
            {right: 0, opacity: 1, repeat: 0, yoyo: true, ease: Circ.easeInOut}
          );

          // build scene
          var scene = new ScrollMagic.Scene({triggerElement: "#play02", duration: 0, offset: 100})
          .setTween(tween)
          .addIndicators({name: "loop"}) // add indicators (requires plugin)
          .addTo(controller);

          // build tween
          var tween = TweenMax.fromTo("#animatetxt-02", 1,
            {left: -500, opacity: 0},
            {left: 0, opacity: 1, repeat: 0, yoyo: true, ease: Circ.easeInOut}
          );

          // build scene
          var scene = new ScrollMagic.Scene({triggerElement: "#play02", duration: 0, offset: 100})
          .setTween(tween)
          .addIndicators({name: "loop"}) // add indicators (requires plugin)
          .addTo(controller);

          // build tween
          var tween = TweenMax.fromTo("#animatetxt-03", 1,
            {left: 0, opacity: 0},
            {left: 0, opacity: 1, repeat: 0, yoyo: true, ease: Circ.easeInOut}
          );

          // build scene
          var scene = new ScrollMagic.Scene({triggerElement: "#play02", duration: 0, offset: 200})
          .setTween(tween)
          .addIndicators({name: "loop"}) // add indicators (requires plugin)
          .addTo(controller);
        </script>  

      </div>


      <div class="block nopadding" style="display: none;">        
        <div class="row">
          <div class="col-sm-12">
            <div class="scene-wrapper scene-service">
              <div id="play03"></div>
              <div class="aniholder row">
                <div id="animateicon-01" class="obj"><span>Readymix</span><img src="{{ asset('asset/img/icon_readymix.png') }}"></div>   
                <div id="animateicon-02" class="obj"><span>Precast</span><img src="{{ asset('asset/img/icon_precast.png') }}"></div>   
                <div id="animateicon-03" class="obj"><span>Construction</span><img src="{{ asset('asset/img/icon_construct.png') }}"></div>   
                <div id="animateicon-04" class="obj"><span>Fabrication</span><img src="{{ asset('asset/img/icon_fabric.png') }}"></div>   
                <div id="animateicon-05" class="obj"><span>Trading</span><img src="{{ asset('asset/img/icon_trading.png') }}"></div>    
              </div>             
            </div>
          </div>          
        </div>      

        <script>         
          
          // build tween
          var tween = TweenMax.fromTo("#animateicon-01", 1,
            {left: -300, opacity: 0, top: -500},
            {left: 0, opacity: 1, top: -30, repeat: 0, yoyo: true, ease: Circ.easeInOut}
          );

          // build scene
          var scene = new ScrollMagic.Scene({triggerElement: "#play03", duration: 0, offset: -100})
          .setTween(tween)
          .addIndicators({name: "loop"}) // add indicators (requires plugin)
          .addTo(controller);

          // build tween
          var tween = TweenMax.fromTo("#animateicon-02", 1,
            {left: -500, opacity: 0, top: -60},
            {left: 0, opacity: 1, top: 10, repeat: 0, yoyo: true, ease: Circ.easeInOut}
          );

          // build scene
          var scene = new ScrollMagic.Scene({triggerElement: "#play03", duration: 0, offset: -50})
          .setTween(tween)
          .addIndicators({name: "loop"}) // add indicators (requires plugin)
          .addTo(controller);

          // build tween
          var tween = TweenMax.fromTo("#animateicon-03", 1,
            {top: -300, opacity: 0},
            {top: 0, opacity: 1, repeat: 0, yoyo: true, ease: Circ.easeInOut}
          );

          // build scene
          var scene = new ScrollMagic.Scene({triggerElement: "#play03", duration: 0, offset: -20})
          .setTween(tween)
          .addIndicators({name: "loop"}) // add indicators (requires plugin)
          .addTo(controller);

          // build tween
          var tween = TweenMax.fromTo("#animateicon-04", 1,
            {right: -500, opacity: 0, top: -500},
            {right: 0, opacity: 1, top: 20, repeat: 0, yoyo: true, ease: Circ.easeInOut}
          );

          // build scene
          var scene = new ScrollMagic.Scene({triggerElement: "#play03", duration: 0, offset: -50})
          .setTween(tween)
          .addIndicators({name: "loop"}) // add indicators (requires plugin)
          .addTo(controller);

          // build tween
          var tween = TweenMax.fromTo("#animateicon-05", 1,
            {right: -300, opacity: 0, top: -60},
            {right: 0, opacity: 1, top: 10, repeat: 0, yoyo: true, ease: Circ.easeInOut}
          );

          // build scene
          var scene = new ScrollMagic.Scene({triggerElement: "#play03", duration: 0, offset: -100})
          .setTween(tween)
          .addIndicators({name: "loop"}) // add indicators (requires plugin)
          .addTo(controller);

        
        </script>  

      </div>

      <div class="block nopadding">
        <div class="section-project">
          <div class="container">
            <h2>Our Project</h2>
            <div class="project-list">
              <div class="row">
                <div class="col-sm-4">
                  <div class="item">
                    <img src="http://www.adhimix.co.id/images/project_fo_antasari.jpg">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="item">
                    <img src="http://www.adhimix.co.id/images/project_fo_antasari.jpg">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="item">
                    <img src="http://www.adhimix.co.id/images/project_fo_antasari.jpg">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="block cl-grey nopadding">

        <div class="container-fluid nopadding">
          <div class="row nomargin">
            <div class="col-md-12 nopadding wow zoomIn" data-wow-delay="0s">              
              <div class="testimonial-container">
                <h2>Customer Review</h2>
                <div class="swiper-container testimonial-slider">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="testimonial-content">
                        <div class="item">
                          <div class="thumb"><img src="{{ asset('media/images/cust_rev_03.jpg') }}"></div>
                          <div class="content">
                            <div class="title">
                              Ir. Anam Dananto<br><small>Project Coordinator Pejaten Village</small>
                            </div>
                            <p>“Kemudahan akses yang dibutuhkan pada saat kondisi yang tepat menjadikan kelancaran dalam menangani satu project yang berkualitas, menjadikan win win solution terjadi pada kami, yang akhirnya menjadi keputusan tak berpaling dengan yang lain.”</p>
                          </div>
                        </div>                       
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="testimonial-content">
                        <div class="item">
                          <div class="thumb"><img src="{{ asset('media/images/cust_rev_02.jpg') }}"></div>
                          <div class="content">
                            <div class="title">
                              Mike Laode<br><small>Procurement Manager</small>
                            </div>
                            <p>“Respon yang cepat, tepat dan cerdas menjadikan segala yang tadinya tak mungkin menjadi terasa lebih mudah untuk dilakukan, dengan solusi efektif dan efisian semua hal menjadi lebih mengalir, lancar, dan selalu sukses.”</p>
                          </div>
                        </div>                       
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="testimonial-content">
                        <div class="item">
                          <div class="thumb"><img src="{{ asset('media/images/cust_rev_01.jpg') }}"></div>
                           <div class="content">
                            <div class="title">
                              Rita Johan Adipura, S.Ars, AIA<br><small>Team Developer Gria Hijau Residence</small>
                            </div>
                            <p>“Bagi saya kualitas hasil adalah yang utama, dengan demikian karya yang didesain terlihat sempurna sesuai dengan keinginan dan harapan, tentu ditunjang dangan kualitas bahan yang menjadi tahan lama menjadikan kesempurnaan maksimal yang akan didapat.”</p>
                          </div>
                        </div>                       
                      </div>
                    </div>
                  </div>
                  <!-- Add Pagination -->
                  <div class="swiper-pagination"></div>
                </div>  
              </div>
            </div>           
          </div>
        </div>
      
      </div>




      <div class="block cl-white closer full wow fadeIn" data-wow-delay="0s" style="display: none;">
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

      <div class="block cl-white closer full wow fadeIn" data-wow-delay="0s">
        <div class="container">
          <h1>Group Member</h1>
          <p>
            We never stop innovating, developing our business services to create maximum trust in business industries.
          </p>
          <div class="row" style="text-align:center;">
                
            <div class="col-md-4 animate-box fadeInUp animated-fast"><a href="http://abadiprimaintikarya.com" target="_blank"><img src="http://www.adhimix.co.id/images/group_apik.png" width="60%" class="anima"></a></div>
                    
              <div class="col-md-4 animate-box fadeInUp animated-fast"><a href="http://adhimixproperty.co.id" target="_blank"><img src="http://www.adhimix.co.id/images/group_busafa.png" width="60%" class="anima"></a></div>
              
              <div class="col-md-4 animate-box fadeInUp animated-fast"><a href="http://www.encona.co.id" target="_blank"><img src="http://www.adhimix.co.id/images/group_encona.png" width="60%" class="anima"></a></div>
              
              <div class="col-md-4 animate-box fadeInUp animated-fast"><a href="# #" target="_blank"><img src="http://www.adhimix.co.id/images/group_layar.png" width="60%" class="anima"></a></div>
              
              <div class="col-md-4 animate-box fadeInUp animated-fast"><a href="# #" target="_blank"><img src="http://www.adhimix.co.id/images/group_sarana.png" width="60%" class="anima"></a></div>
              
              <div class="col-md-4 animate-box fadeInUp animated-fast"><a href="# #" target="_blank"><img src="http://www.adhimix.co.id/images/group_schin.png" width="60%" class="anima"></a></div>
          
            </div>
        </div>
      </div>  

    </main><!-- /.container -->
	@endsection