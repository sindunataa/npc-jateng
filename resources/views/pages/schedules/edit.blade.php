@extends('templates.main')

@section('title')
    {{'Edit Schedule'}}
@endsection

@section('head')
<link href="{{ asset('/assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet" />
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Edit Schedule</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/schedules">List Schedule</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Schedule</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Schedule</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('schedules.update',['id'=> $edit->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="competition_id" class="form-label">Competition:</label>
                                        <select type="text" name="competition_id" class="form-control" placeholder="competition_id" id="competition_id">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($item1 as $competition)
                                            
                                            <option value="{{$competition->id}}" {{($competition->id == $edit->competition_id)?"selected":"";}}>{{$competition->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="venue_id" class="form-label">Venue:</label>
                                        <select type="text" name="venue_id" class="form-control" placeholder="venue_id" id="venue_id">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($item2 as $venue)
                                            
                                            <option value="{{$venue->id}}" {{($venue->id == $edit->venue_id)?"selected":"";}}>{{$venue->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title :</label>
                                        <input type="text" name="title" value="{{ $edit->title }}" class="form-control" id="title" placeholder="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="date" class="form-label">Date :</label>
                                        <input type="text" name="date" class="form-control" id="date" value="{{ $edit->date }}" placeholder="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="time" class="form-label">Time :</label>
                                        <input type="text" name="time" class="form-control" id="time" value="{{ $edit->time }}" placeholder="time">
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="form-label">Content :</label>
                                        <textarea class="content" name="content">{{ $edit->content }}</textarea>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary mt-2 mb-0">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->

        </div>
    </div>

</section>

</main>
    
@endsection

@section('js')

<script src="{{asset ('/assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
<script src="{{asset ('/assets/js/form-editor.js')}}"></script>
    
@endsection
