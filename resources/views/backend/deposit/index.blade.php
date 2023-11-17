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
                        <h4 class="page-title">All Deposits</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Deposits</li>
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
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <table id="datatable" class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <td width="5%">#</td>
                                                <td width="20%">User</td>
                                                <td width="10%">Date</td>
                                                <td width="10%">Transition Type</td>
                                                <td width="10%">Amount</td>
                                                <td width="10%">Status</td>
                                                <td>Note</td>
                                                <td width="5%">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($deposits as $deposit)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>
                                                    @php
                                                        $depUser  = \App\Models\User::find($deposit->user_id);
                                                    @endphp
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <div>
                                                            <img class="img-thumbnail" style="border-radius: 50%;width: 40px;height: 40px;margin-right: 8px;" src="https://placehold.co/80x80" alt="">
                                                        </div>
                                                        <div>
                                                            <span class="d-flex text-muted">{{optional($depUser)->name??'Not Found'}}</span>
                                                            <span class="d-flex text-muted">{{optional($depUser)->email??'Not Found'}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$deposit->deposit_date}}</td>
                                                <td>
                                                    @if ($deposit->type == 'deposit')
                                                        <span class="badge badge-success">Deposit</span>
                                                    @elseif ($deposit->type == 'profit')
                                                        <span class="badge badge-primary">Profit</span>
                                                    @else
                                                        <span class="badge badge-warning">Withdraw</span>
                                                    @endif
                                                </td>
                                                <td>{{number_format($deposit->amount,  2)}} USDT</td>
                                                <td>
                                                    @if ($deposit->status == 0)
                                                        <span class="badge badge-primary">Pending</span>
                                                    @elseif ($deposit->status == 1)
                                                        <span class="badge badge-success">Approve</span>
                                                    @else
                                                        <span class="badge badge-danger">Cancel</span>
                                                    @endif
                                                </td>
                                                <td>{{$deposit->note}}</td>
                                                <td>
                                                    <a class="btn btn-warning btn-sm" href="{{route('dashboard.deposit.edit', $deposit->id)}}">Edit</a>
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
<script>
    (function(){
        $('#datatable').DataTable();
    })();
</script>
@endpush