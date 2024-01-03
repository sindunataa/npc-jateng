@extends('templates.main')

@section('title')
    {{'Add Schedule'}}
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
                    <h4 class="page-title">Add Schedule</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/schedules">List Schedule</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Schedule</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Schedule</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('schedules.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="competition_id" class="form-label">Competition :</label>
                                        <select type="text" name="competition_id" class="form-control" placeholder="competition_id" id="competition_id">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($competitions as $competition)
                                                <option value="{{$competition->id}}">{{$competition->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('competition_id')
                                            <label id="competition_id-error" class="error mt-2 text-danger"
                                                for="competition_id-error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="venue_id" class="form-label">Venue :</label>
                                        <select type="text" name="venue_id" class="form-control" placeholder="venue_id" id="venue_id">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($venues as $venue)
                                                <option value="{{$venue->id}}">{{$venue->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('venues')
                                            <label id="venues-error" class="error mt-2 text-danger"
                                                for="venues-error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cabor_id" class="form-label">Cabang Olahraga :</label>
                                        <select type="text" name="cabor_id" class="form-control" placeholder="cabor_id" id="cabor_id">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($cabors as $cabor)
                                                <option value="{{$cabor->id}}">{{$cabor->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('cabor')
                                            <label id="cabor-error" class="error mt-2 text-danger"
                                                for="cabor-error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title :</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                        @error('name')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="date" class="form-label">Date :</label>
                                        <input type="date" name="date" class="form-control" id="date" placeholder="Date">
                                    </div>
                                    <div class="form-group">
                                        <label for="time" class="form-label">Time :</label>
                                        <input type="time" name="time" class="form-control" id="time" placeholder="time">
                                        @error('address')
                                            <label id="address-error" class="error mt-2 text-danger"
                                                for="address">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="form-label">Content :</label>
                                        <textarea class="content" name="content"></textarea>
                                        @error('content')
                                            <label id="content-error" class="error mt-2 text-danger"
                                                for="content-error">{{ $message }}</label>
                                        @enderror
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
<script type="text/javascript">
$('.date-picker').datepicker({
                format: 'yy/mm/dd',
                autoclose: true,
                todayHighlight: true
            });
</script>
<script src="{{asset ('/assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
<script src="{{asset ('/assets/js/form-editor.js')}}"></script>
@endsection