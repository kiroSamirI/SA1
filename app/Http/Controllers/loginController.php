<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class loginController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'active' => 1
        ]))
        {
            $user = User::where('email' ,$request->email)->first();
            if($user->is_super_admin()){
                return redirect()->route('add_admin');
            }
            if($user->is_admin()){
                return redirect()->route('admin.index');
            }
            elseif ($user->is_employee()) {
                return redirect()->route('employee.index');
            }
            elseif ($user->is_teacher()) {
                return redirect()->route('teacher.index');
            }
            else {
                return redirect()->route('user.index');
            }
        }
        return redirect()->back();
    }
}
