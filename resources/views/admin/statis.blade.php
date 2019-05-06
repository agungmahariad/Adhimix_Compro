<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" href="{{ asset('asset/img/logo-adhimix.png') }}">

  <title>@yield('title')</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.6 -->

  <link rel="stylesheet" href="{{ asset('backend/bootstrap/css/bootstrap.min.css') }}">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">

  <!-- AdminLTE Skins. Choose a skin from the css/skins

   folder instead of downloading all of them to reduce the load. -->

   <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">



   <!-- jvectormap -->

   <link rel="stylesheet" href="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">

   {{-- data table --}}

   <link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">

   {{-- dropify --}}

   <link rel="stylesheet" href="{{ asset('backend/plugins/dropify/dist/css/dropify.min.css') }}">

   {{-- summernote --}}

   <link rel="stylesheet" href="{{ asset('css/summernote.css') }}">


   <style>

   .example-modal .modal {

    position: relative;

    top: auto;

    bottom: auto;

    right: auto;

    left: auto;

    display: block;

    z-index: 1;

  }



  .example-modal .modal {

    background: transparent !important;

  }

</style>

</head>

@if (empty(session('id')))

<script type="text/javascript">window.location.href="{{ url('back') }}"</script>

@endif

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">



    <header class="main-header">

      <!-- Logo -->

      <a href="{{ url('dashboard') }}" class="logo">

        <!-- mini logo for sidebar mini 50x50 pixels -->

        <span class="logo-mini"><b>A</b>LT</span>

        <!-- logo for regular state and mobile devices -->

        <span class="logo-lg">Adhimix <b>Admin</b></span>

      </a>

      <!-- Header Navbar: style can be found in header.less -->

      <nav class="navbar navbar-static-top">

        <!-- Sidebar toggle button-->

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

          <span class="sr-only">Toggle navigation</span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

        </a>



        <div class="navbar-custom-menu">

          <ul class="nav navbar-nav">



            <!-- User Account: style can be found in dropdown.less -->

            <li class="dropdown user user-menu">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <img src="{{ asset('backend/dist/img/admin/'.session('photo')) }}" class="user-image" alt="User Image">

                <span class="hidden-xs">{{ session('fullname') }}</span>

              </a>

              <ul class="dropdown-menu">

                <!-- User image -->

                <li class="user-header">

                  <img src="{{ asset('backend/dist/img/admin/'.session('photo')) }}" class="img-circle" alt="User Image">



                  <p>

                    {{ session('fullname') }} - Admin Level({{ session('type') }})

                    <small>Member since Nov. 2012</small>

                  </p>

                </li>

                <!-- Menu Footer-->

                <li class="user-footer">

                  <div class="pull-left">

                    <a href="#" class="btn btn-default btn-flat">Profile</a>

                  </div>

                  <div class="pull-right">

                    <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sign out</a>

                  </div>

                </li>

              </ul>

            </li>

          </ul>

        </div>

      </nav>

    </header>

    <!-- Left side column. contains the logo and sidebar -->

    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->

      <section class="sidebar">

        <!-- Sidebar user panel -->

        <div class="user-panel">

          <div class="pull-left image">

            <img src="{{ asset('backend/dist/img/admin/'.session('photo')) }}" style="height: 50px;width: 50px;" class="img-circle" alt="User Image">

          </div>
          <div class="pull-left info">

            <p>{{ session('fullname') }}</p>

          </div>

        </div>


        <!-- search form -->

        <form action="#" method="get" class="sidebar-form">

          <div class="input-group">

            <input type="text" name="q" class="form-control" placeholder="Search...">

            <span class="input-group-btn">

              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

              </button>

            </span>

          </div>

        </form>

        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">

          <li class="header">MAIN NAVIGATION</li>

          <li>

            <a href="{{ url('dashboard') }}">

              <i class="fa fa-dashboard"></i> <span>Dashboard</span>

              <span class="pull-right-container">


              </span>

            </a>

          </li>

          <li class="treeview">

            <a href="#">

              <i class="fa fa-home"></i>

              <span>Page Home</span>

              <span class="pull-right-container">

              </span>

            </a>

            <ul class="treeview-menu">

              <li><a href="{{ url('testimonial') }}"><i class="fa fa-circle-o"></i> Testimonial</a></li>

              <li><a href="{{ url('banner') }}"><i class="fa fa-circle-o"></i> Banner </a></li>

              <li><a href="{{ url('meta') }}"><i class="fa fa-circle-o"></i> Meta Management </a></li>

            </ul>

          </li>

          <li class="treeview">

            <a href="#">

              <i class="fa fa-cubes"></i>

              <span>Master Data</span>

              <span class="pull-right-container">

              </span>

            </a>

            <ul class="treeview-menu">

              <li><a href="{{ url('back-contact') }}"><i class="fa fa-circle-o"></i> Contact message</a></li>

              {{-- <li><a href="{{ url('divisi') }}"><i class="fa fa-circle-o"></i> Divisi</a></li> --}}

              {{-- <li><a href="{{ url('banner') }}"><i class="fa fa-circle-o"></i> Banner </a></li> --}}

              {{-- <li><a href="{{ url('meta') }}"><i class="fa fa-circle-o"></i> Meta Management </a></li> --}}

            </ul>

          </li>

          <li>

            <a href="{{ url('set-admin') }}">

              <i class="fa fa-user"></i>

              <span>Adhimix Admin</span>

              <span class="pull-right-container">

              </span>

            </a>

          </li>

          <li class="treeview">

            <a href="#">

              <i class="fa fa-chain"></i>

              <span>Content</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>

            </a>

            <ul class="treeview-menu">

              <li class="treeview"><a href="{{ url('menuList') }}"><i class="fa fa-plus"></i> Content</a></li>

              @foreach ($data['parentNav'] as $e)
              @php
              $no = 0;
              @endphp
              @foreach ($data['childNav'] as $child)
              @if ($e->idContent==$child->parent)
              @php
              $no++;
              @endphp
              @endif
              @endforeach
              @if ($no > 0)
              <li class="treeview" style="width: 100%;"><a href="#" style=" width: 80%;right: 0px;"><i class="fa fa-circle-o"></i>{{ $e->contentName }}
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview"><a href="{{ url('sub-menu/'.$e->idContent) }}">{{ $e->contentName }}</a></li>
                @php
                foreach ($data['childNav'] as $child) {
                  if ($child->parent==$e->idContent) {
                    $i = 0;
                    foreach ($data['childNav'] as $x) {
                      if ($x->parent==$child->idContent) {
                        $i++;
                      }
                    }
                    @endphp
                    @if ($i>0)
                    <li class="treeview">
                      <a href="#" style=" width: 80%;right: 0px;">
                        <i class="fa fa-circle-o"></i>{{ $child->contentName }}  
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span></a>
                        <ul class="treeview-menu">
                          @php
                          $noo=0;
                          @endphp

                          @foreach ($data['childNav'] as $cucu)

                          @if ($child->idContent == $cucu->parent)
                          @php
                          $noo++;
                          @endphp
                          @if ($noo==1)
                          <li class="treeview"><a href="{{ url('sub-menu/'.$child->idContent) }}">{{ $child->contentName }}</a></li>
                          @endif
                          <li class="treeview"><a href="{{ url('postList/'.$cucu->idContent) }}"><i class="fa fa-circle-o"></i>{{ $cucu->contentName }}</a></li>
                          @endif
                          @endforeach
                        </ul>
                      </li>
                      @else

                      <li class="treeview">
                        <a href="{{ url('sub-menu/'.$child->idContent) }}" style=" width: 80%;right: 0px;">
                          <i class="fa fa-circle-o"></i>{{ $child->contentName }}  
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span></a>
                      </li>
                        @endif
                        @php
                      }
                    } 
                    @endphp
                  </ul>
                </li>
                @else
                <li class="nav-item">
                  <li><a href="{{ url('sub-menu/'.$e->idContent) }}"><i class="fa fa-circle-o"></i> {{ $e->contentName }}</a></li>
                </li>
                @endif
                @endforeach
              </ul>

            </li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level One
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li>

            <li class="treeview">

              <a href="#">

                <i class="fa fa-files-o"></i>

                <span>Background</span>

                <span class="pull-right-container">

                </span>

              </a>

              <ul class="treeview-menu">

                <li><a href="{{ url('set-background') }}"><i class="fa fa-circle-o"></i> Background</a></li>

                <li><a href="{{ url('set-position') }}"><i class="fa fa-circle-o"></i> Background Position</a></li>

              </ul>

            </li>


            <li class="treeview">

              <a href="#">

                <i class="fa fa-files-o"></i>

                <span>Brochure</span>

                <span class="pull-right-container">

                </span>

              </a>

              <ul class="treeview-menu">

                <li><a href="{{ url('set-background') }}"><i class="fa fa-circle-o"></i> Brochure List</a></li>

                <li><a href="{{ url('set-position') }}"><i class="fa fa-circle-o"></i> Brochure Downloader</a></li>

              </ul>

            </li>

            <li class="treeview">

              <a href="#">

                <i class="fa fa-files-o"></i>

                <span>Career</span>

                <span class="pull-right-container">

                </span>

              </a>

              <ul class="treeview-menu">

                <li><a href="{{ url('set-position') }}"><i class="fa fa-circle-o"></i> Page Career</a></li>

                <li><a href="{{ url('set-background') }}"><i class="fa fa-circle-o"></i> Career Category</a></li>

                <li><a href="{{ url('set-background') }}"><i class="fa fa-circle-o"></i> Career Item</a></li>

              </ul>

            </li>

          </ul>

        </section>

        <!-- /.sidebar -->

      </aside>



      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

          <h1>

            @yield('title_page')

          </h1>

          <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> @yield('title_content')</a></li>

            <li><a href="#">@yield('sub_title_content')</a></li>

          </ol>

        </section>



        <!-- Main content -->

        <section class="content">

          @yield('content')

        </section>

        <!-- /.content -->

      </div>

      <!-- /.content-wrapper -->



      <footer class="main-footer">



      </footer>


      <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed

   immediately after the control sidebar -->

   <div class="control-sidebar-bg"></div>

 </div>

 <!-- ./wrapper -->



 <!-- jQuery 2.2.3 -->

 <script src="{{ asset('backend/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

 <!-- Bootstrap 3.3.6 -->

 <script src="{{ asset('backend/bootstrap/js/bootstrap.min.js') }}"></script>

 <!-- FastClick -->

 <script src="{{ asset('backend/plugins/fastclick/fastclick.js') }}"></script>

 <!-- AdminLTE App -->

 <script src="{{ asset('backend/dist/js/app.min.js') }}"></script>

 <!-- AdminLTE for demo purposes -->

 <script src="{{ asset('backend/dist/js/demo.js') }}"></script>

 <!-- Sparkline -->

 <script src="{{ asset('backend/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

 {{-- jvector --}}

 <script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>

 <script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>



{{-- sweet alert --}}
<script src="{{ asset('backend/sweetAlert.js') }}"></script>

 <!-- SlimScroll 1.3.0 -->

 <script src="{{ asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>





 <!-- ChartJS 1.0.1 -->

 <script src="{{ asset('backend/plugins/chartjs/Chart.min.js') }}"></script>



 <!-- DataTables -->

 <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>

 <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

 {{-- dropify --}}

 <script src="{{ asset('backend/plugins/dropify/dist/js/dropify.min.js') }}"></script>

 {{-- summer note --}}
 <script src="{{ asset('js/summernote.js') }}"></script>


 <script>

  $(function () {

    // $("#example1").DataTable();

    $('#example1').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": true,

      "ordering": false,

      "info": false,

      "autoWidth": false

    });

    $('#example2').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": true,

      "ordering": false,

      "info": false,

      "autoWidth": false

    });

    $('.tableku').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": true,

      "ordering": false,

      "info": false,

      "autoWidth": false

    });

  });

</script>

{{-- dropify --}}

<script>

  $(document).ready(function() {

        // Basic

        $('.dropify').dropify();



        // Translated

        $('.dropify-fr').dropify({

          messages: {

            default: 'Glissez-déposez un fichier ici ou cliquez',

            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',

            remove: 'Supprimer',

            error: 'Désolé, le fichier trop volumineux'

          }

        });



        // Used events

        var drEvent = $('#input-file-events').dropify();



        drEvent.on('dropify.beforeClear', function(event, element) {

          return confirm("Do you really want to delete \"" + element.file.name + "\" ?");

        });



        drEvent.on('dropify.afterClear', function(event, element) {

          alert('File deleted');

        });



        drEvent.on('dropify.errors', function(event, element) {

          console.log('Has Errors');

        });



        var drDestroy = $('#input-file-to-destroy').dropify();

        drDestroy = drDestroy.data('dropify')

        $('#toggleDropify').on('click', function(e) {

          e.preventDefault();

          if (drDestroy.isDropified()) {

            drDestroy.destroy();

          } else {

            drDestroy.init();

          }

        })

      });

    </script>
    <script>
      jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
          });

        $('.inline-editor').summernote({
          airMode: true
        });

      });

      window.edit = function() {
        $(".click2edit").summernote()
      },
      window.save = function() {
        $(".click2edit").summernote('destroy');
      }
    </script>
  </body>

  </html>

