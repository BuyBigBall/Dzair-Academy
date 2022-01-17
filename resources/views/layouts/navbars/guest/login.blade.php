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
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-sm-end" id="navbarResponsive">
                <ul class="navbar-nav ml-auto collapse-navbar">
                    <li class="nav-item d-flex justify-content-center">
                        <form action="{{ route('search-result') }}" method="post" id="form-search" class="py-2">
                            <div class="input-group">
                                <input type="text" class="form-control shadow-none" 
                                    wire:model="word" name="word"
                                    placeholder="{{ translate('Search...')}}">
                                <span class="input-group-text text-body"
                                    onclick="javascript:forms[0].submit();"
                                    ><i class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ route('login') }}">{{translate('Sign In')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sign-up') }}">{{translate('Sign Up')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>