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
                        <div class="card-header"><h3 class="card-title">Edit Withdraw & Deposit</h3></div>
                        <div class="card-body">
                            
                            <form method="post" enctype="multipart/form-data" action="">
                                <div class="form-group">
                                    <label class="form-label" for="">Amount</label>
                                    <input required class="form-control" type="number" name="amount" placeholder="Amount" step="any" value="{{ old('amount', $edit->amount) }}">
                                    @error('amount') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Transition Type</label>
                                    <select required class="form-control" name="transition_type" id="">
                                        <option value="">Transition Type</option>
                                        <option @if(old('transition_type', $edit->type == 'withdraw' ?1:0) == 1) selected @endif value="1">Withdraw</option>
                                        <option @if(old('transition_type', $edit->type == 'deposit' ?2:0) == 2) selected @endif value="2">Deposit</option>
                                    </select>
                                    @error('transition_type') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Status</label>
                                    <select required class="form-control" name="status" id="">
                                        <option @if(old('status', $edit->status) == 0) selected @endif value="0">Pending</option>
                                        <option @if(old('status', $edit->status) == 1) selected @endif value="1">Approve</option>
                                        <option @if(old('status', $edit->status) == 2) selected @endif value="2">Cancel</option>
                                    </select>
                                    @error('status') <span class="d-block form-error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Note</label>
                                    <textarea required class="form-control" type="text" name="note" placeholder="Note" value="">{{ old('note', $edit->note) }}</textarea>
                                    @error('note') <span class="d-block form-error">{{ $message }}</span> @enderror
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