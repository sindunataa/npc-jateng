@extends('frontend.templates.main')

@section('content')

<section class="wf100 p100 inner-header">
   <div class="container">
      <h1>Jadwal Pertandingan</h1>
      <ul>
         <li><a href="{{ url('/')}}">Beranda</a></li>
         <li><a href="{{route('berita.index')}}"> Jadwal </a></li>
      </ul>
   </div>
</section>
<!--Blog End--> 
<section class="wf100 p80 events">
    <div class="event-list-two">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
                <input type="date" id="tanggal">
                <div class="form-group">
                    <label for="cabor_id" class="form-label">Cabang Olahraga :</label>
                    <select type="text" name="cabor_id" class="form-control @error('cabor_id') is-invalid @enderror" placeholder="cabor_id" id="cabor">
                            <option label="Pilih Salah Satu"></option>
                        @foreach ($item3 as $cabor)
                            <option value="{{$cabor->id}}">{{$cabor->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="partner-logos wf60">
                    <div id="partner-logos" class="owl-carousel owl-theme">
                    @foreach ($item3 as $cabor)
                        <img src="{{asset('uploads/'.$cabor->image)}}" alt="">
                    @endforeach
                    </div>
                </div>
    
                @foreach ($schedules as $schedule)
                <!--Event Box Start-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Event</th>
                                    <th>Title</th>
                                    <th>Venue</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $key => $schedule)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ date('d F Y', strtotime($schedule->published_at));}}</td>
                                    <td>{{ $schedule->time }} </td>
                                    <td>{{ $schedule->competition->name }}</td>
                                    <td>{{ $schedule->title }}</td>
                                    <td>{{ $schedule->venue->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                </div>

                {{-- <div class="event-list-box">
                   <ul class="event-meta">
                      <li> <strong>Tanggal:</strong> {{ date('d F Y', strtotime($schedule->published_at));}}</li>
                      <li> <strong>Jam:</strong> {{ $schedule->time }}</li>
                      <li> <strong>Lokasi:</strong> {{ $schedule->venue->name }} </li>
                   </ul>
                   <div class="event-txt">
                      <h4> <a href="#">{{ $schedule->title }}</a> </h4>
                      <p>{!! $schedule->content !!}</p>
                      <a href="#" class="attbtn">Lihat</a> 
                   </div>
                </div> --}}
                <!--Event Box End-->
                @endforeach
             </div>

          </div>

       </div>
    </div>
 </section>
@endsection