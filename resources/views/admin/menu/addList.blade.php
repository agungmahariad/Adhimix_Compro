@extends('admin.statis')
@section('title', 'Adhimix | Add Post ')
@section('title_page','Add Post ')
@section('title_content','Add Post ')
@section('sub_title_content','List Add Post ')

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
			<form method="post" enctype="multipart/form-data" action="{{ url('upload-list/'.Request::segment(2)) }}" onsubmit="postForm()">
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
									<div class="form-group">
										<label>Short Description</label>
										<textarea class="form-control" style="height: 200px" name="sortDesc" required="" placeholder="Short Description"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Thumbnail Image</label>
										<input type="file"  class="dropify" data-height="260px" name="banner">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Content</label>
								<textarea class="summernote" id="summernote" name="content" required="">Masukan Konten..</textarea>
							</div>
						</div>
					</div>
					<a href="{{ url('postList/'.$data['headline']->idMenu) }}"  class="btn btn-danger">Cancel</a>
					<button class="btn btn-primary">Add Post</button>
				</div>
			</form>
		</div>
	</div>
	<!-- /.box-body -->
</div>
{{-- modal add admin --}}
<script>
	function postForm() {
		$('textarea[name="content"]').html($('#summernote').code());
	}
</script>

@endsection