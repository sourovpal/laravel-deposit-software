<div class="row">
    <!-- Basic example -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">About Form</h3></div>
            <div class="card-body">
                
                <form method="post" action="{{route('dashboard.about.update', $edit->id)}}">
                    @csrf
                    <div class="form-group">
                        <label>About Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{old('title', isset($edit)?$edit->title:'')}}">
                        @error('title')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>About Content</label>
                        <textarea name="content" class="form-control" id="content" cols="8" placeholder="Enter Content">{{old('content', isset($edit)?$edit->content:'')}}</textarea>
                        @error('content')<span class="d-block form-error">{{ $message }}</span>@enderror
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