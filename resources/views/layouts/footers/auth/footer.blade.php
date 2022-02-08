<!-- Footer Starts Here -->
<footer class="card blur">
    No- use this
    <div class="d-flex flex-md-row flex-column align-items-center justify-content-between  px-3">
        <div class="order-md-1 order-first text-white opacity-5 text-center align-items-end justify-content-end">
            {{ translate('© 2022 Dzair Academy')}}
        </div>
        
        <div class="order-md-1 order-last text-white opacity-5 align-items-center text-center">
            <ul class="menu-list d-flex align-items-center mb-0 list-unstyled order-md-last order-1" style="display:-webkit-inline-box;">
                <li class=""><a href="{{ route('aboutus') }}" target="_blank" class="text-white">{{ translate('About Us') }}</a></li>
                <!-- <li class=""><a href="#">How We Work</a></li> -->
                <li class="px-3"><a href="{{ route('terms-and-conditions') }}" target="_blank" class="text-white">{{ translate('Terms and Conditions') }}</a></li>
                <li class="px-3">
                    <a class="cursor-pointer text-white"
                        href="{{ route('contactus') }}"
                        >{{ translate('Contact Us') }}</a>
                </li>
            </ul>
        </div>

        <div class="order-last">
            <a class="" href="/">
            <div class="nav-item dropup pe-2 d-flex align-items-center">
                    <img src="{{asset('assets/img/SITE.png')}}" style="width:100px; height:18px;" />
                    <!-- <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
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
                                        <img src="../assets/img/flag/{{$language['flag-icon']}}.svg" class="avatar avatar-sm rounded me-3 py-1">
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
                    </ul> -->
                </div>
            </a>
        </div>

    </div>
</footer>
<script>
    function showContact()
    {
        //console.log("showContactus");
        window.livewire.emit('showContactus', '');
    }
</script>