@extends('admin.statis')
@if ($data['parent'][0]->idContent==null)
<script>window.location.href="{{ url('menuList') }}"</script>
@endif
@section('title', 'Adhimix | '.$data['parent'][0]->contentName."'s Sub Menu")
@section('title_page',$data['parent'][0]->contentName."'s Sub Menu")
@section('title_content',$data['parent'][0]->contentName."'s Sub Menu")
@section('sub_title_content','List Sub Menu ')

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
    <h3 class="box-title"><a href="{{ url('menuList') }}">Adhimix Menu </a></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <button class=" btn btn-primary" data-toggle="modal" data-target="#add" type="button">Tambah Sub Menu Baru</button>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Queue</th>
          <th class="text-center">Active Link</th>
          <th class="text-center">Publish</th>
          <th class="text-center">Menu Name</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data['listsubmenu'] as $e)
        <tr>
          <td class="text-center">{{ $loop->index + 1 }}</td>
          <td class="text-center">
            <input type="number" class="form-control" style="width: 50px; height: 50px" value="{{ $e->queue }}" name="">
          </td>
          <td class="text-center">
            <select class="form-control" onchange="activeLink({{ $e->idContent }})" id="active{{ $e->idContent }}">
              <option value="1" @if ($e->activeLink==1) selected="" @endif>Active</option>
              <option value="0" @if ($e->activeLink==0) selected="" @endif>Non-active</option>
            </select>
          </td>
          <td class="text-center">
            <select class="form-control" onchange="publish({{ $e->idContent }})" id="publish{{ $e->idContent }}">
              <option value="1" @if ($e->publish==1) selected="" @endif>Yes</option>
              <option value="0" @if ($e->publish==0) selected="" @endif>No</option>
            </select>
          </td>
          <td class="text-center">
            @php
            $no = 0;
            foreach ($data['list'] as $key) {
              if ($key->idContent == $e->parent) {
                foreach ($data['list'] as $k) {
                  if ($k->idContent == $key->parent) {
                    $no++;
                  }
                }
              }
            }
            if ($no>0) {
              @endphp
              <a href="{{ url('postList/'.$e->idContent) }}">{{ $e->contentName }}</a>
              @php
            }else{
              @endphp
              <a href="{{ url('sub-menu/'.$e->idContent) }}">{{ $e->contentName }}</a>
              @php
            }
            @endphp
          </td>
          <td class="text-center"><button title="Update" class="btn btn-primary" data-toggle="modal"  data-target="#update{{ $e->idContent }}"><i class="fa fa-edit"></i> </button>
            <button class="btn btn-danger"onclick="confdel({{ $e->idContent }})"><i class="fa fa-trash"></i></button>
            <a href="{{ url('postList/'.$e->idContent) }}" class="btn btn-warning" title="Add Post"><i class="fa fa-th-large"></i></a></td>
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
          <form enctype="multipart/form-data" method="post" action="{{ url('add-sub-menu/'.$data['parent'][0]->idContent) }}">
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
    {{-- modal add --}}
    @foreach ($data['listsubmenu'] as $e)
    {{-- expr --}}
    <div class="modal fade" id="update{{ $e->idContent }}" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Update Content </h4>
            </div>
            <form enctype="multipart/form-data" method="post" action="{{ url('upd-sub-menu/'.$e->idContent) }}">
              @csrf @method('patch')
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Content</label>
                  <input type="text" name="contentName" value="{{ $e->contentName }}" class="form-control" placeholder="Nama Content" required="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Update Content</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
      @endsection

      <script>
        function confdel($id) {
         swal({
            title: "Delete menu?",
            text: "Once deleted, all data therein will also deleted!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Poof! Menu deleted!", {
                icon: "success",
              });
              window.location.href="{{ url('del-menu/') }}/"+$id;
            } else {
              swal("Your menu is safe!",{
                icon: "success",
              });
            }
          });
        }
        function get_parent() {
          if($("#status").val()=="s"){
            $("#contentParent").remove();
            $("#parent").addClass('hide');
          }else{
            $("#parent").removeClass('hide');
            $.ajax({
              type: "GET",
              url: "{{ url('api/get-parent/') }}",
              success: function (data) {
                $("#contentParent").html(data);
              }
            });
          }
        }
        function get_parent2() {
          if($("#status2").val()=="s"){
            $("#contentParent2").remove();
            $("#parent2").addClass('hide');
          }else{
            $("#parent2").removeClass('hide');
            $.ajax({
              type: "GET",
              url: "{{ url('api/get-parent/') }}",
              success: function (data) {
                $("#contentParent2").html(data);
              }
            });
          }
        }

        function activeLink($id) {
          $.ajax({
            type: "GET",
            url: "{{ url('api/activeLink/') }}/"+$id+"/"+$("#active"+$id).val(),
            success: function (data) {
              location.reload();
            }
          });
        }

        function publish($id) {
          $.ajax({
            type: "GET",
            url: "{{ url('api/publish/') }}/"+$id+"/"+$("#publish"+$id).val(),
            success: function (data) {
              location.reload();
            }
          });
        }

      </script>