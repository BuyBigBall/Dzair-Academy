<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Finance Business HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <!--

Finance Business TemplateMo

https://templatemo.com/tm-545-finance-business

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->
    <style>
        .prevend .fa-search
        {
            font-size:1.5rem;
            
        }
        </style>
    <!-- Header -->
    <!-- <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                
                </div>
                <div class="col-md-8 col-xs-12 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control " placeholder="Search...">
                        <span class="input-group-text text-body"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand " href="/">
                    <h2>Dzair Academy
                    </h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto collapse-navbar">
                        <!-- <li class="nav-item">
                            <a class="nav-link " href="#top">Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contactus">Contact Us</a>
                        </li> -->
                        <li class="nav-item d-flex align-items-center">
                            <div class="input-group">
                                <input type="text" class="form-control " placeholder="Search...">
                                <span class="input-group-text text-body"><i class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
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

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
            <!-- Item -->
            <div class="item item-1">
                <div class="img-fill">
                    <div class="text-content">
                        <h6>we are ready to help you</h6>
                        <h4>courses & collections<br>&amp; management</h4>
                        <p>Users can search courses and download and report.
                            <a href="index.html">Multiple-page version</a> with different HTML pages are also available.</p>
                        <a href="#contactus" class="filled-button">uopload</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item item-2">
                <div class="img-fill">
                    <div class="text-content">
                        <h6>we are here to support you</h6>
                        <h4>LTR &amp; RTL <br />translate</h4>
                        <p>You are allowed to use this functions for your teach materials. 
                            </p>
                        <a href="#" class="filled-button">Signin</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item item-3">
                <div class="img-fill">
                    <div class="text-content">
                        <h6>we have this too </h6>
                        <h4>Do you know <br> to use this website.</h4>
                        <p>You can download, edit and use the Documents, Images, Videos, Archives for your training course. 
                            You can just get the Trainings, Exercises, Exams if you wish those to in this website.</p>
                        <a href="#about" class="filled-button">learn more</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
        </div>
    </div>
    <!-- Banner Ends Here -->

    <!-- <div class="request-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Request a call back right now ?</h4>
                    <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
                </div>
                <div class="col-md-4">
                    <a href="#contactus" class="border-button">Contact Us</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Footer Starts Here -->
    @include('layouts.footers.auth.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <!-- <script src="assets/js/jquery.singlePageNav.min.js"></script> -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script>
        window.addEventListener('locationchange', function() {
            console.log('location changed!');
        })
        // $(window).hashchange(function() {
        //     // Alerts every time the hash changes!
        //     alert(location.hash);
        // })

        // $("#navbarResponsive a").click(function() {
        //     $("#navbarResponsive a").removeClass('current');
        //     var url = window.location.href;
        //     var element = $("#navbarResponsive a")
        //         .filter(function() {
        //             console.log(url, this.href)
        //             if (this.href.includes(url)) {
        //                 return true;
        //             } else return false
        //         })
        //         .addClass('current');
        // });
    </script>
    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>

</body>

</html>