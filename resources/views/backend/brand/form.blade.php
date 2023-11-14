<div class="row">
    <!-- Basic example -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Brand Form</h3></div>
            <div class="card-body">
                
                <form method="post" @isset($edit) action="{{route('dashboard.brand.update', $edit->id)}}" @endisset enctype="multipart/form-data">              
                    @csrf
                    <div class="form-group">
                        <label>Product Image (300 x 220)</label>
                        <input type="file" class="form-control-file" name="image">
                        @error('image')<span class="d-block form-error">{{ $message }}</span>@enderror
                        @isset($edit)
                            <div class="my-3">
                                <img src="{{ asset('/frontend/images/brand/'.$edit->image) }}" height="60" alt="Brand Slider">
                            </div>
                        @endisset                  
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