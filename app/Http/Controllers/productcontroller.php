<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proarray = Product::join('subcategories','products.subcategory_id','=','subcategories.subcategory_id')
        ->select('products.*','subcategories.subcategory_name')
        ->get();
        return view('product.index', compact('proarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcatarray = Subcategory::all();
        return view('product.create',compact('subcatarray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'product_detail'=>'required',
            'product_price'=>'required',
            'product_image'=>'required',
            
            'subcategory_id'=>'required'
        ]);

            //image
            $file123 = $request->file('product_image');
            $extension = $file123->getClientOriginalExtension();
            $mimetype = $file123->getClientMimeType();
            $getfilename = $file123->getFilename();
            $original_filename=$file123->getClientOriginalName();

            Storage::disk('public')->put($original_filename,File::get($file123));

        $proq = new Product([
            'product_name'=>$request->get('product_name'),
            'product_detail'=>$request->get('product_detail'),
            'product_price'=>$request->get('product_price'),
            'product_image'=>$original_filename,
            
            'subcategory_id'=>$request->get('subcategory_id')
        ]);
        $proq->save();
        return redirect('/product')->with('success','added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proarray = Product::where('product_id',$id)->first();
        return view('product.edit', compact('proarray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name'=>'required',
            'product_detail'=>'required',
            'product_price'=>'required',
            'product_image'=>'required',
            
            'subcategory_id'=>'required'
        ]);
            $proarray = Product::where('product_id', $id)->first();
            $proarray->product_name = $request->get('product_name');
            $proarray->product_detail = $request->get('product_detail');
            $proarray->product_price = $request->get('product_price');
            $proarray->product_image = $request->get('product_image');
            
            $proarray->subcategory_name = $request->get('subcategory_name');

        $proarray->save();
                return redirect('/product')->with('success','Product Has Been Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proarray= Product::where('product_id',$id)->first();
        $image_path = public_path().'/uploads/'.$proarray->product_image;
        File::delete($image_path);

        Product::where('product_id','=',$id)->delete();
        return redirect('/product')->with('success','Product Has Deleted');
    }
}
