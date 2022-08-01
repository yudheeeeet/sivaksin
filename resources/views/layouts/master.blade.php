<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body class="sb-nav-fixed">
    
    @yield('content')
    
    @include('layouts.footer')
    
    @yield('script')
    
    @yield('modal')
    
    
</body>

</html>