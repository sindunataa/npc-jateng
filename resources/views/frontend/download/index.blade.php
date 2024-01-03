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
            
          <div class="table-responsive">
            <table class="table table-bordered table-striped text-nowrap mb-0" id="example1">
                <thead >
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Published At</th>
                        <th class="text-right">Download Files</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($downloads as $download)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $download->title }}</td>
                        <td>{{ $download->published_at }}</td>
                        <td class="text-right">
                          <a href="{{ asset('uploads/'. $download->path) }}" target="_blank" class="btn btn-danger btn-sm">Unduh</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            
        </div>
        {{-- {{ $news->links('frontend.templates.paginate') }} --}}
        
      </div>
  </div>
</section>


@endsection