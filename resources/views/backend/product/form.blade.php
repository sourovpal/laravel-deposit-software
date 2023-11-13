<div class="row">
    <!-- Basic example -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Register Form</h3></div>
            <div class="card-body">
                
                <form method="post"8 @isset($edit) action="{{route('dashboard.product.update', $edit->id)}}" @endisset enctype="multipart/form-data">
                
                    @csrf
                    <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{old('title', isset($edit)?$edit->title:'')}}">
                        @error('title')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter Price" step="any" value="{{old('price', isset($edit)?$edit->price:'')}}">
                        @error('price')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Product Profit</label>
                        <input type="text" name="profit" class="form-control" placeholder="Enter profit" step="any" value="{{old('profit', isset($edit)?$edit->profit:'')}}">
                        @error('profit')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Product Image (200 x 200)</label>
                        <input type="file" class="form-control-file" name="image">
                        @error('image')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="">
                            <option @if(old('status', isset($edit)?$edit->profit:'') == 1) selected @endif value="1">Public</option>
                            <option @if(old('status', isset($edit)?$edit->profit:'') == 0) selected @endif value="0">Draft</option>
                        </select>
                        @error('status')<span class="d-block form-error">{{ $message }}</span>@enderror
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