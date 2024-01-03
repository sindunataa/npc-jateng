@extends('templates.main')

@section('title')
    {{'List New Names'}}
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
                    <h4 class="page-title">List New Names</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="#">List Entry By Name</a></li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            Jumlah Nomor Pertandingan
                        </div>
                        <div class="card-body">
                            <h4>{{ $entry_number }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            Kuota
                        </div>
                        <div class="card-body">
                            <h4>{{ $peserta_kuota }} / {{ $kuota }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            Non Kuota
                        </div>
                        <div class="card-body">
                            <h4>{{ $peserta_non }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    
                    <div class="card">
                        <div class="card-header">
                            <div class="col mb-4 mt-4">
                                <a href="{{ route('entry_names.create')}}" class="btn btn-primary"><i class="fe fe-plus"></i> Add New Name</a>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-nowarp" id="example1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>NIK</th>
                                            <th>Cabang Olahraga</th>
                                            <th>Status</th>
                                            <th>Jenis Disabilitas</th>
                                            <th>Kategori Atlet</th>
                                            <th>Berkursi Roda</th>
                                            <th>Klasifikasi</th>
                                            <th>Nomor Pertandingan 1</th>
                                            <th>Nomor Pertandingan 2</th>
                                            <th>Nomor Pertandingan 3</th>
                                            <th>Nomor Pertandingan 4</th>
                                            <th>Nomor Pertandingan 5</th>
                                            <th>Nomor Pertandingan 6</th>
                                            <th>Nomor Pertandingan 7</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($entry_names as $key => $item)
                                            
                                        <tr>
                                            <td>{{ ++$key  }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->peserta }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->place_of_birth }}</td>
                                            <td>{{ $item->date_of_birth }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->cabor->name }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->category }}</td>
                                            <td>{{ $item->wheelchair }}</td>
                                            <td>{{ ($item->match_number->isempty()) ? '' : $entry_names[$key-1]['match_number'][0]['classification']['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][0])) ? '' : $entry_names[$key-1]['match_number'][0]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][1])) ? '' : $entry_names[$key-1]['match_number'][1]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][2])) ? '' : $entry_names[$key-1]['match_number'][2]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][3])) ? '' : $entry_names[$key-1]['match_number'][3]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][4])) ? '' : $entry_names[$key-1]['match_number'][4]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][5])) ? '' : $entry_names[$key-1]['match_number'][5]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][6])) ? '' : $entry_names[$key-1]['match_number'][6]['name'] }}</td>
                                            <td class="text-right">
                                                <form action="{{ route('entry_names.destroy',$item->id) }}" method="POST">
                                    
                                                    <a class="btn btn-sm btn-outline-success" href="{{ route('entry_names.edit',$item->uuid) }}">Edit</a>
    
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
                            
                        </div>
                        
                        <!-- table-responsive -->
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>


</section>

</main>
    
@endsection
