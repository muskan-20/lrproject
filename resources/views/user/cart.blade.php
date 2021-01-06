@extends('layout.master1')
@section('content')
@if (session()->get('success'))
{{session()->get('success')}};
@endif
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>heckout
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
                <span></span>
            </h4>
            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>

                            <th>Price</th>
                            <th>Subtotal</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total =0
                        ?>
                            @if(session('cart'))
                                @foreach (session('cart') as $id =>$details)
                            <?php $total +=$details['price'] * $details['quantity'] ?>
                        <tr class="rem1">
                            <td class="invert">1</td>
                            <td class="invert-image">
                                <a href="single.html">
                                    <img src="{{url('uploads/'.$details['photo']) }}" style="width: 100px; height: 100px" class="img-responsive">
                                </a>
                            </td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        
                                        
                                            
                                                <form action="{{url('update-cart',$id)}}" method="post">
                                                    @csrf
                                                <input type="number" value="{{$details['quantity']}}" name="qty">
                                                <input type="submit" value="Update">
                                                </form>
                                            
                                        
                                        
                                    </div>
                                </div>
                            </td>
                            <td class="invert">{{ $details['name'] }}</td>
                            <td class="invert">{{ $details['price'] }}</td>
                            <td>{{ $details['price'] * $details['quantity'] }}</td>
                            <td class="invert">
                                <div class="rem">
                                    <div ><a href="{{url('/remove-cart')}}/{{$id}}" class="close1"></a> </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif 
                    </tbody>
                </table>
            </div>
        </div>
        <tfoot>
            <div class="checkout-right-basket">
                <a href="{{url('/shop')}}">Continue Shopping
                    <span class="far fa-hand-point-left"></span>
                </a>
            
            </div>
            <div class="checkout-right-basket">
                Total Shopping:     
                <strong>{{ $total }}</strong>
                    <span class="far fa-hand-point-left"></span>
               
            
            </div>
                
                
        
        
        </tfoot>
        </table>
        
        @if (session('cart'))
            <form action="{{url('place-order')}}" method="post">
            @csrf
            <button class="submit check_out btn">Confirm Order</button>
            </form>
            
        @endif
    </div>
</div>


@endsection