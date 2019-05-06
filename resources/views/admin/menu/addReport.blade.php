@extends('admin.statis')
@section('title', 'Adhimix | Add Report ')
@section('title_page','Add Report ')
@section('title_content','Add Report ')
@section('sub_title_content','List Add Report ')

@section('content')
<!-- Info boxes -->
@if ($errors->any())
@foreach ($errors->all() as $element)
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
	{{ $element }}
</div>
@endforeach
@endif

@if (session('success')!==null)
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
	{{ session('success') }}
</div>
@endif
@if (session('error')!==null)
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
	{{ session('error') }}
</div>
@endif
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><a href="{{ url('postList/'.$data['headline']->idMenu) }}">{{ $data['headline']->headline }} </a> Add New Post</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="row">
			<form method="post" enctype="multipart/form-data" action="{{ url('upload-report/'.Request::segment(2)) }}" onsubmit="postForm()">
				@csrf
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div  class="row">
								<div class="col-md-6">	
									<div class="form-group">
										<label>Title</label>
										<input type="text" placeholder ="Title" class="form-control" required="" name="title">
									</div>	
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Report Date</label>
										<input type="date"  class="form-control" name="reportDate">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Report (PDF)</label>
								<input type="file" class="dropify" name="pdf">
							</div>
						</div>
					</div>
					<a href="{{ url('postList/'.$data['headline']->idMenu) }}"  class="btn btn-danger">Cancel</a>
					<button class="btn btn-primary">Add Report</button>
				</div>
			</form>
		</div>
	</div>
	<!-- /.box-body -->
</div>

@endsection