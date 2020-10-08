<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showsubcat =Subcategory::with('category')->orderBy('id','desc')->get();
        //$showcat =Category::with('subcategories')->get();
        return view('backend.layout.subcategories',compact('showsubcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $showcat =Category::select('id','name')->get();
        return view('backend.layout.addsubcat',compact('showcat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcat = new Subcategory();

        $request->validate([
            'name'=>'required|unique:subcategories',
            'category'=>'required',
            'status'=>'required',
            
        ]);
        $subcat->name = $request->name;
        $subcat->category_id = $request->category;
        $subcat->status = $request->status;
        $subcat->save();
        Alert::toast('Subcategory Added Successfully!','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $showcat =Category::select('id','name')->get();
        $singlesubcat = Subcategory::Find($subcategory->id);
        return view('backend.layout.editsubcat',compact('singlesubcat','showcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $subcat = Subcategory::Find($subcategory->id);

        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'status'=>'required|in:0,1',
            
        ]);
        $subcat->name = $request->name;
        $subcat->category_id = $request->category;
        $subcat->slug =Str::slug($request->name);
        $subcat->status = $request->status;
        $subcat->save();
        Alert::toast('Subcategory Updated Successfully!','success');
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        Alert::toast('Subcategory Deleted Successfully!','success');
           return redirect()->route('subcategory.index');
    }


    public function status($id)
    {
        $subcat = Subcategory::Find($id);
        if( $subcat->status == 0){
            $subcat->status = 1;
        }else{
            $subcat->status = 0; 
        }
        
        $subcat->save();
        Alert::toast('Status changed Successfully!','success');
        return redirect()->back();
        

    }
}
