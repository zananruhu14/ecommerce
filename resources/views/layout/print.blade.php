
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
<meta name="google-site-verification" content="xWogyu-YKthh_IIRkV4RfhFnK2MCWcxuZvfzPI1telQ" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/ltx/img/leetex_logo-removebg-preview.png">
  <link rel="icon" type="image/png" href="/ltx/img/leetex_logo-removebg-preview.png">
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>
    ERP SYSTEM
  </title>


  <link href="/color/style.css" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/darkmode/darkmode.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- CSS Files -->
  {{-- <link id="pagestyle" href="/css/soft-ui-dashboard.min.css?v=1.1.0" rel="stylesheet" /> --}}
  {{-- <link rel="stylesheet" rel="stylesheet" href="css/style.css" id="pagestyle"> --}}
  <link id="pagestyle" href="/assets/css/soft-ui-dashboard.min.css?v=1.1.1" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




@yield('datarange')
  @livewireStyles
</head>

<body class="g-sidenav-show bg-gray-100 g-sidenav-hidden">

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @yield('container')
      @yield('globe')

    </div>
  </main>

  <!--   Core JS Files   -->
@yield('script')

  @livewireScripts

  <script src="/assets/darkmode/dark-mode-handler.js"></script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>

  {{-- <script src="/assets/js/plugins/sweetalert.min.js"></script> --}}
  {{-- <script src="/assets/js/plugins/flatpickr.min.js"></script> --}}
  <script src="/assets/js/multistep-form.js"></script>


  @yield('grafik')
  <script>
  const navbar = document.getElementById('tombol');
const body = document.querySelector('body');

navbar.addEventListener('click', function() {
  body.classList.toggle('g-sidenav-hidden');
});


</script>



  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"776b9dc97ba718ce","version":"2022.11.3","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}' crossorigin="anonymous"></script>


</body>

</html>
