@yield('html')
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href={{ url("admin/assets/img/favicon/favicon.ico")}} />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href={{ url("admin/assets/vendor/fonts/fontawesome.css")}} />
    <link rel="stylesheet" href={{ url("admin/assets/vendor/fonts/tabler-icons.css")}} />
    <link rel="stylesheet" href={{ url("admin/assets/vendor/fonts/flag-icons.css")}} />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css"  />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css"  />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href={{ url("admin/assets/vendor/libs/node-waves/node-waves.css")}} />
    <link rel="stylesheet" href={{ url("admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}} />
    <link rel="stylesheet" href={{ url("admin/assets/vendor/libs/typeahead-js/typeahead.css")}} />
    <link rel="stylesheet" href={{ url("admin/assets/vendor/libs/tagify/tagify.css")}} />
    <link rel="stylesheet" href={{ url("admin/assets/vendor/libs/bootstrap-select/bootstrap-select.css")}} />
    <link rel="stylesheet" href={{ url("admin/assets/vendor/libs/select2/select2.css")}} />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href={{ url('css/toastr.css') }}>

    <!-- Page CSS -->
    @yield('css')

    <!-- Helpers -->
    <script src={{ url("admin/assets/vendor/js/helpers.js")}}></script>
    <script src="{{ url('admin/assets/vendor/js/template-customizer.js') }}"></script>
    <script src={{ url("admin/assets/js/config.js")}}></script>

  </head>
