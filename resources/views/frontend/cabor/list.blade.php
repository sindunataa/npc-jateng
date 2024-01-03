@extends('frontend.templates.main')

@section('content')

<section class="wf100 p100 inner-header">
    <div class="container ">
        <h1>CABANG OLAHRAGA</h1>
        <ul>
          <li><a href="{{ url('/')}}">Beranda</a></li>
          <li><a href="#"> Cabor </a></li>
        </ul>
    </div>
    </section>

    <section class="shop wf100 p80">
        <div class="container">
           <div class="row">

              <!--Pro Box Start-->
              @foreach ($cabor as $item)
              <div class="col-lg-3 col-sm-6">
                 <div class="product-box">
                    <div class="pro-thumb"> <a href="{{ route('cabor.FrontCaborDetail',$item->slug) }}">{{$item->name}}</a> <img src="{{asset('uploads/'.$item->image)}}" alt=""></div>
                 </div>
              </div>
              @endforeach
              <!--Pro Box End--> 
              
           </div>
           
        </div>
     </section>

@endsection