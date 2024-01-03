@extends('templates.main')

@section('title')
    {{'Add Entry by Number'}}
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Add Entry by Number</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/contingents">List Entry by Number</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Entry by Number</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h4 class="card-title">Add New Entry by Number</h4> --}}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('entry_numbers.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="cabor_id" class="form-label">Cabang Olahraga :</label>
                                        <select type="text" name="cabor_id" class="form-control @error('cabor_id') is-invalid @enderror" placeholder="cabor_id" id="cabor" >
                                                <option value="" label="Pilih Salah Satu"></option>
                                            @foreach ($cabors as $cabor)
                                                <option value="{{$cabor->id}}">{{$cabor->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('cabor_id')
                                            <label id="name-error" class="error mt-2 text-danger" for="cabor_id">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="form-label">Jenis Disabilitas :</label>
                                        <select type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                            <option value="" label="Pilih Salah Satu"></option>
                                        </select>
                                        @error('status')
                                            <label id="name-error" class="error mt-2 text-danger" for="status">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="classification_id" class="form-label">Klasifikasi :</label>
                                        <select type="text" name="classification_id" class="form-control @error('classification_id') is-invalid @enderror" placeholder="classification_id" id="classification">
                                                <option value="" label="Pilih Salah Satu"></option>
                                        </select>
                                        @error('classification_id')
                                            <label id="name-error" class="error mt-2 text-danger" for="classification_id">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="classification_id" class="form-label">Status Klasifikasi :</label>
                                        <select type="text" name="status_classification" class="form-control @error('status_classification') is-invalid @enderror" placeholder="status_classification" id="status_classification">
                                                <option value="Confirm International">Confirm International</option>
                                                <option value="Confirm Nasional">Confirm Nasional</option>
                                                <option value="Confirm Daerah">Confirm Daerah</option>
                                                <option value="Review Nasional">Review Nasional</option>
                                                <option value="Review Daerah">Review Daerah</option>
                                                <option value="New">New</option>
                                        </select>
                                        @error('status_classification')
                                            <label id="name-error" class="error mt-2 text-danger" for="status_classification">{{$message}}</label>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender :</label>
                                        <select type="text" name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                            <option value="" label="Pilih Salah Satu"></option>
                                        </select>
                                        @error('gender')
                                            <label id="name-error" class="error mt-2 text-danger" for="gender">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="match_number_id" class="form-label">Nomor Pertandingan :</label>
                                        <select type="text" name="match_number_id" class="form-control @error('match_number_id') is-invalid @enderror" placeholder="match_number_id" id="matchnumber">
                                                <option value="" label="Pilih Salah Satu"></option>
                                        </select>
                                        @error('match_number_id')
                                            <label id="name-error" class="error mt-2 text-danger" for="match_number_id">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah" class="form-label">Jumlah :</label>
                                        <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" value="{{ old('jumlah') }}">
                                        @error('jumlah')
                                            <label id="name-error" class="error mt-2 text-danger" for="jumlah">{{$message}}</label>
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script>
    $(document).ready(function() {
        $('#cabor').on('change', function() {
        var caborId = $(this).val();
        if(caborId) {
            $.ajax({
                url: '/getJenisKlasifikasi/'+caborId,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#status').empty();
                        $('#status').append('<option hidden>Pilih Jenis Disabilitas</option>'); 
                        $.each(data, function(key, status){
                            $('select[name="status"]').append('<option value="'+ status.type +'">' + status.type+ '</option>');
                        });
                        $('#classification').empty();
                        $('#classification').append('<option value="" hidden>Pilih Salah Satu</option>'); 
                        $('#gender').empty();
                        $('#gender').append('<option value="" hidden>Pilih Salah Satu</option>'); 
                        $('#matchnumber').empty();
                        $('#matchnumber').append('<option hidden>Pilih Salah Satu</option>'); 
                    }else{
                        $('#status').empty();
                    }
                }
            });
        }else{
            $('#status').empty();
        }
        });
        $('#status').on('change', function() {
        var caborId = $('#cabor').val();
        var status = $(this).val();
        console.log(caborId)
        if(caborId) {
            $.ajax({
                url: '/getClassification',
                type: "POST",
                data:{
                    "_token":"{{ csrf_token() }}",
                    cabor_id:caborId, 
                    status:status
                },
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#classification').empty();
                        $('#classification').append('<option hidden>Pilih Klasifikasi</option>'); 
                        $.each(data, function(key, classification){
                            $('select[name="classification_id"]').append('<option value="'+ classification.id +'">' + classification.name+ '</option>');
                        });
                        $('#gender').empty();
                        $('#gender').append('<option hidden>Pilih Salah Satu</option>'); 
                        $('#matchnumber').empty();
                        $('#matchnumber').append('<option hidden>Pilih Salah Satu</option>'); 
                    }else{
                        $('#classification').empty();
                    }
                }
            });
            
        }else{
            $('#classification').empty();
        }
        });
        $('#classification').on('change', function() {
        var caborId = $('#cabor').val();
        var status = $('#status').val();
        var classification_id = $(this).val();
        console.log(classification_id)
        if(caborId) {
            $.ajax({
                url: '/getGender',
                type: "POST",
                data:{
                    "_token":"{{ csrf_token() }}",
                    cabor_id:caborId, 
                    status:status,
                    classification_id:classification_id
                },
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#gender').empty();
                        $('#gender').append('<option hidden>Pilih Gender</option>'); 
                        $.each(data, function(key, gender){
                            $('select[name="gender"]').append('<option value="'+ gender.gender +'">' + gender.gender+ '</option>');
                        }); 
                    }else{
                        $('#gender').empty();
                    }
                }
            });
            
        }else{
            $('#gender').empty();
        }
        });
        $('#gender').on('change', function() {
        var caborId = $('#cabor').val();
        var status = $('#status').val();
        var classification_id = $('#classification').val();
        var gender = $(this).val();
        console.log(classification_id)
        if(caborId) {
            $.ajax({
                url: '/getMatchNumber',
                type: "POST",
                data:{
                    "_token":"{{ csrf_token() }}",
                    cabor_id:caborId, 
                    status:status,
                    classification_id:classification_id,
                    gender:gender
                },
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#matchnumber').empty();
                        $('#matchnumber').append('<option hidden>Pilih Nomor Pertandingan</option>'); 
                        $.each(data, function(key, matchnumber){
                            $('select[name="match_number_id"]').append('<option value="'+ matchnumber.id +'">' + matchnumber.name+ '</option>');
                        });
                    }else{
                        $('#matchnumber').empty();
                    }
                }
            });
            
        }else{
            $('#matchnumber').empty();
        }
        });
    });
</script>
@endsection