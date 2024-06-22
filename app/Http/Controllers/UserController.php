<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
   /* public function user($id){
      $user = User::findOrFail($id);

      return view('panel.index')->with('user',$user);
    }*/


    public function logout(){
        Auth::logout();

        return redirect(url('login'));
    }

    public function profile(){
        return view("panel.profile");
    }
    public function edit(){
        return view('panel.editprofile');
    }


    public function editprofile(Request $request , $id){
        $data =  $request->validate([
             "name"=>"required|string",
             "email"=>"required|string",
             "profile_photo_path"=>"image|mimes:jpg,png,jpeg,gif",
             
         ]);
         $user =    User::findOrFail($id);
         if($user){
            if($request->hasFile("profile_photo_path")){
                Storage::delete($user->profile_photo_path);
                $data["profile_photo_path"] =   Storage::putFile("images",$request->profile_photo_path);
            }
         }
        
         $user->update($data);
         session()->flash("success" , "profile updated succeffully");
         return redirect()->back();
     }

}
