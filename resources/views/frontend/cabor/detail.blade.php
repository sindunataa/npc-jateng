@extends('frontend.templates.main')

@section('content')

<section class="wf100 p100 inner-header">
    <div class="container">
        <h1>UpNext Events</h1>
        <ul>
            <li><a href="{{ url('/')}}">Beranda</a></li>
            <li><a href="{{route('cabor.FrontCabor')}}"> Cabor </a></li>
            <li><a href="#">{{$show->name}}</a></li>
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
                    <h3>{{$show->name}}</h3>
                    <ul class="post-meta">
                        
                    </ul>
                    <p> {!! $show->description !!}</p>
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