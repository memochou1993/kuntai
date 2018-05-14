<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('common.head')
    </head>
    <body>
        <div id="app">
            @include('admin/includes.navbar')
            
            <header>
                @include('admin/includes.header')
            </header>

            <div class="container">
                @yield('content')
            </div>

            <footer class="my-5">
                &nbsp;
            </footer>
        </div>
    </body>

    @include('admin/includes.scripts')
</html>
