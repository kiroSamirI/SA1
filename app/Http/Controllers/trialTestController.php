<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrialTest;
use DB;
use App\User;

class trialTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subject_id)
    {
         return view('trial_test.index')->with('subject_id' , $subject_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subject_id)
    {
        return view('trial_test.add_trial_test')->with('subject_id' , $subject_id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'question'=>'required',
            'answer'=>'required',
            'unit' => 'required'

        ]);
        $t_test=new TrialTest;
        $t_test->question = $request->input('question');
        $t_test->answer = $request->input('answer');
        $t_test->subject_id = $request->input('sub_id');
        $t_test->unit = $request->input('unit'); 
        $t_test->save();
        return redirect()->back()->with('success' , 'تمت اضافه السؤال');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_id = $id;
        $subject_id = $id;
        $teacher_id = auth()->user()->id;
        $teacher = User::find($teacher_id);
        //return $teacher;
        $subjectIdAndTtacherId = array('teacher' => $teacher, 'sub_id' =>$sub_id);
        return view('trial_test.add_trial_test' , $subjectIdAndTtacherId)->with('subject_id' , $subject_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = TrialTest::find($id);
        $taq = array( 'questions' =>$questions );
        return view('trial_test.edit_trial_test', $taq);
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
        $question= TrialTest::find($id);
        $question->question = $request->input('question');
        $question->answer = $request->input('answer');
        $question->unit =$request->input('unit');
        $question->save();
        return redirect()->back()->with('success','question updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=TrialTest::find($id);
        $delete->delete();
        return redirect()->back()->with('success','question deleted');
    }
    public function list_random($id){

        $questions= DB::table('trialTest')
        ->where('subject_id',$id)
        ->orderByRaw("RAND()")
        ->get();
        $units =  $questions->groupBy('unit')->all();
        ksort($units , SORT_REGULAR);
        $num = count($questions);
        return view('trial_test.see_trial_test')->with('units',$units)->with('num' ,$num)->with('subject_id' , $id);
        }

    public function list($id){
        
            $subject_id = $id;
            $teacher_id = auth()->user()->id;
            $teacher= User::find($teacher_id);
            $questions= trialTest::where('subject_id' , $subject_id)->get();
            return view('trial_test.list_trial_test_questions',compact('questions'))->with('subject_id',$subject_id);
        }
}
