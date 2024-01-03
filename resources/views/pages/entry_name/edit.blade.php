@extends('templates.main')

@section('title')
    {{'Add Name'}}
@endsection
@section('js')  
<script>
    $(document).ready(function(){
          $('.dropify').dropify();
  
          $('.dropify-clear').click(function(e){
          e.preventDefault();
          alert('Remove Hit');
          
          });
        //   var nomor = $('#category').find(':selected').data('nomor');
        //     for (let index = 0; index < nomor; index++) {
        //         cek_nomor(index);
        //         console.log(index);
        //     }
            
        });
    
      function add_nomor(index)
      {
            var cabor = $( "#cabor option:selected" ).text();
            var caborId = $('#cabor').val();
            var status = $('#type').val();
            var html = '';
            html += '<tr>';
            html += '  <td>';
            html += '    <input type="text" class="form-control cabor_2" name="cabor_id[]" placeholder="Cabang Olahraga" value="'+cabor+'" disabled>';
            html += '  </td>';
            html += '  <td>';
            html += '   <select type="text" name="classification_id[]" id="classification_'+index+'" class="form-control classification" placeholder="classification_id" onchange="select_kelas('+index+')">';
            html += '<option label="Pilih Salah Satu"></option>';
            html += '</select>';
            html += '</td>';
            html += '<td class="text-center">';
            html += '<select type="text" name="match_number_id[]" id="match_number_'+index+'" class="form-control" placeholder="match_number_id">';
            html += '<option label="Pilih Salah Satu"></option>';
            html += '</select>';
            html += '</td>';    
            html += '</tr>';
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
                            $('.classification').empty();
                            $('.classification').append('<option hidden>Pilih Klasifikasi</option>'); 
                            $.each(data, function(key, classification){
                                $('.classification').append('<option value="'+ classification.id +'">' + classification.name+ '</option>');
                            });
                            
                        }else{
                            $('.classification').empty();
                        }
                    }
                });
            }else{
                $('.classification').empty();
            }
          document.getElementById("tbody-nomor").insertRow(-1).innerHTML = html;
      }  
      function cek_nomor(index)
      {
            var cabor = $( "#cabor option:selected" ).text();
            var caborId = $('#cabor').val();
            var status = $('#type').val();
            var html = '';
            html += '<tr>';
            html += '  <td>';
            html += '    <input type="text" class="form-control cabor_2" name="cabor_id[]" placeholder="Cabang Olahraga" value="'+cabor+'" disabled>';
            html += '  </td>';
            html += '  <td>';
            html += '   <select type="text" name="classification_id[]" id="classification_'+index+'" class="form-control classification" placeholder="classification_id" onchange="select_kelas('+index+')">';
            html += '<option label="Pilih Salah Satu"></option>';
            html += '</select>';
            html += '</td>';
            html += '<td class="text-center">';
            html += '<select type="text" name="match_number_id[]" id="match_number_'+index+'" class="form-control" placeholder="match_number_id">';
            html += '<option label="Pilih Salah Satu"></option>';
            html += '</select>';
            html += '</td>';    
            html += '</tr>';
            if(caborId) {
                $.ajax({
                    url: '/getClassificationEdit',
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
                            $('.classification').empty();
                            $('.classification').append('<option hidden>Pilih Klasifikasi</option>'); 
                            $.each(data, function(key, classification){
                                $('.classification').append('<option value="'+ classification.id +'">' + classification.name+ '</option>');
                            });
                            
                        }else{
                            $('.classification').empty();
                        }
                    }
                });
            }else{
                $('.classification').empty();
            }
          document.getElementById("tbody-nomor").insertRow(-1).innerHTML = html;
      }  
      function select_kelas(index){
          var caborId = $("#cabor option:selected" ).val();
          var status = $("#type option:selected" ).val();
          var gender = $("#gender option:selected" ).val();
          var classification_id = $('#classification_'+index).val();
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
                    $('#match_number_'+index).empty();
                    $('#match_number_'+index).append('<option hidden>Pilih Nomor Pertandingan</option>'); 
                    $.each(data, function(key, matchnumber){
                        $('#match_number_'+index).append('<option value="'+ matchnumber.id +'">' + matchnumber.name+ '</option>');
                    });
                }else{
                    $('#match_number_'+index).empty();
                }
            }
        });
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
        $('#type').on('change', function() {
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
                        $('.match_number').empty();
                        $('.match_number').append('<option hidden>Pilih Nomor Pertandingan</option>'); 
                        $('.classification').empty();
                        $('.classification').append('<option hidden>Pilih Klasifikasi</option>'); 
                        $.each(data, function(key, classification){
                            $('.classification').append('<option value="'+ classification.id +'">' + classification.name+ '</option>');
                        });
                    }else{
                        $('.classification').empty();
                    }
                }
            });
        }else{
            $('.classification').empty();
        }
        });
       
        $('#category').on('change', function() {
            // $("#table-nomor > tbody").empty();
            $("#tbody-nomor").empty();
            var caborId = $('#cabor').val();
            var nomor = $(this).find(':selected').data('nomor');

            for (let index = 0; index < nomor; index++) {
                add_nomor(index)
                
            }
        });
        $('#peserta').on('change', function() {
            console.log('peserta')
            if ($(this).val() == 'Official') {
                $("#of-status").hide();
                $("#of-category").hide();
                $("#of-nomor").hide();
                $(".of-dokumen").hide();
                
            }else{
                $("#of-status").show();
                $("#of-category").show();
                $("#of-nomor").show();
                $(".of-dokumen").show();
            }
            
        });
        $('#gender').on('change', function() {
        var caborId = $("#cabor option:selected" ).val();
        var status = $("#type option:selected" ).val();
        var gender = $("#gender option:selected" ).val();
            
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
                        $('.match_number').empty();
                        $('.match_number').append('<option hidden>Pilih Nomor Pertandingan</option>'); 
                        $('.classification').empty();
                        $('.classification').append('<option hidden>Pilih Klasifikasi</option>'); 
                        $.each(data, function(key, classification){
                            $('.classification').append('<option value="'+ classification.id +'">' + classification.name+ '</option>');
                        });
                    }else{
                        $('.classification').empty();
                        $('.match_number').empty();
                    }
                }
            });
        }else{
            $('.classification').empty();
            $('.match_number').empty();
        }
        });
</script>
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Edit Entry By Name</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="#">Entry By Name</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Entry By Name</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('entry_names.update',$edit->uuid)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label">Nama :</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan Nama Peserta" value="{{ $edit->name }}">
                                    @error('name')
                                        <label id="name-error" class="error mt-2 text-danger" for="name">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nik" class="form-label">NIK :</label>
                                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Masukan NIK Peserta" value="{{ $edit->nik }}">
                                    @error('nik')
                                        <label id="nik-error" class="error mt-2 text-danger" for="nik">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="peserta" class="form-label">Jenis Peserta :</label>
                                    <select name="peserta" class="form-control @error('peserta') is-invalid @enderror" placeholder="peserta" id="peserta">
                                        <option value="Atlet" {{($edit->peserta == 'atlet') ? "selected":"";}}>Atlet</option>
                                        <option value="Official" {{($edit->peserta == 'official') ? "selected":"";}}>Official</option>
                                    </select>
                                    @error('peserta')
                                        <label id="peserta-error" class="error mt-2 text-danger" for="peserta">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status" class="form-label">Status Peserta :</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror" placeholder="status" id="status">
                                        <option value="Kuota" {{($edit->status == 'kuota') ? "selected":"";}}>Kuota</option>
                                        <option value="Non Kuota" {{($edit->status == 'non kuota') ? "selected":"";}}>Non Kuota</option>
                                    </select>
                                    @error('status')
                                        <label id="status-error" class="error mt-2 text-danger" for="status">{{$message}}</label>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="place_of_birth" class="form-label">Tempat Lahir :</label>
                                    <input type="text" name="place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" id="place_of_birth" placeholder="Masukan Tempat Lahir Peserta" value="{{ $edit->place_of_birth }}">
                                    @error('place_of_birth')
                                        <label id="place_of_birth-error" class="error mt-2 text-danger" for="place_of_birth">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date_of_birth" class="form-label">Tanggal Lahir :</label>
                                    <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" placeholder="Masukan Tanggal Lahir Peserta" value="{{ $edit->date_of_birth }}">
                                    @error('date_of_birth')
                                        <label id="date_of_birth-error" class="error mt-2 text-danger" for="date_of_birth">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address" class="form-label">Alamat :</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Masukan Alamat Peserta" value="{{ $edit->address }}">
                                    @error('address')
                                        <label id="address-error" class="error mt-2 text-danger" for="address">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cabor_id" class="form-label">Cabang Olahraga :</label>
                                    <select type="text" name="cabor_id" class="form-control @error('cabor_id') is-invalid @enderror" placeholder="cabor_id" id="cabor">
                                            <option label="Pilih Salah Satu"></option>
                                        @foreach ($cabors as $cabor)
                                            <option value="{{$cabor->id}}" {{($edit->cabor_id == $cabor->id) ? "selected":"";}}>{{$cabor->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('cabor_id')
                                        <label id="cabor_id-error" class="error mt-2 text-danger" for="cabor_id">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group" id="of-status" {{ ($edit->peserta == 'official') ? 'style=display:none':'';}}>
                                    <label for="type" class="form-label">Jenis Disabilitas :</label>
                                    <select type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" id="type">
                                        <option value="{{ $edit->type }}">{{ $edit->type }}</option>
                                    </select>
                                    @error('type')
                                        <label id="type-error" class="error mt-2 text-danger" for="type">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="form-label">Jenis Kelamin :</label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" placeholder="gender" id="gender">
                                        <option value="Putra">Putra</option>
                                        <option value="Putri">Putri</option>
                                    </select>
                                    @error('gender')
                                        <label id="gender-error" class="error mt-2 text-danger" for="gender">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group" id="of-category" {{ ($edit->peserta == 'official') ? 'style=display:none':'';}}>
                                    <label for="category" class="form-label">Kategori Atlet  :</label>
                                    <select type="text" name="category" class="form-control @error('category') is-invalid @enderror" placeholder="category" id="category">
                                        <option value="Elite 1" data-nomor="1" {{($edit->category == 'Elite 1') ? "selected":"";}}>Elite 1</option>
                                        <option value="Elite 2" data-nomor="2" {{($edit->category == 'Elite 2') ? "selected":"";}}>Elite 2</option>
                                        <option value="Elite 3" data-nomor="3" {{($edit->category == 'Elite 3') ? "selected":"";}}>Elite 3</option>
                                        <option value="Non Elite" data-nomor="7" {{($edit->category == 'Non Elite') ? "selected":"";}}>Non Elite</option>
                                    </select>
                                    @error('category')
                                        <label id="category-error" class="error mt-2 text-danger" for="category">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="contingent_id" class="form-label">NPCI Daerah :</label>
                                    <select type="text" name="npci_daerah" class="form-control @error('npci_daerah') is-invalid @enderror" placeholder="npci_daerah" id="contingent">
                                        <option label="Pilih Salah Satu"></option>
                                        @foreach ($contingents as $contingent)
                                            <option value="{{$contingent->id}}" {{(Auth::user()->contingent->id == $contingent->id) ? "selected":"";}}>{{$contingent->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('npci_daerah')
                                        <label id="npci_daerah-error" class="error mt-2 text-danger" for="npci_daerah">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="wheelchair" class="form-label">Berkursi Roda:</label>
                                    <select type="text" name="wheelchair" class="form-control @error('wheelchair') is-invalid @enderror" placeholder="wheelchair" id="wheelchair">
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    @error('wheelchair')
                                        <label id="wheelchair-error" class="error mt-2 text-danger" for="wheelchair">{{$message}}</label>
                                    @enderror
                                </div>
                                <div class="card my-2" id="of-nomor" {{ ($edit->peserta == 'official') ? 'style=display:none':'';}}>
                                    <div class="card-header">Nomor Pertandingan Yang diikuti</div>
                                    <div class="card-body">
                                        <div class="table-responsive-md">
                                            <table class="table" id="table-nomor">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Cabang Olahraga</th>
                                                <th class="text-center">Klasifikasi</th>
                                                <th class="text-center">Nomor Pertandingan</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbody-nomor">
                                                @if ($edit->peserta == 'atlet')
                                                @php
                                                    if ($edit->category == 'Non Elite') {
                                                        $category = 7;
                                                    }else if($edit->category == 'Elite 3'){
                                                        $category = 3;
                                                    }elseif ($edit->category == 'Elite 2') {
                                                        $category = 2;
                                                    }else{
                                                        $category = 1;
                                                    }
                                                @endphp
                                                @for ($i = 0; $i < $category; $i++)
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control cabor_2"  name="cabor_id[]" value="{{ $edit->cabor->name }}" placeholder="" disabled>
                                                    </td>
                                                    <td>
                                                        <select type="text" name="classification_id[]" id="classification_{{ $i }}" class="form-control classification" placeholder="classification_id" onchange="select_kelas({{ $i }})">
                                                            
                                                            @if (isset($match_numbers[$i]))
                                                                @foreach ($klasifikasi[$i]['klasifikasi'] as $item_class)
                                                                    <option value="{{ $item_class->id }}"  {{($match_numbers[$i]->classification_id == $item_class->id) ? "selected":"";}}>{{ $item_class->name }}</option> 
                                                                @endforeach
                                                                
                                                            @else
                                                                <option value="" >Pilih Salah Satu</option> 
                                                                @foreach ($classification as $item_classi)
                                                                    <option value="{{ $item_classi->id }}" >{{ $item_classi->name }}</option> 
                                                                @endforeach
                                                                
                                                            @endif
                                                        </select>
                                                    </td>
                                                    <td class="text-center">
                                                        <select type="text" name="match_number_id[]" id="match_number_{{ $i }}" class="form-control match_number" placeholder="match_number_id">
                                                            @if (isset($match_numbers[$i]))
                                                                @foreach ($klasifikasi[$i]['match_number'] as $item_nomor)
                                                                    <option value="{{ $item_nomor->id }}"  {{($match_numbers[$i]->id == $item_nomor->id) ? "selected":"";}}>{{ $item_nomor->name }}</option> 
                                                                @endforeach
                                                                
                                                            @else
                                                                <option value="" >Pilih Salah Satu</option> 
                                                                
                                                            @endif
                                                        </select>
                                                    </td>
                                                </tr>
                                                @endfor
                                                @else
                                                    
                                                @endif
                                            </tbody>
                                            
                                            </table>
                                        </div>
                                        {{-- <button type="button" class="btn btn-success btn-block" onclick="add_nomor()"> Tambah Nomor Pertandingan</button> --}}
                                    </div>
                                </div>
                                <div class="card my-2">
                                    <div class="card-header">Berkas</div>
                                    <div class="card-body">
                                    <div class="table-responsive-md">
                                        <table class="table" id="table-berkas">
                                        <thead>
                                          <tr>
                                            <th class="text-center">Foto Diri</th>
                                            <th class="text-center">Scan KTP</th>
                                            <th class="text-center of-dokumen" {{ ($edit->peserta == 'official') ? 'style=display:none':'';}}>Dokumen MDF</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>
                                                <input type="file" data-default-file="{{ asset("uploads/".$edit->file_foto) }}" class="dropify" data-height="180"  name="file_foto">
                                                @error('file_foto')
                                                    <label id="file_foto-error" class="error mt-2 text-danger" for="file_foto">{{$message}}</label>
                                                @enderror
                                            </td>
                                            <td class="text-center">
                                                <input type="file" data-default-file="{{ asset("uploads/".$edit->file_ktp) }}" class="dropify" data-height="180"  name="file_ktp">
                                                @error('file_ktp')
                                                    <label id="file_ktp-error" class="error mt-2 text-danger" for="file_ktp">{{$message}}</label>
                                                @enderror
                                            </td>
                                            <td class="of-dokumen" {{ ($edit->peserta == 'official') ? 'style=display:none':'';}}>
                                                <input type="file" data-default-file="{{ asset("uploads/".$edit->file_pendukung) }}" class="dropify" data-height="180"  name="file_pendukung">
                                                @error('file_pendukung')
                                                    <label id="file_pendukung-error" class="error mt-2 text-danger" for="file_pendukung">{{$message}}</label>
                                                @enderror
                                            </td>
                                          </tr>
                                        </tbody>
                                          
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary mt-2 mb-0">Submit</button>
                                </div>
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