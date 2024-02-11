@extends('app')
@push('custom_styles')
     <link href="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')

<main id="profile-page">
    <!-- Profile Header -->
    <section id="profile-header">
        <a href="{{ url()->previous()??route('home') }}">
            Back
        </a>
        <div class="profile-header-info mt-3">
            <img src="https://placehold.co/80x80" alt="">
            <h4>{{ $user->name }}</h4>
            <p>Referral Code <span>{{ $user->referral_code }}</span></p>
            <div class=wrapper>
                <div class="range">
                    <input type="range" min="0" max="100" value="100" id="range" />
                    <div class="value">100%</div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2">
                    <div class="profile-info-content">
                        <h1>{{ number_format(\App\Models\Deposit::where('type', 'deposit')->where('status', 1)->whereDate('deposit_date', now()->format('Y-m-d'))->where('user_id', $user->id)->sum('amount'), 2) }} USDT</h1>
                        <p>Today's Balance</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="profile-info-content">
                        <h1>{{ number_format(\App\Models\Deposit::where('type', 'profit')->where('status', 1)->whereDate('deposit_date', now()->format('Y-m-d'))->where('user_id', $user->id)->sum('amount'), 2) }} USDT</h1>
                        <p>Today's Profit</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="profile-info-content">
                        <h1>{{ number_format(abs(\App\Models\Deposit::whereDate('deposit_date', now()->format('Y-m-d'))->where('status', 1)->where('user_id', $user->id)->where('amount', '<', 0)->sum('amount')), 2) }} USDT</h1>
                        <p>Today's Withdraw</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="profile-info-content">
                        <h1>{{ number_format(abs(\App\Models\Deposit::where('user_id', $user->id)->where('status', 1)->where('amount', '<', 0)->sum('amount')), 2) }} USDT</h1>
                        <p>Total Withdraw</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="profile-info-content">
                        <h1>{{ number_format(\App\Models\Deposit::where('user_id', $user->id)->where('status', 1)->sum('amount'), 2) }} USDT</h1>
                        <p>Total Balance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Transaction -->
    <section id="profile-transaction">
        <div class="container-fluid">
            <h4>Deposit</h4>
            <ul>
                <li>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="#">TRON 20</a>
                        </div>
                        <div>
                            <span id="tron_val">{{ $setting->tron20 }}</span>
                        </div>
                        <div class="align-items-center">
                            <button id="tron_btn" class="btn btn-sm btn-primary">
                                <span class="material-icons">content_copy</span>
                                <span style="display: none;" id="tronMSG">Copied</span>
                            </button>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="#">ERC 20</a>
                        </div>
                        <div>
                            <span id="erc_val">{{ $setting->erc20 }}</span>
                        </div>
                        <div>
                            <button id="erc_btn" class="btn btn-sm btn-primary">
                                <span class="material-icons">content_copy</span>
                                <span style="display: none;" id="ercMSG">Copied</span>
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="profile-important-note">
                <h5>Important Note</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque nisi incidunt eaque vitae recusandae eius. Itaque ea, optio minima repellendus doloremque molestias quo similique nemo facilis soluta, distinctio magnam. Pariatur aliquid laboriosam eligendi ut eum officia consectetur debitis dolor autem assumenda! Ab ut at maxime labore, recusandae a magni quidem.</p>
            </div>
        </div>
    </section>
    <section id="profile-transaction" class="pb-5 mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <h4>Withdraw & Deposit</h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <td width="5%">#</td>
                                    <td width="10%">Date</td>
                                    <td width="15%">Transition Type</td>
                                    <td width="15%">Amount</td>
                                    <td width="10%">Status</td>
                                    <td width="10%">Addr & Img</td>
                                    <td>Note</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (\App\Models\Deposit::where('user_id', $user->id)->orderBy('id', 'desc')->get() as $deposit)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
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
                                    <td>

                                        @if ($deposit->type == 'deposit' && $deposit->address != '')
                                            <div>
                                                <img class="img-thumbnail" style="width:50px;" src="{{asset('document/'.$deposit->address)}}" />
                                            </div>
                                        @elseif ($deposit->type == 'profit' && $deposit->address == '')
                                            <span class="badge badge-warning">Not added yet</span>
                                        @else
                                            {{$deposit->address}}
                                        @endif

                                    </td>
                                    <td>{{$deposit->note}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4>Add New Withdraw & Deposit</h4>
                    <br>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input required class="form-control" type="number" name="amount" placeholder="Amount" step="any" value="{{ old('amount') }}">
                            @error('amount') <span class="d-block form-error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <select required class="form-control" name="transition_type" id="">
                                <option value="">Transition Type</option>
                                <option  value="1">Withdraw</option>
                                <option  value="2">Deposit</option>
                            </select>
                            @error('transition_type') <span class="d-block form-error">{{ $message }}</span> @enderror
                        </div>
                        <div id="custom_field">
                            @error('address') <span class="d-block form-error">{{ $message }}</span> @enderror
                            @error('screenshort')<span class="d-block form-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <textarea required class="form-control" type="text" name="note" placeholder="Note" value="">{{ old('note') }}</textarea>
                            @error('note') <span class="d-block form-error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><br><br><br>
    @include('inc.bottom-navbar')
</main>

@endsection


@push('custom_scripts')
<script src="{{ asset('backend/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    (function(){
        $('#datatable').DataTable();

        $(document).on('change', '[name="transition_type"]', function(){
            var val = $(this).val();
            if(val == 1){
                $('#custom_field').html(`
                    <div class="form-group">
                        <input required class="form-control" type="text" name="address" placeholder="Address">
                    </div>
                `);
            }else if(val == 2){
                $('#custom_field').html(`
                    <div class="form-group">
                        <label class="form-label">Deposit Screenshort:</label>
                        <input required class="d-block" type="file" accept="image/png, image/webp, image/jpg, image/jpeg" name="screenshort" placeholder="screenshort">
                    </div>
                `);
            }else{
                $('#custom_field').html(``);
            }
        });

    })();
</script>
@endpush