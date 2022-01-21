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
                                <input type="text"  class="form-control name" name="name"  placeholder="" value="@if ($userinfo!=Null){{$userinfo->phone}} @else {{Auth::user()->name}}@endif" >
                                <span id="name_error" class="text-danger" ></span>
                            </div>

                            <div class="mb-3">
                                <label for="">Phone no. *</label>
                                <input type="text" class="form-control phone"  name="phone" pattern="[0-9]{11}" value="@if ($userinfo!=Null){{$userinfo->phone}}@endif" maxlength="11" placeholder="" >
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control email"  name="email" value="@if ($userinfo!=Null){{$userinfo->email}}@endif" placeholder="">
                            <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address 1 *</label>
                                <input type="text" class="form-control address1"  name="address1" value="@if ($userinfo!=Null){{$userinfo->address1}}@endif" placeholder="" >
                            <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Address 2 *</label>
                                <input type="text" class="form-control" name="address2"value="@if ($userinfo!=Null){{$userinfo->address2}}@endif" placeholder="">
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="country">Country *</label>
                                    <input type="text" class="form-control country"  name="country"value="@if ($userinfo!=Null){{$userinfo->country}}@endif"  placeholder="">
                                <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state">State *</label>
                                    <input type="text" class="form-control state"  name="state"  value="@if ($userinfo!=Null){{$userinfo->state}}@endif"  placeholder="">
                                <span id="state_error " class="text-danger"></span>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state">city *</label>
                                    <input type="text" class="form-control city"  name="city"  value="@if ($userinfo!=Null){{$userinfo->city}}@endif"  placeholder="">
                                <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip *</label>
                                    <input type="text" class="form-control zip"  name="zip" value="@if ($userinfo!=Null){{$userinfo->zipcode}}@endif"  placeholder="" >
                                    <span id="zip_error" class="text-danger"></span>
                                 </div>

                            </div>

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
                        <div class="col-12  shopping-box">
                            <input type="hidden" name="payment_method" value="COD">
                            <button type="submit" class="btn btn-outline-primary">Place order cashon delivery</button>
                            <button type="button" class="btn btn-outline-success razorpay_btn">pay with Razorpay</button>
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
<script>
    $(document).ready(function () {
        $('.razorpay_btn').click(function (e) {
            e.preventDefault();
            var name=$('.name').val();
            var phone=$('.phone').val();
            var email=$('.email').val();
            var address1=$('.address1').val();
            var country=$('.country').val();
            var state=$('.state').val();
            var city=$('.city').val();
            var zip=$('.zip').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if(!name)
            {
                name_error="First name is Required";
                $('#name_error').html('');
                $('#name_error').html(name_error);
            }
            else{
                name_error="";
                $('#name_error').html('');//for remove error message
            }
            if(!phone)
            {
                phone_error="phone is Required";
                $('#phone_error').html('');
                $('#phone_error').html(phone_error);
            }
            else{
                phone_error="";
                $('#phone_error').html('');
            }
            if(!email)
            {
                email_error="email is Required";
                $('#email_error').html('');
                $('#email_error').html(email_error);
            }
            else{
                email_error="";
                $('#email_error').html('');
            }
            if(!address1)
            {
                address1_error="address1 is Required";
                $('#address1_error').html('');
                $('#address1_error').html(address1_error);
            }
            else{
                address1_error="";
                $('#address1_error').html('');
            }
            if(!country)
            {
                country_error="country is Required";
                $('#country_error').html('');
                $('#country_error').html(country_error);
            }
            else{
                country_error="";
                $('#country_error').html('');
            }
            if(!state)
            {
                state_error="state is Required";
                $('#state_error').html('');
                $('#state_error').html(state_error);
            }
            else{
                state_error="";
                $('#state_error').html('');
            }
            if(!city)
            {
                city_error="city is Required";
                $('#city_error').html('');
                $('#city_error').html(city_error);
            }
            else{
                city_error="";
                $('#city_error').html('');
            }
            if(!zip)
            {
                zip_error="zip is Required";
                $('#zip_error').html('');
                $('#zip_error').html(zip_error);
            }
            else{
                zip_error="";
                $('#zip_error').html('');
            }

            if(name_error!=''|| phone_error!=''||email_error!=''||address1_error!=''||country_error!=''||state_error!=''||city_error!=''||zip_error!='')
            {
                return false;
            }
            else{
                var data={
                    'name':name,
                    'phone':phone,
                    'email':email,
                    'address1':address1,
                    'country':country,
                    'state':state,
                    'city':city,
                    'zip':zip
                }
                $.ajax({
                    type: "POST",
                    url: "{{Route('razorpay')}}",
                    data: data,
                    success: function (response) {
                        var options = {
                        "key": "rzp_test_SxvObkAH2FewJ3", // Enter the Key ID generated from the Dashboard
                        "amount": response.total_price*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": response.name,
                        "description": "thank you for choosing us",
                        "image": "https://example.com/your_logo",
                        "handler": function (responsea){
                            //alert(responsea.razorpay_payment_id);
                            $.ajax({
                                type: "POST",
                                url: "{{Route('checkout.store')}}",
                                data:{
                                        'name':response.name,
                                        'phone':response.phone,
                                        'email':response.email,
                                        'address1':response.address1,
                                        'country':response.country,
                                        'state':response.state,
                                        'city':response.city,
                                        'zip':response.zip,
                                        'total':response.total_price,
                                        'payment_method':"paid by razor pay",
                                        'payment_id':responsea.razorpay_payment_id
                                },
                                success: function (responseb) {
                                    //alert(responseb.status);
                                    //after click pop up ok button then it will redirect
                                    swal(responseb.status)
                                    .then((value)=>{
                                        window.location.href="/orderlist";
                                    });
                                    //window.location.href="/orderlist"; // it will go /orderlist page without ok click



                                }
                            });
                        },
                        "prefill": {
                            "name": response.name,
                            "email": response.email,
                            "contact": response.phone
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();

                    }
                });
            }


        });
    });
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

</script>

@endsection
