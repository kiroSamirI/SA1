<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Gate;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('isAdmin') ){
            if(!Gate::allows('isEmployee'))
            return redirect()->back()->with('error' , 'not allowed page');
        }
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isSuperAdmin')){
            return redirect()->back()->with('error' , 'not allowed page');
        }
        return view('super.add_admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $admin = new User;
        $admin->name = $request->input('name');
        $admin->user_type = 'admin';
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));
        $admin->active = 1;
        $admin->save();
        return redirect('/add_admin')->with('success' , 'تمت اضافه الادمن');
    }
    public function list()
    {
        if(!Gate::allows('isSuperAdmin')){
            return redirect()->back()->with('error' , 'not allowed page');
        }
        $admins = User::where('user_type' , 'admin')->get();
        //return $admins;
       return view('super.list_admin')->with('admins',$admins);
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
        if(!Gate::allows('isSuperAdmin')){
            return redirect()->back()->with('error' , 'not allowed page');
        }
        $admin = User::find($id);
        return view('super.edit_admin')->with('admin' , $admin);
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
        $admin = User::find($id);
        $admin->email = $request->input('email');
        $admin->active = $request->input('active');
        if($request->input('password') != null){
            if($request->input('password-confirm') == $request->input('password')){
                $admin->password =$request->input('password');
                #return 12;
                #return edit emp back with his id
            }
            else {
                #return 123;
                return redirect()->back()->with('error' , 'not the same password');
            }
        }
        $admin->save();
        return redirect('/list_admin')->with('success' , 'admin updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect('/list_admin');
    }
}
