<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class manage_account_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        $user_type = $user->user_type;
        if($user_type == 'admin' || $user_type == 'employee'){
            return view('admin.edit_profile')->with('user',$user);
        }
        elseif ($user_type == 'teacher') {
            return view('teacher.edit_profile')->with('user',$user);
        } 
        elseif ($user_type == 'user') {
            return view('user.edit_profile')->with('user',$user);
        }
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
        $user= User::find($id);

        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extintion
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore=$filename . '_'.time() . '.' . $extension;
            //upload image
            $path=$request->file('cover_image')->storeAs('public/pdf',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $user->name = $request->input('user_name');
        $user->email = $request->input('user_email');
        if($request->input('user_password')!= null)
        {
            $user->password =bcrypt($request->input('user_password'));
        }
            
        $user->cover_image = $fileNameToStore;
        $user->save();
        return redirect('profile/'.auth()->user()->id.'/edit')->with('success','تم تعديل البيانات');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
