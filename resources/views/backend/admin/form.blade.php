<div class="row">
    <!-- Basic example -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Register Form</h3></div>
            <div class="card-body">
                @isset($edit)
                <form method="post" enctype="multipart/form-data" action="{{ route('dashboard.admin.edit', $edit->id) }}">
                @else
                <form method="post" enctype="multipart/form-data" action="{{ route('dashboard.admin.store') }}">
                @endisset
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name', isset($edit)?$edit->name:'') }}">
                        @error('name')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email address" value="{{ old('email', isset($edit)?$edit->email:'') }}">
                        @error('email')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter phone number" value="{{ old('phone', isset($edit)?$edit->phone:'') }}">
                        @error('phone')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div>
                    @if(!isset($edit))
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        @error('password')<span class="d-block form-error">{{ $message }}</span>@enderror
                    </div>
                    @endisset
                    <div class="form-group">
                        <label>Profile Image (200 x 200)</label>
                        <input type="file" name="avatar" class="form-control-file">
                        @error('avatar')<span class="d-block form-error">{{ $message }}</span>@enderror
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