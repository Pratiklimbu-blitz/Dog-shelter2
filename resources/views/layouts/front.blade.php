<!DOCTYPE html>
<html class="no-js" lang="en">
    @include('_partials.front._head')
    <body>
        @include('_partials.front._header')
        <main class="main-content">
            @yield('content')
        </main>
        @include('_partials.front._footer')
        @include('_partials.front._foot')
        @include('utils._alertify')
        @include('utils._toastify')
        @stack('scripts')
    </body>
</html>
