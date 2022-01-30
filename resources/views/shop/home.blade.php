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

<!-- Gallery -->
<div class="row mt-5 mx-3">
    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 ">
        <a  href="{{Route('shop')}}">
      <img
        src="shop/images/offer/offer70.jpg"
        class="w-100  shadow p-3 mb-5 bg-white rounded " height="200"
        alt="Boat on Calm Water"
      />
      </a>
      <a  href="{{Route('shop')}}">
      <img
        src="shop/images/offer/offer60.jpg"
        class="w-100 shadow p-3 mb-5 bg-white rounded" height="400"
        alt="Wintry Mountain Landscape"
      />
      </a>
    </div>
    <div class="col-lg-4 mb-4 mb-lg-0">
    <a  href="{{Route('shop')}}">
      <img
        src="shop/images/offer/offer50.jpg"
        class="w-100 shadow p-3 mb-5 bg-white rounded" height="300"
        alt="Mountains in the Clouds"
      />
    </a>
      <a  href="{{Route('shop')}}">
      <img
        src="shop/images/offer/offer40.jpg"
        class="w-100 shadow p-3 mb-5 bg-white rounded" height="300"
        alt="Boat on Calm Water"
      />
    </a>
    </div>
    <div class="col-lg-4 mb-4 mb-lg-0">
    <a  href="{{Route('shop')}}">
      <img
        src="shop/images/offer/offer30.jpg"
        class="w-100 shadow p-3 mb-5 bg-white rounded" height="200"
        alt="Waves at Sea"
      />
    </a>
      <a  href="{{Route('shop')}}">
      <img src="shop/images/offer/offer20.jpg" class="w-100 shadow p-3 mb-5 bg-white rounded" alt="Yosemite National Park" height="400"  />
    </a>
    </div>
  </div>
<!-- Gallery -->

{{-- start top category --}}
<div class="categories-shop">
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Top Categories</h1>
                </div>
            </div>
        </div>
        <div class="row mx-2">
            @foreach ($categorys as $category)
            <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 ">
                <div class="shop-cat-box shadow p-3 mb-5 bg-white rounded">
                    <img class="img-fluid" src="{{Storage::url('photo/category/'.$category->photo)}}" style="height:200px" alt="" />
                    <a class="btn hvr-hover" href="{{Route('category.product',$category->id)}}">{{$category->name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- end top category --}}

{{-- start top product --}}
    <div class=" ">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Top Products</h1>
                </div>
            </div>
        </div>
        <div class="row ">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-5 content ">
                <div class="item product_data">
                    <div class="products-single  px-1 shadow p-3 mb-5 bg-white rounded">
                        <div class="box-img-hover ">
                            @php
                                $images=json_decode($product->image);
                            @endphp
                            <input type="hidden" class="product_id"  value="{{$product->id}}">
                            <input type="hidden" class="product_qty"  value="1">
                            <img  src="{{Storage::url('photo/product/'.$images[rand(0,2)])}}"  style="height:400px" alt="">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="{{Route('productdetails',$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" class="addToWishlistBtn" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart addToCartBtn" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <a href="{{Route('productdetails',$product->id)}}"><h2>{{$product->name}}</h2></a>
                            <h5> <del>{{$product->original_price}} ৳</del> {{$product->selling_price}} ৳</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a href="#" id="loadMore">Load More</a>
    </div>
{{-- end top product --}}

{{-- start trending product --}}
<div class="py-5 " >
    <div class="row">
        <div class="col-lg-12  shadow p-3 mb-5 bg-white rounded">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Trending Products</h1>
                </div>
            </div>
            <div class="main-instagram owl-carousel owl-theme px-5">
                @foreach ($products as $product)
                <div class="item product_data">
                    <div class="products-single  px-1">
                        <div class="box-img-hover ">
                            @php
                                $images=json_decode($product->image);
                            @endphp
                            <input type="hidden" class="product_id"  value="{{$product->id}}">
                            <input type="hidden" class="product_qty"  value="1">
                            <img  src="{{Storage::url('photo/product/'.$images[0])}}"  style="height:400px" alt="">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="{{Route('productdetails',$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" class="addToWishlistBtn" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart addToCartBtn" href="#">Add to Cart</a>
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

    $(document).ready(function(){
    $(".content").slice(0, 8).show();
    $("#loadMore").on("click", function(e){
        e.preventDefault();
        $(".content:hidden").slice(0, 8).slideDown();
        if($(".content:hidden").length == 0) {
        $("#loadMore").text("No Content").addClass("noContent");
        }
    });

    })
</script>
@endsection
@section('extra_css')
<style>

.content {
  display: none;
}
#loadMore {
  width: 200px;
  color: #fff;
  display: block;
  text-align: center;
  margin: 20px auto;
  padding: 10px;
  border-radius: 10px;
  border: 1px solid transparent;
  background-color: #8ed333;
  transition: .3s;
}
#loadMore:hover {
  color: #8ed333;
  background-color: #fff;
  border: 1px solid #8ed333;
  text-decoration: none;
}
.noContent {
  color: #000 !important;
  background-color: transparent !important;
  pointer-events: none;
}
</style>
@endsection

