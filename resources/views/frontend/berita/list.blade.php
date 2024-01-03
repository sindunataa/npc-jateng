@extends('frontend.templates.main')

@section('content')
<section class="wf100 p100 inner-header">
<div class="container">
    <h1>UpNext Events</h1>
    <ul>
      <li><a href="{{ url('/')}}">Beranda</a></li>
      <li><a href="#"> Berita </a></li>
    </ul>
</div>
</section>
<!--Inner Header End--> 
<!--Causes Start-->
<section class="wf100 p80 events">
  <div class="event-list">
      <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
              <!--Project Box Start-->
              @foreach ($news as $new)
              <div class="pro-list-box">
                  <div class="pro-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="uploads/{{$new->image}}" alt=""> </div>
                  <div class="pro-txt">
                    <ul class="event-meta">
                        <li><i class="fas fa-calendar-alt"></i> {{$new->published_at}}</li>
                    </ul>
                    <h4> <a href="#">{{$new->title}}</a> </h4>
                    <p>{{$new->excerpt}}</p>
                    <a href="{{ route('berita.show',$new->slug) }}" class="partibtn">Lihat</a> 
                  </div>
              </div>
              <!--Project Box End-->
                
              @endforeach
            </div>
            
            <div class="col-lg-3 col-md-4">
              <div class="sidebar">
                  <!--Widget Start-->
                  <div class="side-widget">
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
                  <div class="side-widget text-widget">
                    <h5>Text Widget</h5>
                    <p> We are Ecova: eco &amp; environmental community. We need your support and help to Stop Globar Warning. Few generations ago it to seemed like world’s resources were infinite, and the people needed only to access them to create business, Lorem ipsum dolor it amet consect adipiscing. </p>
                  </div>
                  <!--Widget End--> 
                  <!--Widget Start-->
                  <div class="side-widget">
                    <h5>News &amp; Articles</h5>
                    <ul class="lastest-products">
                        <li> <img src="images/flp1.jpg" alt=""> <strong><a href="#">How you can keep alive wild animals for...</a></strong> <span class="pdate"><i class="fas fa-calendar-alt"></i> 29 September, 2018</span> </li>
                        <li> <img src="images/flp2.jpg" alt=""> <strong><a href="#">Eliminate your plastic bottle pollution</a></strong> <span class="pdate"><i class="fas fa-calendar-alt"></i> 29 September, 2018</span> </li>
                        <li> <img src="images/flp3.jpg" alt=""> <strong><a href="#">How you can keep alive wild animals for...</a></strong> <span class="pdate"><i class="fas fa-calendar-alt"></i> 29 September, 2018</span> </li>
                    </ul>
                  </div>
                  <!--Widget Start--> 
                  <!--Widget Start-->
                  <div class="side-widget project-list-widget">
                    <h5>Current Projects</h5>
                    <ul>
                        <li><a href="#">Waste Management</a></li>
                        <li><a href="#">Solar Energy</a></li>
                        <li><a href="#">Eco Ideas</a></li>
                        <li><a href="#">Recycling Materials</a></li>
                        <li><a href="#">Plant Ecology</a></li>
                        <li><a href="#">Saving Wildlife</a></li>
                        <li><a href="#">Water Resources</a></li>
                        <li><a href="#">Forest &amp; Tree Planting</a></li>
                        <li><a href="#">Wing Energy</a></li>
                    </ul>
                  </div>
                  <!--Widget End--> 
                  <!--Widget Start-->
                  <div class="side-widget">
                    <h5>Tags</h5>
                    <div class="single-post-tags"> <a href="#">Solar Energy</a> <a href="#"> Plant Ecology </a> <a href="#"> Wildlife </a> <a href="#"> Eco Ideas </a> <a href="#"> Waste Management </a> <a href="#"> Water </a> <a href="#"> Forest Planting </a> <a href="#"> Donation </a> <a href="#"> Wind Energy </a> <a href="#"> Recycling </a> </div>
                  </div>
                  <!--Widget End--> 
              </div>
            </div>
        </div>
        {{ $news->links('frontend.templates.paginate') }}
        
      </div>
  </div>
</section>


@endsection