@extends('admin.includes.layout')
@section('page_title', 'Dashboard - Sub Category Form')
    @section('container')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>
                        @if ($id >  0)
                            Update Sub Category
                        @else
                            Add Sub Category
                        @endif
                     </h1>
                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Sub Category</p>
                </div>
                <div>
                    <a href="{{url('admin/sub-category')}}" class="btn btn-primary"> View All
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2> @if ($id >  0)
                                Update Sub Category
                            @else
                                Add Sub Category
                            @endif</h2>
                        </div>

                        <div class="card-body">
                            <form action="{{ url('sub-category/save') }}" method="POST" enctype="multipart/form-data" autocomplete="off"> 
                                @csrf
                            <div class="row ec-vendor-uploads">
                                
                                <div class="col-lg-12">
                                    <div class="ec-vendor-upload-detail">
                                
                                        <div class="row g-3" >
                                        <input type="hidden" name="id" value="{{$id}}">
                                                <div class="col-md-6">
                                                    <label for="inputEmail4" class="form-label">Category</label>
                                               
                                                    <select class="form-select  border-1 cat_id"
                                                        name="cat_id" aria-label="Default select example">
                                                        <option selected disabled>Select Category</option>
                                                        @foreach ($category as $item)
                                                            @if ($item->id == $cat_id)
                                                                <option value="{{ $item->id }}" selected>
                                                                    {{ $item->cat_name }}</option>
                                                            @else
                                                                <option value="{{ $item->id }}">{{ $item->cat_name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                               
                                                    <p class="text-danger">@error('cat_id'){{$message}} @enderror</p>
                                                </div>

                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Sub Category Name</label>
                                                <input type="text" name="sub_cat_name" class="form-control slug-title" id="inputEmail4" value="{{$sub_cat_name}}" required>
                                                <p class="text-danger">@error('sub_cat_name'){{$message}} @enderror</p>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label">Sort Description</label>
                                                <textarea class="form-control" name="desc" rows="2">{{$desc}}</textarea>
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