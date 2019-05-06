@extends('admin.statis')
@section('title', 'Adhimix | '.$data['headline']->headline.'s Content List')
@section('title_page',"".$data['headline']->headline."'s Content List")
@section('title_content',"".$data['headline']->headline."'s Content List")
@section('sub_title_content','Content List ')

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
    <h3 class="box-title"><a href="{{ url('postList/'.$data['headline']->idMenu) }}">Adhimix Menu </a></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    @if ($data['headline']->type=="List")
      <a class=" btn btn-primary" href="{{ url('add-new-list/'.Request::segment(2)) }}">Add New Content</a>
    @else
      <a class=" btn btn-primary" href="{{ url('add-new-report/'.Request::segment(2)) }}">Add New Report</a>
    @endif

    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          @if ($data['headline']->type=="List")
          <th class="text-center">Queue</th>
          @else
          <th class="text-center">Report Date</th>
          @endif
          <th class="text-center">Active Link</th>
          <th class="text-center">Publish</th>
          <th class="text-center">Content Title</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data['list'] as $e)
        <tr>
          <td class="text-center">{{ $loop->index + 1 }}</td>
          <td class="text-center"><input type="number" class="form-control" style="width: 50px;" value="{{ $e->queue }}" name=""></td>
          <td class="text-center">
            <select id="active{{ $e->idPost }}" onchange="activeLink({{ $e->idPost }})" class="form-control">
              <option value="1" @if ($e->activeLink==1)selected=""@endif>Active</option>
              <option value="0" @if ($e->activeLink==0)selected=""@endif>Non-active</option>
            </select>
          </td>
          <td class="text-center">
            <select id="publish{{ $e->idPost }}" onchange="publish({{ $e->idPost }})" class="form-control">
              <option value="1" @if ($e->publish==1)selected=""@endif>Yes</option>
              <option value="0" @if ($e->publish==0)selected=""@endif>No</option>
            </select>
          </td>
          <td class="text-center">{{ $e->title }}</td>
          <td class="text-center"><a title="Update" class="btn btn-primary" href="{{ url('add-post') }}"><i class="fa fa-edit"></i> </a>
            <button onclick="confdel({{ $e->idPost }})" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></td>
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
            <h4 class="modal-title">Tambah Content Baru</h4>
          </div>
          <form enctype="multipart/form-data" method="post" action="{{ url('add-sub-menu/') }}">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Content</label>
                <input type="text" name="contentName" class="form-control" placeholder="Nama Content" required="">
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
          window.location.href="{{ url('del-list/') }}/"+$id;
        } else {
          swal("Your List is safe!",{
            icon: "success",
          });
        }
      });
     }

    function activeLink($id) {
      $.ajax({
        type: "GET",
        url: "{{ url('api/activeLinkList/') }}/"+$id+"/"+$("#active"+$id).val(),
        success: function (data) {
          location.reload();
        }
      });
    }

    function publish($id) {
      $.ajax({
        type: "GET",
        url: "{{ url('api/publishList/') }}/"+$id+"/"+$("#publish"+$id).val(),
        success: function (data) {
          location.reload();
        }
      });
    }

  </script>