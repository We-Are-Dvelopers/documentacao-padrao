<!DOCTYPE html>
<html lang="en">

<head>
    <title>Panasonic - Documentação</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap Documentation Template For Software Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
   

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.2/styles/atom-one-dark.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/simplelightbox/simple-lightbox.min.css') }}">

        @yield('assets')

</head>

<body>
    <header class="header fixed-top">

        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
                    <div class="site-logo"><a class="navbar-brand" href="index.html"><img class="logo-icon me-2"
                                src="{{asset('assets/images/logo.png')}}" alt="logo"></span></a></div>
                </div>
                <!--//docs-logo-wrapper-->
                <div class="docs-top-utilities d-flex justify-content-end align-items-center">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link active" href="{{route('admin.index')}}">Home</a>
                                    <a class="nav-link " href="{{route('admin.conteudos.index')}}">Conteúdos</a>
                                    <a class="nav-link" href="{{route('admin.categorias.index')}}">Categorias</a>

                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!--//docs-top-utilities-->
            </div>
            <!--//container-->
        </div>
        <!--//branding-->
    </header>
    <!--//header-->



    <div class="page-content mt-5">
        <div class="container">
          @yield('content')
        </div>
        <!--//container-->
    </div>
    <!--//page-content-->


    <!-- Javascript -->
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Page Spe{{ asset('c') }}ific JS -->
    <script src="{{ asset('assets/plugins/smoothscroll.min.js') }}"></script>
    <script
        src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js') }}">
    </script>
    <script src="{{ asset('assets/js/highlight-custom.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplelightbox/simple-lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/gumshoe/gumshoe.polyfills.min.js') }}"></script>
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
  $('.editor').summernote();
});
    </script>

      @yield('scripts')
</body>

</html>
