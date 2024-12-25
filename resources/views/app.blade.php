<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $seo ? $seo->title : 'Default Title' }}</title>
    <meta name="description" content="{{ $seo ? $seo->description : 'Default Description' }}"/>
    <meta name="keywords" content="{{ $seo ? $seo->keywords : 'Default Keywords' }}"/>

    <meta name="og:site_name" content="{{ $seo ? $seo->ogSiteName : 'Default Site Name' }}"/>
    <meta name="og:url" content="{{ $seo ? $seo->ogUrl : 'Default URL' }}"/>
    <meta name="og:title" content="{{ $seo ? $seo->ogTitle : 'Default OG Title' }}"/>
    <meta name="og:image" content="{{ $seo ? $seo->ogImage : 'Default Image URL' }}"/>
    <meta name="og:description" content="{{ $seo ? $seo->ogDescription : 'Default OG Description' }}"/>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/axios.min.js') }}"></script>
</head>

 
 <body class="d-flex flex-column h-100">
     @include('components.navbar')
     @include('components.loader')
 
     <div id="message-div" class="d-none my-3"></div>
<div id="loading-div" class="d-none text-center">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>
     <div class="" id="content-div">
         @yield('content')
     </div>
     @include('components.footer')
 
     <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
 </body>
 