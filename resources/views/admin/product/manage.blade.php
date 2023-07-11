@extends('admin.includes.layout')
@section('page_title', 'Dashboard - Product Form')
    @section('container')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>
                        @if ($id >  0)
                            Update Product
                        @else
                            Add Product
                        @endif
                     </h1>
                    <p class="breadcrumbs"><span><a href="{{url('/admin/dashboard')}}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Product</p>
                </div>
                <div>
                    <a href="{{url('admin/product')}}" class="btn btn-primary"> View All
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2> @if ($id >  0)
                                Update Product
                            @else
                                Add Product
                            @endif</h2>
                        </div>

                        <div class="card-body">
                            <form action="{{ url('product/save') }}" method="POST" enctype="multipart/form-data" autocomplete="off"> 
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
                                                                <img class="ec-image-preview" src="{{asset('uploads/product/'.$cover_image) }}" alt="edit">
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
                                    <label style="margin-left: 10px" class="fs-5 text-primary mt-3">Upload Product Multiple Image</label>
                                    <input type="file" class="form-control" name="image_url[]" accept="image/jpg, image/jpeg, image/png" multiple="multiple">
                                        <p class="text-danger" style="margin-left: 10px">@error('image_url'){{$message}} @enderror</p>
                                        <div class="row mt-4">
                                            @foreach ($multiple_img as $img)
                                                <div class="col-md-3 text-center">
                                                    <a href="{{ url('uploads/product/multiple_img/'.$img->image_url) }}" target="_blank" data-lightbox="image-1" data-title="Media Image">
                                                    <img class="border border-primary" src="{{ url("uploads/product/multiple_img/".$img->image_url) }}" width="150px" height="150px"></a> <br>
                                                    <button class="btn btn-outline-danger btn-sm my-3 delete_image " value="{{$img->id}}" title="Delete">Delete</button>   
                                                </div>
                                            @endforeach
                                        </div>
                                </div>
                             
                                <div class="col-lg-12 mt-4">
                                    <div class="ec-vendor-upload-detail">
                                        <div class="row g-3" >
                                            <input type="hidden" name="id" value="{{$id}}">
                                                    
                                            {{-- Product Name --}}
                                            <div class="col-md-4 my-3">
                                                <label for="inputEmail4" class="form-label">Product Name</label>
                                                <input type="text" name="product_name" class="form-control slug-title" id="inputEmail4" value="{{$product_name}}" required>
                                                <p class="text-danger">@error('product_name'){{$message}} @enderror</p>
                                            </div>      
                                            
                                            {{-- Category --}}
                                            <div class="col-md-4 my-3">
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

                                                {{-- Sub Category --}}
                                                <div class="col-md-4 my-3">
                                                <label for="inputEmail4" class="form-label">Sub Category</label>
                                                <select class="form-select  border-1 sub_cat_id"
                                                    name="sub_cat_id" aria-label="Default select example">
                                                    <option selected disabled>Select Sub Category</option>
                                                    @foreach ($sub_category as $item)
                                                        @if ($item->id == $sub_cat_id)
                                                            <option value="{{ $item->id }}" selected>
                                                                {{ $item->sub_cat_name }}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->sub_cat_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            
                                                <p class="text-danger">@error('sub_cat_id'){{$message}} @enderror</p>
                                                </div>

                                            
                                            {{-- Color --}}
                                            <div class="col-md-4 my-3">
                                                <label for="inputEmail4" class="form-label">Color</label>

                                                <select class="form-select  border-1 color_id"
                                                    name="color_id" aria-label="Default select example">
                                                    <option selected disabled>Select Color</option>
                                                    @foreach ($color as $item)
                                                        @if ($item->id == $color_id)
                                                            <option value="{{ $item->id }}" selected>
                                                                {{ $item->name }}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                                <p class="text-danger">@error('color_id'){{$message}} @enderror</p>
                                            </div>

                                            
                                            {{-- Size --}}
                                            <div class="col-md-4 my-3">
                                                <label for="inputEmail4" class="form-label">Size</label>
                                            
                                                <select class="form-select  border-1 size_id"
                                                    name="size_id" aria-label="Default select example">
                                                    <option selected disabled>Select Size</option>
                                                    @foreach ($size as $item)
                                                        @if ($item->id == $size_id)
                                                            <option value="{{ $item->id }}" selected>
                                                                {{ $item->name }}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            
                                                <p class="text-danger">@error('size_id'){{$message}} @enderror</p>
                                            </div>

                                            {{-- Brand --}}
                                            <div class="col-md-4 my-3">
                                                <label for="inputEmail4" class="form-label">Brand</label>
                                            
                                                <select class="form-select  border-1 brand_id"
                                                    name="brand_id" aria-label="Default select example">
                                                    <option selected disabled>Select Brand</option>
                                                    @foreach ($brand as $item)
                                                        @if ($item->id == $brand_id)
                                                            <option value="{{ $item->id }}" selected>
                                                                {{ $item->name }}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            
                                                <p class="text-danger">@error('brand_id'){{$message}} @enderror</p>
                                            </div>

                                            {{-- QTY --}}
                                            <div class="col-md-4 my-3">
                                                <label for="inputEmail4" class="form-label">QTY</label>
                                                <input type="text" name="qty" class="form-control slug-title" id="inputEmail4" value="{{$qty}}" required>
                                                <p class="text-danger">@error('qty'){{$message}} @enderror</p>
                                            </div> 

                                            
                                            {{-- Mrp --}}
                                            <div class="col-md-4 my-3">
                                                <label for="inputEmail4" class="form-label">Mrp</label>
                                                <input type="text" name="mrp" class="form-control slug-title" id="inputEmail4" value="{{$mrp}}" required>
                                                <p class="text-danger">@error('mrp'){{$message}} @enderror</p>
                                            </div> 

                                            {{-- Price --}}
                                            <div class="col-md-4 my-3">
                                                <label for="inputEmail4" class="form-label">Price</label>
                                                <input type="text" name="price" class="form-control slug-title" id="inputEmail4" value="{{$price}}" required>
                                                <p class="text-danger">@error('price'){{$message}} @enderror</p>
                                            </div> 

                                            {{-- Discount --}}
                                            <div class="col-md-4 my-3">
                                                <label for="inputEmail4" class="form-label">Discount</label>
                                                <input type="text" name="discount" class="form-control slug-title" id="inputEmail4" value="{{$discount}}" required>
                                                <p class="text-danger">@error('discount'){{$message}} @enderror</p>
                                            </div> 

                                                {{-- Sku --}}
                                                <div class="col-md-4 my-3">
                                                <label for="inputEmail4" class="form-label">Sku</label>
                                                <input type="text" name="sku" class="form-control slug-title" id="inputEmail4" value="{{$sku}}" required>
                                                <p class="text-danger">@error('sku'){{$message}} @enderror</p>
                                            </div> 

                                            {{-- features --}}
                                            <div class="col-md-12 my-3">
                                                <label class="form-label">Features</label>
                                                <textarea class="form-control" name="features" rows="2">{{$features}}</textarea>
                                            </div>

                                            {{-- Short Desc --}}
                                            <div class="col-md-12 my-3">
                                                <label class="form-label">Short Description</label>
                                                <textarea class="form-control" name="short_desc" rows="2">{{$short_desc}}</textarea>
                                            </div>

                                                {{-- Long Desc --}}
                                                <div class="col-md-12 my-3">
                                                <label class="form-label">Long Description</label>
                                                <textarea class="form-control" name="long_desc" rows="2">{{$long_desc}}</textarea>
                                            </div>

                                                {{-- button --}}
                                            <div class="col-md-12 my-3">
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
<script>
    $(document).ready(function () {
        $('.delete_image').click(function (e) { 
            e.preventDefault();
            console.log($(this).val())

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: `{{ url('product-image/delete') }}`,
                data: {
                        image_id: $(this).val(),
                    },
                dataType: "JSON",
                success: function(response) {
                    if(response.Status === 200){
                        location.reload();
                    }
                }
            });
            
        });
    });
</script>
@endsection