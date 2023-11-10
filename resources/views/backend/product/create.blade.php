@extends('backend.layouts.app')

@push('custom_styles')
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
                        <h4 class="page-title">Create a New Product</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">Moltran</a></li>
                                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                <li class="breadcrumb-item active">General elements</li>
                            </ol>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @include('backend.product.form')
            <!-- End row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end content -->
</div>


@endsection

@push('custom_scripts')

@endpush