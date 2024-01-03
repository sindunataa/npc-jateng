@extends('templates.main')

@section('title')
    {{'Edit Venue'}}
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
                    <h4 class="page-title">Edit Venue</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/venues">List Venue</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Venue</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Venue</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('venues.update',['id'=> $edit->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name :</label>
                                        <input type="text" name="name" value="{{ $edit->name }}" class="form-control" id="name" placeholder="Name">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="slug" class="form-label">slug :</label>
                                        <input type="text" name="slug" class="form-control" value="{{ $edit->slug }}" id="slug" placeholder="slug">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="excerpt" class="form-label">Kutipan :</label>
                                        <input type="text" name="excerpt" class="form-control" id="excerpt" value="{{ $edit->excerpt }}" placeholder="excerpt">
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status :</label>
                                        <input type="text" name="status" class="form-control" id="status" value="{{ $edit->status }}" placeholder="status">
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="form-label">Content :</label>
                                        <textarea class="content" name="content">{{ $edit->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="form-label">Image Uploads :</label>
                                        <input type="file" data-default-file="{{ asset("uploads/".$edit->image) }}" name="image" class="dropify" data-height="300" />
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
$(document).ready(function(){
$('.dropify').dropify();

$('.dropify-clear').click(function(e){
e.preventDefault();
alert('Remove Hit');

});
});
</script>
<script src="{{asset ('/assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
<script src="{{asset ('/assets/js/form-editor.js')}}"></script>
@endsection