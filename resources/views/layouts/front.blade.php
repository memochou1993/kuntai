<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('common.head')
    </head>
    <body>
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

    @include('front/includes.scripts')
</html>
