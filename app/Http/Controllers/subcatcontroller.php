<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
class subcatcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcatarray = Subcategory::join('categories','subcategories.category_id','=','categories.category_id')
        ->select('subcategories.*','categories.category_name')
        ->get();
        return view('subcategory.index', compact('subcatarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catarray = Category::all();
        return view('subcategory.create',compact('catarray'));
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
            'subcategory_name'=>'required',
            'category_id'=>'required'
        ]);
        $subcatq = new Subcategory([
            'subcategory_name'=>$request->get('subcategory_name'),
            'category_id'=>$request->get('category_id')
        ]);
        $subcatq->save();
        return redirect('/subcategory')->with('success','added');
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
        $subcatarray = Subcategory::where('subcategory_id',$id)->first();
        return view('subcategory.edit', compact('subcatarray'));
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
            'subcategory_name'=>'required',
            'category_id'=>'requied'
        ]);
            $subcatarray = Subcategory::where('subcategory_id', $id)->first();

            $subcatarray->subcategory_name = $request->get('subcategory_name');
            $subcatarray->category_name = $request->get('category_name');

        $subcatarray->save();
                return redirect('/subcategory')->with('success','Product Has Been Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategory::where('subcategory_id','=',$id)->delete();

        return redirect('/subcategory')->with('success','Product Has Deleted');
    }
}
