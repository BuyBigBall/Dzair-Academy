<!DOCTYPE html>
<html lang="{{Config::get('languages')[App::getLocale()]['lang']}}" dir="{{Config::get('languages')[App::getLocale()]['dir']}}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Metas -->
    <!-- @if(env('IS_DEMO'))
    <meta name="keywords" content="creative tim, updivision, html dashboard, laravel, livewire, laravel livewire, alpine.js, html css dashboard laravel, soft ui dashboard laravel, livewire soft ui dashboard, soft ui admin, livewire dashboard, livewire admin, web dashboard, bootstrap 4 dashboard laravel, bootstrap 4, css3 dashboard, bootstrap 4 admin laravel, soft ui dashboard bootstrap 4 laravel, frontend, responsive bootstrap 4 dashboard, soft ui dashboard, soft ui laravel bootstrap 4 dashboard" />
    <meta name="description" content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js" />
    <meta itemprop="name" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta itemprop="description" content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js" />
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/492/original/opt_sd_laravel_thumbnail.jpg" />
    <meta name="twitter:card" content="product" />
    <meta name="twitter:site" content="@creativetim" />
    <meta name="twitter:title" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta name="twitter:description" content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js" />
    <meta name="twitter:creator" content="@creativetim" />
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/492/original/opt_sd_laravel_thumbnail.jpg" />
    <meta property="fb:app_id" content="655968634437471" />
    <meta property="og:title" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.creative-tim.com/live/vue-argon-dashboard-laravel" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/492/original/opt_sd_laravel_thumbnail.jpg" />
    <meta property="og:description" content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js" />
    <meta property="og:site_name" content="Creative Tim" />
    <script>
        (function(a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.start = 1 * new Date;
            h.end = i = function() {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function() {
                i();
                h.end = null
            }, c);
            h.timeout = c;
        })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
            'GTM-K9BGS8K': true
        });
    </script>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-46172202-22', 'auto', {
            allowLinker: true
        });
        ga('set', 'anonymizeIp', true);
        ga('require', 'GTM-K9BGS8K');
        ga('require', 'displayfeatures');
        ga('require', 'linker');
        ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
    </script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script> -->
    <!-- @endif -->
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Soft UI Dashboard by Creative Tim
    </title>
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->

    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/templatemo-finance-business.css">
    
    @if(Config::get('languages')[App::getLocale()]['dir'] == 'ltr')
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css" rel="stylesheet" />
    @endif
    
    @if(Config::get('languages')[App::getLocale()]['dir'] == 'rtl')
    <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/css/bootstrap-rtl.min.css">
    <link id="pagestyle" href="../assets/css/rtl.css" rel="stylesheet" />
    @endif
    
    @livewireStyles

    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../vendor/jquery/jquery.min.js"></script>

</head>

<body class="g-sidenav-show bg-gray-100">
    @livewire('alert-modal')

    {{ $slot }}

    
    <!--   Core JS Files   -->
    <!-- <script src="../vendor/jquery/jquery.min.js"></script>  < !-- to up --> 
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.2"></script>

    @livewireScripts
    <!-- <livewire:contact-modal />
    <button x-data="{}" x-on:click="window.livewire.emitTo('contact-modal', 'show')" class="text-indigo-500">
        Show contact modal
    </button>

    <button type="button" wire:click="$emit('ContactModal', 'livewire.modal.contact-modal')">
        Contact Us
    </button> -->



    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
        data-bs-target="#confirmModal">
        Launch demo modal
        </button> -->

        <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">{{translate('Confirm')}}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id='notice'></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ 'Cancel' }}</button>
                <button type="button" class="btn btn-primary">{{ 'Ok' }}</button>
            </div>
            </div>
        </div>
    </div>




    <!-- <button onclick="Livewire.emit('openModal', 'hello-world')">Open Modal</button>
    <button wire:click="$emit('openModal', 'hello-world')">Open Modal</button> -->
    <script src="../assets/js/main.js?v=0.0.0"></script>
</body>

</html>