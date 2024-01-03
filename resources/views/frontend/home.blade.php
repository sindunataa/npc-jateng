@extends('frontend.templates.main')
@section('head')
    <style>
      /* @foreach ($sliders as $key => $item)
      .atlet li:nth-child({{$key    + 1}}){
         background:linear-gradient(to right, rgba(1,1,1,0.8) 10%, rgba(1,1,1,0.5) 51%, rgba(1,1,1,0.2) 100%), url("{{asset('uploads/'.$item->image)}}");
         background-size: cover;
         background-position:top left;
      } 
      @endforeach */
      

    </style>
@endsection
@section('content')
   <!--Slider Start--> 
   <section class="atlet">
      <ul>
      @foreach ($sliders as $key => $item)
         <li style='background:linear-gradient(to right, rgba(1,1,1,0.8) 10%, rgba(1,1,1,0.5) 51%, rgba(1,1,1,0.2) 100%), url("{{asset('uploads/'.$item->image)}}");
                     background-size: cover;
                     background-position:top left;'>
               <article class="center-y padding_2x">
                  <h3 class="big title"><em>{{$item->name}}</em></h3>
                  <p>{{$item->excerpt}}</p>	 
                  <a href="{{$item->url}}" class="btn btn_3">Lihat Selengkapnya</a>
               </article>
         </li>
         @endforeach
         
         <aside>
            @foreach ($sliders as $item)
            
               <a href="#"></a>

               @endforeach
         </aside>
      </ul>
   </section>
   <!--Slider End-->

   <!--Count-up Area Start-->
   <section class="donation-join wf100">
      <div class="container">
            <div class="row">
               <div class="col-md-4">
                     <div class="donation-wrap">
                        <h2>Patah Tumbuh Hilang Berganti, Tanpa Batas Raih Prestasi</h2>

                     </div>
               </div>
               <div class="col-md-8 countdowncontent" >
                     <div class="flipTimemodulesboxes countdownflip">
         
                        <div class="flipTimebox">
                           <div class="flipclock1"></div>
                           <div class="flipclock1message"></div>
                        </div>
         
                     </div>
               </div>
            </div>

      </div>
      <div class="count-text-bottom col-md-12 d-flex justify-content-center align-items-center">
         <p>Pekan Paralimpik Provinsi di Kabupaten Pati</p>
         <a class="btn btn-md" style="background-color: #990000; color:#fff; padding: 5px 40px 5px 40px; 	border: 1px solid #fff;;" href="#">PEPARPROV 2023</a>
      </div>
   </section>
   <!--Count-up Area End--> 

   <section class="wf100 about">
      <div class="about-video-section wf100">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="about-text">
                     <h2>Lorem ipsum dolor sit consectetur nagna ex adipiscing elit</h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                     <a href="#">Lihat</a> 
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="about-video-img"> <img src="{{asset ('/assets/img/atlet-4.png')}}" style="border-radius: 20px;" alt=""> </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="wf100 p80 current-projects">
      <div class="container">
         <div class="row">
            <div class="col-lg-6">
               <img class="shape" src="{{asset ('/assets/img/news-shape2.svg')}}" alt="">
               <div class="section-title-2">
                  <h2>Berita Terkini</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="tab-content" id="myTabContent">
                  <!--WildLife Slider Start-->
                  <div class="tab-pane fade show active" id="wildlife" role="tabpanel" aria-labelledby="wildlife-tab">
                     <div class="cpro-slider owl-carousel owl-theme">
                        <!--Pro Box-->
                        <div class="item">
                           <div class="pro-box">
                              <img src="{{asset ('/assets/img/atlet-5.png')}}" alt="">
                              <h5>Lorem ipsum dolor sit amet,</h5>
                              <div class="pro-hover">
                                 <h6>Lorem ipsum dolor sit amet,</h6>
                                 <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                 <a href="#">Lihat</a> 
                              </div>
                           </div>
                        </div>
                        <!--Pro Box End--> 
                        <!--Pro Box-->
                        <div class="item">
                           <div class="pro-box">
                              <img src="{{asset ('/assets/img/atlet-6.png')}}" alt="">
                              <h5>2 Lorem ipsum dolor sit amet,</h5>
                              <div class="pro-hover">
                                 <h6>2 Lorem ipsum dolor sit amet,</h6>
                                 <p>2 Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                 <a href="#">Lihat</a> 
                              </div>
                           </div>
                        </div>
                        <!--Pro Box End--> 
                        <!--Pro Box-->
                        <div class="item">
                           <div class="pro-box">
                              <img src="{{asset ('/assets/img/atlet-5.png')}}" alt="">
                              <h5>3 Lorem ipsum dolor sit amet,
                              </h5>
                              <div class="pro-hover">
                                 <h6>3 Lorem ipsum dolor sit amet,</h6>
                                 <p>3 Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                 <a href="#">Lihat</a> 
                              </div>
                           </div>
                        </div>
                        <!--Pro Box End--> 
                        <!--Pro Box-->
                        <div class="item">
                           <div class="pro-box">
                              <img src="{{asset ('/assets/img/atlet-6.png')}}" alt="">
                              <h5>4 Lorem ipsum dolor sit amet,</h5>
                              <div class="pro-hover">
                                 <h6>4 Lorem ipsum dolor sit amet,</h6>
                                 <p>4 Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                 <a href="#">Lihat</a> 
                              </div>
                           </div>
                        </div>
                        <!--Pro Box End--> 
                     </div>
                  </div>
                  <!--WildLife Slider End--> 
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="promises wf100 p80">
      <div class="container">
         <div class="row">
            <div class="col-md-7">
               <div class="pro-title">
                  <h2>Lorem ipsum dolor sit consectetur nagna ex adipiscing elit</h2>
               </div>
            </div>
            <div class="col-md-5">
               <div class="pro-title">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
               </div>
            </div>
         </div>
         <div class="partner-logos wf100">
            <div class="container">
               <div id="partner-logos" class="owl-carousel owl-theme">
               @foreach ($cabor as $item)
                  <a href="{{ route('cabor.FrontCaborDetail',$item->slug) }}" class="item"><img src="{{asset('uploads/'.$item->image)}}" alt=""></a>
               @endforeach
            </div>
         </div>
      </div>
   </section>

   <section class="wf100 p80 blog">
      <div class="blog-grid">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <img class="shape" src="{{asset ('/assets/img/news-shape2.svg')}}" alt="">
                  <div class="section-title-2">
                     <h2>Semua Berita</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-8">
                  <div class="row">

                     @foreach ($news as $item)
                     <div class="col-md-6">
                        <div class="blog-post">
                           <div class="blog-thumb"> <a href="{{ route('berita.show',$item->slug) }}"><i class="fas fa-link"></i></a> <img src="{{asset ('/uploads/'. $item->image)}}" alt=""> </div>
                           <div class="post-txt">
                              <h5><a href="{{ route('berita.show',$item->slug) }}">{{$item->title}}</a></h5>
                              <ul class="post-meta">
                                 <li> <a href="#"><i class="fas fa-calendar-alt"></i>{{$item->published_at}}</a> </li>
                              </ul>
                              <p>{{$item->excerpt}}</p>
                              <a href="{{ route('berita.show',$item->slug) }}" class="read-post">Read Post</a>
                           </div>
                        </div>
                     </div>
                     @endforeach

                  </div>
               </div>
               <div class="col-md-4">
                  <div class="sidebar"> 
                     <!--Widget Start-->
                     <div class="side-widget search-widget">
                        <h5>Search</h5>
                        <div class="side-search">
                           <form>
                           <input type="search" class="form-control" placeholder="Search">
                           <button><i class="fas fa-search"></i></button>
                           </form>
                        </div>
                     </div>
                     <!--Widget End--> 
                     
                     <!--Widget Start-->
                     <div class="side-widget project-list-widget">
                        <h5>Berita Cabor</h5>
                        
                        <div class="pro-list-box">
                           <div class="pro-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="{{asset ('/assets/img/atlet-5.png')}}" alt=""> </div>
                           <div class="pro-txt">
                              <h6> <a href="#">Bulu Tangkis</a> </h6>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit cons</p>
                           </div>
                        </div>
                        <div class="pro-list-box">
                           <div class="pro-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="{{asset ('/assets/img/atlet-5.png')}}" alt=""> </div>
                           <div class="pro-txt">
                              <h6> <a href="#">Bulu Tangkis</a> </h6>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit cons</p>
                           </div>
                        </div>
                        <div class="pro-list-box">
                           <div class="pro-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="{{asset ('/assets/img/atlet-5.png')}}" alt=""> </div>
                           <div class="pro-txt">
                              <h6> <a href="#">Bulu Tangkis</a> </h6>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit cons</p>
                           </div>
                        </div>
                           
                     </div>
                     <!--Widget End--> 
                     
                  </div>
               </div>
            </div>
            
            
         </div>
      </div>
   </section>

   <section class="gallery">
      <div class="container">
            <h2>Gallery</h2>
            <i class="fa-solid fa-chevron-left mt-3"></i>
            <i class="fa-brands fa-instagram fa-xl"></i>
            <i class="fa-solid fa-chevron-right"></i>
         </div>
         <div class="instagram p80">
            <ul>
               @foreach ($galleries as $item)
               <li> <a href="{{$item->url}}"> <i class="fas fa-search"></i> </a> <img src="{{asset ('/uploads/'. $item->image)}}" alt=""> </li>
               @endforeach
               
            </ul>
         </div>
   </section>
@endsection