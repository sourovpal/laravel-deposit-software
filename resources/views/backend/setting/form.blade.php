<div class="row">
    <!-- Basic example -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                
                <form method="post" @isset($edit) action="{{route('dashboard.setting.update', $edit->id)}}" @endisset>              
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">TRON 20</label>
                        <input type="text" class="form-control" value="{{ $edit->tron20 }}" name="tron20">
                        @error('tron20')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div> 
                    <div class="form-group">
                        <label for="" class="form-label">ERC 20</label>
                        <input type="text" class="form-control" value="{{ $edit->erc20 }}" name="erc20">
                        @error('erc20')<span class="d-block form-error">{{ $message }}</span>@enderror
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