@extends('admin.statis')
@section('title', 'Anabatic |'.$data['headline']->headline.'s Content ')
@section('title_page',"".$data['headline']->headline."'s Content ")
@section('title_content',"".$data['headline']->headline."'s Content ")
@section('sub_title_content','Content ')

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

@if ($errors->any())
<div class="col-md-12">
	@foreach ($errors->all() as $element)
	<div class="alert alert-danger">
		{{ $element }}
	</div>
	@endforeach
</div>
@endif

<style type="text/css">
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
	-webkit-appearance: none; 
	margin: 0; 
}
</style>
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><a href="{{ url('postList/'.$data['headline']->idMenu) }}">Anabatic Menu </a></h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<button class="btn btn-primary" data-toggle="modal" data-target="#add">Add Picture</button>

		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Divisi</th>
					<th class="text-center">Foto</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data['album'] as $e)
				<tr>
					<td class="text-center">{{ $loop->index + 1 }}</td>
					<td class="text-center">{{ $e->nama }}</td>
					<td class="text-center">{{ $e->namadivisi }}</td>
					<td class="text-center"><img src="{{ asset('backend/dist/img/album/'.$e->pict) }}" style="width: 100px;height: 100px" alt=""></td>
					
					<td class="text-center">
						<button title="Update" class="btn btn-primary" data-toggle="modal" data-target="#upd{{ $e->id_album }}"><i class="fa fa-edit"></i> </a>
						<button onclick="confdel({{ $e->id_album }})" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
	{{-- modal add admin --}}
	@foreach ($data['album'] as $e)
	<div class="modal fade" id="upd{{ $e->id_album }}" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Update Content Baru</h4>
				</div>
				<form enctype="multipart/form-data" method="post" action="{{ url('upd-album/'.$e->id_album) }}">
					@csrf @method('patch')
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" value="{{ $e->nama }}" class="form-control" placeholder="Masukan nama" required="">
								</div>	
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Divisi</label>
									<select name="id_divisi" class="form-control" required="">
										<option value="">Pilih Divisi</option>
										@foreach ($data['divisi'] as $d)
										<option value="{{ $d->id_divisi }}" @if($d->id_divisi==$e->divisi)selected=""@endif>{{ $d->divisi }}</option>
										@endforeach
									</select>
								</div>	
							</div>
						</div>
						<div class="form-gorup">
							<label for="">Deskripsi</label>
							<textarea class="form-control" name="deskripsi" required="" placeholder="Masukan deskripsi">{{ $e->deskripsi }}</textarea>
						</div>
						<div class="form-group">
							<label for="">Foto</label>
							<input type="file" class="dropify" data-default-file="{{ asset('backend/dist/img/album/'.$e->pict) }}"  name="pict">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Update Content</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endforeach
	<div class="modal fade" id="add" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Tambah Content Baru</h4>
				</div>
				<form enctype="multipart/form-data" method="post" action="{{ url('add-album/'.Request::segment('2')) }}">
					@csrf
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" placeholder="Masukan nama" required="">
								</div>	
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Divisi</label>
									<select name="id_divisi" class="form-control" required="">
										<option value="">Pilih Divisi</option>
										@foreach ($data['divisi'] as $e)
										<option value="{{ $e->id_divisi }}">{{ $e->divisi }}</option>
										@endforeach
									</select>
								</div>	
							</div>
						</div>
						<div class="form-gorup">
							<label for="">Deskripsi</label>
							<textarea class="form-control" name="deskripsi" required="" placeholder="Masukan deskripsi"></textarea>
						</div>
						<div class="form-group">
							<label for="">Foto</label>
							<input type="file" class="dropify" required="" name="pict">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Tambah Content</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	@endsection

	<script>
		function confdel($id) {
			swal({
				title: "Delete List?",
				text: "Once deleted, all data therein will also deleted!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					swal("Poof! list deleted!", {
						icon: "success",
					});
					window.location.href="{{ url('del-album/') }}/"+$id;
				} else {
					swal("Your List is safe!",{
						icon: "success",
					});
				}
			});
		}

	</script>