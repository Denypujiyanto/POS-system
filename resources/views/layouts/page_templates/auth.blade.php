<div class="wrapper">

    @include('layouts.navbars.auth')
    <div class="main-panel">
        @include('layouts.navbars.navs.auth')
        @if(session('message'))
        <x-alert :type="session('type')" :message="session('message')" />
        @endif
        @yield('content')
        @include('layouts.footer')
    </div>
</div>