@extends('admin.base')
@section('base')
{{-- top head  --}}
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">product</h4>
                {{-- three dot for option --}}
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Feed Activity</div>
                        </div>

             <!-- Button to open modal for add product -->
            <button type="button" class="btn btn-primary fa fa-plus fa-lg" data-toggle="modal" data-target="#myModal">
                Add New product
            </button>
            <hr>

            <!-- The Modal for add new product -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">add new product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                    <!-- Modal body -->
                    <div class="container">

                        <form action="{{Route('product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">product Name</label>
                                <input type="text" class="form-control"  placeholder="Insert product Name"  name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" name="cat_id" id="">
                                    <option >Select a Category</option>
                                @foreach ( $categorys as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                                </select>


                            </div>

                            <div class="form-group">
                                <label for="">Small Description</label>
                                <textarea class="form-control"  name="small_description" rows="2"></textarea>
                            </div>

                            <div class="form-group">
                            <label for="">Full Description</label>
                            <textarea class="form-control"  name="description" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control"   name="meta_title">
                            </div>

                            <div class="form-group">
                                <label for="">Meta keywords</label>
                                <input type="text" class="form-control"   name="meta_keywords">
                            </div>

                            <div class="form-group">
                                <label for="">Meta Description</label>
                                <input type="text" class="form-control"   name="meta_description">
                            </div>

                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="">Original Price</label>
                                    <input type="number" class="form-control"   name="original_price">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Selling Price</label>
                                    <input type="number" class="form-control"   name="selling_price">
                                </div>
                            </div>


                            <div class="form-group row ">
                                <div class=" col-md-6">
                                  <label for="">QTY</label>
                                  <input type="number" class="form-control" id="" name="qty" >
                                </div>
                                <div class=" col-md-6">
                                  <label for="">Tax</label>
                                  <input type="number" class="form-control" id="" placeholder="" name="tax">
                                </div>
                            </div>

                            <div class="row form-group">
                            <div class=" col-md-6">
                                <label for="">status</label>
                                <input type="checkbox"   name="status">
                            </div>
                            <div class=" col-md-6">
                                <label for="">tranding</label>
                                <input type="checkbox"   name="tranding">
                            </div>
                            </div>

                            <div class="form-group">
                                <label for="file">Photo</label>
                                <input type="file" class="form-control" name="image[]" multiple="multiple" >

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











            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" style="text-align:center" >
                        <thead>
                            <tr>
                                <th>sl</th>
                                <th>Name</th>
                                <th>Category Name</th>
                                <th>status</th>
                                <th>tranding</th>
                                <th>photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id=1;
                            ?>


                            @foreach ($products as $product)



                            <tr>
                                <td>{{$id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->status}}</td>
                                <td>{{$product->tranding}}</td>
                                <td >
                                    @php
                                        $images=json_decode($product->image);
                                    @endphp
                                    @for ($i=0;$i<count($images);$i++ )
                                    <img src="storage/photo/product/{{$images[$i]}}" style="height:50px; width:50px" alt="">
                                    @endfor
                                </td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-info">edit</a>
                                    <form style="display:inline" action="{{route('product.destroy',$product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger fa fa-trash fa-lg" type="submit"> Delete</button>
                                        </form>
                                </td>
                            </tr>
                            <?php
                                ++$id;
                            ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>




</div>
</div>

</div>
@endsection
@section('extra_js')
<script >

    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });
    });

</script>

@endsection
