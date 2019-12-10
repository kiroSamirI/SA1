<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\subject_user;
use Gate;
class activeStudentsController extends Controller
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
        $users = User::where('user_type' , 'user')->get();
        return view('/admin.activate')->with('users' , $users);
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
        //
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
        $user = User::find($id);
        $user->active = 1;
        $user->save();
        return redirect('/list_students')->with('success' , 'تم تفعيل الطالب');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $subjects = subject_user::where('user_id',$id)->get();
         foreach ($subjects as $subject) {
             $subject->delete();
         }
        $user = User::find($id);
        $user->delete();
        return redirect('/list_students')->with('success' , 'تم حذف الطالب');
    }
}
