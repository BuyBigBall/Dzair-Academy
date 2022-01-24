<!-- This is only used as header for aboutpage header in signined status responsively or fully -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
   <style>
        .navbar.navbar.navbar-expand-lg{
            background: #6fb2b8;
        }
        @media (min-width: 892px) {
            .navbar.navbar.navbar-expand-lg{
                background-color: rgb(0,0,0,0);
            }
        }
   </style>
<header class="">
    <nav class="navbar navbar-expand-lg" style="background: #6fb2b8;">
        <div class="container">
            <a class="" href="/">
                <h2 class="text-success text-gradient">
                    <!-- Dzair Academy -->
                    <img src="{{asset('assets/img/SITE.png')}}" style="width:182px; height:33px;" />
                </h2>
            </a>
            <div class="mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0 ">
                            <livewire:auth.logout />
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line text-white bg-white"></i>
                                <i class="sidenav-toggler-line text-white bg-white"></i>
                                <i class="sidenav-toggler-line text-white bg-white"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>