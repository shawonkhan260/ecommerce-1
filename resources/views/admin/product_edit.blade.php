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
                <form action="{{Route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label for="">product Name</label>
                        <input type="text" class="form-control"  placeholder="Insert product Name" value="{{$product->name}}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="cat_id" id="">
                            <option value="{{$product->cat_id}}" >{{$product->category->name}}</option>
                        @foreach ( $categorys as $item )
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach

                        </select>


                    </div>

                    <div class="form-group">
                        <label for="">Small Description</label>
                        <textarea class="form-control"  name="small_description" rows="2">{{$product->small_description}}</textarea>
                    </div>

                    <div class="form-group">
                    <label for="">Full Description</label>
                    <textarea class="form-control"  name="description" rows="3">{{$product->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" value="{{$product->meta_title}}"   name="meta_title">
                    </div>

                    <div class="form-group">
                        <label for="">Meta keywords</label>
                        <input type="text" class="form-control" value="{{$product->meta_keywords}}"   name="meta_keywords">
                    </div>

                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <input type="text" class="form-control" value="{{$product->meta_description}}"  name="meta_description">
                    </div>

                    <div class="form-group row ">
                        <div class="col-md-6">
                            <label for="">Original Price</label>
                            <input type="number" class="form-control" value="{{$product->original_price}}"  name="original_price">
                        </div>

                        <div class="col-md-6">
                            <label for="">Selling Price</label>
                            <input type="number" class="form-control" value="{{$product->selling_price}}"   name="selling_price">
                        </div>
                    </div>


                    <div class="form-group row ">
                        <div class=" col-md-6">
                          <label for="">QTY</label>
                          <input type="number" class="form-control" id="" value="{{$product->qty}}" name="qty" >
                        </div>
                        <div class=" col-md-6">
                          <label for="">Tax</label>
                          <input type="number" class="form-control" id="" placeholder="" value="{{$product->tax}}" name="tax">
                        </div>
                    </div>

                    <div class="row form-group">
                    <div class=" col-md-6">
                        <label for="">status</label>
                        <input type="checkbox"  {{$product->status=='1'?'checked':''}}  name="status">
                    </div>
                    <div class=" col-md-6">
                        <label for="">tranding</label>
                        <input type="checkbox"  {{$product->tranding=='1'?'checked':''}}  name="tranding">
                    </div>
                    </div>
                    @if($product->image)
                    <img src="/photo/product/{{$product->image}}" width="100px" alt="">

                    @endif

                    <div class="form-group">
                        <label for="file">Photo</label>
                        <input type="file" class="form-control" name="image">

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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
