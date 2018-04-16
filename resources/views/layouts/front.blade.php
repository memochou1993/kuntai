@php $time_start = microtime(true) @endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('common.head')
    </head>
    <body>
        <div id="loading">
            <center><img src="{{ asset('public/images/loading.svg') }}" id="loading-image" alt="Loading..."></center>
        </div>
        
        <div id="app">
            <a id="scroll-to-top"><i class="fas fa-arrow-circle-up"></i></a>

            @include('front/includes.navbar')

            <header>
                @include('front/includes.header')
            </header>

            <div class="container">
                @yield('content')
            </div>

            <footer>
                @include('front/includes.footer')
            </footer>

            @include('front/includes.warning')
        </div>
    </body>

    @include('common.scripts')
    <input type="hidden" value="{{ round(microtime(true) - $time_start, 2) }}" id="time_end">
</html>
