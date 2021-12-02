<!-- Footer Starts Here -->

<footer class="">
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-item">
                <!-- <h4>Select Language</h4> -->
                <!-- <p>Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien vitae.</p> -->
                <!-- <ul class="social-icons"> -->
                    <!-- 
                    <li><a rel="nofollow" href="https://fb.com/templatemo" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li> 
                -->
                    
                    <!-- <li class="nav-item dropdown pe-2 d-flex align-items-center"> -->
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- <img src="../assets/img/flag/{{Config::get('languages')[App::getLocale()]['flag-icon']}}.svg" class="avatar rounded-0 ps-3 avatar-sm cursor-pointer  me-3 "> -->
                            <!-- <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> -->
                            <div class="d-flex py-1">
                                <div class="my-auto">
                                    <img src="../assets/img/flag/{{Config::get('languages')[App::getLocale()]['flag-icon']}}.svg" 
                                            class="avatar avatar-sm rounded me-3 p-2"
                                            style='width:36px;'
                                        >
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold menu-list">{{Config::get('languages')[App::getLocale()]['display']}}</span>
                                    </h6>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-start  px-2 py-3 me-sm-n4 overflow-hidden" 
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
                    <!-- </li>
                </ul> -->
            </div>
            <div class="col-md-6 col-sm-12 footer-item d-flex justify-content-center align-items-center">
                {{ translate('© 2022 - 2021 Dzair Academy - All Rights Reserved.')}}
            </div>
            <div class="col-md-3 col-sm-12 footer-item">
                <!-- <h4>Additional Pages</h4> -->
                <ul class="menu-list list-group">
                    <li class="list-group-item"><a href="#">About Us</a></li>
                    <!-- <li class=""><a href="#">How We Work</a></li> -->
                    <li class="list-group-item">
                        <a style='cursor:pointer;'
                            data-toggle="modal" data-target="#dialogContactus"
                            >Contact Us</a>
                    </li>
                    <li class="list-group-item"><a href="#">Privacy Policy</a></li>
                </ul>

            </div>

            <!-- <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <p>© 2022 - 2021 Dzair Academy - All Rights Reserved.</p>
                </div>
            </div> -->
        </div>
        
    </div>
</footer>



<!-- <div wire:ignore.self class="modal fade" id='dialogContactus' tabindex = "-1" role = "dialog" > 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Contact Us</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact-form">
                    <form id="contact footer-contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input
                                        name="name"
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder="Full Name"
                                        required=""/></fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input
                                        name="email"
                                        type="text"
                                        class="form-control"
                                        id="email"
                                        pattern="[^ @]*@[^ @]*"
                                        placeholder="E-Mail Address"
                                        required=""/></fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea
                                        name="message"
                                        rows="6"
                                        class="form-control"
                                        id="message"
                                        placeholder="Your Message"
                                        required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- 
<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>© 2022 - 2021 Dzair Academy - All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div> -->