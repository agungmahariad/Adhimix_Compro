@extends('admin.statis')
@section('title', 'Anabatic | Testimonial')
@section('title_page','Testimonial')
@section('title_content','Testimonial');
@section('sub_title_content','List Testimonial')

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
    <h3 class="box-title">Anabatic Testimonial</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <button class=" btn btn-primary" data-toggle="modal" data-target="#add" type="button">Tambah Testimonial Baru</button>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Queue</th>
          <th class="text-center">Fullname</th>
          <th class="text-center">Testimonial</th>
          <th class="text-center">Picture</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">1</td>
          <td class="text-center"><input type="number" class="form-control" style="width: 50px;" value="1" name=""></td>
          <td class="text-center">Ahmad Jalaludin</td>
          <td style="width: 300px;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          </td>
          <td class="text-center">
            <img class="img-circle" src="{{ asset('backend/dist/img/admin/Photo.jpg') }}" alt="">
          </td>
          <td class="text-center"><button title="Update" class="btn btn-primary" data-toggle="modal"  data-target="#update"><i class="fa fa-edit"></i> </button><button class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></td>
        </tr>
        <tr>
          <td class="text-center">2</td>
          <td class="text-center"><input type="number" class="form-control" style="width: 50px;" value="2" name=""></td>
          <td class="text-center">Ahmad Jalaludin</td>
          <td style="width: 300px;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          </td>
          <td class="text-center">
            <img class="img-circle" src="{{ asset('backend/dist/img/admin/Photo.jpg') }}" alt="">
          </td>
          <td class="text-center"><button title="Update" class="btn btn-primary" data-toggle="modal"  data-target="#update"><i class="fa fa-edit"></i> </button><button class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></td>
        </tr>
        <tr>
          <td class="text-center">3</td>
          <td class="text-center"><input type="number" class="form-control" style="width: 50px;" value="3" name=""></td>
          <td class="text-center">Ahmad Jalaludin</td>
          <td style="width: 300px;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          </td>
          <td class="text-center">
            <img class="img-circle" src="{{ asset('backend/dist/img/admin/Photo.jpg') }}" alt="">
          </td>
          <td class="text-center"><button title="Update" class="btn btn-primary" data-toggle="modal"  data-target="#update"><i class="fa fa-edit"></i> </button><button class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
{{-- modal add admin --}}

<div class="modal fade" id="add" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Tesimonial Baru</h4>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ url('add-admin') }}">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="fullname" class="form-control" required="" placeholder="Masukan Nama Admin">
                </div>
                <div class="form-group">
                  <label>Photo</label>
                  <input type="file" required="" name="photo" class="dropify" />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Testimonial</label>
                  <textarea class="form-control" style="height: 270px;min-height: 270px;" placeholder="Masukan Testimonial"></textarea>
                </div>
              </div>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Tesimonial</h4>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ url('add-admin') }}">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="fullname" value="Ahmad Jalaludin" class="form-control" required="" placeholder="Masukan Nama Admin">
                </div>
                <div class="form-group">
                  <label>Photo</label>
                  <input type="file" required="" name="photo" class="dropify" data-default-file="{{ asset('backend/dist/img/admin/Photo.jpg') }}"/>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Testimonial</label>
                  <textarea class="form-control" style="height: 270px;min-height: 270px;" placeholder="Masukan Testimonial">
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
              </div>
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