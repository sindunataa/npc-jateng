@extends('templates.main')

@section('title')
    {{'Edit Match Number'}}
@endsection
@section('head')
    <!-- Data table css -->
		<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}"  rel="stylesheet">
		<link href="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection
@section('js')
    <!-- Data tables -->
		<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/js/datatables.js') }}"></script>
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Edit Match Number</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/match_numbers">List Match Number</a></li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-md-8 col-lg-8">
                    
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">List Match Number</h3> --}}
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-nowrap mb-0" id="example1">
                                    <thead >
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Deskripsi</th>
                                            <th>Cabor</th>
                                            <th>Tipe</th>
                                            <th>Gender</th>
                                            <th>Klasifikasi</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($match_numbers as $match_number)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $match_number->name }}</td>
                                            <td>{{ $match_number->description }}</td>
                                            <td>{{ $match_number->cabor->name}}</td>
                                            <td>{{ $match_number->type }}</td>
                                            <td>{{ $match_number->gender }}</td>
                                            <td>{{ $match_number->classification_id }}</td>
    
                                            <td class="text-right">
                                                <form action="{{ route('match_numbers.destroy',$match_number->id) }}" method="POST">
                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('match_numbers.edit',$match_number->id) }}">Edit</a>
    
                                                    @csrf
                                                    @method('DELETE')
                                        
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- table-responsive -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Match Number</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('match_numbers.update',['id'=> $edit->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name :</label>
                                        <input type="text" name="name" value="{{ $edit->name }}" class="form-control" id="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="form-label">Deskripsi :</label>
                                        <input type="text" name="description" class="form-control" value="{{ $edit->description }}" id="description" placeholder="Deskripsi">
                                    </div>
                                    <div class="form-group">
                                        <label for="cabor_id" class="form-label">Cabor:</label>
                                        <select type="text" name="cabor_id" class="form-control" placeholder="cabor_id" id="cabor_id">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($cabors as $cabor)
                                            <option value="{{$cabor->id}}" {{($cabor->id == $edit->cabor_id)?"selected":"";}}>{{$cabor->name}}</option>
                                            @endforeach
                                        </select>
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
                                        <label for="classification_id" class="form-label">Klasifikasi :</label>
                                        <select type="text" name="classification_id" class="form-control" placeholder="classification_id" id="classification_id">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($classifications as $classification)
                                            <option value="{{$classification->id}}" {{($classification->id == $edit->cabor_id)?"selected":"";}}>{{$classification->name}}</option>
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