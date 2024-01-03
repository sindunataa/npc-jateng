<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="{{ asset ('themeforest/img/logo-favicon.png')}}">
      <title>{{ @$page_title ? $page_title : $meta['title'] }}</title>
      <meta name="twitter:title" content="{{ @$meta_title ? $meta_title : $meta['title'] }}" />
      <meta property="og:title" content="{{ @$meta_title ? $meta_title : $meta['title'] }}" />
      <meta name="description" content="{{ @$meta_description ? $meta_description : $meta['description'] }}" />
      <meta property="og:description" content="{{ @$meta_description ? $meta_description : $meta['description'] }}" />
      <meta name="twitter:description" content="{{ @$meta_description ? $meta_description : $meta['description'] }}" />
      <meta itemprop="description" content="{{ @$meta_description ? $meta_description : $meta['description'] }}">
      <meta name="robots" content="index, follow, noodp">
      <meta name="keywords" content="{{ @$meta_keyword ? $meta_keyword : $meta['keyword'] }}"/>
      <meta property="og:site_name" content="{{ @$meta_site ? $meta_site : $meta['site'] }}" />
      <meta name="twitter:site" content="{{ @$meta_twitter ? $meta_twitter : $meta['twitter'] }}" />
      <meta property="og:locale" content="id_ID" />
      <meta property="og:type" content="website" />
      <meta name="twitter:card" content="summary" />
      <meta property="og:image" content="{{ @$meta_image ? $meta_image : $meta['image'] }}" />
      <meta name="twitter:image" content="{{ @$meta_image ? $meta_image : $meta['image'] }}" />
      <!-- CSS FILES START -->
      <link href="{{ asset ('themeforest/css/custom.css')}}" rel="stylesheet">
      <link href="{{ asset ('themeforest/css/color.css')}}" rel="stylesheet">
      <link href="{{ asset ('themeforest/css/responsive.css')}}" rel="stylesheet">
      <link href="{{ asset ('themeforest/css/owl.carousel.min.css')}}" rel="stylesheet">
      <link href="{{ asset ('themeforest/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{ asset ('themeforest/css/prettyPhoto.css')}}" rel="stylesheet">
      <link href="{{ asset ('themeforest/css/all.min.css')}}" rel="stylesheet">
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <!-- CSS FILES End -->
        <style>
            .countdownflip{
        scale: 1;
        }
        .countdowncontent{
            height: 0vh; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            margin-top: 20px;
            padding: 30px 35px;
        }
        </style>
        @yield('head')
   </head>
   <body>
      <div class="wrapper home2">
            <!--Header Start-->
            @include('frontend.templates.header')
            <!--Header End--> 
            @yield('content')
            @include('frontend.templates.footer')

      </div>
      <!--   JS Files Start  --> 
      <script src="{{ asset ('themeforest/js/jquery-3.3.1.min.js')}}"></script> 
      <script src="{{ asset ('themeforest/js/jquery-migrate-1.4.1.min.js')}}"></script> 
      <script src="{{ asset ('themeforest/js/popper.min.js')}}"></script> 
      <script src="{{ asset ('themeforest/js/bootstrap.min.js')}}"></script> 
      <script src="{{ asset ('themeforest/js/owl.carousel.min.js')}}"></script> 
      <script src="{{ asset ('themeforest/js/jquery.prettyPhoto.js')}}"></script> 
      <script src="{{ asset ('themeforest/js/isotope.min.js')}}"></script> 
      <script src="{{ asset ('themeforest/js/custom.js')}}"></script>
      <script src="{{ asset ('themeforest/js/slider.js')}}"></script>
      <script src="{{ asset('js/countdown.js') }}"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
      <script src="https://kit.fontawesome.com/a2eb7cef35.js" crossorigin="anonymous"></script>
      <script>
        AOS.init();
            /*line 1070 to change the date countdown:  {var dt1 = "08/25/" + dt.getFullYear() + " 00:00:01 am +0000";} */
        </script>
   </body>
</html>