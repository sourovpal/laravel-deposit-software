<div class="row">
    <!-- Basic example -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Event Form</h3></div>
            <div class="card-body">
                
                <form method="post" @isset($edit) action="{{route('dashboard.event.update', $edit->id)}}" @endisset enctype="multipart/form-data">              
                    @csrf
                    <div class="form-group">
                        <label>Event Image (Any Size)</label>
                        <input type="file" class="form-control-file" name="image">
                        @error('image')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div>  
                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    @isset($edit)
                        <div class="my-3">
                            <img src="{{ asset('/frontend/images/event/'.$edit->file) }}" width="100%" alt="Event File">
                        </div>
                    @endisset                  
                </form>
            </div>
            <!-- card-body -->
        </div>
        <!-- card -->
    </div>
    <!-- col-->

</div>