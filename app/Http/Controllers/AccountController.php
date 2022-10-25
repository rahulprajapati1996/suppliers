<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
class AccountController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('account.profile',compact('user'));
    }
    public function updateProfile(Request $request,$id){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
        ]);
        if(User::where('id',$id)->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'dob'=>$request->date_of_birth,
            'gender'=>$request->gender,
        ])){
            return redirect('account/profile')->with('success', 'Profile updated successfully.');
        }
        return redirect('account/profile')->with('error', 'Profile updated fail.');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        if(User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]))
        {
            return redirect('account/profile')->with('success', 'Password updated successfully.');
        }
        return redirect('account/profile')->with('error', 'Password updated fail.');
    }
}
