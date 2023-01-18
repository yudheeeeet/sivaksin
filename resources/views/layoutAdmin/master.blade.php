<!DOCTYPE html>
<html lang="en">

@include('layoutAdmin.header')

<body class="sb-nav-fixed">
    
    @include('layoutAdmin.navbar')

    @yield('content')
    
    @include('layoutAdmin.footer')
    
    @yield('script')
    
    @yield('modal')
    
</body>

</html>