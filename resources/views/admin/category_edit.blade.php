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
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Feed Activity</div>
            </div>
            <div class="card-body">
                <form action="{{url('category_update/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" id="" placeholder="Insert Category Name" value="{{$category->name}}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">slug</label>
                        <input type="text" class="form-control" id="" placeholder="Insert Category Name" value="{{$category->slug}}" name="slug">
                    </div>

                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea class="form-control" id="" name="description" value="" rows="2"> {{$category->description}}</textarea>
                    </div>
                    <div class=" form-group row">
                    <div class=" col-md-6">
                        <label for="">status</label>
                        <input type="checkbox"  id="" {{$category->status=='1'?'checked':''}}  name="status">
                    </div>
                    <div class=" col-md-6">
                        <label for="">popular</label>
                        <input type="checkbox" {{$category->popular=='1'?'checked':''}}  id=""  name="popular">
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" id="" value="{{$category->meta_title}}" name="meta_title">

                    </div>

                    <div class="form-group">
                        <label for="">Meta Keywords</label>
                        <textarea class="form-control" id="" name="meta_keywords" value="" rows="2"> {{$category->meta_keywords}}</textarea>
                    </div>

                    <div class="form-group">
                    <label for="">Meta Discription</label>
                    <textarea class="form-control" id="" name="meta_description" value="" rows="2"> {{$category->meta_description}}</textarea>
                    </div>
                    @if($category->photo)
                    <img src="/photo/category/{{$category->photo}}" width="100px" alt="">

                    @endif

                    <div class="form-group">
                        <label for="file">Photo</label>
                        <input type="file" class="form-control"  name="photo">

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
