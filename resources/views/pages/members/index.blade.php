@extends('templates.main')

@section('title')
    {{'List Member'}}
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">List Member</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/members">List Member</a></li>

                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-md-12 col-lg-12">
                    
                    <div class="card">
                        <div class="card-header">
                            <div class="col mb-4 mt-4">
                                <a href="{{ route('members.create')}}" class="btn btn-primary"><i class="fe fe-plus"></i> Add New Member</a>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table card-table table-center text-nowrap mb-0">
                                <thead >
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Peserta</th>
                                        <th>Contingent</th>
                                        <th>Cabor</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        {{-- <th>kalurahan</th> --}}
                                        {{-- <th>kecamatan</th> --}}
                                        {{-- <th>kota</th> --}}
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->peserta }}</td>
                                        <td>{{ $member->contingent->name }}</td>
                                        <td>{{ $member->cabor->name }}</td>
                                        <td>{{ $member->gender }}</td>
                                        <td>{{ $member->place_of_birth }}</td>
                                        <td>{{ $member->date_of_birth }}</td>
                                        <td>{{ $member->address }}</td>
                                        {{-- <td>{{ $member->kalurahan }}</td> --}}
                                        {{-- <td>{{ $member->kecamatan }}</td> --}}
                                        {{-- <td>{{ $member->kota }}</td> --}}
                                        <td>{{ $member->status }}</td>
                                        <td>
                                            <form action="{{ route('members.destroy',$member->id) }}" method="POST">
                                
                                                <a class="btn btn-primary" href="{{ route('members.edit',$member->id) }}">Edit</a>
                                 
                                                @csrf
                                                @method('DELETE')
                                    
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">Delete</button>
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
            <!-- End Row -->

        </div>
    </div>


{!! $members->links() !!}
</section>

</main>
    
@endsection