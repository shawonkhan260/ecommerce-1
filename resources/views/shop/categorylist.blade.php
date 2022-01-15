@extends('shop.base')
@section('base')




    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                    @foreach ($categorys as $category)
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">

                    <div class="shop-cat-box">
                        <img class="img-fluid " src="{{Storage::url('photo/category/'. $category->photo)}}" alt="" style="height:200px;width:100%" />
                        <a class="btn hvr-hover" href="{{Route('category.product',$category->id)}}">{{$category->name}}</a>
                    </div>
                </div>


                    @endforeach
            </div>
        </div>
    </div>
    <!-- End Categories -->


@endsection
@section('extra_js')
@endsection
