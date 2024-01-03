@extends('templates.main')

@section('title')
    {{'List Entry by Number'}}
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
                    <h4 class="page-title">Entry by Name</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/contingents">List Entry by Name</a></li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-md-12 col-lg-12">
                    
                    <div class="card">
                        <div class="card-header">
        
                            
                        </div> 
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Download Files</h4>
                                </div>
                                <div class="col-md-8">
                                    <a href="{{ route('entry_names.downloadFoto')}}" class="btn btn-primary"><i class="fe fe-download"></i> Download Foto</a>
                                    <a href="{{ route('entry_names.downloadKtp')}}" class="btn btn-primary"><i class="fe fe-download"></i> Download KTP</a>
                                    <a href="{{ route('entry_names.downloadFilePendukung')}}" class="btn btn-primary"><i class="fe fe-download"></i> Download File Pendukung</a>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-nowarp" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>NIK</th>
                                            <th>Kota/Kab</th>
                                            <th>Cabang Olahraga</th>
                                            <th>Status Peserta</th>
                                            <th>Alamat</th>
                                            <th>Kategori Atlet</th>
                                            <th>Berkursi Roda</th>
                                            <th>Jenis Disabilitas</th>
                                            <th>Klasifikasi</th>
                                            <th>Nomor Pertandingan 1</th>
                                            <th>Nomor Pertandingan 2</th>
                                            <th>Nomor Pertandingan 3</th>
                                            <th>Nomor Pertandingan 4</th>
                                            <th>Nomor Pertandingan 5</th>
                                            <th>Nomor Pertandingan 6</th>
                                            <th>Nomor Pertandingan 7</th>
                                            <th>Download Foto</th>
                                            <th>Download Pdf</th>
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
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->contingent->name }}</td>
                                            <td>{{ $item->cabor->name }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->category }}</td>
                                            <td>{{ $item->wheelchair }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ ($item->match_number->isempty()) ? '' : $entry_names[$key-1]['match_number'][0]['classification']['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][0])) ? '' : $entry_names[$key-1]['match_number'][0]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][1])) ? '' : $entry_names[$key-1]['match_number'][1]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][2])) ? '' : $entry_names[$key-1]['match_number'][2]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][3])) ? '' : $entry_names[$key-1]['match_number'][3]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][4])) ? '' : $entry_names[$key-1]['match_number'][4]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][5])) ? '' : $entry_names[$key-1]['match_number'][5]['name'] }}</td>
                                            <td>{{ ($item->match_number->isempty()|!isset($entry_names[$key-1]['match_number'][6])) ? '' : $entry_names[$key-1]['match_number'][6]['name'] }}</td>
                                            <td><a href="{{ route('entry_names.downloadFoto')}}" class="btn btn-primary"><i class="fe fe-download"></i> Download Foto</a></td>
                                            {{-- <td><a href="{{ route('generatePdf').'/'.$item->uuid.'/'.$item->competition->competition_id  }}" target="_blank" class="btn btn-primary"><i class="fe fe-download"></i> Generate PDF</a></td> --}}
                                            <td>
                                            @foreach ($item->competition as $competition)
            
                                                <a href="{{ route('generatePdf', ['uuid' => $item->uuid, 'competition_id' => $competition->id])  }}" target="_blank" class="btn btn-primary"><i class="fe fe-download"></i> Generate PDF</a>
                                                @endforeach
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
            </div>
            <!-- End Row -->
        </div>
    </div>



</section>

</main>
    
@endsection