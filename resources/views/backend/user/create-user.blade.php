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
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.user.index') }}">User</a></li>
                                <li class="breadcrumb-item active">Create User</li>
                            </ol>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <!-- Basic example -->
                <div class="col-xl-8 ">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Add User</h3></div>
                        <div class="card-body">
                            
                            <form method="post" autocomplete="off" action="{{ route('dashboard.user.create.user') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Name"  value="{{ old('name') }}">
                                    @error('name') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="Email"  value="{{ old('email') }}">
                                    @error('email') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Phone</label>
                                    <input class="form-control" type="number" name="phone" placeholder="Phone"  value="{{ old('phone') }}">
                                    @error('phone') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="password"  value="{{ old('password') }}">
                                    @error('password') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Confirm Password</label>
                                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password"  value="{{ old('confirm_password') }}">
                                    @error('confirm_password') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Referral Code</label>
                                    <input class="form-control" type="text" name="referral_code" placeholder="Referral Code"  value="{{ old('referral_code') }}">
                                    @error('referral_code') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            </form>
                        </div>
                        <!-- card-body -->
                    </div>
                    <!-- card -->
                </div>
                <!-- col-->

            </div>
            <!-- End row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end content -->
</div>


@endsection

@push('custom_scripts')

@endpush