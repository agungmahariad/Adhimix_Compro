@extends('admin.statis')
@section('title', 'Adhimix | Divisi')
@section('title_page','Contact')
@section('title_content','Contact')
@section('sub_title_content','List messege')

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
    <h3 class="box-title">Pesan masuk untuk adhimix</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th width="20%">Name</th>
          <th width="15%">Email</th>
          <th width="30%">Subject</th>
          <th width="30%">Comment</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data['dataContact'] as $e)
        <tr>
          <td class="text-center">{{ $loop->index +1 }}</td>
          <td>{{ $e->firstname }} {{ $e->lastname }}</td>
          <td>{{ $e->email }}</td>
          <td>{{ $e->subject }}</td>
          <td>{{ $e->comment }}</td>
          <td class="text-center">
            <a href="{{ url('del-messege/'.$e->id_contact) }}" onclick="return confirm('Hapus Pesan?')" class="btn btn-danger" title="Delete" style="margin: 5px"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
    @endsection