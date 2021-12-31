<x-layouts.base>
    
    
    {{-- If the user is authenticated --}}
    @auth()
        {{-- If the user is authenticated on the static sign up or the sign up page --}}
        @if (in_array(request()->route()->getName(),['sign-up'],))
            @include('layouts.navbars.guest.sign-up')
            {{ $slot }}
            @include('layouts.footers.guest.description')

        {{-- If the user is authenticated on the static sign in or the login page --}}
        @elseif (in_array(request()->route()->getName(),['login'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.description')

        @elseif (in_array(request()->route()->getName(),['welcome'],))
            {{ $slot }}
            @include('layouts.footers.guest.description')
            
        @else
            @include('layouts.navbars.auth.sidebar')
            @include('layouts.navbars.auth.nav')
            {{ $slot }}
            <main>
                <div class="container-fluid">
                    <!-- <div class="row">
                        <div class="col-md-12"> -->
                            @include('layouts.footers.auth.footer')
                        <!-- </div>
                    </div> -->
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
            @include('layouts.footers.guest.description')
        </div>

    {{-- If the user is on the sign up page --}}
    @elseif (!auth()->check() && in_array(request()->route()->getName(),['sign-up'],))
        <div>
            @include('layouts.navbars.guest.sign-up')
            {{ $slot }}
            @include('layouts.footers.guest.description')
        </div>

    @elseif (in_array(request()->route()->getName(),['welcome'],))
        {{ $slot }}
        @include('layouts.footers.guest.description')

    @elseif (in_array(request()->route()->getName(),['search-result'],))
        @include('layouts.navbars.guest.login')
        <div class="mt-5">
        {{ $slot }}
        </div>
        @include('layouts.footers.guest.description')

    @endif
    @endguest

</x-layouts.base>