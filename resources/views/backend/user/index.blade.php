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
                        <h4 class="page-title">All Users</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Users</li>
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
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="card-title">View List</h3>
                                <a href="{{ route('dashboard.user.add.user') }}" class="btn btn-info btn-sm">Create User</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th width="5%">Level</th>
                                                <th width="25%">User</th>
                                                <th width="15%">Phone</th>
                                                <th width="10%">Referral User</th>
                                                <th width="10%">Referral Code</th>
                                                <th>Status</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <img width="40" class="img-thumbnail" src="{{asset('frontend/images/level/'.$user->level.'.jpeg')}}" alt="">
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <div class="mr-3">
                                                            <img width="40" class="img-thumbnail" src="https://i.pravatar.cc/200/200?{{ rand() }}" alt="">
                                                        </div>
                                                        <div>
                                                            <span class="d-block">{{$user->name}}</span>
                                                            <span class="d-block">{{$user->email}}</span>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    {{$user->phone}}
                                                </td>
                                                <td>
                                                    @if($user->referral_id)
                                                    <a  href="" class="badge badge-success">View Referral</a>
                                                    @else
                                                    <span class="badge badge-danger">Without Referral</span>
                                                    @endif
                                                </td>
                                                <td>{{$user->referral_code}}</td>
                                                <td>
                                                    @if($user->status == 0)
                                                    <span class="badge badge-success">Test Mode</span>
                                                    @else
                                                    <span class="badge badge-success">Live Mode</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" href="{{route('dashboard.user.products', $user->id)}}">Products</a>
                                                    <a class="btn btn-sm btn-warning" href="{{route('dashboard.user.edit', $user->id)}}">Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="{{route('dashboard.user.destroy', $user->id)}}">Delete</a>
                                                    <a class="btn btn-sm btn-info" onclick="return confirm('Are your sure? Reset All Data.');" href="{{route('dashboard.user.reset', $user->id)}}">Reset</a>
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