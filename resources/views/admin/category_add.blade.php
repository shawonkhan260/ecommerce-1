@extends('admin.base')
@section('base')
{{-- top head  --}}
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Category</h4>
                <div class="btn-group btn-group-page-header ml-auto">
                    <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu">
                        <div class="arrow"></div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div>
            {{-- then last 3 /div --}}


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Feed Activity</div>
            </div>
            <div class="card-body">
                <form action="{{Route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" id="" placeholder="Insert Category Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">slug</label>
                        <input type="text" class="form-control" id="" placeholder="Insert Category Name" name="slug">
                    </div>

                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea class="form-control" id="" name="description" rows="3"></textarea>
                    </div>
                    <div class="row form-group">
                    <div class=" col-md-6">
                        <label for="">status</label>
                        <input type="checkbox"  id=""  name="status">
                    </div>
                    <div class=" col-md-6">
                        <label for="">popular</label>
                        <input type="checkbox"  id=""  name="popular">
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" id=""  name="meta_title">

                    </div>

                    <div class="form-group">
                        <label for="">Meta Keywords</label>
                        <textarea class="form-control" id="" name="meta_keywords" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                    <label for="">Meta Discription</label>
                    <textarea class="form-control" id="" name="meta_description" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Photo</label>
                        <input type="file" class="form-control" name="photo">

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn_primary"> submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>

</div>
</div>

</div>
@endsection
