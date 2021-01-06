@extends('layout.master1')
@section('content')
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>M</span>obiles
            <span>&</span>
            <span>C</span>omputers</h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-12">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                        <div class="row">
                            
                        @foreach ($proarray as $pro)
                            
                        
                            <div class="col-md-4 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center">
                                        <img src="{{url('uploads/'. $pro->product_image) }}" width="200" >
                                        <div class="men-cart-pro">
                                            
                                        </div>
                                    </div>
                                    <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                            {{$pro->product_name}}
                                        </h4>
                                        <div class="info-product-price my-2">
                                            <span class="item_price">Rs.{{$pro->product_price}}</span>
                                            <del>Rs.{{$pro->product_price+1000}}</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <form action="#" method="post">
                                                <fieldset>
                                                    
                                                    <a href="{{url('productdetails',$pro->product_id)}}">
                                                    <input type="button" value="Quick View" class="button btn" /></a><br/>
                                                </fieldset>
                                            </form>
                                        </div>

                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- //first section -->
                    
                </div>
            </div>
            <!-- //product left -->
            <!-- product right -->
            
        </div>
    </div>
</div>
<!-- //top products -->



@endsection