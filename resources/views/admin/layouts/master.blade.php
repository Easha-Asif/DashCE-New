<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') | {{ucfirst(basename(base_path()))}} - Admin Dashboard</title>
  <!-- General CSS Files index -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/app.min.css') }}">
  <!-- General CSS Files create-post -->
  <link rel="stylesheet" href="{{ asset('assets/admin/bundles/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/bundles/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
  <!-- General CSS Files datatables -->
  <link rel="stylesheet" href="{{ asset('assets/admin/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/dark-style.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/admin/img/dashce.svg') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/backend/css/toastr.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
  <link rel="stylesheet" href="{{ asset('assets/admin/vendor/fonts/tabler-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/admin/vendor/fonts/fontawesome.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/admin/vendor/fonts/flag-icons.css') }}" />
  <style>
    body:not(.sidebar-mini) .sidebar-style-2 .sidebar-menu>li.active>a {
      padding-left: 20px;
      position: relative;
      color: #5d596c;
    }
    .light-sidebar .main-sidebar .sidebar-menu li.active a {
      background-color: #f4f4f5;
      height: 40px;
      border-radius: 9px;
    }
    .main-sidebar .sidebar-menu li ul.dropdown-menu li.active>a {
      color: #6777ef;
      font-weight: 600;
      background: linear-gradient(72.47deg, #7367f0 22.16%, rgba(115, 103, 240, 0.7) 76.47%);
      box-shadow: 0px 2px 6px 0px rgba(115, 103, 240, 0.48);
      color: #fff !important;
      height: 40px;
      border-radius: 9px;
    }
    .main-sidebar .sidebar-menu li ul.dropdown-menu li a:before {
      color: #fff !important;
    }
  </style>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <!-- Navbar -->
      <x-navbar />
      <div class="main-sidebar sidebar-style-2">
        <!-- Asidebar -->
        <x-sidebar />
        <!-- SettingSidebar -->
        <!-- <x-settingsidebar /> -->
      </div>
      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <!-- Footer -->
      <x-footer />
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
  <!-- JS Libraies index-->
  <script src="{{ asset('assets/admin/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <!-- JS Libraies create-post-->
  <script src="{{ asset('assets/admin/bundles/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('assets/admin/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <script src="{{ asset('assets/admin/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
  <script src="{{ asset('assets/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  <!-- JS Libraies datatables -->
  <script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Page Specific JS File index -->
  <script src="{{ asset('assets/admin/js/page/index.js') }}"></script>
  <!-- Page Specific JS File create-post -->
  <script src="{{ asset('assets/admin/js/page/create-post.js') }}"></script>
  <!-- Page Specific JS File datatables -->
  <script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
  <script src="{{ asset('assets/admin/js/dark.js') }}"></script>
  <script src="{{ asset('assets/admin/backend/js/toastr.min.js') }}"></script>
  {!! Toastr::message() !!}
  <script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}', 'Error!!', {
      closeButton:true,
      progressBar:true,
    });
    @endforeach
    @endif
  </script>
  @stack('js')

</body>
</html>