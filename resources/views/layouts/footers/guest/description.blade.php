<!-- Footer Starts Here -->
<footer>
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
                    </ul>
                </div>
            </div>
            <div class="order-md-1 order-last text-white opacity-5 text-center">
                {{ translate('© 2022 - 2021 Dzair Academy - All Rights Reserved.')}}
            </div>
            <ul class="menu-list d-flex align-items-center mb-0 list-unstyled order-md-last order-1" style="display:-webkit-inline-box;">
                <li class=""><a href="#" class="text-white">{{ translate('About Us') }}</a></li>
                <!-- <li class=""><a href="#">How We Work</a></li> -->
                <li class="px-3">
                    <a class="cursor-pointer text-white"
                    data-bs-toggle="modal" data-bs-target="#dialogContactus"
                        >{{ translate('Contact Us') }}</a>
                        <!-- wire:click.prevent="$emit('showContactus', '')" -->
                </li>
                <!-- <li class=""><a href="#" 
                        class="text-white">Privacy Policy</a></li> -->
            </ul>
        </div>
    </div>
</footer>
<div class="modal fade"
            id="dialogContactus" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top:6rem;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ translate('Contact Us') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 py-1">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 py-1">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 py-1">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 py-1">
                                <fieldset>
                                    <button type="submit" class="btn btn-primary">{{ translate('Send Message') }}</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>