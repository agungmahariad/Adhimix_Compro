@extends('layout.statis')
@section('title','Adhimix | '.$data['article']->title)
@section('content')
@php
use App\admin;
use carbon\carbon;
use Illuminate\Support\Facades\Session;
use App\post;
@endphp
<main role="main" class="homepage">

  <section class="slider">

    <div class="swiper-container main-slider">

      <div><img class="d-block w-100" src="{{ asset('media/images/banner-dummy.jpg') }}" ></div>

    </div>  

  </section>

  <section class="help">

    <div class="container">

      <div class="container">

        <div class="row">

          <div class="col-md-12">

            <h4 style="float: left; color: #c0392b;">News<img src="{{ asset('icon/kanan.png') }}"></h4>

            <h4 style="color: #cccccc; margin-top: 0.5%;">{{ $data['article']->title }}</h4>

          </div>

        </div>

        <br>

        <div class="row">

          <div class="col-md-8">

            <div class="row">

              <div class="col-md-12">

                <div style="width: 100%; height: 400px; background-color: #cccccc;background: url({{ asset('assets/konten/thumbnail/'.$data['article']->kontenImage) }}); background-size: cover;">

                </div><br>

                <h3> {{ $data['article']->sortDesc }}.</h3><br>

              </div>

              <div class="col-md-12">

                <div class="row">

                  <div class="col-md-4">

                    <p style="margin-left: 6%; font-size: 15px; color: #cccccc">By : {{ admin::where('id','4')->first()->fullname }} |  {{ carbon::parse($data['article']->created_at)->format('l, d F Y') }}</p>

                  </div>

                  <div class="col-md-5">

                    <div style="width: 320px; border: 1px solid #cccccc; margin-top: 10px; margin-left: -12%;"></div>

                  </div>

                  <div class="col-md-3">

                    <div class="row">

                      <div style="width: 25px; height: 25px; border: 1px solid #cccccc; margin: 2.5%; position: relative; top: -4px; "></div>

                      <div style="width: 25px; height: 25px; border: 1px solid #cccccc; margin: 2.5%; position: relative; top: -4px; "></div>

                      <div style="width: 25px; height: 25px; border: 1px solid #cccccc; margin: 2.5%; position: relative; top: -4px; "></div>

                      <div style="width: 25px; height: 25px; border: 1px solid #cccccc; margin: 2.5%; position: relative; top: -4px; "></div>

                      <div style="width: 25px; height: 25px; border: 1px solid #cccccc; margin: 2.5%; position: relative; top: -4px; "></div>

                    </div>

                  </div>

                  <br>

                </div>

              </div>  

            </div>

            <br>

            <div class="row">

              <div class="col-md-12">
                @php
                echo $data['article']->content;
                @endphp
              </div>

            </div>

            <br>

            <div style="border: 1px solid #cccccc;"></div><br>

            <div class="row">

              <div class="col-md-12">

                <div style="width: 5px; height: 40px; background-color: red; float: left;"></div>

                <h4 style="float: left; margin-left: 10px; margin-top: 6px;"><b>About Post Author</b></h4>

              </div>

            </div>

            <br>

            <div class="row">

              <div class="col-md-4">

                <center>

                  <div style="width: 65%; height: 130px; border-radius: 100%; background-color: #cccccc;background: url({{ asset('backend/dist/img/admin/'. admin::where('id','4')->first()->photo ) }}); border: 1px solid grey;"></div>

                </center>

              </div>

              <div class="col-md-8">

                <div class="row">

                  <h4>{{ admin::where('id','4')->first()->fullname }}</h4>

                  <p>{{ admin::where('id','4')->first()->about }}</p>

                </div>

              </div>

            </div>

          </div>

          <div class="col-md-4" style="padding-left: 40px;">

            <div class="row">

              <div class="col-md-10">

                <div style="width: 5px; height: 40px; background-color: red; float: left;"></div>

                <h4 style="float: left; margin-left: 10px; margin-top: 6px;"><b>Search</b></h4>

              </div>

              <div class="col-md-2">

                <i class="fa fa-search" style="margin-top: 13px;"></i>

              </div>

            </div>

            <br><br>

            <div class="row">

              <div class="col-md-12">

                <div style="width: 5px; height: 40px; background-color: red; float: left;"></div>

                <h4 style="float: left; margin-left: 10px; margin-top: 6px;"><b>Recent Post</b></h4>

              </div>

            </div>

            <br><br>
            @php
            $post = post::where('idTab',$data['article']->idTab)->where('idPost','!=',$data['article']->idPost)->orderBy('idPost','DESC')->get();
            @endphp
            @foreach ($post as $element)
            <div class="row">
              
            <div class="col-md-5" style="margin-bottom: 10px;padding: 0">
              <div style="width: 100%; height: 100px; background-color: #cccccc;background: url({{ asset('assets/konten/thumbnail/'.$element->kontenImage) }});background-size: cover;"></div>
            </div>

            <div class="col-md-7" style="margin-bottom: 10px;padding: 0">
              <a href="{{ url('detail-article/'.$element->slug) }}" style="text-decoration: none;color :black">
                <p style="padding:0px 10px 10px 10px">{{ $element->title }}</p>

                <p style="padding:0px 10px 10px 10px; margin-top: -20px; font-size: 15px; color: #cccccc">By : {{ admin::where('id','4')->first()->fullname }} | {{ carbon::parse($element->created_at)->format('l, d F Y') }} </p>

              </a>
              
            </div>
            </div>

            @endforeach
          </div>

        </div>

      </div>

    </div>

    <br>

    <br>

  </section>

</main><!-- /.container -->
@endsection