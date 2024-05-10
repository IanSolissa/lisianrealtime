<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="/js/searching.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>hallo</title>
        <link rel="stylesheet" href="/css/sidebar.css">
        <link rel="stylesheet" href="/css/dashboardindex.css">
        <link rel="stylesheet" href="/css/roomchat.css">
        <link rel="stylesheet" href="/css/homepage.css">
        <link rel="stylesheet" href="/css/manage_profile.css">
        <link rel="stylesheet" href="/css/managegroup.css">
        
        <link rel="stylesheet" type="text/css" href="/css/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    </head>
    <body>
        <div class="kontainer-dashboardindex">
            
            <div class="kontent1">
                @include('Dashboard.layouts.sidebar')
                
            </div>
            
            {{-- end sidebar --}}
            <div class="kontent2">
                @yield('homepage')
                @yield('roomchat')

            </div>
        </div>
        @yield('manage_profile')
        
        
    </section>
    {{-- <script src="{{ asset('resources/js/app.js') }}"></script> --}}
    @vite('resources/js/app.js')
    {{-- <script src="/js/Broadcast.js"></script> --}}
    
    <script>
        
    </script>
    
 
</body>
</html>