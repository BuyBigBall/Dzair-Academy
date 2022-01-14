<main>
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    
    <div class="main-banner header-text" id="top">
        <div id="carouselExampleControls" class="carousel slide Modern-Slider" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active item item-1">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>{{translate('we are ready to help you')}}</h6>
                            <h4>{!! sprintf(translate('courses & collections %s management'), '<br>&amp;') !!}</h4>
                            <p>{{translate('Users can search courses and download and report.')}}
                                <a href="#" class="text-success">{{translate('Multiple-page version')}}</a> 
                                {{translate('with different HTML pages are also available.')}}</p>
                            <a href="{{route('search')}}" class="filled-button">{{translate('search')}}</a>
			    <a href="{{route('course-material')}}" class="filled-button">Upload</a>
                        </div>
                    </div>
                </div>
                
            </div>
           
        </div>
    </div>
</main>
