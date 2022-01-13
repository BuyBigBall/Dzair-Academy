<main>
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand " href="/">
                    <h2 class="text-success text-gradient">
                        <!-- Dzair Academy -->
                        <img src="assets/img/SITE.png" style="width:182px; height:33px;" />
                    </h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-sm-end" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto collapse-navbar pt-3">
                        <li class="nav-item d-flex align-items-center">
                            <form action="{{ route('search-result') }}" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control " 
                                        wire:model="word" name="word"
                                        placeholder="{{ translate('Search...')}}">
                                    <span class="input-group-text text-body"
                                        onclick="javascript:forms[0].submit();"
                                        ><i class="fa fa-search" aria-hidden="true"></i></span>
                                </div>
                                @csrf
                            </form>
                            
                            <!-- <input type="text" class="form-control " placeholder="Search...">
                            <span class="input-group-text text-body"><i class="fa fa-search" aria-hidden="true"></i></span> -->
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="{{ route('login') }}">Signin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sign-up') }}">signup</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="main-banner header-text" id="top">
        <div id="carouselExampleControls" class="carousel slide Modern-Slider" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active item item-1">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>we are ready to help you</h6>
                            <h4>courses & collections<br>&amp; management</h4>
                            <p>Users can search courses and download and report.
                                <a href="#" class="text-success">Multiple-page version</a> with different HTML pages are also available.</p>
                            <a href="{{route('search')}}" class="filled-button">search</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="carousel-item item item-2">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>we are here to support you</h6>
                            <h4>LTR &amp; RTL <br />translate</h4>
                            <p>You are allowed to use this functions for your teach courses. 
                                </p>
                            <a href="{{route('login')}}" class="filled-button">Signin</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item item item-3">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>we have this too </h6>
                            <h4>Do you know <br> to use this website.</h4>
                            <p>You can download, edit and use the Documents, Images, Videos, Archives for your training course. 
                                You can just get the Trainings, Exercises, Exams if you wish those to in this website.</p>
                            <a href="emit('contactus')" class="filled-button">Contact us</a>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
        </div>
    </div>
    <!-- <script src="assets/js/custom.js"></script> -->
    <!-- <script src="assets/js/slick.js"></script> -->
</main>
