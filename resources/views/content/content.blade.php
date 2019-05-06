@extends('layout.statis')
@section('title','Adhimix | '.$data['menu']->contentName)
@section('content')
@php
use App\admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\post;
use App\content;
use App\tabContent;

@endphp
<style type="text/css">
a{
	text-decoration: none;
	color: black;
}
</style>
<main role="main">
	<div class="block pheader" style="background: url({{ url('public/assets/konten/bannerContent/'.$data['menu']->banner) }}) center no-repeat; background-size: cover; margin-top: 113px;">
        <div class="container">
          <div class="ptitle wow fadeIn" data-wow-delay="0s">
            <h1>{{$data['menu']->contentName}}</h1>
          </div>
        </div>
    </div>

	<section class="conntent" style="margin-top: 100px; margin-bottom: 100px;">
		<div class="container">
			<div class="col-lg-12">
				<div style="padding: 0px;margin: 0px;margin-top: -50px">
					<ul class="nav nav-tabs profile-tab" role="tablist">
						@foreach ($data['tab'] as $tab)
						@if ($loop->index==0)
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#p{{ $tab->idTab }}" role="tab">{{ $tab->headline }}</a> </li>
						@else
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#p{{ $tab->idTab }}" role="tab">{{ $tab->headline }}</a> </li>
						@endif
						@endforeach
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						@foreach ($data['tab'] as $tab)
						@php
						$stat = "";
						@endphp
						@if ($loop->index ==0)
						@php
						$stat="active";
						@endphp
						@endif
						<div class="tab-pane {{ $stat }}" id="p{{ $tab->idTab }}" role="tabpanel">
							@if ($tab->type=="Post")
							@foreach ($data['post'] as $post)
							@if ($post->idTab==$tab->idTab)
							@if ($tab->type=="Post")
							<br>
							<div class="container">
								<div class="col-lg-12">
									<div class="row" style="margin-top: 20px;">
										<div style="width: 5px; height: 40px; background-color: red; float: left;"></div>
										<h1 class="page-header" style="float: left; margin-left: 10px; margin-top: 2px;"><b><h1>{{ $post->title }}</h1></b></h1>
									</div>
									<div class="row" style="margin-top: -30px;">
										<div>
											@php
											echo $post->content;
											@endphp 
										</div>
									</div>
								</div>
							</div>
							@endif
							@endif
							@endforeach
							@elseif($tab->type=="List")
							<br>
							<div class="container">
								<h1 class="header"><center><h3>{{ $tab->headline }}</h3></center></h1>

								<h1 class="section-header"><span>{{ date('Y') }}</span></h1>

								<div class="container">

									<div class="row">

										<div class="col-md-8">

											<div class="row">
												@php
												$post = post::where('idTab',$tab->idTab)->orderBy('idPost','DESC')->get();
												@endphp
												@foreach ($post as $e)
												@if ($e->idTab==$tab->idTab)
												<div class="col-md-6">
													<a href="{{ url('detail-article/'.$e->slug) }}">
														<div style="width: 100%; height: 200px; margin-left: 17px; border: 1px solid #cccccc; background-color: #cccccc;background: url({{ asset('assets/konten/thumbnail/'.$e->kontenImage) }}); background-size: cover;">
														</div>
													</a>

													<div style="width: 100%; height: 100px; border: 1px solid #cccccc; margin-left: 17px;">

														<a href="{{ url('detail-article/'.$e->slug) }}" style="text-decoration: none; color: black"><h4 style="padding: 10px;">{{ $e->title }}</h4></a>

														<p style="padding: 10px; margin-top: -20px; font-size: 15px; color: #cccccc">By : {{ admin::where('id','4')->first()->fullname }} | {{ carbon::parse($e->created_at)->format('l, d F Y') }} </p>

													</div>

													<br>

													<div class="row">

														<div style="width: 90%;">

															<p style="margin-left: 10%;">{{ substr($e->sortDesc, 0,100).'...' }}</p>  

														</div>

													</div>

												</div>
												@endif
												@endforeach

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

											<br>

											<div class="col-md-12">
												<div class="row">
													
													@php
													$post = post::where('idTab',$tab->idTab)->orderBy('idPost','DEC')->get();
													@endphp
													@foreach ($post as $postan)	

													<div class="col-md-5" style="margin-bottom: 10px;padding: 0">
														<div style="width: 100%; height: 100px; background-color: #cccccc;background: url({{ asset('assets/konten/thumbnail/'.$postan->kontenImage) }});background-size: cover;"></div>
													</div>

													<div class="col-md-7" style="margin-bottom: 10px;padding: 0">
														<a href="{{ url('detail-article/'.$postan->slug) }}" style="text-decoration: none;color :black">
															<p style="padding:0px 10px 10px 10px">{{ $postan->title }}</p>

															<p style="padding:0px 10px 10px 10px; margin-top: -20px; font-size: 15px; color: #cccccc">By : {{ admin::where('id','4')->first()->fullname }} | {{ carbon::parse($postan->created_at)->format('l, d F Y') }} </p>

														</a>
													</div>
													@endforeach

												</div>
											</div>

										</div>

									</div>

								</div>
							</div>
							@elseif($tab->type=="Report")
							<br>
							<div class="container">

								<div class="col-md-12">
									@php
									$tahun = post::whereRaw("idTab = '$tab->idTab' group by YEAR(reportDate) order by YEAR(reportDate) DESC;")->get();
									@endphp
									<div class="row">

										<div style="width: 5px; height: 40px; background-color: red; float: left;"></div>

										<h1 class="page-header" style="float: left; margin-left: 10px; margin-top: 2px;"><b><h1>{{ $tab->reportTitle }}</h1></b></h1>

									</div>
									<div class="row" style="margin-top: -10px;">
										<p style="text-align: justify;">{{ $tab->descReport }}</p>
									</div>

									<div class="row">

										<div class="col-md-2"></div>

										<div class="col-md-8">

											<div class="row">

												<div class="col-md-3">

													@foreach ($tahun as $year)
													<div class="row">
														<div class="col-md-12">

															<div onclick="return move({{ substr($year->reportDate, 0,4) }})" style="cursor: pointer;width: 100px; height: 100px; border: 1px solid black; border-radius:100%; margin-left: 16%;">

																<b style="top: 40px;position: absolute;left: 70px;">{{ substr($year->reportDate,0,4) }}</b>

															</div>

															<div style="width: 2px; height: 50px;background-color: red; margin-left: 48%; margin-top: 20px;"></div>

														</div>

													</div>
													@endforeach

													<div class="row">

														<div class="col-md-12">

															<b style="margin-left: 36px;">Load More</b>

														</div>

													</div>
													@foreach($tahun as $tahun)
													@php
													$y = substr($tahun->reportDate,0,4);
													@endphp
												</div>
												
												<div class="col-md-9 @if ($loop->index != 0) hide @endif isi" id="id{{ $y }}">
													<input type="hidden" value="{{ $y }}" id="cek{{ $loop->index + 1 }}" name="">

													<div class="row">

														<div class="col-md-12">
															<header class="panel-heading">

																1th Quarter {{ $y }} Results

															</header>

															<table class="table">

																<thead>

																	<tr>

																		<th>#</th>

																		<th>Report Name</th>

																		<th>Report Date</th>

																		<th class="text-center">Download</th>

																	</tr>

																</thead>

																<tbody>
																	@php
																	$no = 0;
																	@endphp
																	@foreach ($data['post'] as $report)
																	@if ($report->idTab==$tab->idTab)
																	@php
																	$m = substr($report->reportDate, 5,2);
																	@endphp
																	@if (substr($report->reportDate,0,4)==$y)

																	@if ($m=="01"||$m=="02"||$m=="03")
																	@php
																	$no++;
																	@endphp
																	<tr>

																		<td>{{ $no }}</td>

																		<td>{{ $report->title }}</td>

																		<td>{{ $report->reportDate }}</td>

																		<td class="text-center"><a href="{{ url('pdf',$report->idPost) }}" target="_blank">Download PDF</a></td>
																	</tr>
																	@endif
																	@endif
																	@endif
																	@endforeach

																</tbody>

															</table>    

															
														</div>
														<div class="col-md-12">
															<header class="panel-heading">

																2th Quarter {{ $y }} Results

															</header>

															<table class="table">

																<thead>

																	<tr>

																		<th>#</th>

																		<th>Report Name</th>

																		<th>Report Date</th>

																		<th class="text-center">Download</th>

																	</tr>

																</thead>

																<tbody>
																	@php
																	$no = 0;
																	@endphp
																	@foreach ($data['post'] as $report)
																	@if ($report->idTab==$tab->idTab)
																	@php
																	$m = substr($report->reportDate, 5,2);
																	@endphp
																	@if (substr($report->reportDate,0,4)==$y)

																	@if ($m=="04"||$m=="05"||$m=="06")
																	@php
																	$no++;
																	@endphp
																	<tr>

																		<td>{{ $no }}</td>

																		<td>{{ $report->title }}</td>

																		<td>{{ $report->reportDate }}</td>

																		<td class="text-center"><a href="{{ url('pdf',$report->idPost) }}" target="_blank">Download PDF</a></td>

																	</tr>
																	@endif
																	@endif
																	@endif
																	@endforeach

																</tbody>

															</table>    

															
														</div>
														<div class="col-md-12">
															<header class="panel-heading">

																3th Quarter {{ $y }} Results

															</header>

															<table class="table">

																<thead>

																	<tr>

																		<th>#</th>

																		<th>Report Name</th>

																		<th>Report Date</th>

																		<th class="text-center">Download</th>

																	</tr>

																</thead>

																<tbody>
																	@php
																	$no = 0;
																	@endphp
																	@foreach ($data['post'] as $report)
																	@if ($report->idTab==$tab->idTab)
																	@php
																	$m = substr($report->reportDate, 5,2);
																	@endphp
																	@if (substr($report->reportDate,0,4)==$y)
																	@if ($m=="07"||$m=="08"||$m=="09")
																	@php
																	$no++;
																	@endphp
																	<tr>

																		<td>{{ $no }}</td>

																		<td>{{ $report->title }}</td>

																		<td>{{ $report->reportDate }}</td>

																		<td class="text-center"><a href="{{ url('pdf',$report->idPost) }}" target="_blank">Download PDF</a></td>

																	</tr>
																	@endif
																	@endif
																	@endif
																	@endforeach

																</tbody>

															</table>    

															
														</div>
														<div class="col-md-12">
															<header class="panel-heading">

																4th Quarter {{ $y }} Results

															</header>

															<table class="table">

																<thead>

																	<tr>

																		<th>#</th>

																		<th>Report Name</th>

																		<th>Report Date</th>

																		<th class="text-center">Download</th>

																	</tr>

																</thead>

																<tbody>
																	@php
																	$no = 0;
																	$cek = 0;
																	@endphp
																	@foreach ($data['post'] as $report)
																	@if ($report->idTab==$tab->idTab)
																	@php
																	$m = substr($report->reportDate, 5,2);
																	@endphp
																	@if (substr($report->reportDate,0,4)==$y)
																	@if ($m=="10"||$m=="11"||$m=="12")
																	@php
																	$no++;
																	@endphp
																	<tr>

																		<td>{{ $no }}</td>

																		<td>{{ $report->title }}</td>

																		<td>{{ $report->reportDate }}</td>

																		<td class="text-center"><a href="{{ url('pdf',$report->idPost) }}" target="_blank">Download PDF</a></td>

																	</tr>
																	@endif
																	@endif
																	@endif
																	@endforeach

																</tbody>

															</table>    

															
														</div>

													</div>


												</div>
												
												@endforeach

											</div>

										</div>

										<div class="col-md-2"></div>

									</div>

								</div>

							</div>
							@elseif($tab->type=="Anabatician")
							<section class="slider">

								<div class="swiper-container main-slider">

									<div><img class="d-block w-100" src="{{ asset('media/images/banner-dummy.jpg') }}" alt="First slide"></div>
									
								</div>  

							</section>
							<section class="content" style="margin-top: -80px;">
								<div class="container">
									<h1 class="section-header"><span>{{ $tab->headline }} </span></h1>
									<div class="row">
										<div class="col-sm-12" style="text-align: justify;">
											<p style="text-align: center">{{ $tab->descReport }}</p>
											<br>
											<br>
											<div class="container">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-7">

														</div>
														<div class="col-md-5">
															<div class="row">
																<div class="col-md-6" style=" padding-left: 10px;">
																	<select class="form-control" style="padding: 0px;;margin-left: 15px;border-radius: 30px; font-size: 15px; padding-left: 40px;">
																		<option value="">All Department</option>
																		@foreach (DB::table('divisis')->get() as $x)
																		<option value="{{ $x->id_divisi }}">{{ $x->divisi }}</option>
																		@endforeach
																	</select>
																</div>
																<div class="col-md-6" style=" padding-left: 15px;">
																	<input type="text" placeholder="Search here" class="form-control" style="margin-left: 5px;border-radius: 30px; padding-left: 50px;">
																</div>
															</div>
														</div>
													</div>
													<div class="row" id="isialbum">
														@php
														$foto = DB::table('albums')->where('idTab',$tab->idTab)
														->join('divisis', 'divisis.id_divisi', '=', 'albums.divisi')
														->select('albums.*', 'divisis.divisi as namadivisi')
														->get();
														@endphp
														@foreach ($foto as $album)
														<div class="col-md-4">
															<div class="card" data-toggle="modal" data-target="#det{{ $album->id_album }}" style="background: url('{{ asset('backend/dist/img/album/'.$album->pict) }}');height: 280px;background-size: cover;background-position: center;cursor: pointer;  text-align: center;box-shadow: 2px 2px 2px gray">
																<div class="card-block" style="background-color:#e9ecef ;width: 80%;margin-left: 10%; bottom:-30px ;position:absolute; height: 70px;right: auto;left: auto;padding-top: 10px;box-shadow: 0.5px 0.5px 0.5px gray;color:black">
																	<b style="margin-top: 20px;">{{ $album->nama }}</b>
																	<p>{{ $album->namadivisi }}</p>
																</div>
															</div>
														</div>
														<div class="modal fade" id="det{{ $album->id_album }}" role="dialog">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Anabatician</h4>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body" style="padding: 10px!important;">
																		<div class="row">
																			<div class="col-md-6" style="margin-top: 20px;">
																				<div style="background: url('{{ asset('backend/dist/img/album/'.$album->pict) }}'); height:300px; width: 100%;background-size: cover;background-position: center;" class="card">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="box-body box-profile" style="margin-top: 20px;">
																					<ul class="list-group list-group-unbordered">
																						<li class="list-group-item" style="height: 50px;">
																							<b>Nama</b> <p class="pull-right" style="float: right">{{ $album->nama }}</p>
																						</li>
																						<li class="list-group-item" style="height: 50px;">
																							<b>Divisi</b> <p class="pull-right" style="float: right">{{ $album->namadivisi }}</p>
																						</li>
																						<li class="list-group-item" style="">
																							<b>Deskripsi</b><br> <a class="pull-right">{{ $album->deskripsi }}</a>
																						</li>
																					</ul>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														@endforeach
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							@endif
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<script>
	function move($y) {
		// $("#id"+$y).removeClass('hide');
		$( ".isi" ).each(function( i ) {
			if ( this.id !== "id"+$y ) {
				$(this).addClass('hide');
			} else {
				$(this).removeClass('hide');
			}

		});
	}
</script>
@endsection