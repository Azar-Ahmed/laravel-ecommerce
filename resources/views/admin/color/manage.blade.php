@extends('admin.includes.layout')
@section('page_title', 'Dashboard - Color Form')
    @section('container')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>
                        @if ($id >  0)
                            Update Color
                        @else
                            Add Color
                        @endif
                     </h1>
                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Color</p>
                </div>
                <div>
                    <a href="{{url('admin/color')}}" class="btn btn-primary"> View All
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2> @if ($id >  0)
                                Update Color
                            @else
                                Add Color
                            @endif</h2>
                        </div>

                        <div class="card-body">
                            <form action="{{ url('color/save') }}" method="POST" enctype="multipart/form-data" autocomplete="off"> 
                                @csrf
                            <div class="row ec-vendor-uploads">
                                <div class="col-lg-12">
                                    <div class="ec-vendor-upload-detail">
                                
                                        <div class="row g-3" >
                                        <input type="hidden" name="id" value="{{$id}}">

                                            <div class="col-md-12">
                                                <label for="inputEmail4" class="form-label">Color Name</label>
                                                <input type="text" name="name" class="form-control slug-title" id="inputEmail4" value="{{$name}}" required>
                                                <p class="text-danger">@error('cat_name'){{$message}} @enderror</p>

                                            </div>
                                            
                                            <div class="col-md-12 mt-3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div>
    @endsection
@section('custom_script')
@endsection