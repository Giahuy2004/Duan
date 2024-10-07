<!DOCTYPE html>
<html lang="zxx">

@include('includes.header')

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    @include('includes.menu')
    @yield('content')
    @include('includes.footer')
</body>

</html>