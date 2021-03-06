<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="simple file host">
    <meta name="keywords" content="file, files, direct file host, direct file hosting, file host, file hosting, file upload, file upload service, file hosting service, free file host, free file hosting, free file hosting service, share, sharing, file sharing, file sharing, file sharing host">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <link href="/assets/img/favicon.png" rel="shortcut icon" type="image/png">
    <link href="/assets/css/main.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <a class="noselect link handcursor" href="{{ route('index') }}">
                <h1 class="title">
                    FILESP<span class="spot"></span>T
                </h1>
            </a>
            {{-- @if (!Route::is('secret'))
            <a href="{{ route('secret') }}">
                <small>upload secret file</small>
            </a>
            @endif --}}
            
            @include('partials.messages')
        </div>

        @yield('body')

        <div class="footer">
            <span class="noselect">
                copyright &copy; {{ date('Y') }} filespot.me<br>
                <a href="{{ config('app.source') }}" target="_blank">view source on github</a>
            </span>
        </div>
    </div>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', '{{ config('services.google.analytics') }}', 'auto');
    ga('send', 'pageview');
</script>

@yield('scripts')

</html>
