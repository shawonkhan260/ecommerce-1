@section('base')
<div class="main-panel">
    <div class="content">
<div class="container rounded bg-white my-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="storage/photo/profile/{{Auth::user()->photo}}" width="150px"><span class="font-weight-bold">{{Auth::user()->name}}</span><span class="text-black-50">{{Auth::user()->email}}</span></div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <form action="{{Route('editprofile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row mt-2">
                    <div class="col-md-12"><label>name</label><input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label>email</label><input type="text" class="form-control" name="email" value="{{Auth::user()->email}}"></div>
                    <div class="col-md-6"><label>phone</label><input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label for="">address</label><input type="text" class="form-control" name="address" value="{{Auth::user()->address}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label>password</label><input type="text" class="form-control" name="password" ></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label>change profile Photo</label>
                        <input type="file" class="form-control" name="photo"></div>
                </div>

                <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </form>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
@section('extra_css')
<style>
    body {
    background: #BA68C8
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: #BA68C8;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}
</style>
@endsection
@section('extra_js')
@endsection
