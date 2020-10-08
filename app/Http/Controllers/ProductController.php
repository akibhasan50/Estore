<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Subcategory;
use App\Subimage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showproduct = Product::with('category','subcategory')->orderBy('id','desc')->get();
        return view('backend.layout.products',compact('showproduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $showcat =Category::select('id','name')->get();
        $showsubcat =Subcategory::select('id','name')->get();
        return view('backend.layout.addproduct',compact('showcat','showsubcat'));



   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'price'=>'required',
            'price'=>'required',
            'description'=>'required',
            'status'=>'required|in:0,1',
            'stock'=>'required|in:true,false',
            
        ]);

        $image = $request->file('image');
        $extention = strtolower($image->getClientOriginalExtension());
        $filename = time().'.'.$extention;
        $imgpath ='uploads/products/';
        $imgurl= $imgpath.$filename;
        $product->image =$imgurl;

        Image::make($image)->save($imgurl);


        $product->title = $request->title;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->in_stock = $request->stock;

      
        $product->save();
        $productid= $product->id;


       

        $subimages = $request->file('subimg');
       foreach ($subimages as $subimage) {
        $subextention = strtolower($subimage->getClientOriginalExtension());
        $subfilename = time().'.'.$subextention;
        $subimgpath ='uploads/subimg/';
        $subimgurl= $subimgpath.$subfilename;

        Image::make($subimage)->save($subimgurl);

        $subimage = new  Subimage();
        $subimage->product_id =  $productid;
        $subimage->sub_image = $subimgurl;
        $subimage->save();
        
       
       }
   
        Alert::toast('Products store Successfully!','success');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $singleproduct = Product::Find($product->id);
        $showcat =Category::select('id','name')->get();
        $showsubcat =Subcategory::select('id','name')->get();
        $subimg =Subimage::where('product_id',$product->id)->get();
        return view('backend.layout.editproduct',compact('showcat','singleproduct','subimg','showsubcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::Find($product->id);

        $request->validate([
            'title'=>'required',
            'category'=>'required',
           
            'price'=>'required',
            'price'=>'required',
            'description'=>'required',
            'status'=>'required|in:0,1',
            'stock'=>'required|in:true,false',
            
        ]);

        

        $product->title = $request->title;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->in_stock = $request->stock;
                
        $image = $request->file('image');
        $subimages = $request->file('subimg');
        

        if($request->hasFile('image')){
   
            $extention = strtolower($image->getClientOriginalExtension());
            $filename = time().'.'.$extention;
            $imgpath ='uploads/products/';
            $imgurl= $imgpath.$filename;
            $product->image =$imgurl;
            Image::make($image)->save($imgurl);

            $product->save();
            $productid= $product->id;
            
            if($request->oldimg != null){
                unlink($request->oldimg);
            }
            Alert::toast('Products updated Successfully!','success');
            return redirect()->route('products.index');

        }else{
                $product->image = $request->oldimg;
                $product->save();
                $productid= $product->id;

                $subimages = $request->file('subimg');
                if($subimages)
                {
                    foreach ($subimages as $subimage) {
                        $subextention = strtolower($subimage->getClientOriginalExtension());
                        $subfilename = time().'.'.$subextention;
                        $subimgpath ='uploads/subimg/';
                        $subimgurl= $subimgpath.$subfilename;
                
                        Image::make($subimage)->save($subimgurl);
                
                        $subimage = new  Subimage();
                        $subimage->product_id =  $productid;
                        $subimage->sub_image = $subimgurl;
                        $subimage->save();
                       }
                }
       

               
           
            Alert::toast('Products updated Successfully!','success');
            return redirect()->route('products.index');
        }



      
       


       

        
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Alert::toast('Products Deleted Successfully!','success');
           return redirect()->route('products.index');
    }


    public function showsubcat(Request $request)
    {
     
        $category = $request->get('catgid');

        $subcat = Subcategory::where('category_id',$category)->select('id','name')->get();

      
        if($subcat){
            $html ="";
            foreach($subcat as $key){
                $html .= "<option value=".$key['id'].">".$key['name']."</option>";
            }
            echo $html;
           
        }else{
            echo "<option>'no sub catagory found'</option>";
        }
      
       
    }

    public function status($id)
    {
        $product = Product::Find($id);
        if( $product->status == 0){
            $product->status = 1;
        }else{
            $product->status = 0; 
        }
        
        $product->save();
        Alert::toast('Status changed Successfully!','success');
        return redirect()->back();
        

    }
}
