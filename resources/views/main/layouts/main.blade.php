@include('main.layouts.header')

@include('alerts.flash')
<div class="container">
    @yield('content')
</div>

@include('main.layouts.footer')
