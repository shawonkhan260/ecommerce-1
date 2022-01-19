@extends('shop.base')
@section('base')
   <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Wishlist</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Wishlist  -->
    <div class="wishlist-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Unit Price </th>
                                    <th>Stock</th>
                                    <th>Add Item</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $item)
                                <tr class="product_data">
                                    <input type="hidden" class="product_id"  value="{{$item->product_id}}">
                                <input type="hidden" class="product_qty"  value="1">
                                    <td class="thumbnail-img">
                                    @php
                                        $images=json_decode($item->product->image);
                                    @endphp
                                    <img class="img-fluid" src="{{Storage::url('photo/product/'.$images[0])}}">
                                    </td>
                                    <td class="name-pr">
                                        <a href="{{Route('productdetails',$item->product->id)}}">
									{{$item->product->name}}
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>$ {{$item->product->selling_price}}</p>
                                    </td>
                                    <td class="quantity-box">In Stock</td>
                                    <td class="add-pr">
                                        <a class="btn hvr-hover addToCartBtn" href="#">Add to Cart</a>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{Route('wishlist.destroy',$item->id)}}">
									<i class="fas fa-times"></i>
								</a>
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
    <!-- End Wishlist -->
@endsection
@section('extra_js')

@endsection

