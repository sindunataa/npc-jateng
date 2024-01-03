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
    <style>
        body{
            position: absolute;
            content: '';
            width: 100%;
            height: auto;
            background: url(/images/bg-home-peparprov.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top;
            margin:0;
            font-family: 'Inter', sans-serif;
        }
        .logo-home{
            position: fixed;
            width: 300px;
            z-index: 1;
        }
        .list-countdown{
            text-align: center;
            background: url(/images/countdown.png);
            background-size: cover;
            height: 112px;
            /* margin-top:100px; */
        }
        .content{
          margin-top:6rem;
        }
        .maskot-home{
          width: 50%;
          height: auto;
          position: absolute;
          right:5px;
          top: 137px;
          z-index: -10;
        }
        .box-countdown{
          border-radius: 10px;
          background-color: rgba(0, 0, 0, 0.286);
          width: 100%;
          height: 220px;
          margin: auto;
          position: relative;
        }
        hr{
          width: 50%;
          border: 1px solid white;
        }
    </style>
</head>
<body>
    <img src="{{ asset('images/logo-home.png') }}" alt="" class="logo-home" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
    <div class=""> 
      <div class="content col-md-8 p-4" data-aos="fade-down-left" data-aos-easing="linear" data-aos-duration="500">
          <h1 class="p-2 text-light font-weight-bold text-center">Patah Tumbuh Hilang Berganti, Tanpa Batas Raih Prestasi</h1>
          <br>
          <div class="row justify-content-center box-countdown">
            <div>
              <h4 class="mt-4 text-light text-center">COUNTDOWN</h4>
              <hr>
              <p class="m-4  text-light text-center">Persiapkan diri anda untuk Pekan Paralimpik Provinsi (PEPARPROV) Jawa Tengah IV Di Pati Tahun 2023</p>
            </div>
            <div class="col-2 list-countdown mx-1 py-3" >
              <h1 id="hari"></h1>
              <h5>Hari</h5>
            </div>
            <div class="col-2 list-countdown mx-1 py-3" >
              <h1 id="jam"></h1>
              <h5>Jam</h5>
            </div>
            <div class="col-2 list-countdown mx-1 py-3" >
              <h1 id="menit"></h1>
              <h5>Menit</h5>
            </div>
            <div class="col-2 list-countdown mx-1 py-3" >
              <h1 id="detik"></h1>
              <h5>Detik</h5>
            </div>
          </div>
      
      </div>
      <img src="{{ asset('images/maskot-home.png') }}" alt="" class="maskot-home" data-aos="zoom-in-left" data-aos-easing="linear" data-aos-duration="1000">
      <div class="col-md-4 p-4">
      </div>
    </div>
    <center> 
       <small id="demo" style="color: black" hidden> </small>
      
      </center>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
        AOS.init();
      // Set the date we're counting down to
      var countDownDate = new Date("Sep 09, 2023 23:37:25").getTime();
      
      // Update the count down every 1 second
      var x = setInterval(function() {
      
        // Get todays date and time
        var now = new Date().getTime();
      
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
      
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      
        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
        document.getElementById("hari").innerHTML = days ;
        document.getElementById("jam").innerHTML = hours ;
        document.getElementById("menit").innerHTML = minutes ;
        document.getElementById("detik").innerHTML = seconds ;
      
        // If the count down is finished, write some text 
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "EXPIRED" ;
          document.getElementById("hari").innerHTML = "EXPIRED" ;
          document.getElementById("jam").innerHTML = "EXPIRED" ;
          document.getElementById("menit").innerHTML = "EXPIRED" ;
          document.getElementById("detik").innerHTML = "EXPIRED" ;
        }
      }, 1000);
      </script>
</body>
</html>
