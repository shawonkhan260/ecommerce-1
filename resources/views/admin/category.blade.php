@extends('admin.base')
@section('base')
{{-- top head  --}}
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Category</h4>
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

             <!-- Button to open modal for add category -->
            <button type="button" class="btn btn-primary fa fa-plus fa-lg" data-toggle="modal" data-target="#myModal">
                Add New Category
            </button>
            <hr>

            <!-- The Modal for add new category -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">add new Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                    <!-- Modal body -->
                    <div class="container">

                        <form action="{{Route('category.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control"  placeholder="Insert Category Name" required name="name">
                            </div>
                            <div class="form-group">
                                <label for="">slug</label>
                                <input type="text" class="form-control"  placeholder="Insert Category Name" name="slug">
                            </div>

                            <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control"  name="description" rows="3"></textarea>
                            </div>
                            <div class="row form-group">
                            <div class=" col-md-6">
                                <label for="">status</label>
                                <input type="checkbox"   name="status">
                            </div>
                            <div class=" col-md-6">
                                <label for="">popular</label>
                                <input type="checkbox"   name="popular">
                            </div>
                            </div>

                            <div class="form-group">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control"   name="meta_title">

                            </div>

                            <div class="form-group">
                                <label for="">Meta Keywords</label>
                                <textarea class="form-control"  name="meta_keywords" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                            <label for="">Meta Discription</label>
                            <textarea class="form-control"  name="meta_description" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="file">Photo</label>
                                <input type="file" class="form-control" name="photo">

                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a type="submit" href="{{Route('category.add')}}" class="btn btn-primary">Submit</a>
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>slug</th>
                                <th>meta title</th>
                                <th>meta keywords</th>
                                <th>meta description</th>
                                <th>status</th>
                                <th>Popular</th>
                                <th>photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $cat)


                            <tr>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->description}}</td>
                                <td>{{$cat->slug}}</td>
                                <td>{{$cat->meta_title}}</td>
                                <td>{{$cat->meta_keywords}}</td>
                                <td>{{$cat->meta_description}}</td>
                                <td>{{$cat->status}}</td>
                                <td>{{$cat->popular}}</td>
                                <td ><img src="{{Storage::url('photo/category/'. $cat->photo)}}" style="height:50px; width:50px" alt=""></td>
                                {{-- <td ><img src="photo/category/{{$cat->photo}}" style="height:50px; width:50px" alt=""></td> --}}
                                <td>
                                    <a href="{{url('category_edit/'.$cat->id)}}" class="btn btn-info">edit</a>
                                    <a href="{{url('category_delete/'.$cat->id)}}" class="btn btn-danger" id="">delete</a>
                                </td>
                            </tr>
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
