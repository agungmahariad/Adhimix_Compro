@extends('admin.statis')
@section('title', 'Adhimix | Banner ')
@section('title_page','Banner ')
@section('title_content','Banner ');
@section('sub_title_content','List Banner ')

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
    <h3 class="box-title">Adhimix Banner </h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <button class=" btn btn-primary" data-toggle="modal" data-target="#add" type="button">Tambah Banner  Baru</button>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Queue</th>
          <th class="text-center">Banner</th>
          <th class="text-center">Alt</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">1</td>
          <td class="text-center"><input type="number" class="form-control" style="width: 50px;" value="1" name=""></td>
          <td class="text-center">
            <img src="{{ asset('media/images/banner-cti.com.jpg') }}" alt="" style="width: 300px; height: 100px;">
          </td>
          <td class="text-center">Banner Name</td>
          <td class="text-center"><button title="Update" class="btn btn-primary" data-toggle="modal"  data-target="#update"><i class="fa fa-edit"></i> </button><button class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></td>
        </tr>
        <tr>
          <td class="text-center">2</td>
          <td class="text-center"><input type="number" class="form-control" style="width: 50px;" value="2" name=""></td>
          <td class="text-center">
            <img src="{{ asset('media/images/banner-cti.com.jpg') }}" alt="" style="width: 300px; height: 100px;">
          </td>
          <td class="text-center">Banner Name</td>
          <td class="text-center"><button title="Update" class="btn btn-primary" data-toggle="modal"  data-target="#update"><i class="fa fa-edit"></i> </button><button class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></td>
        </tr>

        <tr>
          <td class="text-center">3</td>
          <td class="text-center"><input type="number" class="form-control" style="width: 50px;" value="3" name=""></td>
          <td class="text-center">
            <img src="{{ asset('media/images/banner-cti.com.jpg') }}" alt="" style="width: 300px; height: 100px;">
          </td>
          <td class="text-center">Banner Name</td>
          <td class="text-center"><button title="Update" class="btn btn-primary" data-toggle="modal"  data-target="#update"><i class="fa fa-edit"></i> </button><button class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
{{-- modal add admin --}}

<div class="modal fade" id="add" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Tesimonial Baru</h4>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ url('add-admin') }}">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label>Banner Alt</label>
              <input type="text" name="fullname" class="form-control" required="" placeholder="Masukan Nama Admin">
            </div>
            <div class="form-group">
              <label>Photo Banner</label>
              <input type="file" required="" name="photo" class="dropify" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah Admin</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  {{-- modal add --}}

  <div class="modal fade" id="update" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Tesimonial Baru</h4>
          </div>
          <form enctype="multipart/form-data" method="post" action="{{ url('add-admin') }}">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label>Banner Alt</label>
                <input type="text" name="fullname" class="form-control" required="" placeholder="Masukan Nama Admin">
              </div>
              <div class="form-group">
                <label>Photo Banner</label>
                <input type="file" required="" name="photo" data-default-file="{{ asset('media/images/banner-cti.com.jpg') }}" class="dropify" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Tambah Admin</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endsection