
@extends('layouts.theme')
@section('content')
    <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
          @if($search)
            <h1>{{$msg}}</h1>
          @else
            <h1>All Products</h1>
          @endif
          </div>
          <div class="column">
          </div>
        </div>
      </div>
      <!-- Page Content-->

      <div class="container padding-bottom-1x padding-top-1x mb-2">
      <!-- Create buttons to handle sorting -->
        <div class="column">

            <div class="shop-sorting">

              <label for="sorting">Sort by:</label>

              <select class="form-control" id="sorting">

                <option value="search" >Search</option>

                <option value="lotohi" >Low - High Price</option>

                <option value="hitolo">High - Low Price</option>

                <option value="atoz" >A - Z Order</option>

                <option value="ztoa" >Z - A Order</option>

              </select><span class="text-muted">Showing:&nbsp;</span><span>1 - 12 items</span>

            <script>  
              $(document).ready(function(){
                $('#sorting').chhange(function(){
                  var x = document.getElementById('sorting').value;
                  window.alert(x);
                });
              });

              $(document).ready(function(){
                  /*Add on or onchange events*/

                  $('#sorting').change(function(){
                      var x = document.getElementById('sorting').value;
                      /** Check to values of the select statement */
                      if(x === 'lotohi' ){
                          /** Sorting from highest to lowest price */
                          /** Call url to sort from low to high */
                          $.ajax({
                            type: 'GET',
                            url:'/search/sort',
                            data:'',
                            
                          });

                      }else if(x === 'hitolo' ){
                          /** Sorting from lowest to highest price */
                          

                      }else if(x === 'atoz'){
                          /** ascending order alphabetically */


                      }else if(x === 'ztoa'){

                      } else{
                          /** descending order alphabetically */
                      }
                      
                    });
              });
            </script>

            </div>

          </div>
      </div>
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
        
          <!-- Results-->
          <div class="col-xl-9 col-lg-8">
          @if(count($products) > 0)
          @foreach($products as $product)
            <div class="card mb-4">
              <div class="card-header"><span class="badge badge-pill badge-primary">Product</span> <span class="badge badge-pill badge-primary">{{$product->title}}</span></div>
                <div class="card-block">
                  <div class="d-flex"><a class="pr-4 hidden-xs-down" href="shop-single.html" style="max-width: 225px;"><img src="{{ asset('uploads/'.$product->image2 ) }}" alt="Product"></a>
                    <div>
                      <h5><a class="navi-link" href="/shop-single/{{$product->id}}">{{$product->name}} </a></h5>
                      <h6>
                        Ksh .{{ $product->price}}<br>
                        <small>{{$product->stock}} Available</small>
                      </h6>
                      <p>{{$product->title}}</p>
                      <p>{{$product->description}}</p>
                      <div><a href="/shop-single/{{$product->id}}" class="btn btn-outline-primary">View</a></div>
                    </div>
                    
                  </div>
                </div>
            </div>
            @endforeach
            
          @endif
            <!-- Pagination-->
             {{$products->links('vendor.pagination.bootstrap-4')}}
          </div>
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
              <!-- Shop Categories-->
              <div class="gallery-wrapper isotope-grid cols-3">
              <div class="gutter-sizer"></div>
              <div class="grid-sizer"></div>
              @foreach($categories as $category)
              <div class="grid-item gallery-item"><a href="{{ asset('uploads/'.$product->image ) }}" data-size="1000x1000"><img src="{{ asset('uploads/'.$category->image ) }}" alt="Image"></a><span class="caption">T-Shirt Collection</span></div>
              @endforeach
            </div>
            </aside>
          </div>
        </div>
      </div>
@endsection