@extends('backend.layouts.app')

@push('custom_styles')
     <link href="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('page_content')


<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">All Products</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header py-2 d-flex justify-content-between align-items-center">
                            <h3 class="card-title">View List</h3>
                            <div class="">
                                <a class="btn btn-primary btn-sm" href="{{ route('dashboard.product.create') }}"><i class="fa fa-plus mr-2"></i> Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Price From</th>
                                                <th>Price To</th>
                                                <th>Position</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <img width="40" class="img-thumbnail" src="{{asset('frontend/images/product/'.$product->image)}}" alt="">
                                                </td>
                                                <td>{{$product->title}}</td>
                                                <td>${{$product->price}}</td>
                                                <td>${{$product->price_to}}</td>
                                                <td>{{$product->position}}</td>
                                                <td>
                                                @if($product->status == 1)
                                                    <span class="badge badge-success">Publish</span>
                                                @else
                                                    <span class="badge badge-warning">Derft</span>
                                                @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-warning" href="{{route('dashboard.product.edit', $product->id)}}">Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="{{route('dashboard.product.destroy', $product->id)}}">Delete</a>
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

            </div>
            <!-- End Row -->
        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->

</div>


@endsection

@push('custom_scripts')
<script src="{{ asset('backend/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('backend/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('backend/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script>
    (function(){
        $('#datatable').DataTable();
    })();
</script>
@endpush