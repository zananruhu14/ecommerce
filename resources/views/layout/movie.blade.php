
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
  <script defer src="/assets/js/cdn.min.js"></script>
  <title>
    Leetex Web
  </title>
  <!--     Fonts and icons     -->
  <link href="/color/style.css" rel="stylesheet" />
  <link  href="/assets/css/font.css" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/darkmode/darkmode.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="/assets/js/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link id="pagestyle" href="/css/soft-ui-dashboard.min.css" rel="stylesheet" />
  {{-- <link rel="stylesheet" rel="stylesheet" href="css/style.css" id="pagestyle"> --}}

  <link id="pagestyle" href="/assets/css/soft-ui-dashboard.min.css?v=1.1.1" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/moment.min.js"></script>
<script type="text/javascript" src="/assets/js/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/daterangepicker.css" />
@yield('datarange')
  @livewireStyles
</head>

<body class="rental">


        @include('layout.navbar_landing')
      @yield('container')

      <footer class="footer pt-3">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://bmpgtpq.com/jimi-mikail-zamzami/" class="font-weight-bold" target="_blank">Jimi Mikail Zamzami</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://bmpgtpq.com/jimi-mikail-zamzami/" class="nav-link text-muted" target="_blank">IT Leetex</a>
                </li>
                <li class="nav-item">
                  <a href="https://bmpgtpq.com/jimi-mikail-zamzami/" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>


  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        </div>
      </div>
    </div>
  </div>
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
    $('.dropdown-toggle').dropdown()
  </script>
  <script>
 // Get the button element by its ID
var tombol = document.getElementById("tombol");

// Add an event listener to the button that listens for a "click" event
tombol.addEventListener("click", function() {

  // Get the body element
  var body = document.getElementsByTagName("body")[0];

  // Toggle the "g-sidenav-pinned" and "g-sidenav-hidden" classes
  body.classList.toggle("g-sidenav-pinned");
  body.classList.toggle("g-sidenav-hidden");
});


</script>



  <!-- Github buttons -->
  <script async defer src="/assets/js/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
  <script defer src="/assets/js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"776b9dc97ba718ce","version":"2022.11.3","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}' crossorigin="anonymous"></script>


</body>

</html>
