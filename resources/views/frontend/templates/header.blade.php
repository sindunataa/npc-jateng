<header class="header-style-2">
   <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="{{ url('/')}}"><img src="{{ asset ('themeforest/images/logo-peparprov.png')}}" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
      <div class="collapse navbar-collapse justify-content-end pb-4" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item">
               <a class="nav-link" href="{{ url('/')}}"> Beranda </a>
            </li>
            <li class="nav-item"> 
               <a class="nav-link" href="{{ route('berita.index')}}">Berita</a> 
            </li>
            <li class="nav-item">
               <a class="nav-link" href="events-grid.html"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Profil </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('cabor.FrontCabor')}}"> Cabor </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('FrontSchedule')}}"> Schedule </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('FrontDownload')}}"> Download </a>
            </li>
         </ul>
         <div class="login">
            <a class="btn btn-danger mb-4 mr-4" href="{{ url('/login')}}" style="background-color: #990000; line-height: 0px; color: #fff; padding: 20px 40px 20px 40px;"> Login </a>
         </div>
      </div>
   </nav>
</header>