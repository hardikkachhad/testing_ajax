<!DOCTYPE html>
<html lang="en">
@include('include.head')

<body data-sidebar="dark" data-layout-mode="light">
    <div id="layout-wrapper">
        @include('include.header')
        @yield('content')
        @include('include.sidebar')
        @include('include.script')
        @include('include.footer')
    </div>
</body>

</html>
