@extends('shop.base')
@section('base')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <form class="" action="{{Route('checkout.store')}}" method="POST" >
                @csrf
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                            <div class="mb-3">
                                <label >Full name *</label>
                                <input type="text" class="form-control" name="name"  placeholder="" value="{{$userinfo->name}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="">Phone no. *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone" pattern="[0-9]{11}" value="@if ($userinfo!=Null){{$userinfo->phone}}@endif" maxlength="11" placeholder="" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" name="email" value="@if ($userinfo!=Null){{$userinfo->email}}@endif" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="address">Address 1 *</label>
                                <input type="text" class="form-control" name="address1" value="@if ($userinfo!=Null){{$userinfo->address1}}@endif" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Address 2 *</label>
                                <input type="text" class="form-control" name="address2"value="@if ($userinfo!=Null){{$userinfo->address2}}@endif" placeholder="">
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="country">Country *</label>
                                    <input type="text" class="form-control" name="country"value="@if ($userinfo!=Null){{$userinfo->country}}@endif"  placeholder="">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state">State *</label>
                                    <input type="text" class="form-control" name="state"  value="@if ($userinfo!=Null){{$userinfo->state}}@endif"  placeholder="">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state">city *</label>
                                    <input type="text" class="form-control" name="city"  value="@if ($userinfo!=Null){{$userinfo->city}}@endif"  placeholder="">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip *</label>
                                    <input type="text" class="form-control" name="zip" value="@if ($userinfo!=Null){{$userinfo->zipcode}}@endif"  placeholder="" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
                            </div>

                            <hr class="mb-4">
                            <div class="title"> <span>Payment</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio"  class="custom-control-input" required>
                                    <label class="custom-control-label" data-toggle="collapse" data-target="#cardexpand:not(.show)" href=""   for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="debit" data-toggle="collapse" data-target="#cardexpand.show">cash on delivery</label>
                                </div>
                            </div>
                            <div id="cardexpand" class="collapse">
                                <div class="row" >
                                    <div class="col-md-6 mb-3">
                                        <label for="cc-name">Name on card</label>
                                        <input type="text" class="form-control" id="cc-name" placeholder="" > <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback"> Name on card is required </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cc-number">Credit card number</label>
                                        <input type="text" class="form-control" id="cc-number" placeholder="" >
                                        <div class="invalid-feedback"> Credit card number is required </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-expiration">Expiration</label>
                                        <input type="text" class="form-control" id="cc-expiration" placeholder="" >
                                        <div class="invalid-feedback"> Expiration date required </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-expiration">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" placeholder="" >
                                        <div class="invalid-feedback"> Security code required </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="payment-icon">
                                            <ul>
                                                <li><img class="img-fluid" src="/shop/images/payment-icon/1.png" alt=""></li>
                                                <li><img class="img-fluid" src="/shop/images/payment-icon/2.png" alt=""></li>
                                                <li><img class="img-fluid" src="/shop/images/payment-icon/3.png" alt=""></li>
                                                <li><img class="img-fluid" src="/shop/images/payment-icon/5.png" alt=""></li>
                                                <li><img class="img-fluid" src="/shop/images/payment-icon/7.png" alt=""></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <hr class="mb-1">

                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Shipping Method</h3>
                                </div>
                                <div class="mb-4">
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
                                        <label class="custom-control-label" for="shippingOption1">Standard Delivery</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                    <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption2">Express Delivery</label> <span class="float-right font-weight-bold">$10.00</span> </div>
                                    <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption3">Next Business day</label> <span class="float-right font-weight-bold">$20.00</span> </div>
                                </div>
                            </div>
                        </div>
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
                                    @foreach ($cart as $item)
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="{{Route('productdetails',$item->product->id)}}"> {{$item->product->name}}</a>
                                            <div class="small text-muted">{{$price=$item->product->original_price}} <span class="mx-2">|</span> {{$qty=$item->product_qty}} <span class="mx-2">|</span> Subtotal: {{$producttotal=$price*$qty}}</div>
                                        </div>
                                    </div>
                                    @php
                                        $subtotal+=$producttotal;
                                        $discount+=($price-$item->product->selling_price)*$qty;
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
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> {{$subtotal}} </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Discount</h4>
                                    <div class="ml-auto font-weight-bold"> {{$discount}} </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Coupon Discount</h4>
                                    <div class="ml-auto font-weight-bold"> $ 0 </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Tax</h4>
                                    <div class="ml-auto font-weight-bold"> $ 0 </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> $ {{$total=$subtotal-$discount}} </div>
                                </div>
                                <hr> </div>
                                <input type="hidden" value="{{$total}}" name="total">
                        </div>
                        <div class="col-12 d-flex shopping-box">
                            <button type="submit" class="ml-auto btn hvr-hover">Place order</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        </div>
    </div>
    <!-- End Cart -->
@endsection
@section('extra_js')
@endsection
