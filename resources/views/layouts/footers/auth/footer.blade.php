<!-- Footer Starts Here -->

<footer class="card blur">
    <div class="container">
        <div class="d-flex flex-md-row flex-column align-items-center justify-content-between">
            <div class="order-first">
                <div class="nav-item dropup pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-flex py-1">
                            <div class="my-auto">
                                <img src="../assets/img/flag/{{Config::get('languages')[App::getLocale()]['flag-icon']}}.svg" 
                                        class="avatar avatar-sm rounded me-2"
                                        style='width:36px;'
                                    >
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-0">
                                    <span class="font-weight-bold menu-list text-white">{{Config::get('languages')[App::getLocale()]['display']}}</span>
                                </h6>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start px-2 py-3 me-sm-n4 overflow-hidden" 
                        aria-labelledby="dropdownMenuButton" style='margin-left:-200;'>
                        @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                        <li class="mb-2">
                            <a href="/lang/{{ $lang}}" class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="../assets/img/flag/{{$language['flag-icon']}}.svg" class="avatar avatar-sm rounded me-3 p-2">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">{{$language['display']}}</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="order-md-1 order-last text-white opacity-5 text-center">
                {{ translate('© 2022 - 2021 Dzair Academy - All Rights Reserved.')}}
            </div>
            <ul class="menu-list d-flex align-items-center mb-0 list-unstyled order-md-last order-1" style="display:-webkit-inline-box;">
                <li class=""><a href="#" class="text-white">About Us</a></li>
                <!-- <li class=""><a href="#">How We Work</a></li> -->
                <li class="px-3">
                    <a class="cursor-pointer text-white"
                        data-bs-toggle="modal" data-bs-target="#dialogContactus"
                        >Contact Us</a>
                </li>
                <li class=""><a href="#" class="text-white">Privacy Policy</a></li>
            </ul>
        </div>
    </div>
</footer>
