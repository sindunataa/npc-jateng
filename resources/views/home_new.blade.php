<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="canonical" href="{{ url()->current() }}" />
		<meta name="description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati" />
		<meta name="keywords" content="Pekan Paralympic Provinsi, Peparprov, Jawa Tengah, Pati"/>
		<meta property="bb:client_area" content="{{ url()->current() }}">
		<meta name="robots" content="index, follow, noodp">
		<meta property="og:url" content="{{ url()->current() }}" />
		<meta property="og:title" content="Peparprov ke-IV Jawa Tengah Tahun 2023" />
		<meta property="og:description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati" />
		<meta property="og:image" content="{{ asset('images/logo-peparprov-2023.jpg')}}" />
		<meta property="og:site_name" content="Kartunikah" />
		<meta property="og:locale" content="id_ID" />
		<meta property="og:type" content="website" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@seven_pion" />
		<meta name="twitter:title" content="Peparprov ke-IV Jawa Tengah Tahun 2023" />
		<meta name="twitter:description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati" />
		<meta name="twitter:image" content="{{ asset('images/logo-peparprov-2023.jpg')}}" />
		<meta itemprop="description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati">
		<meta content="NPCI Jawa Tengah" name="author">
    <title>Peparprov 2023</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;400;700&display=swap" rel="stylesheet">
    <style>
      
      body{
        background: rgb(140 0 0);
        background: linear-gradient(90deg, rgb(132 0 0) 0%, rgb(173 41 0) 35%, rgb(241 135 0) 100%);
        height: 100%;
        font-family: 'Kanit', sans-serif;
      }
      .logo-home{
          position: fixed;
          width: 300px;
          z-index: 1;
      }
      .countdownflip{
        scale: 0.8;
      }
      .countdowncontent{ 
        display: flex; 
        align-items: center; 
        justify-content: center;
      }
      .heading-1{
        font-family: 'Kanit', sans-serif;
        color: #fff;
        font-weight: 800;
        margin-top:20vh;
      }
      .title-1{
        font-family: 'Kanit', sans-serif;
        color: #fff;
      }
      .logo-side{
        /* width: 50%; */
        height: auto;
        position: absolute;
        right:0;
        bottom: 0;
        z-index: -15;
      }
      .heading-hr{
        border: 1px solid white;
      }
      @media screen and (max-width: 480px) {
        .countdownflip{
          scale: 1;
        }
        .flip-clock-divider .flip-clock-label {
          right:-1.7em;
        }
        .heading-text{
          background:linear-gradient(180deg, rgb(0 0 0 / 0%) 0%, rgb(0 0 0 / 71%) 60%, rgb(0 0 0 / 0%) 100%);
        }
        .maskot-home{
          width:90px;
          height: auto;
        }
      }
    </style>
</head>
<body>
  <img src="{{ asset('images/logo-home.png') }}" alt="" class="logo-home" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
    {{-- <h4 align="center">Days Until Christmas</h4> --}}
    <section id="count-up-section" class="count-up-section">
      <div class="container">

        <div class="row">
          <div class="col-md-6 heading-text">
            <h1 class="heading-1">Patah Tumbuh Hilang Berganti, Tanpa Batas Raih Prestasi</h1>
            <hr class="heading-hr">
            <h6 class="title-1">Persiapkan diri anda untuk Pekan Paralimpik Provinsi (PEPARPROV) Jawa Tengah IV Di Kabupaten Pati Tahun 2023</h6>    
          </div>
          <div class="col-xs-12 countdowncontent" >
            <div class="flipTimemodulesboxes countdownflip">

              <div class="flipTimebox">
                <div class="flipclock1"></div>
                <div class="flipclock1message"></div>
              </div>

            </div>

          </div>
          <!-- end col -->
        </div>
        <!-- end row -->

      </div>
      <!-- end container -->
      
    </section>
  <img src="{{ asset('images/maskot-home.png') }}" alt="" class="maskot-home" data-aos="zoom-in-left" data-aos-easing="linear" data-aos-duration="1000">
  <img src="{{ asset('images/logo-side.png') }}" alt="" class="logo-side" data-aos="zoom-in-left" data-aos-easing="linear" data-aos-duration="1000">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="{{ asset('js/countdown.js') }}"></script>
  <script>
    AOS.init();
    /*line 1070 to change the date countdown:  {var dt1 = "08/25/" + dt.getFullYear() + " 00:00:01 am +0000";} */

  </script>
</body>
</html>
