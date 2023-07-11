@extends('admin.includes.layout')
@section('page_title', 'Dashboard - Brand')
    @section('container')
        <div class="ec-content-wrapper">
            <div class="content">
                <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                    <div>
                        <h1>Brand   </h1>
                        
                        @if (session('success_msg'))
                             <p class="message fw-bold fs-4 text-center my-3" style="color:blue ">{{session('success_msg')}}</p>                                          
                        @endif

                        <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                            <span><i class="mdi mdi-chevron-right"></i></span>Brand </p>
                    </div>
                    <?php $id = 'add'; ?>
                    <div>
                        <a href="{{url('admin/brand-form/'.$id)}}" class="btn btn-primary"> Add Brand</a>
                    </div>
                    
                </div>
            

                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="responsive-data-table" class="table"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Brand Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($data as $item)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><img class="tbl-thumb" src="{{asset('uploads/brand/'.$item->image) }}" alt="Brand Image" /></td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>

                                                    <td>
                                                        @if ($item->status == 1)
                                                            <a href="{{ url('brand-status/deactive/' . $item->id) }}" class="btn btn-success btn-circle btn-sm" title="Active">Active</a>
                                                        @elseif ($item->status == 0)
                                                            <a href="{{ url('brand-status/active/' . $item->id) }}" class="btn btn-danger btn-circle btn-sm" title="Deactive">Deactive</a>
                                                        @endif
                                                    </td>  
                                                    <td>
                                                        <div class="btn-group mb-1">
                                                            <button type="button"
                                                                class="btn btn-outline-success">Info</button>
                                                            <button type="button"
                                                                class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" data-display="static">
                                                                <span class="sr-only">Info</span>
                                                            </button>

                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ url('admin/brand-form/'.$item->id) }}">Edit</a>
                                                                <a class="dropdown-item" href="{{ url('brand-delete/'.$item->id)}}">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Content -->
        </div>
    @endsection
@section('custom_script')
   
@endsection