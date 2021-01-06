
@extends('layout.master1')
@section('content')
<div class="banner-bootom-w3-agileits py-5">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>S</span>ingle
            <span>P</span>age</h3>
        <!-- //tittle heading -->
        <div class="row">
            <div class="col-lg-5 col-md-8 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="images/si1.jpg">
                                <div class="thumb-image">
                                    <img src="{{url('uploads/'. $proarray->product_image) }}"data-imagezoom="true" width="300"class="img-fluid" >
                                    </div>
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                <h3 class="mb-3">{{ $proarray->product_name }}</h3>
                <p class="mb-3">
                    <span class="item_price">Rs.{{ $proarray->product_price }}</span>
                    <del class="mx-2 font-weight-light">Rs.{{ $proarray->product_price+1000 }}</del>
                    <label>Free delivery</label>
                </p>
                <div class="single-infoagile">
                    <ul>
                        <li class="mb-3">
                            Cash on Delivery Eligible.
                        </li>
                        <li class="mb-3">
                            Shipping Speed to Delivery.
                        </li>
                        <li class="mb-3">
                            EMIs from $655/month.
                        </li>
                        <li class="mb-3">
                            Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C
                        </li>
                    </ul>
                </div>
                <div class="product-single-w3l">
                    <p class="my-3">
                        <i class="far fa-hand-point-right mr-2"></i>
                        <label>1 Year</label>Manufacturer Warranty</p>
                    <ul>
                        <li class="mb-1">
                            {{$proarray->product_detail}}<br/>
                        </li>
                        
                    </ul>
                    <p class="my-sm-4 my-3">
                        <i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
                    </p>
                </div>
                <div class="occasion-cart">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        <form action="{{ url('add-cart-process',$proarray->product_id) }}" method="post">
                            @csrf
                            <input type="hidden" name="pid" value="{{$proarray->product_id}}" min="1" max="10"/>
                            <b>Qty:</b>   <input type="number" name="qty" value="1" min="1" max="10"/><br/><br/>
                            <input type="submit" value="Add to Cart" class="button btn"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Single Page -->

    
@endsection