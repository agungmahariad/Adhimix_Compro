@extends('admin.statis')
@section('title', 'Anabatic | Admin')
@section('title_page','Admin')
@section('title_content','Admin');
@section('sub_title_content','List Admin')

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
    <h3 class="box-title">Anabatic Admin</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <button class=" btn btn-primary" data-toggle="modal" data-target="#add" type="button">Tambah Admin Baru</button>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Fullname</th>
          <th>Email</th>
          <th>Admin Type</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data['admin'] as $admin)
        <tr>
          <td>{{ $loop->index +1 }}</td>
          <td>{{ $admin->fullname }}</td>
          <td>{{ $admin->email }}</td>
          <td>{{ $admin->type }}</td>
          <td><a href="{{ url('del-admin/'.$admin->id) }}" class="btn btn-danger" title="Delete" style="margin: 5px">Del</a><button title="Update" data-toggle="modal" data-target="#upd{{ $admin->id }}" class="btn btn-primary" style="margin: 5px">Upd</button><button class="btn btn-Info" data-toggle="modal" data-target="#det{{ $admin->id }}" title="Detail" style="margin: 5px">Det</button></td>
        </tr>
        @endforeach
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
          <h4 class="modal-title">Tambah Admin Baru</h4>
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
                  <label>Jenis Kelamin</label>
                  <select class="form-control" name="gender" required="">
                    <option value="">--Piilih Jenis Kelamin--</option>
                    <option value="Male">Pria</option>
                    <option value="Female">Wanita</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" placeholder="Masukan Email Admin" class="form-control" required="" name="email">
                </div>
                <div class="form-group">
                  <label>Admin Type</label>
                  <select name="type" class="form-control" required="">
                    <option value="">--Pilih Type--</option>
                    <option value="1">Type 1</option>
                    <option value="2">Type 2</option>
                    <option value="3">Type 3</option>
                    <option value="4">Type 4</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pssword</label>
                  <input type="password" class="form-control" placeholder="Masukan Password" required="" name="password">
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

  @foreach ($data['admin'] as $element)
  <div class="modal fade" id="det{{ $element->id }}" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{ $element->fullname }}</h4>
          </div>
          <form enctype="multipart/form-data" method="post" action="{{ url('add-admin') }}">
            @csrf
            <div class="modal-body">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" style="width: 100px; height: 100px;" src="{{ asset('backend/dist/img/admin/'.$element->photo) }}" alt="User profile picture">

                  <h3 class="profile-username text-center">{{ $element->fullname }}</h3>

                  <p class="text-muted text-center">Admin Type {{ $element->type }}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Email</b> <p class="pull-right">{{ $element->email }}</p>
                    </li>
                    <li class="list-group-item">
                      <b>Gender</b> <p class="pull-right">{{ $element->gender }}</p>
                    </li>
                    <li class="list-group-item">
                      <b>Admin Sejak</b> <a class="pull-right">{{ $element->created_at }}</a>
                    </li>
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach
    {{-- modal update --}}
    @foreach ($data['admin'] as $element)
    <div class="modal fade" id="upd{{ $element->id }}" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">{{ $element->fullname }}</h4>
            </div>
            <form method="post" action="{{ url('update-admin/'.$element->id) }}">
              @csrf @method('post')
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="fullname" class="form-control" value="{{ $element->fullname }}" required="" placeholder="Masukan Nama Admin">
                    </div>
                    <div class="form-group">
                      <label>Photo</label>
                      <input type="file" required="" name="photo" class="dropify" data-default-file="{{ asset('backend/dist/img/admin/'.$element->photo) }}"/>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="gender" required="">
                        <option value="">--Piilih Jenis Kelamin--</option>
                        <option value="Male" @if ($element->gender=="Male")selected=""@endif>Pria</option>
                        <option value="Female" @if ($element->gender=="Female")selected=""@endif>Wanita</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" placeholder="Masukan Email Admin" value="{{ $element->email }}" class="form-control" required="" name="email">
                    </div>
                    <div class="form-group">
                      <label>Admin Type</label>
                      <select name="type" class="form-control" required="">
                        <option value="">--Pilih Type--</option>
                        <option value="1"@if ($element->type=="1")selected=""@endif>Type 1</option>
                        <option value="2"@if ($element->type=="2")selected=""@endif>Type 2</option>
                        <option value="3"@if ($element->type=="3")selected=""@endif>Type 3</option>
                        <option value="4"@if ($element->type=="4")selected=""@endif>Type 4</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pssword</label>
                      <input type="password" value="password" class="form-control" placeholder="Masukan Password" required="" name="password">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Update Admin</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
      @endsection