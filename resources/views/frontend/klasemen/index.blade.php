@extends('frontend.templates.main')

@section('content')

<section class="wf100 p100 inner-header">
   <div class="container">
      <h1>Klasemen</h1>
      <ul>
         <li><a href="{{ url('/')}}">Beranda</a></li>
         <li><a href="{{route('klasemen')}}"> Klasemen </a></li>
         {{-- <li><a href="#">{{$show->title}}</a></li> --}}
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
                  
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kontingen</th>
                                    <th>Gold</th>
                                    <th>Silver</th>
                                    <th>Bronze</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($klasemen as $key => $klasemens)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $klasemens->name }}</td>
                                    <td>{{ $klasemens->gold_count }} </td>
                                    <td>{{ $klasemens->silver_count }}</td>
                                    <td>{{ $klasemens->bronze_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                </div>
                  
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