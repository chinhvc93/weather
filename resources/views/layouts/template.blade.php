<!DOCTYPE html>
<html lang="en">
@include('layouts.includes.head')
<body>
    <div class="wrapper">
        <!-- SIDEBAR -->
        @include('layouts.includes.sidebar')
        <!-- ../SIDEBAR -->
        <div class="main-panel">
        <!-- NAVBAR -->
        @include('layouts.includes.navbar')
        <!-- ../NAVBAR -->
        <!-- ../MAIN -->
        @yield('content')
        <!-- ../MAIN -->
        <!-- FOOTER -->
        @include('layouts.includes.footer')
        <!-- ../FOOTER -->
        </div>
        <!-- MODAL -->
        @yield('modals')
        <!-- ../MODAL -->
    </div>

    @include('layouts.includes.script')
    @stack('scripts')
</body>
</html>