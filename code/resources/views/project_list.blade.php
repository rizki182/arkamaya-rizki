<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project | List</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/adminlte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ url('/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Rizki Faishal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link active">
              <i class="fas fa-chart-pie mr-1"></i>
              <p>
                Project
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Project</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Project List
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form id="filter_form" action="">
                <div class="row border border-dark pb-3 pt-3 mb-3">
                  <div class="col-1">
                    <div class="col-12">
                      <label for="project_name">&nbsp;</label>
                    </div>
                    <div class="col-12">
                      <label for="project_name">Filter</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <label for="project_name">Project Name</label>
                    <input type="text" class="form-control filter_form" name="filter[project_name]" placeholder="" value="{{ $filter['project_name'] ?? '' }}">
                  </div>
                  <div class="col-2">
                    <div class="col-12">
                      <label for="project_name">Client</label>
                    </div>
                    <div class="col-12">
                      <select class="form-control filter_form" id="client_id" name="filter[client_id]">
                        <option value="">All Client</option>
                        @foreach ($client_combobox as $client)
                          @if (!empty($filter["client_id"]) && $filter["client_id"] == $client->client_id)
                            <option selected="true" value="{{ $client->client_id }}">{{ $client->client_name }}</option>
                          @else
                            <option value="{{ $client->client_id }}">{{ $client->client_name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="col-12">
                      <label for="project_name">Status</label>
                    </div>
                    <div class="col-12">
                      <select class="form-control filter_form" id="project_status" name="filter[project_status]">
                        <option value="">All Status</option>
                        @foreach ($project_status::cases() as $status)
                          @if (!empty($filter["project_status"]) && $filter["project_status"] == $status->value)
                            <option selected="true" value="{{ $status->name }}">{{ $status->value }}</option>
                          @else
                            <option value="{{ $status->name }}">{{ $status->value }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="col-12">
                      <label for="project_name">&nbsp;</label>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-sm btn-primary submit">Search</button>
                      <div class="btn btn-sm btn-info" id="btn-clear-filter">Clear</div>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row mb-3">
                <div class="col-lg-12">
                  <a class="btn btn-sm btn-success" href="{{ url('/project/add') }}">New</a>
                  <div class="btn btn-sm btn-danger btn_delete_project">Delete</div>
                </div>
              </div>
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th><input type="checkbox" class="project_id_checkbox_all"></th>
                      <th>Action</th>
                      <th>Project Name</th>
                      <th>Client</th>
                      <th>Project Start</th>
                      <th>Project End</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody id="datatable-body">
                    @foreach ($projects as $project)
                      <tr>
                        <td><input type="checkbox" class="project_id_checkbox" value="{{ $project->project_id }}"></td>
                        <td><a href="{{ url('/project/edit/'.$project->project_id) }}">Edit</a></td>
                        <td>{{ $project->project_name }}</td>
                        <td>{{ $project->client_name }}</td>
                        <td>{{ $project->project_start }}</td>
                        <td>{{ $project->project_end }}</td>
                        <td>{{ $project->project_status }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('/adminlte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('/adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('/adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('/adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ url('/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/adminlte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/adminlte/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('/adminlte/dist/js/pages/dashboard.js') }}"></script>

<script>
  var project_id_delete = [];
  function errorToast(message){
    $(document).Toasts("create", {
      class: "bg-danger",
      title: "Error",
      body: message
    });
  }
  
  function successToast(){
    $(document).Toasts("create", {
      class: "bg-success",
      title: "Success",
      body: "Success"
    });
  }

  $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
  });

  $("#btn-clear-filter").click(function(){
    $(".filter_form").val("");
    $("#filter_form").submit();
  });

  $(".project_id_checkbox").click(function(){
    var value = $(this).val();
    var checked = $(this).prop("checked")
    if (checked && project_id_delete.includes(value) == false){
      project_id_delete.push(value);
    } else if (checked == false && project_id_delete.includes(value)){
      project_id_delete = project_id_delete.filter(item => item !== value)
    }
  });
  
  $(".project_id_checkbox_all").click(function(){
    var value = $(this).val();
    var checked = $(this).prop("checked")
    if (checked){
      $(".project_id_checkbox").prop("checked", false);
      $(".project_id_checkbox").trigger("click");
    } else {
      $(".project_id_checkbox").prop("checked", true);
      $(".project_id_checkbox").trigger("click");
    }
    console.log(project_id_delete);
  });

  $(".btn_delete_project").click(function(){
    if(confirm("Apakah yakin menghapus data?") == true) {
      $(".preloader").css({"height": "100vh"});
      var formData = new FormData();
      for (var index = 0; index < project_id_delete.length; index++) {
        formData.append('project_id[]', project_id_delete[index]);
      }

      $.ajax({
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        type: "POST",
        url: "{{ url('/project/remove-batch') }}",
        data: formData,
        encode: true,
        processData: false,
        contentType: false,
      }).done(function (data) {
        $(".preloader").css({"height": "0"});
        successToast();
        const myTimeout = setTimeout(function(){
          window.location = "{{ url('/') }}";
        }, 1000);
      }).fail(function(data, textStatus, xhr) {
        $(".preloader").css({"height": "0"});
        if(data.status == 400){
          var errors = data.responseJSON;
          var message = "";
          for(index in errors){
            message += "- " + errors[index] + "<br>";
          }
          errorToast(message);
        } else {
          errorToast("Something's wrong");
        }
      });
    }
  });
</script>

</body>
</html>