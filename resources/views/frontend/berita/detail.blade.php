@extends('frontend.templates.main')

@section('content')

<section class="wf100 p100 inner-header">
   <div class="container">
      <h1>UpNext Events</h1>
      <ul>
         <li><a href="{{ url('/')}}">Beranda</a></li>
         <li><a href="{{route('berita.index')}}"> Berita </a></li>
         <li><a href="#">{{$show->title}}</a></li>
      </ul>
   </div>
</section>
<!--Inner Header End--> 
<!--Blog Start-->
<section class="wf100 p40 blog">
   <div class="blog-details">
      <div class="container">
         <div class="row">
               
            <div class="col-lg-12 col-md-12">
               <!--Blog Single Content Start-->
               <div class="blog-single-content">
                  <div class="blog-single-thumb"><img src="{{asset('uploads/'.$show->image)}}" alt=""></div>
                  <h3>{{$show->title}}</h3>
                  <ul class="post-meta">
                     <li><i class="fas fa-calendar-alt"></i> {{$show->published_at}}</li>
                     <li><i class="fas fa-comments"></i> 134 Comments</li>
                     <li class="tags"><i class="fas fa-tags"></i> <a href="#">Plant</a> <a href="#">Trees</a> <a href="#">Water</a> <a href="#">Recycling</a></li>
                  </ul>
                  <p> The environment includes; the surface of the earth, natural re­sources, land and water, mountains and plains, fertile lands and deserts, oceans, storms and cy­clones, weather and climatic factors, seasons, etc. It also includes biological conditions such as plants, animals with all their complexities.</p>
                  <p>We are going to run a solid educational campaign for the orphan children study. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>
                  <p>You need to be sure there isn't anything embarrassing hidden in the middle of text. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage. </p>
                  <p> Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. </p>
                  <h5>Elect the Leader who is Peacemaker for the country</h5>
                  <p> Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapien delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis. </p>
                  <ul class="check-list">
                     <li>Aliquam eget tellus sed dolor accumsan imperdiet.</li>
                     <li> Nunc interdum arcu vel massa faucibus imperdiet.</li>
                     <li> Vestibulum sollicitudin odio nec faucibus venenatis.</li>
                     <li> Etiam iaculis nunc et iaculis sodales.</li>
                  </ul>
                  
               </div>
               <!--Blog Single Content End--> 
            </div>
            
            <!--Sidebar Start-->
            
            <!--Sidebar End--> 
         </div>
      </div>
   </div>
</section>
@endsection