<head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <meta name="description" content="" />
     <meta name="author" content="" />
     <title>MR-X</title>
     <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
     <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
     <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
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
 
     <script src="{{ asset('js/axios.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
 </body>
 