<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb" class="px-2">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ __('welcome') }}</li>




        </ol>
        <h6 class="font-weight-bolder mb-0">{{ auth()->user()->name }}</h6>
      </nav>
      <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ml-2" id="tombol">
        <a href="javascript:;" class="nav-link text-body p-0">
        <div class="sidenav-toggler-inner">
        <i class="sidenav-toggler-line"></i>
        <i class="sidenav-toggler-line"></i>
        <i class="sidenav-toggler-line"></i>
        </div>
        </a>
        </div>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          {{-- <div class="input-group">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Type here...">
          </div> --}}
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item pe-2 d-flex align-items-center ">
            <label for="theme-switch" class="nav-link text-body p-0 m-0">

              <i class="fa fa-sun fixed-plugin-button-nav cursor-pointer" id="theme-indicator"></i>
            {{ __('dark mode') }}
            </label>
            <input type="checkbox" class="d-none" id="theme-switch"/>
          </li>
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            </div>
            </a>
            </li>
        </li>
        <li class="nav-item px-3 d-flex align-items-center">
            <a href="{{ url('locale/en') }}" class="
            @if (app()->getLocale() == 'en')
                text-primary
            @endif
            ">en</a> |
            <a href="{{ url('locale/id') }}" class="
            @if (app()->getLocale() == 'id')
                text-primary
            @endif
            ">id</a> |
            <a href="{{ url('locale/cn') }}" class="
            @if (app()->getLocale() == 'cn')
                text-primary
            @endif
            ">cn</a>
          </li>
          <li class="nav-item d-flex align-items-center px-3">
            <form action="/sikeu/logout" method="post" class="nav-link text-body font-weight-bold px-0">
                @csrf
              <i class="fa fa-user me-sm-1"></i>
              <button type="submit" class="d-sm-inline d-none border-0 bg-transparent ">
             {{ __('logout') }}
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
