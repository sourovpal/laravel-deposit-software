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
                                <li class="breadcrumb-item"><a href="#">Deposit</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <!-- Basic example -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Edit User</h3></div>
                        <div class="card-body">
                            
                            <form method="post" enctype="multipart/form-data" action="">
                                <div class="form-group">
                                    <label class="form-label" for="">Name</label>
                                    <input required class="form-control" type="text" name="name" placeholder="Name"  value="{{ old('name', $edit->name) }}">
                                    @error('name') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Email</label>
                                    <input required class="form-control" type="text" name="email" placeholder="Email"  value="{{ old('email', $edit->email) }}" >
                                    @error('email') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Phone</label>
                                    <input required class="form-control" type="text" name="phone" placeholder="Phone"  value="{{ old('phone', $edit->phone) }}" >
                                    @error('phone') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Password</label>
                                    <input class="form-control" type="text" name="password" placeholder="Password"  value="{{ old('password') }}" >
                                    @error('password') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Status</label>
                                    <select required class="form-control" name="status" id="">
                                        <option value="">Status</option>
                                        <option @if(old('status', $edit->status) == 0) selected @endif value="0">Test Mode</option>
                                        <option @if(old('status', $edit->status) == 1) selected @endif value="1">Live Mode</option>
                                    </select>
                                    @error('status') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Amount</label>
                                    <input required class="form-control" type="number" step="any" name="amount" placeholder="Amount"  value="{{ old('amount', $edit->amount) }}">
                                    @error('amount') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Level</label>
                                    <select required class="form-control" name="level" id="">
                                        <option value="">Select Level</option>
                                        <option @if(old('level', $edit->level) == 1) selected @endif value="1">Bronze</option>
                                        <option @if(old('level', $edit->level) == 2) selected @endif value="2">Silver</option>
                                        <option @if(old('level', $edit->level) == 3) selected @endif value="3">Gold</option>
                                        <option @if(old('level', $edit->level) == 4) selected @endif value="4">Platinum</option>
                                    </select>
                                    @error('level') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                @csrf
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            </form>
                        </div>
                        <!-- card-body -->
                    </div>
                    <!-- card -->
                </div>
                <!-- col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">User Deposit</h3></div>
                        <div class="card-body">
                            
                            <form method="post" enctype="multipart/form-data" action="{{ route('dashboard.user.deposit') }}">
                                <div class="form-group">
                                    <label class="form-label" for="">User Name</label>
                                    <input required class="form-control" type="text" name="name" readonly placeholder="Name"  value="{{ old('name', $edit->name) }}">
                                    <input type="hidden" value="{{ $edit->id }}" name="id">
                                    @error('name') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Deposit Amount</label>
                                    <input required class="form-control" type="number" step="any" name="amount" placeholder="Amount"  value="{{ old('amount') }}">
                                    @error('amount') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Note</label>
                                    <input required class="form-control" type="text" name="note" placeholder="Note"  value="{{ old('amount') }}">
                                    @error('amount') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                @csrf
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