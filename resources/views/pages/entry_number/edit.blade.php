@extends('templates.main')

@section('title')
    {{'Edit Entry by Number'}}
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Edit Entry by Number</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/contingents">List Entry by Number</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Entry by Number</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Entry by Number</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('entry_numbers.update',['id'=> $edit->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status :</label>
                                        <select type="text" name="status" id="status" value="{{$edit->status}}" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option title="True" value="Disabilitas Fisik">Disabilitas Fisik</option>
                                            <option value="Disabilitas Intelektual">Disabilitas Intelektual</option>
                                            <option value="Disabilitas Netra">Disabilitas Netra</option>
                                            <option value="Tuna Daksa">Tuna Daksa</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender :</label>
                                        <select type="text" name="gender" id="gender" value="{{$edit->gender}}" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option title="True" value="putra">Putra</option>
                                            <option value="putri">Putri</option>
                                            <option value="mixed">Mixed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah" class="form-label">Jumlah :</label>
                                        <input type="text" name="jumlah" class="form-control" value="{{$edit->jumlah}}" id="jumlah" placeholder="Jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label for="match_number_id" class="form-label">Nomor Pertandingan :</label>
                                        <select type="text" name="match_number_id" class="form-control" placeholder="match_number_id" id="match_number_id">
                                                <option label="Pilih Salah Satu"></option>
                                            @foreach ($match_numbers as $match_number)
                                            <option value="{{$match_number->id}}" {{($match_number->id == $edit->match_number_id)?"selected":"";}}>{{$match_number->name}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="classification_id" class="form-label">Klasifikasi :</label>
                                        <select type="text" name="classification_id" class="form-control" placeholder="classification_id" id="classification_id">
                                                <option label="Pilih Salah Satu"></option>
                                            @foreach ($classifications as $classification)
                                            <option value="{{$classification->id}}" {{($classification->id == $edit->classification_id)?"selected":"";}}>{{$classification->name}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="contingent_id" class="form-label">Kontingen :</label>
                                        <select type="text" name="contingent_id" class="form-control" placeholder="contingent_id" id="contingent_id">
                                                <option label="Pilih Salah Satu"></option>
                                            @foreach ($contingents as $contingent)
                                            <option value="{{$contingent->id}}" {{($contingent->id == $edit->contingent_id)?"selected":"";}}>{{$contingent->name}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cabor_id" class="form-label">Cabor :</label>
                                        <select type="text" name="cabor_id" class="form-control" placeholder="cabor_id" id="cabor_id">
                                                <option label="Pilih Salah Satu"></option>
                                            @foreach ($cabors as $cabor)
                                                <option value="{{$cabor->id}}" {{($cabor->id == $edit->cabor_id)?"selected":"";}}>{{$cabor->name}}</option>
                                            @endforeach
                                            </select>
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