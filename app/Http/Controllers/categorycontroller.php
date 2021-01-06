<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catarray = Category::all();
        return view('category.index', compact('catarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'category_name'=>'required'
        ]);
        $catq = new Category([
            'category_name'=>$request->get('category_name')
        ]);
        $catq->save();
        return redirect('/category')->with('success','added');
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
        $catarray = Category::where('category_id',$id)->first();
        return view('category.edit', compact('catarray'));
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
            'category_name'=>'required'
        ]);
            $catarray = Category::where('category_id', $id)->first();

            $catarray->category_name = $request->get('category_name');
        

        $catarray->save();
                return redirect('/category')->with('success','Product Has Been Added');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('category_id','=',$id)->delete();

        return redirect('/category')->with('success','Product Has Deleted');
    
    }
}
