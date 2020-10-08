<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\ConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('layouts.login');
    }
    public function user_reg(Request $request)
    {
       $this->validate($request,[
            'name'=>'required|min:5',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required',
            'password'=>'min:6|required_with:confirm_password|same:confirm_password',
       ]);

       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->password = bcrypt($request->password);
       $user->save(); 
       
      
       Mail::to($user->email)->send(new ConfirmationMail($user));

       Alert::toast('Registration Successfully!','success');
       return redirect()->back();
    }


    public function user_login(Request $request)
    {
        $this->validate($request,[
           
            'email'=>'required',
            'password'=>'required|min:6',
       ]);


       $credential= $request->only(['email','password']);

       if(Auth::attempt($credential))
       {
        Alert::toast('Login Successfully!','success');
        return redirect()->back();
       }else{
        Alert::toast('Login Failed! Please provide valid information','Warning');
        return redirect()->back();
       }
     
     
    }

    public function logoutuser()
    {
        Auth::logout();
        Alert::toast('Logout successfull','success');
        return redirect('/');
    }





    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
            try {
                
                $user = Socialite::driver('facebook')->user();

                $socuser = User::where('facebook_id',$user->getId())->first();

                if($socuser){    
                
                Auth::login($socuser);
                    Alert::toast('Login Successfully!','success');
                    return redirect()->route('index');
                
                }else{
                $newuser =  User::create([
                        'name'=>$user->getName(),
                        'email'=>$user->getEmail(),
                        'facebook_id'=>$user->getId(),
                        'phone'=>rand(100000,9999999),
                        'password'=>bcrypt('123456'),
                    ]);

                    Auth::login($newuser);
                    return redirect()->route('index');
                }

            } catch (Exception $e) {
                return $e->getMessage();
            }


    }
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
    
    public function handleProviderCallbackGoogle()
    {

      
            try {
                
                $user = Socialite::driver('google')->stateless()->user();

                $finduser  = User::where('google_id',$user->getId())->first();

                if($finduser){    
                
                Auth::login($finduser );
                    Alert::toast('Login Successfully!','success');
                    return redirect()->route('index');
                
                }else{
                $finduser  =  User::create([
                        'name'=>$user->getName(),
                        'email'=>$user->getEmail(),
                        'google_id'=>$user->getId(),
                        'phone'=>rand(100000,9999999),
                        'password'=>bcrypt('123456'),
                    ]);

                    Auth::login($finduser);
                    return redirect()->route('index');
                }

            } catch (Exception $e) {
                return $e->getMessage();
            }


    }
}
