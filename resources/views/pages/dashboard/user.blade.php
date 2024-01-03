@extends('templates.main')

@section('title')
    {{'Dashboard'}}
@endsection
@section('head')
    <!-- Data table css -->
		<link href="{{ asset('assets/plugins/newsticker/newsticker.css') }}" rel="stylesheet" />
@endsection
@section('js')
    <!-- Data tables -->
		<script src="{{ asset('assets/js/index5.js') }}"></script>
		<script src="{{ asset('assets/plugins/newsticker/newsticker.js') }}"></script>
		<script src="{{ asset('assets/js/newsticker.js') }}"></script>
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Dashboard</h4>
                </div>
                
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="row">
                        
                            
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fa fa-users mt-4 card-custom-icon icon-dropshadow-primary text-primary fs-60"></i>
                                    <p class=" mb-1">Jumlah Atlet</p>
                                    <h2 class="mb-1 font-weight-bold">{{$members->total_atlet}}</h2>
                            
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fa fa-flag-checkered mt-4 card-custom-icon icon-dropshadow-warning text-warning fs-60"></i>
                                    <p class=" mb-1">Jumlah Cabor</p>
                                    <h2 class="mb-1 font-weight-bold">{{$entry_number->total_cabor}}</h2>
                                </div>
                            </div>
                        </div>

                        
                        
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fa fa-wheelchair-alt mt-4 card-custom-icon icon-dropshadow-secondary text-secondary fs-60"></i>
                                    <p class=" mb-1">Total Nomer Pertandingan</p>
                                    <h2 class="mb-1 font-weight-bold">{{$entry_number->total_match_number}} </h2>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>                

            </div>
            <!-- End Row -->

        </div>
    </div>

{{-- {!! $classification->links() !!} --}}
</section>

</main>
    
@endsection