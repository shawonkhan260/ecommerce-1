@extends('shop.base')
@section('base')


    <!-- Start order details  -->
    <div class="cart-box-main">
        <div class="container">
            <form >
                @csrf
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                            <div class="mb-3">
                                <label >Full name :</label> {{$order->name}}

                            </div>

                            <div class="mb-3">
                                <label for="">Phone no:</label>
                                {{$order->phone}}
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address:</label>{{$order->email}}
                            </div>
                            <div class="mb-3">
                                <label for="address">Address 1 :</label>{{$order->address1}}
                            </div>
                            <div class="mb-3">
                                <label for="address2">Address 2 :</label>{{$order->address2}}
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="country">Country :</label>{{$order->country}}
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state">State :</label>{{$order->state}}
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state">city :</label>{{$order->city}}
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip :</label>{{$order->zipcode}}
                                </div>
                            </div>


                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">

                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    @php
                                    $subtotal=0;
                                    $discount=0;
                                    @endphp
                                    @foreach ($order->productlist as $item)
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="{{Route('productdetails',$item->product->id)}}"> {{$item->product->name}}</a>
                                            <div class="small text-muted">{{$price=$item->product_price}} <span class="mx-2">|</span> {{$qty=$item->product_qty}} <span class="mx-2">|</span> Subtotal: {{$producttotal=$price*$qty}}</div>
                                        </div>
                                    </div>
                                    @php
                                        $subtotal+=$producttotal;
                                    @endphp
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Total</h4>
                                    <div class="ml-auto font-weight-bold"> {{$subtotal}} </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Coupon Discount</h4>
                                    <div class="ml-auto font-weight-bold"> $ 0 </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Tax</h4>
                                    <div class="ml-auto font-weight-bold"> $ {{$tax=$item->product->tax}} </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> $ {{$total=$subtotal+$tax}} </div>
                                </div>
                                <hr> </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        </div>
    </div>
    <!-- End order details -->
@endsection
@section('extra_js')
@endsection
