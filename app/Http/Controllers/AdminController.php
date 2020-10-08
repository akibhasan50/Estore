<?php

namespace App\Http\Controllers;
use App\Order;
use App\Orderproducts;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.layout.index');
    }
    public function orders()
    {
        $orderinfo = Order::all();
        return view('backend.layout.order',compact('orderinfo'));
    }
    public function ordersdetails($id)
    {
       
        $orderinfo = Order::with('user')->where('id',$id)->first();
         $prodinfo = Orderproducts::where('order_id',$orderinfo->id)->get();
        
         return view('backend.layout.orderdetails',compact('orderinfo','prodinfo'));
    }
    public function orderedit($id)
    {
       
        $orderinfo = Order::with('user')->where('id',$id)->first();
        
         return view('backend.layout.editorder',compact('orderinfo'));
    }
    public function orderupdate(Request $request,$id)
    {
        $order = Order::Find($id);
        $order->payment_status =$request->pstatus;
        $order->order_status = $request->ostatus;
        $order->save();
        Alert::toast('Order Updated Successfully!','success');
        return redirect()->back();
        
    }
         
    public function orderdelete($id)
    {
        $order = Order::Find($id);

        $order->delete();
        Alert::toast('Order Deleted Successfully!','success');
        return redirect()->back();
        
         
    }
  
    public function login()
    {
        return view('backend.layout.login');
    }
    public function AdminRegister(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:5',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|min:6',
       ]);

       $admin = new Admin();
       $admin->name = $request->name;
       $admin->email = $request->email;
       $admin->password = bcrypt($request->password);
       $admin->save(); 
       

       Alert::toast('Registration Successfully!','success');
       return redirect('/admin/login');
    }
    public function AdminLogin(Request $request)
    {
        $this->validate($request,[
           
            'email'=>'required',
            'password'=>'required|min:6',
       ]);


       $credential= $request->only(['email','password']);

       if(Auth::attempt($credential))
       {
        Alert::toast('Login Successfully!','success');
        return redirect('/admin/');
       }else{
        Alert::toast('Login Failed! Please provide valid information','Warning');
        return redirect()->back();
       }
    }
    public function register()
    {
        return view('backend.layout.register');
    }
    public function AdminLogout()
    {
        Auth::logout();
        Alert::toast('Logout successfull','success');
        return redirect('/admin/login');
    }
    public function pdfDownload($id)
    {
     
        $orderinfo = Order::with('user')->where('id',$id)->first();
         $prodinfo = Orderproducts::where('order_id',$orderinfo->id)->get();

         $data = [
            'orderinfo' => $orderinfo,
            'prodinfo' => $prodinfo,
            
        ];
        
        $pdf = PDF::loadView('backend.layout.pdf',$data);
        return $pdf->stream('invoice.pdf');
        
    }
    
 


  

}
