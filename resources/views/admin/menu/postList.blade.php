@php
use App\post;
use Carbon\carbon;
@endphp
@extends('admin.statis')
@section('title', 'Adhimix | Content ')
@section('title_page','Content ')
@section('title_content','Content ')
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
    <h3 class="box-title">{{ $data['menu']->contentName."'s Cotent" }} </h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#post" data-toggle="tab">Post</a></li>
          <li><a href="#list" data-toggle="tab">List</a></li>
          <li><a href="#album" data-toggle="tab">Album</a></li>
          <li><a href="#content" data-toggle="tab">Projek</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="post">
            <a href="{{ url('add-post/'.Request::segment(2)) }}" class="btn btn-primary " style="margin-top: 10px;">Add New Post</a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Queue</th>
                  <th class="text-center">Active Link</th>
                  <th class="text-center">Publish</th>
                  <th class="text-center">Headline</th>
                  <th class="text-center">Title</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['post'] as $post)
                <tr>
                  <td class="text-center">{{ $loop->index + 1 }}</td>
                  <td class="text-center"><input type="number" class="form-control" style="width: 50px;" value="{{ $post->queue }}" name=""></td>
                  <td class="text-center">
                    <select id="active{{ $post->idPost }}" onchange="activeLink({{ $post->idPost }})" class="form-control">
                      <option value="1" @if ($post->activeLink==1)selected=""@endif>Active</option>
                      <option value="0" @if ($post->activeLink==0)selected=""@endif>Non-active</option>
                    </select>
                  </td>
                  <td class="text-center">
                    <select id="publish{{ $post->idPost }}" onchange="publish({{ $post->idPost }})" class="form-control">
                      <option value="1" @if ($post->publish==1)selected=""@endif>Yes</option>
                      <option value="0" @if ($post->publish==0)selected=""@endif>No</option>
                    </select>
                  </td>
                  <td class="text-center">{{ $post->headline }}</td>
                  <td class="text-center">{{ $post->title }}</td>
                  <td class="text-center"><a title="Update" class="btn btn-primary" href="{{ url('add-post') }}"><i class="fa fa-edit"></i> </a>
                    <button onclick="confdel({{ $post->idPost }})" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="list">
             <button class="btn btn-primary " style="margin-top: 10px;" data-toggle="modal" data-target="#headlineList">Add New Headline</button>
             <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Queue</th>
                  <th class="text-center">Active Link</th>
                  <th class="text-center">Publish</th>
                  <th class="text-center">Headline</th>
                  <th class="text-center">Type</th>
                  <th class="text-center">Content</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['headlineList'] as $e)
                <tr>
                  <td class="text-center">{{ $loop->index + 1 }}</td>
                  <td class="text-center"><input type="number" class="form-control" style="width: 50px;" value="{{ $e->queue }}" name=""></td>
                  <td class="text-center">
                    <select id="activeHeadline{{ $e->idTab }}" onchange="activeLinkheadline({{ $e->idTab }})" class="form-control">
                      <option value="1" @if ($e->activeLink==1)selected=""@endif>Active</option>
                      <option value="0" @if ($e->activeLink==0)selected=""@endif>Non-active</option>
                    </select>
                  </td>
                  <td class="text-center">
                    <select id="publishHeadline{{ $e->idTab }}" onchange="publishHeadline({{ $e->idTab }})" class="form-control">
                      <option value="1" @if ($e->publish==1)selected=""@endif>Yes</option>
                      <option value="0" @if ($e->publish==0)selected=""@endif>No</option>
                    </select>
                  </td>
                  <td class="text-center">{{ $e->headline }}</td>
                  <td class="text-center">
                    {{-- @if ($e->type=="List")
                    News
                    @else
                    Report
                    @endif --}}
                    {{ $e->type }}
                  </td>
                  <td class="text-center">
                    {{ post::where('idTab',$e->idTab)->count() }}
                  </td>
                  <td class="text-center">
                    <a title="Update" class="btn btn-primary" href="{{ url('add-post') }}"><i class="fa fa-edit"></i> </a>
                    <button onclick="confdelHeadline({{ $e->idTab }})" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button>
                    <a href="{{ url('add-list/'.$e->idTab) }}" class="btn btn-warning" title="Tambah List"><i class="fa fa-plus"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="content">
            <button class="btn btn-primary " style="margin-top: 10px;" data-toggle="modal" data-target="#contentModal">Add Isi Content</button>
            <table class="table table-bordered table-striped tableku">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Projek Name</th>
                  <th class="text-center">Thumbnail</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['projek'] as $e)
                <tr>
                  <td class="text-center">{{ $loop->index + 1 }}</td>
                  <td class="text-center">{{ $e->projek_name }}</td>
                  <td class="text-center">
                    <img src="{{ asset('assets/konten/thumbnail/'.$e->thumbnail) }}" style="width: 100px;">
                  </td>
                  <td class="text-center">
                    <a title="Update" class="btn btn-primary" href="{{ url('add-post') }}"><i class="fa fa-edit"></i> </a>
                    <button onclick="prodel({{ $e->idPost }})" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
            {{-- Tab pane --}}
            <div class="tab-pane" id="album">
              <button class="btn btn-primary " style="margin-top: 10px;" data-toggle="modal" data-target="#albummodal">Add New Album</button>
              <table class="table table-bordered table-striped tableku">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Queue</th>
                    <th class="text-center">Active Link</th>
                    <th class="text-center">Publish</th>
                    <th class="text-center">Headline</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Content</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data['album'] as $e)
                  <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td class="text-center"><input type="number" class="form-control" style="width: 50px;" value="{{ $e->queue }}" name=""></td>
                    <td class="text-center">
                      <select id="activeHeadline{{ $e->idTab }}" onchange="activeLinkheadline({{ $e->idTab }})" class="form-control">
                        <option value="1" @if ($e->activeLink==1)selected=""@endif>Active</option>
                        <option value="0" @if ($e->activeLink==0)selected=""@endif>Non-active</option>
                      </select>
                    </td>
                    <td class="text-center">
                      <select id="publishHeadline{{ $e->idTab }}" onchange="publishHeadline({{ $e->idTab }})" class="form-control">
                        <option value="1" @if ($e->publish==1)selected=""@endif>Yes</option>
                        <option value="0" @if ($e->publish==0)selected=""@endif>No</option>
                      </select>
                    </td>
                    <td class="text-center">{{ $e->headline }}</td>
                    <td class="text-center">
                      {{ $e->type }}
                    </td>
                    <td class="text-center">
                      {{ DB::table('albums')->where('idTab',$e->idTab)->count() }}
                    </td>
                    <td class="text-center">
                      <a title="Update" class="btn btn-primary" href="{{ url('add-post') }}"><i class="fa fa-edit"></i> </a>
                      <button onclick="confdelHeadline({{ $e->idTab }})" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button>
                      <a href="{{ url('album/'.$e->idTab) }}" class="btn btn-warning" title="Tambah List"><i class="fa fa-plus"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.box-body -->
      </div>
      {{-- modal add admin --}}

      <div class="modal fade" id="headlineList" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content ">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Headline</h4>
              </div>
              <form enctype="multipart/form-data" method="post" action="{{ url('add-headline/'.Request::segment(2)) }}">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label>Headline</label>
                    <input type="text" class="form-control" required="" placeholder="Masukan Headline" name="headline">
                  </div>
                  <div class="row">
                    <div class="col-md-4">

                      <div class="form-group">
                        <b>Template News</b>
                        <div class="radio">
                          <label>
                            <input type="radio" class="input" name="type" id="optionsRadios1" onclick="cek()" value="List" checked>
                            <img style="box-shadow: 2px 2px 20px 2px black;width: 100px; height: 100px;" src="{{asset('template/news.png')}}" class="image-popup-vertical-fit">
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">

                      <div class="form-group">
                        <b>Template Report</b>
                        <div class="radio">
                          <label>
                            <input type="radio" class="input" name="type" id="optionsRadios1" onclick="muncul()" value="Report" >
                            <img style="box-shadow: 2px 2px 20px 2px black;width: 100px; height: 100px;" src="{{asset('template/quarter.png')}}" class="image-popup-vertical-fit">
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">

                      <div class="form-group">
                        <b>Template News</b>
                        <div class="radio">
                          <label>
                            <input type="radio" class="input" name="type" id="optionsRadios1" onclick="cek()" value="option1" >
                            <img style="box-shadow: 2px 2px 20px 2px black;width: 100px; height: 100px;" src="{{asset('template/news.png')}}" class="image-popup-vertical-fit">
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="tambahan" class="hide">
                    <div class="form-group">
                      <label>Report Title</label>
                      <input type="text" name="reportTitle" class="form-control" placeholder="Report Title">
                    </div>
                    <div class="form-group">
                      <label>Report Description</label>
                      <textarea name="descReport" class="form-control" placeholder="Report Description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Tambah Headline</button>
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

          <div class="modal fade" id="albummodal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content ">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Album</h4>
                  </div>
                  <form enctype="multipart/form-data" method="post" action="{{ url('add-headline/'.Request::segment(2)) }}">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Headline</label>
                        <input type="text" class="form-control" placeholder="Masukan Headline" name="headline">
                      </div>
                      <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="descReport" class="form-control" placeholder="Masukan Deskripsi" required=""></textarea>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <b>Template Anabatician</b>
                            <div class="radio">
                              <label>
                                <input type="radio" class="input" name="type" value="Anabatician" checked>
                                <img style="box-shadow: 2px 2px 20px 2px black;width: 100px; height: 100px;" src="{{asset('template/anabatician.png')}}" class="image-popup-vertical-fit">
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Tambah Headline</button>
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="contentModal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content ">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Projek</h4>
                  </div>
                  <form enctype="multipart/form-data" method="post" action="{{ url('add-projek/'.Request::segment(2)) }}">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Projek Name</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Projek" name="projek">
                      </div>
                      <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="desc" class="form-control" placeholder="Masukan Deskripsi" required=""></textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Thumbnail</label>
                        <input type="file" class="dropify" name="thumbnail">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Tambah Projek</button>
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>

            <script>
              function activeLink($id) {
                $.ajax({
                  type: "GET",
                  url: "{{ url('api/activeLinkContent/') }}/"+$id+"/"+$("#active"+$id).val(),
                  success: function (data) {
                    location.reload();
                  }
                });
              }

              function publish($id) {
                $.ajax({
                  type: "GET",
                  url: "{{ url('api/publishContent/') }}/"+$id+"/"+$("#publish"+$id).val(),
                  success: function (data) {
                    location.reload();
                  }
                });
              }

              function confdel($id) {
               swal({
                title: "Delete Content?",
                text: "Once deleted, all data therein will also deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
               .then((willDelete) => {
                if (willDelete) {
                  swal("Poof! Content deleted!", {
                    icon: "success",
                  });
                  window.location.href="{{ url('del-post/') }}/"+$id;
                } else {
                  swal("Your Content is safe!",{
                    icon: "success",
                  });
                }
              });

               function prodel($id) {
                 swal({
                  title: "Delete Projek?",
                  text: "Once deleted, all data therein will also deleted!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                 .then((willDelete) => {
                  if (willDelete) {
                    swal("Poof! Projek deleted!", {
                      icon: "success",
                    });
                    window.location.href="{{ url('del-projek/') }}/"+$id;
                  } else {
                    swal("Your Projek is safe!",{
                      icon: "success",
                    });
                  }
                });
              }
             }

             function activeLinkHeadline($id) {
              $.ajax({
                type: "GET",
                url: "{{ url('api/activeLinkHeadline/') }}/"+$id+"/"+$("#activeHeadline"+$id).val(),
                success: function (data) {
                  location.reload();
                }
              });
            }

            function publishHeadline($id) {
              $.ajax({
                type: "GET",
                url: "{{ url('api/publishHeadline/') }}/"+$id+"/"+$("#publishHeadline"+$id).val(),
                success: function (data) {
                  location.reload();
                }
              });
            }

            function confdelHeadline($id) {
             swal({
              title: "Delete Headline?",
              text: "Once deleted, all data therein will also deleted!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
             .then((willDelete) => {
              if (willDelete) {
                swal("Poof! Headline deleted!", {
                  icon: "success",
                });
                window.location.href="{{ url('del-headline/') }}/"+$id;
              } else {
                swal("Your Headline is safe!",{
                  icon: "success",
                });
              }
            });
           }
           function cek() {
            $("#tambahan").addClass('hide');
          }
          function muncul() {
            $("#tambahan").removeClass('hide');
          }
        </script>
        @endsection