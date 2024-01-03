@extends('templates.main')

@section('title')
    {{'Add Member'}}
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Add Member</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/members">List Member</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Member</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Member</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('members.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name :</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                        @error('name')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                            <label for="peserta" class="form-label">Peserta :</label>
                                            <select type="text" name="peserta" id="peserta" class="form-control">
                                                <option label="Pilih Salah Satu"></option>
                                                <option title="Pelatih" value="pelatih">Pelatih</option>
                                                <option value="atlet">Atlet</option>
                                            </select>
                                            @error('peserta')
                                            <label id="peserta-error" class="error mt-2 text-danger"
                                                for="peserta">{{ $message }}</label>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="contingent_id" class="form-label">Contingents :</label>
                                        <select type="text" name="contingent_id" class="form-control" placeholder="contingent_id" id="contingent_id">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($contingents as $contingent)
                                                <option value="{{$contingent->id}}">{{$contingent->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('contingent_id')
                                            <label id="contingent_id-error" class="error mt-2 text-danger"
                                                for="contingent_id">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cabor_id" class="form-label">Cabor :</label>
                                        <select type="text" name="cabor_id" class="form-control" placeholder="cabor_id" id="cabor_id">
                                            <option label="Pilih Salah Satu"></option>
                                        @foreach ($cabors as $cabor)
                                            <option value="{{$cabor->id}}">{{$cabor->name}}</option>
                                        @endforeach
                                        </select>
                                        @error('cabor_id')
                                            <label id="cabor_id-error" class="error mt-2 text-danger"
                                                for="cabor_id">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender :</label>
                                        <select type="text" name="gender" id="gender" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option title="Pria" value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                        @error('gender')
                                            <label id="gender-error" class="error mt-2 text-danger"
                                                for="gender">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="place_of_birth" class="form-label">Tempat Lahir :</label>
                                        <input type="text" name="place_of_birth" class="form-control" id="place_of_birth" placeholder="place_of_birth">
                                        @error('place_of_birth')
                                            <label id="place_of_birth-error" class="error mt-2 text-danger"
                                                for="place_of_birth">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_birth" class="form-label">Tanggal Lahir :</label>
                                        <div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"/><path d="M4 5.01h16V8H4z" opacity=".3"/></svg>
													</div>
												</div><input class="form-control" placeholder="YYYY/MM/DD" type="date" name="date_of_birth">
                                                @error('date_of_birth')
                                                    <label id="date_of_birth-error" class="error mt-2 text-danger"
                                                        for="date_of_birth">{{ $message }}</label>
                                                @enderror
											</div>
										</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="form-label">Address :</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="address">
                                        @error('address')
                                            <label id="address-error" class="error mt-2 text-danger"
                                                for="address">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kalurahan" class="form-label">Kalurahan :</label>
                                        <input type="text" name="kalurahan" class="form-control" id="kalurahan" placeholder="kalurahan">
                                        @error('kalurahan')
                                            <label id="kalurahan-error" class="error mt-2 text-danger"
                                                for="kalurahan">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan" class="form-label">Kecamatan :</label>
                                        <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="kecamatan">
                                        @error('kecamatan')
                                            <label id="kecamatan-error" class="error mt-2 text-danger"
                                                for="kecamatan">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kota" class="form-label">Kota :</label>
                                        <input type="text" name="kota" class="form-control" id="kota" placeholder="kota">
                                        @error('kota')
                                            <label id="kota-error" class="error mt-2 text-danger"
                                                for="kota">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status :</label>
                                        <select type="text" name="status" id="status" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option title="kuota" value="Kuota">Kuota</option>
                                            <option value="no Kuota">No Kuota</option>
                                        </select>
                                        @error('status')
                                            <label id="status-error" class="error mt-2 text-danger"
                                                for="status">{{ $message }}</label>
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
@endsection