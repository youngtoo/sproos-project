@extends('layouts.app')
@section('content')
<!-- Page Title-->
<div class="page-title">
<div class="container">
    <div class="column">
    <h1>Checkout</h1>
    </div>
    <div class="column">
    <ul class="breadcrumbs">
        <li><a href="/">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>Checkout</li>
    </ul>
    </div>
</div>
</div>
<!-- Page Content-->
<div class="container padding-bottom-3x mb-2">
<div class="row">
    <!-- Checkout Adress-->
    <div class="col-xl-9 col-lg-8">
    <div class="checkout-steps"><a href="/checkout-review">4. Review</a><a href="/checkout-payment"><!--span class="angle"></span-->3. Payment</a><a href="/checkout-shipping"><!--span class="angle"></span-->2. Shipping</a><a class="active" href="/checkout-address"><!--span class="angle"></span-->1. Address</a></div>
    <form method="POST" acition="">
    <h4>Billing Address</h4>
    <hr class="padding-bottom-1x">
    <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
            <label for="checkout-fn">First Name</label>
            <input class="form-control" type="text" id="checkout-fn">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label for="checkout-ln">Last Name</label>
            <input class="form-control" type="text" id="checkout-ln">
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
            <label for="checkout-email">E-mail Address</label>
            <input class="form-control" type="email" id="checkout-email">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label for="checkout-phone">Phone Number</label>
            <input class="form-control" type="text" id="checkout-phone">
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
        
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label for="checkout-country">Country</label>
            <select class="form-control" id="checkout-country">
            <option>Choose country</option>
            <option>Kenya</option>
            <option>Tanzania</option>
            <option>Uganda</option>
            </select>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
            <label for="checkout-city">City</label>
            <select class="form-control" id="checkout-city">
            <option>Choose city</option>
            <option>Nairobi</option>
            <option>Kampala</option>
            <option>Addis Ababa</option>
            </select>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label for="checkout-zip">Postal Address</label>
            <input class="form-control" type="text" id="checkout-zip">
        </div>
        </div>
    </div>
    <div class="row padding-bottom-1x">
        <div class="col-sm-6">
        <div class="form-group">
            <label for="checkout-address1">Address Line 1</label>
            <input class="form-control" type="text" id="checkout-address1">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label for="checkout-address2">Address 2</label>
            <input class="form-control" type="text" id="checkout-address2">
        </div>
        </div>
    </div>
    <h4>Shipping Address</h4>
    <hr class="padding-bottom-1x">
    <div class="form-group">
        <label class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" checked><span class="custom-control-indicator"></span><span class="custom-control-description">Same as billing address</span>
        </label>
    </div>
    <div class="checkout-footer">
        <div class="column"><a class="btn btn-outline-secondary" href="/cart"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back To Cart</span></a></div>
        <div class="column"><a class="btn btn-primary" href="/checkout-shipping"><span class="hidden-xs-down">Continue&nbsp;</span><i class="icon-arrow-right"></i></a></div>
    </div>
    </div>

    </form>


    <!-- Sidebar          -->
    <div class="col-xl-3 col-lg-4">
    <aside class="sidebar">
        <div class="padding-top-2x hidden-lg-up"></div>
        <!-- Order Summary Widget-->
        <section class="widget widget-order-summary">
        <h3 class="widget-title">Order Summary</h3>
        <table class="table">
            <tr>
            <td>Cart Subtotal:</td>
            <td class="text-medium">Ksh. 289.68</td>
            </tr>
            <tr>
            <td>Shipping:</td>
            <td class="text-medium">Ksh. 22.50</td>
            </tr>
            <tr>
            <td>Estimated tax:</td>
            <td class="text-medium">Ksh. 3.42</td>
            </tr>
            <tr>
            <td></td>
            <td class="text-lg text-medium">Ksh. 315.60</td>
            </tr>
        </table>
        </section>
        <!-- Featured Products Widget-->
        <section class="widget widget-featured-products">
        <h3 class="widget-title">Recently Viewed</h3>
        <!-- Entry-->
        <div class="entry">
            <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/01.jpg" alt="Product"></a></div>
            <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">Oakley Kickback</a></h4><span class="entry-meta">Ksh. 155.00</span>
            </div>
        </div>
        <!-- Entry-->
        <div class="entry">
            <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/02.jpg" alt="Product"></a></div>
            <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">Top-Sider Fathom</a></h4><span class="entry-meta">Ksh. 90.00</span>
            </div>
        </div>
        <!-- Entry-->
        <div class="entry">
            <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/03.jpg" alt="Product"></a></div>
            <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">Vented Straw Fedora</a></h4><span class="entry-meta">Ksh. 49.50</span>
            </div>
        </div>
        <!-- Entry-->
        <div class="entry">
            <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/04.jpg" alt="Product"></a></div>
            <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">Big Wordmark Tote</a></h4><span class="entry-meta">Ksh. 29.99</span>
            </div>
        </div>
        </section>
    </aside>
    </div>
</div>
</div>

@endsection