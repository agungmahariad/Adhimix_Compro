@php
use carbon\carbon;
@endphp
@extends('admin.statis')
@section('title', 'Anabatic | Divisi')
@section('title_page','Divisi')
@section('title_content','Divisi');
@section('sub_title_content','List Divisi')

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
    <h3 class="box-title">Anabatic Divisi</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <button class=" btn btn-primary" data-toggle="modal" data-target="#add" type="button">Tambah Divisi Baru</button>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="50">No</th>
          <th  width="50%">Divisi</th>
          <th  width="">Ditambahkan</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data['divisi'] as $divisi)
        @php
        $tgl = new \Carbon\Carbon($divisi->created_at);
        @endphp
        <tr>
          <td>{{ $loop->index +1 }}</td>
          <td>{{ $divisi->divisi }}</td>
          <td>{{ $tgl->format('Y-m-d') }}</td>
          <td class="text-center">
            <a href="{{ url('del-divisi/'.$divisi->id_divisi) }}" onclick="return confirm('Hapus divisi?')" class="btn btn-danger" title="Delete" style="margin: 5px"><i class="fa fa-trash"></i></a>
            <button title="Update" data-toggle="modal" data-target="#upd{{ $divisi->id }}" class="btn btn-primary" style="margin: 5px"><i class="fa fa-edit"></i></button>
          </td>
        </tr>
        @endforeach
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
          <h4 class="modal-title">Tambah Divisi Baru</h4>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ url('add-divisi') }}">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Divisi</label>
              <input type="text" name="divisi" class="form-control" required="" placeholder="Masukan Nama Divisi">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah Divisi</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  {{-- modal update --}}
  @foreach ($data['divisi'] as $element)
  <div class="modal fade" id="upd{{ $element->id }}" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Update Divisi</h4>
          </div>
          <form method="post" action="{{ url('update-divisi/'.$element->id_divisi) }}">
            @csrf @method('patch')
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Divisi</label>
                <input type="text" name="divisi" class="form-control" value="{{ $element->divisi }}" required="" placeholder="Masukan Nama Divisi">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Update Divisi</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach
    @endsection