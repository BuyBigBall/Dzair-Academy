<main>
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <style>
        .text-content
        {
            width:90% !important;
        }
        @media (min-width: 576px) {
            .text-content
            {
                width:80% !important;
            }
        }
        @media (min-width: 892px) {
            .text-content
            {
                width:75%;
            }
        }
    </style>
    <div class="main-banner header-text mt-5 mt-lg-0" id="top">
        <div id="carouselExampleControls" class="carousel slide Modern-Slider" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active item item-1">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>{{translate('welcome to dzairacademy')}}</h6>
                            <h4>{!! sprintf(translate('courses & collections %s share'), '<br>&amp;') !!}</h4>
                            <p>{{translate('If you want to learn more how to use our platform, please')}}
                                <a href="{{ route('how-to-use') }}" target="_blank"  style="color:#f3e755 !important">{{translate('click here')}}</a> 
                                <!-- {{translate('with different HTML pages are also available.')}} -->
                            </p>
                            <a href="{{route('search')}}" class="filled-button">{{ translate('search') }}</a>
			                <a href="{{route('course-material')}}" class="filled-button"> {{ translate('upload') }} </a>
                        </div>
                        <!-- <section class="u-align-center-lg u-align-center-md u-align-left-sm u-align-left-xs u-clearfix u-section-8" id="carousel_f7af">
                        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                            <h2 class="u-align-center u-custom-font u-font-oswald u-text u-text-grey-10 u-text-1">about company</h2>
                            <div class="u-list u-repeater u-list-1">
                            <div class="u-align-center u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-1">
                                <h3 class="u-custom-font u-font-oswald u-text u-text-palette-4-base u-text-2" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000" style="will-change: contents;">120</h3>
                                <h6 class="u-align-center u-custom-font u-font-oswald u-text u-text-3">awesome projects</h6>
                                </div>
                            </div>
                            <div class="u-align-center u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-2">
                                <h3 class="u-custom-font u-font-oswald u-text u-text-palette-4-base u-text-4" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000" style="will-change: contents;">90</h3>
                                <h6 class="u-align-center u-custom-font u-font-oswald u-text u-text-5">happy clients</h6>
                                </div>
                            </div>
                            <div class="u-align-center u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-3">
                                <h3 class="u-custom-font u-font-oswald u-text u-text-palette-4-base u-text-6" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000" style="will-change: contents;">50</h3>
                                <h6 class="u-align-center u-custom-font u-font-oswald u-text u-text-7">team members</h6>
                                </div>
                            </div>
                            <div class="u-align-center u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-4">
                                <h3 class="u-custom-font u-font-oswald u-text u-text-palette-4-base u-text-8" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000" style="will-change: contents;">100</h3>
                                <h6 class="u-align-center u-custom-font u-font-oswald u-text u-text-9">coffee cups</h6>
                                </div>
                            </div>
                            </div>
                        </div>
                    </section> -->
                    </div>
                    
                    
                    <!-- <h3 class="u-custom-font u-font-oswald u-text u-text-palette-4-base u-text-2" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000" style="will-change: contents;">120</h3> -->

                </div>
                
            </div>
           
        </div>
    </div>
</main>
