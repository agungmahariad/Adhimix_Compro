@extends('admin.statis')
@section('title', 'Adhimix | Content ')
@section('title_page','Content ')
@section('title_content','Content ');
@section('sub_title_content','List Content ')

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
    <h3 class="box-title">Adhimix Content </h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Active Link</th>
          <th class="text-center">Content Name</th>
          <th class="text-center">Parent</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">1</td>
          <td class="text-center"><input type="checkbox" class="minimal" name=""></td>
          <td class="text-center">Line Of Bussiness</td>
          <td class="text-center">-</td>
          <td class="text-center"><a href="{{ url('post-list') }}" class="btn btn-success" title="Add Sub Content"><i class="fa fa-plus"></i> </a></td>
        </tr>
        <tr>
          <td class="text-center">2</td>
          <td class="text-center"><input type="checkbox" class="minimal" name=""></td>
          <td class="text-center">Anabatic Digital Raya</td>
          <td class="text-center">Line Of Bussiness</td>
          <td class="text-center"><a href="{{ url('post-list') }}" class="btn btn-success" title="Add Sub Content"><i class="fa fa-plus"></i> </a></td>
        </tr>
        <tr>
          <td class="text-center">3</td>
          <td class="text-center"><input type="checkbox" class="minimal" name=""></td>
          <td class="text-center">About Us</td>
          <td class="text-center">Anabatic Digital Raya</td>
          <td class="text-center"><a href="{{ url('post-list') }}" class="btn btn-success" title="Add Sub Content"><i class="fa fa-plus"></i> </a></td>
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
          <h4 class="modal-title">Tambah Content Baru</h4>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ url('add-admin') }}">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Content</label>
              <input type="text" name="fullname" class="form-control" placeholder="Nama Content" required="">
            </div>
            <div class="form-group">
              <input type="checkbox" name="fullname" class="minimal" style="margin-top: 5px" placeholder="Nama Content" required="">
              <label>Sub Content </label>
            </div>
            <div class="form-group">
              <label>Parent</label>
              <select class="form-control">
                <option>Pilih Parent</option>
                <option>Line Of Bussiness</option>
                <option>Anabatic Digital Raya</option>
                <option>About Us</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah Content</button>
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
          <h4 class="modal-title">Update Content </h4>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ url('add-admin') }}">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Content</label>
              <input type="text" name="fullname" value="Line Of Bussiness" class="form-control" placeholder="Nama Content" required="">
            </div>
            <div class="form-group">
              <input type="checkbox" name="fullname" class="minimal" style="margin-top: 5px" placeholder="Nama Content" required="">
              <label>Sub Content </label>
            </div>
            <div class="form-group">
              <label>Parent</label>
              <select class="form-control">
                <option>Pilih Parent</option>
                <option>Line Of Bussiness</option>
                <option>Anabatic Digital Raya</option>
                <option>About Us</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah Content</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
    @endsection	