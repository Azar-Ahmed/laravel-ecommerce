@extends('admin.includes.layout')
@section('page_title', 'Dashboard - Brand Form')
    @section('container')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>
                        @if ($id >  0)
                            Update Brand
                        @else
                            Add Brand
                        @endif
                     </h1>
                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Brand</p>
                </div>
                <div>
                    <a href="{{url('admin/brand')}}" class="btn btn-primary"> View All
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2> @if ($id >  0)
                                Update Brand
                            @else
                                Add Brand
                            @endif</h2>
                        </div>

                        <div class="card-body">
                            <form action="{{ url('brand/save') }}" method="POST" enctype="multipart/form-data" autocomplete="off"> 
                                @csrf
                            <div class="row ec-vendor-uploads">
                                <div class="col-lg-4">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                    
                               
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" name="image" class="ec-image-upload"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><img
                                                            src="{{asset('admin_assets/img/icons/edit.svg')}}"
                                                            class="svg_img header_svg" alt="edit" /></label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        @if ($id > 0)
                                                                <img class="ec-image-preview" src="{{asset('uploads/brand/'.$image) }}" alt="edit">
                                                       @else
                                                        <img class="ec-image-preview"
                                                                src="{{asset('admin_assets/img/products/vender-upload-preview.jpg')}}" alt="edit" />
                                                        @endif
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="ec-vendor-upload-detail">
                                
                                        <div class="row g-3" >
                                        <input type="hidden" name="id" value="{{$id}}">

                                            <div class="col-md-12">
                                                <label for="inputEmail4" class="form-label">Brand Name</label>
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