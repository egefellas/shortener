<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>URL Shortener - Short URLs & Custom Free Link Shortener | sho.lc</title>
    <meta name="description"
          content="Free URL shortener to create perfect URLs for your business. sho.lc helps you create and share branded links with custom domains at scale. ✓ Check it out!">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Sho.lc | Custom URL Shortener, Link Management &amp; Branded Links">
    <meta property="og:description"
          content="Shorten, create and share trusted, powerful links for your business. Sho.lc's url and link shortener helps you with industry-leading features like custom domains, branded link and link redirects.">
    <meta property="og:url" content="https://sho.lc/">
    <meta property="og:site_name" content="sho.lc">
    <meta property="article:modified_time" content="2021-08-25T12:09:16+00:00">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Sho.lc | Custom URL Shortener, Link Management &amp; Branded Links">
    <meta name="twitter:description"
          content="Shorten, create and share trusted, powerful links for your business. Sho.lc's url and link shortener helps you with industry-leading features like custom domains, branded link and link redirects.">
    <link rel="canonical" href="https://sho.lc/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NZL5GJH');</script>
</head>
<body>
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZL5GJH"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
@if (auth()->check())
    @php
        $user_auth_data = [
            'isLoggedin' => true,
            'user' =>  auth()->user()
        ];
    @endphp
@else
    @php
        $user_auth_data = [
            'isLoggedin' => false
        ];
    @endphp
@endif
{{--
 @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
        @endauth
    </div>
@endif

 --}}
@yield('content')
@stack('scripts')
<script> window.Laravel = JSON.parse(atob('{{ base64_encode(json_encode($user_auth_data)) }}')); </script>
</body>
</html>
