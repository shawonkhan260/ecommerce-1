@extends('shop.base')
@section('base')


    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="/shop/images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="/shop/images/banner-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="/shop/images/banner-03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

{{-- start top category --}}
    <div class="py-5" >
            <div class="row">
                <div class="col-lg-12  ">
                    <div class="row">
                        <div class="title-all ml-5 col-md-9 d-inline">
                            <h1>Top Categories</h1>
                        </div>
                        <div class="col-md-2 d-inline ">
                            <a href="{{Route('categorylist')}}" type="button" class="btn btn-success">show all categories</a>
                        </div>
                    </div>
                    <div class="main-instagram owl-carousel owl-theme ">
                        @foreach ($categorys as $category)
                        <div class="item">
                            <div class="card">
                                <img src="{{Storage::url('photo/category/'.$category->photo)}}" style="height:400px" alt="">
                                <a class="btn hvr-hover" href="{{Route('category.product',$category->id)}}">{{$category->name}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
{{-- end top category --}}

{{-- start trending product --}}
<div class="py-5" >
    <div class="row">
        <div class="col-lg-12  ">
            <div class="row">
                <div class="title-all ml-5 col-md-9 d-inline">
                    <h1>Trending Products</h1>
                </div>
                <div class="col-md-2 d-inline ">
                    <a href="" type="button" class="btn btn-success">show all products</a>
                </div>
            </div>
            <div class="main-instagram owl-carousel owl-theme px-5">
                @foreach ($products as $product)
                <div class="item">
                    <div class="products-single  px-1">
                        <div class="box-img-hover ">
                            @php
                                $images=json_decode($product->image);
                            @endphp
                            <img  src="{{Storage::url('photo/product/'.$images[0])}}"  style="height:400px" alt="">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="{{Route('productdetails',$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <a href="{{Route('productdetails',$product->id)}}"><h2>{{$product->name}}</h2></a>
                            <h5> <del>{{$product->original_price}} ৳</del> {{$product->selling_price}} ৳</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- end trending product --}}

@endsection
@section('extra_js')
<script>
    $('.category').owlCarousel({
        loop:false,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>
@endsection
