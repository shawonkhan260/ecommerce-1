@extends('shop.base')
@section('base')
<div class="py-3 mb-4 shadow-sm border-top " style="background-color: rgb(243, 241, 237)">
    <div class="container">
        <h4 class="mb-0"><a href="{{Route('category.product',$product->cat_id)}}">{{$product->category->name}}</a> / {{$product->name}}</h4>
    </div>
</div>

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main product_data">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">

                            @for ($i=0;$i<count($images);$i++ )

                            <div class="carousel-item {{$i==0?'active':''}}"> <img class="d-block w-100" style="height: 50vh" src="{{Storage::url('photo/product/'. $images[$i])}}" alt="First slide"> </div>

                            @endfor
                            {{-- <div class="carousel-item"> <img class="d-block w-100" src="{{asset('shop/images/big-img-02.jpg')}}" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset('shop/images/big-img-03.jpg')}}" alt="Third slide"> </div> --}}
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span>
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
						<span class="sr-only">Next</span>
					</a>
                        <ol class="carousel-indicators">
                            @for ($i=0;$i<count($images);$i++ )
                            <li data-target="#carousel-example-1" data-slide-to="{{$i}}" class="{{$i==0?'active':''}}">
                                <img class="d-block w-100 img-fluid" src="{{Storage::url('photo/product/'. $images[$i])}}" alt="" />
                            </li>
                            @endfor

                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$product->name}}
                        <label style="font-size: 16px; color:white;" class="float-end badge bg-danger trending_tag" >{{$product->tranding=='1'?"Trending":""}}</label>
                        </h2>
                        <h5> <del>{{$product->original_price}} ৳</del> {{$product->selling_price}} ৳</h5>
                        @if ($product->qty>0)
                        <label for="" class="badge bg-success">in stock</label>
                        @else
                        <label for="" class="badge bg-danger">Out of stock</label>
                        @endif
                        <p class="available-stock"><span> More than {{$product->qty}} available / <a href="#">8 sold </a></span>
                            <p>
                                <h4>Short Description:</h4>
                                <p>{{$product->small_description}} </p>
                                <ul>
                                    <li>
                                        <div class="form-group size-st">
                                            <label class="size-label">Size</label>
                                            <select id="basic" class="selectpicker show-tick form-control">
									<option value="0">Size</option>
									<option value="0">S</option>
									<option value="1">M</option>
									<option value="1">L</option>
									<option value="1">XL</option>
									<option value="1">XXL</option>
									<option value="1">3XL</option>
									<option value="1">4XL</option>
								</select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group quantity-box ">
                                            <label class="control-label">Quantity</label>
                                            <input type="hidden" class="product_id" name="product_id" value="{{$product->id}}">
                                            <input class="form-control product_qty " value="1" min="1" max="{{$product->qty}}" type="number" name="product_qty">
                                        </div>
                                    </li>
                                </ul>

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <a class="btn hvr-hover" data-fancybox-close="" href="#">Buy New</a>
                                        <a class="btn hvr-hover addToCartBtn" data-fancybox-close="" href="#">Add to cart</a>
                                    </div>
                                </div>

                                <div class="add-to-btn">
                                    <div class="add-comp">
                                        <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                                        <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                                    </div>
                                    <div class="share-bar">
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

@endsection
@section('extra_js')
<script>
    $(document).ready(function () {
        $('.addToCartBtn').click(function (e) {
            e.preventDefault();
            var product_id= $(this).closest('.product_data').find('.product_id').val();
            var product_qty= $(this).closest('.product_data').find('.product_qty').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "{{ route('addtocart') }}",
                data: {
                    'product_id':product_id,
                    'product_qty':product_qty,
                },
                success: function (response) {
                    swal(response.status);

                }
            });

        });

    });

</script>
@endsection


