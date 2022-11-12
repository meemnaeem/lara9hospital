<div class="card">
    <div class="card-header">
        Header
    </div>
    <div class="card-body bg-white" style="background: white">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="" class="form-label">Title</label>
                    <select name="title" id="title" class="form-control">
                        <option value="1">Mr</option>
                        <option value="2">Dr</option>
                        <option value="3">Mrs</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Enter full name">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username"
                        placeholder="Enter username">
                </div>
            </div>
        </div>

        {{-- step 2 --}}
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        @foreach (App\Jambasangsang\Helper::getGender() as $key => $gender)
                            <option value="{{ $key }}">{{ $gender }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <input type="Email" class="form-control" name="email" id="email" placeholder="Enter email">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone">
                </div>
            </div>
        </div>

        {{-- step 3 --}}
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="" class="form-label">Religion</label>
                    <select name="religion" id="religion" class="form-control">
                        @foreach (App\Jambasangsang\Helper::getReligion() as $key => $religion)
                            <option value="{{ $key }}">{{ $religion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="form-label">Date of birth</label>
                    <input type="date" class="form-control" name="dob" id="dob"
                        placeholder="Enter Date of birth">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="form-label">Role</label>
                    <select name="role_id" id="role_id" class="form-control">
                        @foreach (App\Jambasangsang\Helper::getRoles() as $key => $role)
                            <option value="{{ $role->name }}">{{ Str::ucfirst(Str::replace('-', ' ', $role->name)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="" class="form-label">Status</label>
                    <div class="check-toggle">
                        <input type="checkbox" class="check" name="status" id="status">
                        <label for="status" class="checktoggle"></label>
                    </div>
                </div>
            </div>
        </div>

        {{-- step 4 --}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label">Address 1</label>
                    <textarea name="address_1" id="address_1" cols="20" rows="2" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label">Address 2</label>
                    <textarea name="address_2" id="address_2" cols="20" rows="2" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="btn-group">
            <button class="btn btn-success btn-flat btn-lg">Submit</button>
        </div>
    </div>
</div>
