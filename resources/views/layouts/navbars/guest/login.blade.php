<!-- Additional CSS Files -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
   <style>
       
   </style>
<header class="">
    <nav class="navbar navbar-expand-lg" style="background: #6fb2b8;">
        <div class="container">
            <a class="navbar-brand " href="/">
                <h2 class="text-success text-gradient">
                    <!-- Dzair Academy -->
                    <img src="{{asset('assets/img/SITE.png')}}" style="width:182px; height:33px;" />
                </h2>
            </a>
            @if(!empty(Auth::id()))
                @include('layouts.auth-topright')
            @else
                @include('layouts.guest-topright')
            @endif
        </div>
    </nav>
</header>