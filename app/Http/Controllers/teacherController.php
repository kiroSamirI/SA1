<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\subject;
use App\subject_user;
use Gate;
class teacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return $teacher;
        return view('teacher.index');
        //return view('teacher.index')->;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin') ){
            if(!Gate::allows('isEmployee'))
            return redirect()->back()->with('error' , 'not allowed page');
        }
        return view('admin.add_teacher');
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
            'stage' => 'required',
            'subject' => 'required|string',
        ]);
        if($request->input('stage') != 'ابتدائى' ){
            
            foreach ($request->input('years') as $year) {
                if($year == 'الرابع' || $year == 'الخامس' || $year == 'السادس'){
                    return redirect()->back()->with('error' , 'المرحله'.$request->input('stage') .' لا تحتوى على سنه دراسيه ' .$year );
                }
            }
        }
        $teacher = new User;
        $teacher->name = $request->input('name');
        $teacher->user_type = 'teacher';
        $teacher->email = $request->input('email');
        $teacher->password = bcrypt($request->input('password'));
        $teacher->active = 1;
        $teacher->save();
        //dd($request);
        foreach ($request->input('years') as $year) {
            $subject = new subject;
            $subject->name  = $request->input('subject');
            $subject->stage = $request->input('stage');
            $subject->year  = $year;
            $subject->user_id = $teacher->id;
            $subject->save();
        }
        
        #returen add_teacher view
        return redirect('/add_teacher')->with('success' , 'تمت اضافه المدرس');
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
        if(!Gate::allows('isAdmin') ){
            if(!Gate::allows('isEmployee'))
            return redirect()->back()->with('error' , 'not allowed page');
        }
        $teacher = User::find($id);
        return view('admin.edit_teacher')->with('teacher' , $teacher);
    }
    public function list()
    {
        if(!Gate::allows('isAdmin') ){
            if(!Gate::allows('isEmployee'))
            return redirect()->back()->with('error' , 'not allowed page');
        }
        $teachers = User::where('user_type' , 'teacher')->get();
        //return $teachers;
       return view('admin.list_teachers')->with('teachers',$teachers);
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
        $teacher = User::find($id);
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        if($request->input('password') != null){
            if($request->input('password-confirm') == $request->input('password')){
                $teacher->password =$request->input('password');
                #return 12;
                $teacher->password = bcrypt($request->input('password'));
                #return edit emp back with his id
            }
            else {
                #return 123;
                return redirect()->back()->with('error' , 'not the same password');
            }
        }
        
        $teacher->save();
        return redirect('/list_teachers');
        #return list teachers view
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = User::find($id);
        $subjects = subject::where('user_id',$teacher->id)->get();
        foreach ($subjects as $subject) {
            # code...
            $files = $subject->uploads;
            foreach ($files as $file) {
                $file->delete();
            }
             $trialTests = $subject->TrialTest;
            foreach ($trialTests as $trialTest) {
                $trialTest->delete();
            }

            $exams = $subject->exam;
            foreach ($exams as $exam) {
                $exam->delete();
            }
            $sub_users = subject_user::where('subject_id' , $subject->id)->get();
            foreach ($sub_users as $sub_user) {
                # code...
                $sub_user->delete();
            }
            $subject->delete();
        }
        
        $teacher->delete();
        return redirect('/list_teachers');
    }
}
