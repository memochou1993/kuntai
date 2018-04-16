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

    @include('common.scripts')
    <input type="hidden" value="{{ round(microtime(true) - $time_start, 2) }}" id="time_end">
</html>
