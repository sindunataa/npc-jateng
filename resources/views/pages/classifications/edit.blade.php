@extends('templates.main')

@section('title')
    {{'Edit Classification'}}
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
                    <h4 class="page-title">Edit Classification</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/classifications">List Classification</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-md-8 col-lg-8">
                    
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">List Classification</h3> --}}
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
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classification as $classifications)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $classifications->name }}</td>
                                            <td>{{ $classifications->description }}</td>
                                            <td>{{ $classifications->cabor->name }}</td>
                                            <td>{{ $classifications->type }}</td>
                                            
                                            <td class="text-right">
                                                <form action="{{ route('classifications.destroy',$classifications->id) }}" method="POST">
                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('classifications.edit',$classifications->id) }}">Edit</a>
    
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
                            <h4 class="card-title">Edit Classification</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('classifications.update',['id'=> $edit->id]) }}" method="POST" enctype="multipart/form-data">
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
                                            @foreach ($item as $cabors)
                                            
                                            <option value="{{$cabors->id}}" {{($cabors->id == $edit->cabor_id)?"selected":"";}}>{{$cabors->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="type" class="form-label">Tipe :</label>
                                        <select name="type" id="type" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option value="Disabilitas Fisik" {{($edit->type == 'Disabilitas Fisik') ? "selected":"";}}>Disabilitas Fisik</option>
                                            <option value="Disabilitas Netra" {{($edit->type == 'Disabilitas Netra') ? "selected":"";}}>Disabilitas Netra</option>
                                            <option value="Disabilitas Intelektual" {{($edit->type == 'Disabilitas Intelektual') ? "selected":"";}}>Disabilitas Intelektual</option>
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