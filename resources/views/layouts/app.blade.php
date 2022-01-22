<x-layouts.base>
    
    
    {{-- If the user is authenticated --}}
    @auth()
        @if (in_array(request()->route()->getName(),['aboutus', 'how-to-use'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}            
            @include('layouts.footers.guest.footer')
  
        <?php /*
        {{-- If the user is authenticated on the static sign up or the sign up page --}}
        @elseif (in_array(request()->route()->getName(),['sign-up'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.footer')

        {{-- If the user is authenticated on the static sign in or the login page --}}
        @elseif (in_array(request()->route()->getName(),['login'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.footer')
        // */ ?>
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
                    'course-download',
                    'user-profile',
                    'collection-shares',
                    'aboutus', 
                    'how-to-use'
                    ]))
        @include('layouts.navbars.guest.login')
        <div class="mt-5">
        {{ $slot }}
        </div>
        @include('layouts.footers.guest.footer')

    @endif
    @endguest
    
    @livewire('modal.contact-modal')
    
</x-layouts.base>