<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
 function login()
    {
        return view('authentication.login');
    }
    
 function register()
 {
     return view('authentication.register');
 } 

 function save(Request $request)
 {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:15'

        ]);


    $admin=new Admin;
    $admin->name=$request->name;
    $admin->email=$request->email;
    $admin->password=Hash::make($request->password);

    $save=$admin->save();
    if($save)
    {
            return back()->with('success','User has been successfully Register');
    }
    else
    {
            return back()->with('fail','Something went wrong try again');
    }
 } 
 function check(Request $request)
 {
    $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:5|max:15'
    ]);

    $userinfo=Admin::where('email','=',$request->email)->first();

    if(!$userinfo)
    {
        return back()->with('fail','Sorry we did not recognize you');
    }
    else
    {
        if(Hash::check($request->password,$userinfo->password))
        {
            $request->session()->put('LoggedUser',$userinfo->id);
            return redirect('/../posts');
        }
        else
        {
            return back()->with('fail','Sorry Your password is incorrect');
        }
    }
 }
 function logout()
 {
     if(session()->has('LoggedUser'))
     {
         session()->pull('LoggedUser');
         return redirect('/authentication/login');
     }
 }
 

}
