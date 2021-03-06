@if (!$cartItems->isEmpty())

<div class="cart"><a href="/cart"></a><i class="icon-bag"></i><span class="count">{{Cart::count()}}</span><span class="subtotal">{{Cart::subtotal()}}</span>

                <!---->
                @foreach($cartItems as $cartItem)
 
              <div class="toolbar-dropdown">
                <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="/storage/products/{{$cartItem->options->img}}" height="100px" width="150px" />
                            </a></a>
                 
                  <div class="dropdown-product-info"><a class="dropdown-product-title" href="{{'/shop-single'}}/<?php echo $cartItem->id?>">{{$cartItem->name}}</a><span class="dropdown-product-details">Ksh{{$cartItem->price}}</span></div>
                </div>
                @endforeach
                <!---->
                
                <div class="toolbar-dropdown-group">
                  <div class="column"><span class="text-lg">Total:</span></div>
                  <div class="column text-right"><span class="text-lg text-medium">{{Cart::subtotal()}}</span></div>
                </div>
                <div class="toolbar-dropdown-group">
                  <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="/cart">View Cart</a></div>
                  <div class="column"><a class="btn btn-sm btn-block btn-success" href="/checkout-address">Checkout</a></div>
                </div>
              </div>
            </div>
            @else


            @endif