<!DOCTYPE html>
<html lang="fa">

<head>
    @include('home.layouts.head-tag')
    @yield('head-tag')
    <meta name="description" content="@yield('description')">
    
    <title>Hotel App @yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <!-- etc -->

</head>

<body>

    @include('home.layouts.header')
    @yield('header')
    <main id="main-body-one-col" class="main-body">

        @yield('content')

    </main>

    @include('home.layouts.footer')



    @include('home.layouts.script')
    @yield('script')


</body>

</html>