<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $showcat =Category::latest()->get();
        return view('backend.layout.catagories',compact('showcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.layout.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $category = new Category();

        $request->validate([
            'name'=>'required|unique:categories',
            'banner'=>'required|max:1024',
            'status'=>'required|in:0,1',
            
        ]);
        $category->name = $request->name;
        $category->status = $request->status;
        $banner = $request->file('banner');

        if($request->hasFile('banner')){
            $extention = strtolower($banner->getClientOriginalExtension());
            $filename = time().'.'.$extention;
            $imgpath ='uploads/category/';
            $imglink= $imgpath.$filename;
            $success=  $banner->move($imgpath,$filename);
            $category->banner =$imglink;
            $category->save();

            Alert::toast('Category Added Successfully!','success');
            //Alert::success('Category', 'Category Added Successfully');
            return redirect()->back();
        

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // $singlecat = Category::Find($category->id);
        // return view('backend.layout.editcat',compact('singlecat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $singlecat = Category::Find($category->id);
        return view('backend.layout.editcat',compact('singlecat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::Find($category->id);
        $request->validate([
            'name'=>'required',
            'status'=>'required',
            
        ]);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->slug =Str::slug($request->name);
        $banner = $request->file('banner');

        if($request->hasFile('banner')){
            $extention = strtolower($banner->getClientOriginalExtension());
            $filename = time().'.'.$extention;
            $imgpath ='uploads/category/';
            $imglink= $imgpath.$filename;
            $success=  $banner->move($imgpath,$filename);
            $category->banner =$imglink;
            $category->save();

            if($request->oldimg != null){
                unlink($request->oldimg);
            }


            Alert::toast('Category Updated Successfully!','success');
            //Alert::success('Category', 'Category Added Successfully');
            return redirect()->route('categories.index');
        

        }else{
            $category->banner = $request->oldimg;
            $category->save();
            Alert::toast('Category Updated Successfully!','success');
            return redirect()->route('categories.index');
        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->banner){
            unlink($category->banner);
        }
         $category->delete();

         Alert::toast('Category Deleted Successfully!','success');
            return redirect()->route('categories.index');
    }

    public function status($id)
    {
        $subcat = Category::Find($id);
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
