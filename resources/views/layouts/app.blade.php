<x-layouts.base>
    
    
    {{-- If the user is authenticated --}}
    @auth()
        @if (in_array(request()->route()->getName(),['aboutus', 'how-to-use'],))
            {{ $slot }}
            
            {{-- If the user is authenticated on the static sign up or the sign up page --}}
        @elseif (in_array(request()->route()->getName(),['sign-up'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.description')

        {{-- If the user is authenticated on the static sign in or the login page --}}
        @elseif (in_array(request()->route()->getName(),['login'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.description')

        @elseif (in_array(request()->route()->getName(),['welcome'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.description')
            
        @else
            @include('layouts.navbars.auth.sidebar')
            @include('layouts.navbars.auth.nav')
            {{ $slot }}
            <main>
                <div class="container-fluid">
                    @include('layouts.footers.auth.footer')
                </div>
            </main>
        @endif
    @endauth

    {{-- If the user is not authenticated (if the user is a guest) --}}
    @guest
    @if (in_array(request()->route()->getName(),['aboutus', 'how-to-use'],))
        {{ $slot }}
    {{-- If the user is on the login page --}}
    @elseif (!auth()->check() && in_array(request()->route()->getName(),['login'],))
        @include('layouts.navbars.guest.login')
        {{ $slot }}
        <div class="mt-5">
            @include('layouts.footers.guest.description')
        </div>

    {{-- If the user is on the sign up page --}}
    @elseif (!auth()->check() && in_array(request()->route()->getName(),['sign-up'],))
        <div>
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.description')
        </div>

    @elseif (in_array(request()->route()->getName(),['welcome'],))
        @include('layouts.navbars.guest.login')
        {{ $slot }}
        @include('layouts.footers.guest.description')

    @elseif (in_array(request()->route()->getName(),['search-result', 'search', 'course-download']))
        @include('layouts.navbars.guest.login')
        <div class="mt-5">
        {{ $slot }}
        </div>
        @include('layouts.footers.guest.description')

    @endif
    @endguest
    
    @livewire('modal.contactus')
    
</x-layouts.base>