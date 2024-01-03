@extends('templates.main')

@section('title')
    {{'Edit Competition'}}
@endsection

@section('js')
    <script>
        function add_nomor(index)
        {
            var match_number_id = $("#match_number option:selected" ).val();
            var html = '';
            html += '<tr>';
            html += '   <td>';
            html += '       <select type="text"  name="member_id[]" id="member_id" class="form-control member_id" placeholder="member_id" > ';
            html += '           <option label="Pilih Salah Satu"></option>';
            html += '       </select>';
            html += '   </td>';
            html += '   <td class="text-center">';
            html += '       <select type="text" name="medal[]" id="medal" class="form-control medal" placeholder="medal" >';
            html += '           <option label="Pilih Salah Satu"></option>';
            html += '           <option value="gold">Gold</option>';
            html += '           <option value="silver">Silver</option>';
            html += '           <option value="bronze">Bronze</option>';
            html += '           <option value="participant">Participant</option>';
            html += '       </select>';
            html += '   </td>';   
            html += '   <td class="text-center">';
            html += '       <button type="button" class="btn btn-danger remove-tr">Remove</button> ';
            html += '   </td>'; 
            html += '</tr>';
            if(match_number_id) {
            $.ajax({
                url: '/getMember',
                type: "POST",
                data:{
                    "_token":"{{ csrf_token() }}",
                    match_number_id:match_number_id ,
                },
                dataType: "json",
                success:function(data)
                {
                    console.log(data);
                    if(data){
                        // $('.member_id').empty();
                        $('.member_id').append('<option hidden>Pilih Atlet</option>'); 
                        $.each(data, function(key, member_id){
                            $('.member_id').append('<option value="'+ member_id.id +'">' + member_id.name+'</option>');
                        });
                    }else{
                        $('.member_id').empty();
                    }
                }
            });
        }else{
            $('.member_id').empty();
        }
            document.getElementById("tbody-nomor").insertRow(-1).innerHTML = html;
        }                  
        $('#cabor').on('change', function() {
        var caborId = $(this).val();
        var cabor = $( "#cabor option:selected" ).text();
        $('.cabor_2').val(cabor);
        if(caborId) {
            $.ajax({
                url: '/getJenisKlasifikasi/'+caborId,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('.classification').empty();
                        $('.classification').append('<option hidden>Pilih Klasifikasi</option>'); 
                        $('.match_number').empty();
                        $('.match_number').append('<option hidden>Pilih Nomor Pertandingan</option>'); 
                        $('#type').empty();
                        $('#type').append('<option hidden>Pilih Jenis Disabilitas</option>'); 
                        $.each(data, function(key, status){
                            $('select[name="type"]').append('<option value="'+ status.type +'">' + status.type+ '</option>');
                        });
                    }else{
                        $('#type').empty();
                    }
                }
            });
        }else{
            $('#type').empty();
        }
        });                          
        $('#gender').on('change', function() {
        var caborId = $("#cabor option:selected" ).val();
        var type = $("#type option:selected" ).val();
        var gender = $("#gender option:selected" ).val();
            
        if(caborId) {
            $.ajax({
                url: '/get_matchnumber',
                type: "POST",
                data:{
                    "_token":"{{ csrf_token() }}",
                    cabor_id:caborId, 
                    type:type,
                    gender:gender,
                },
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#match_number').empty();
                        $('#match_number').append('<option hidden>Pilih Nomor Pertandingan</option>'); 
                        $.each(data, function(key, match_number){
                            $('#match_number').append('<option value="'+ match_number.id +'">' + match_number.name+ + match_number.id+'</option>');
                        });
                    }else{
                        $('#match_number').empty();
                    }
                }
            });
        }else{
            $('#match_number').empty();
        }
        });

        $('#match_number').on('change', function() {

        var match_number_id = $("#match_number option:selected" ).val();
        
        if(match_number_id) {
            $.ajax({
                url: '/getMember',
                type: "POST",
                data:{
                    "_token":"{{ csrf_token() }}",
                    match_number_id:match_number_id ,
                },
                dataType: "json",
                success:function(data)
                {
                    console.log(data);
                    if(data){
                        $('.member_id').empty();
                        $('.member_id').append('<option hidden>Pilih Atlet</option>'); 
                        $.each(data, function(key, member_id){
                            $('.member_id').append('<option value="'+ member_id.id +'">' + member_id.name+'</option>');
                        });
                    }else{
                        $('.member_id').empty();
                    }
                }
            });
        }else{
            $('.member_id').empty();
        }
        });
        $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
        }); 
    </script>
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
                    <h4 class="page-title">Edit Competition</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/competitions">List Competition</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Competition</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Competition</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('competitions.update',['id'=> $edit->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name :</label>
                                        <input type="text" name="name" value="{{ $edit->name }}" class="form-control" id="name" placeholder="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="cabor_id" class="form-label">Cabang Olahraga :</label>
                                        <select type="text" name="cabor_id" class="form-control @error('cabor_id') is-invalid @enderror" placeholder="cabor_id" id="cabor">
                                                <option label="Pilih Salah Satu"></option>
                                            @foreach ($cabors as $cabor)
                                                <option value="{{$cabor->id}}" {{($edit->match_number->cabor_id == $cabor->id)?"selected":"";}}>{{$cabor->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('cabor_id')
                                            <label id="cabor_id-error" class="error mt-2 text-danger" for="cabor_id">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="type" class="form-label">Tipe :</label>
                                        <select type="text" name="type" id="type" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option value="Disabilitas Fisik" {{($edit->type == 'Disabilitas Fisik') ? "selected":"";}}>Disabilitas Fisik</option>
                                            <option value="Disabilitas Netra" {{($edit->type == 'Disabilitas Netra') ? "selected":"";}}>Disabilitas Netra</option>
                                            <option value="Disabilitas Intelektual" {{($edit->type == 'Disabilitas Intelektual') ? "selected":"";}}>Disabilitas Intelektual</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender :</label>
                                        <select type="text" name="gender" id="gender" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option value="putra" {{($edit->gender == 'putra') ? "selected":"";}}>Putra</option>
                                            <option value="putri" {{($edit->gender == 'putri') ? "selected":"";}}>Putri</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="match_number_id" class="form-label">Match Number:</label>
                                        <select type="text" name="match_number_id" class="form-control match_number" placeholder="match_number_id" id="match_number">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($match_numbers as $match_number)
                                            
                                            <option value="{{$match_number->id}}" {{($match_number->id == $edit->match_number_id)?"selected":"";}}>{{$match_number->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="classification" class="form-label">Classification :</label>
                                        <input type="text" name="classification" value="{{ $edit->classification }}" class="form-control" id="classification" placeholder="classification">
                                    </div>
                                    <div class="card my-2" id="of-nomor">
                                        <div class="card-header">Nomor Pertandingan Yang diikuti</div>
                                        <div class="card-body">
                                            <div class="table-responsive-md">
                                                <table class="table" id="table-nomor">
                                                <thead>
                                                <tr>
                                                    
                                                    <th class="text-center">Atlet</th>
                                                    <th class="text-center">Medal</th>
                                                </tr>
                                                </thead>
                                                <tbody id="tbody-nomor">   
                                                    @foreach ($edit->member as $member)
                                                        
                                                    <tr>
                                                        
                                                        <td>
                                                            {{-- {{ $member->id }} --}}

                                                            <select type="text"  name="member_id[]" id="member_id" class="form-control member_id" placeholder="member_id" >
                                                            
                                                                @if (isset($member))
                                                                @foreach ($members as $item)
                                                                    
                                                                
                                                                <option value="{{ $item->id }}" {{($member->id == $item->id)?"selected":"";}}>{{ $item->name }}</option>
             
                                                                {{-- <option label="Pilih Salah Satu"></option> --}}
                                                                @endforeach
                                                                
                                                                @else
                                                                {{-- <option value="{{ $member->id }}" >{{ $member->name }}</option> --}}
                                                                <option label="Pilih Salah Satu"></option>
                                                                    
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td class="text-center">
                                                            <select type="text" name="medal[]" id="medal" class="form-control medal" placeholder="medal" >
                                                                <option label="Pilih Salah Satu"></option>
                                                                <option value="gold" {{($member->pivot->medal == 'gold') ? "selected":"";}}>Gold</option>
                                                                <option value="silver" {{($member->pivot->medal == 'silver') ? "selected":"";}}>Silver</option>
                                                                <option value="bronze" {{($member->pivot->medal == 'bronze') ? "selected":"";}}>Bronze</option>
                                                                <option value="participant" {{($member->pivot->medal == 'participant') ? "selected":"";}}>Participant</option>
                                                    
                                                            </select>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-danger remove-tr">Remove</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-success btn-block" onclick="add_nomor()"> Tambah Nomor Pertandingan</button>
                                        </div>
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
