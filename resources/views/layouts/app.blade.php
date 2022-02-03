<x-layouts.base>
    
    
    {{-- If the user is authenticated --}}
    @auth()
        @if (in_array(request()->route()->getName(),['aboutus', 'how-to-use','privacy',],))

            <style>
                header{
                    z-index: 999;
                }
                .page-body
                {
                    max-width: 800px; 
                    margin: 0 auto; 
                    width: 90% !important;
                    margin-top:10rem !important;
                    overflow-x: hidden;
                }
                @media (min-width: 992px) {
                    .page-body
                    {
                        margin-top:7rem !important;
                    }
                }
                .page-top-adv
                {
                    /* display: none; */
                }
                @media (min-width: 768px) {
                    .page-top-adv
                    {
                        display: block;
                    }
                }
            </style>
            <div class="d-xl-none">
                @include('layouts.navbars.auth.sidebar')
            </div>
            @include('layouts.navbars.auth.header')
            <div class="mt-5 page-body" >
                <!-- <div class="mt-0 page-top-adv">
                    {!! topAdvertise() !!}
                </div> -->
                {{ $slot }}       
            </div>     
            @include('layouts.footers.guest.footer')
  

        @elseif (in_array(request()->route()->getName(),['welcome'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.footer')
            

        @else
            @include('layouts.navbars.auth.sidebar')
            @include('layouts.navbars.auth.nav')
            {{ $slot }}
            <main>
                <div class="container-fluid">
                    @include('layouts.footers.guest.footer')
                </div>
            </main>
        @endif
    @endauth






    {{-- If the user is not authenticated (if the user is a guest) --}}
    @guest
    {{-- If the user is on the login page --}}
    @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
        @include('layouts.navbars.guest.login')
        {{ $slot }}
        <div class="mt-5">
            @include('layouts.footers.guest.footer')
        </div>




    {{-- If the user is on the sign up page --}}
    @elseif (!auth()->check() && in_array(request()->route()->getName(),['sign-up'],))
        <div>
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.footer')
        </div>




    @elseif (in_array(request()->route()->getName(),['welcome'],))
        @include('layouts.navbars.guest.login')
        {{ $slot }}
        @include('layouts.footers.guest.footer')




    @elseif (in_array(request()->route()->getName(),
                [   'search-result', 
                    'search', 
                    'contactus', 
                    'course-download',
                    'user-profile',
                    'collection-shares',
                    ]))
        @include('layouts.navbars.guest.login')
        <div class="mt-5">
        {{ $slot }}
        </div>
        @include('layouts.footers.guest.footer')




    @elseif (in_array(request()->route()->getName(),
                [   
                    'aboutus', 
                    'how-to-use',
                    'privacy',
                    ]))
        <style>
                header{
                    z-index: 999;
                }
                .page-body
                {
                    max-width: 800px; 
                    margin: 0 auto; 
                    width: 90% !important;
                    margin-top:10rem !important;
                    overflow-x: hidden;
                }
                @media (min-width: 992px) {
                    .page-body
                    {
                        margin-top:7rem !important;
                    }
                }
                .page-top-adv
                {
                    /* display: none; */
                }
                @media (min-width: 768px) {
                    .page-top-adv
                    {
                        display: block;
                    }
                }
            </style>



        @include('layouts.navbars.guest.login')
            <div class="mt-5 page-body" >
                <!-- <div class="mt-0 page-top-adv">
                    {!! topAdvertise() !!}
                </div> -->
                {{ $slot }}       
            </div>     
        @include('layouts.footers.guest.footer')

    @endif    
    @endguest
    
    <?php /* @livewire('modal.contact-modal') */ ?>
    
</x-layouts.base>