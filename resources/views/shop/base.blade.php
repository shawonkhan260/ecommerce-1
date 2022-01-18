<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Metas -->
    <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/shop/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/shop/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/shop/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/shop/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/shop/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/shop/css/custom.css">
    <style>
        a{
            text-decoration: none !important;
        }
    </style>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

   @include('shop.header')


    {{-- base part --}}


    @yield('base')


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About ThewayShop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="/shop/js/jquery-3.2.1.min.js"></script>
    <script src="/shop/js/popper.min.js"></script>
    <script src="/shop/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/shop/js/jquery.superslides.min.js"></script>
    <script src="/shop/js/bootstrap-select.js"></script>
    <script src="/shop/js/inewsticker.js"></script>
    <script src="/shop/js/bootsnav.js"></script>
    <script src="/shop/js/images-loded.min.js"></script>
    <script src="/shop/js/isotope.min.js"></script>
    <script src="/shop/js/owl.carousel.min.js"></script>
    <script src="/shop/js/baguetteBox.min.js"></script>
    <script src="/shop/js/form-validator.min.js"></script>
    <script src="/shop/js/contact-form-script.js"></script>
    <script src="/shop/js/custom.js"></script>
    @yield('extra_js')
    <!-- Sweet Alert -->
<script src="{{asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
@if (session('status'))
<script>
    swal("{{session('status')}}");
</script>
@endif
<script>
    //add to cart and add to wishlist button work for this function
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
        $('.addToWishlistBtn').click(function (e) {
            e.preventDefault();
            var product_id= $(this).closest('.product_data').find('.product_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "{{ route('addtowishlist') }}",
                data: {
                    'product_id':product_id,
                },
                success: function (response) {
                    swal(response.status);

                }
            });

        });

    });
</script>
</body>

</html>
