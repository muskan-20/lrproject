<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Ordermaster;
use App\Models\Orderdetail;
use Session;
//use DB;
class usersidecontroller extends Controller
{
    public function Productlisting()
    {
        $proarray = Product::all();
        //$proarray = DB::table('products')->paginate(2);
        return view('user.shop',compact('proarray'));
    }
    public function ProductDetails($id)
    {
        $proarray=Product::where('product_id',$id)->first();
        
        return view('user.details',compact('proarray'));
    }
    public function AddtoCartProcess(Request $request,$id)
    {
        $product_id = $id;
        $product_qty = $request->get('qty');
        $product = Product::find($product_id);
        if(!$product)
        {
            abort(404);
        }
        //test data
       // echo "Product Id".$product_id;
       // echo "product qty".$product_qty;

       //get session value
       $cart=Session()->get('cart');
       //print all session variable value
       $a=Session()->all();
       echo "<pre>";
       print_r($a);

       if(!$cart){
           $cart=[
               $id=>[
                   "name"=>$product->product_name,
                   "quantity"=>$product_qty,
                   "price"=>$product->product_price,
                   "photo"=>$product->product_image
               ]
               ];
               session()->put('cart',$cart);
               return redirect ('/cart')->with('success','Item added');
              }

              //if product exist
              if(isset($cart[$id]))
              {
                 $cart[$id]['quantity']=$cart[$id]['quantity']+$product_qty; 
                session()->put('cart',$cart);
                return redirect ('/cart')->with('success','Quantity updated');
              }
              else
              {
                  $cart[$id]=[
                    "name"=>$product->product_name,
                    "quantity"=>$product_qty,
                    "price"=>$product->product_price,
                    "photo"=>$product->product_image
                  ];
                  session()->put('cart',$cart);
                  return redirect ('/cart')->with('success','Item added');
              }


        

    }
    public function CartListing()
    {
        //echo"<pre>";
        //$a = Session()->all();
        //print_r($a);
        return view('user.cart');
    }
    public function RemoveCart($id)
    {
        if($id)
        {
            $cart=session()->get('cart');
            if(isset($cart[$id]))
            {
                unset($cart[$id]);
                session()->put('cart',$cart);
            }
            return redirect('/cart')->with('success','product removed');
        }
    }
    public function UpdateCart(Request $request,$id)
    {
        $id = $id;
        $qty = $request->qty;
        if($id and $qty)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"]= $qty;
            session()->put('cart',$cart);
            return redirect('/cart')->with('success','product Updated');
        }
    }
    public function PlaceOrder(Request $request)
    {
        $order_date = date("d-m-y");
        $order_status = "pending";
        $user_id ="1";

        $ordermasterq = new Ordermaster([
            'order_date'=>$order_date,
            'order_status'=>$order_status,
            'user_id'=>$user_id
        ]);
        $ordermasterq->save();
        $order_id = $ordermasterq->order_id;
        foreach(session('cart') as $id => $details)
        {
            $orderdetailq = new Orderdetail([
                'order_id' => $order_id,
                'product_id' => $id,
                'product_qty' => $details['quantity'],
                'product_price' => $details['price']
            ]);
            $orderdetailq->save();
        }
        if($orderdetailq)
        {
            Session::forget('cart');

        }
        return redirect('/thank-you')->with('success','product Updated');
    }
    public function ThankYou()
    {
        //echo"<pre>";
        //$a = Session()->all();
        //print_r($a);
        return view('user.thank-you');
    }
    public function Aboutus()
    {
        //echo"<pre>";
        //$a = Session()->all();
        //print_r($a);
        return view('user.aboutus');
    }
    public function Contactus()
    {
        //echo"<pre>";
        //$a = Session()->all();
        //print_r($a);
        return view('user.contactus');
    }
}
