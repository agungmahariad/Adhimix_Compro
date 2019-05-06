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
		<h3 class="box-title"><a href="{{ url('postList/'.Request::segment(2)) }}">{{ $data['menu']->contentName }} </a> Add New Post</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="row">
			<form method="post" enctype="multipart/form-data" action="{{ url('upload-post/'.Request::segment(2)) }}" onsubmit="postForm()">
				@csrf
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Headline</label>
								<input type="text" placeholder ="Headline" class="form-control" name="headline">
							</div>	
							<div class="form-group">
								<label>Post Title</label>
								<input type="text" name="title" placeholder="Post Title" class="form-control">
							</div>
							<div class="form-group">
								<label>Banner Image</label>
								<input type="file"  class="dropify" data-height="260px" name="banner">
							</div>
							<div class="form-group">
								<label>Content</label>
								<textarea class="summernote" id="summernote" name="content" required="">Masukan Konten..</textarea>
							</div>
						</div>
					</div>
					<a href="{{ url('postList/'.Request::segment(2)) }}"  class="btn btn-danger">Cancel</a>
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