<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\exam;

use DB;
class examController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sub_id)
    {
        $units= DB::table('exams')->where('subject_id',$sub_id)->groupBy('unit') ;
        //return $units;
        return view('exam.exam_index')->with('sub_id',$sub_id)->with('units' , $units);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create($sub_id)
    {
        return view('exam.add_question')->with('sub_id',$sub_id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $question_type=$request->input('test');
        $exam = new exam;
        if($question_type=='اختر'){
            //validation
            $this->validate($request,[
                'choose_question'=>'required',
                'right_answer' =>'required',
                'wrong_answer1'=>'required',
                'wrong_answer2'=>'required',
                'wrong_answer3'=>'required',
                'unit'         => 'required'
            ]);
            //storing
            $exam->question = $request->input('choose_question');
            $exam->right_answer= $request->input('right_answer');
            $exam->wrong_answer1= $request->input('wrong_answer1');
            $exam->wrong_answer2= $request->input('wrong_answer2');
            $exam->wrong_answer3= $request->input('wrong_answer3');
            $exam->unit = $request->input('unit');
            $exam->question_type=$question_type;
            $exam->subject_id=$request->input('sub_id');
            $exam->save();
        }else if($question_type=='صح او خطا'){
            //validation
            $this->validate($request,[
                'T_F_question'=>'required',
                'answer'=>'required',
                'unit'  => 'required'
            ]);
            //storing
            $exam->question = $request->input('T_F_question');
            if($request->input('answer')=='true'){
            $exam->right_answer= 'true';
            }else{
            $exam->right_answer= 'false';
            }
            $exam->wrong_answer1= 0;
            $exam->wrong_answer2= 0;
            $exam->wrong_answer3= 0;
            $exam->question_type=$question_type;
            $exam->subject_id=$request->input('sub_id');
            $exam->unit = $request->input('unit');
            $exam->save();
        }else{
            //validation
            $this->validate($request,[
                'complete_question'=>'required',
                'complete_answer'=>'required',
                'unit'         => 'required'
            ]);
            //storing
            $exam->question = $request->input('complete_question');
            $exam->right_answer= $request->input('complete_answer');
            $exam->wrong_answer1= 0;
            $exam->wrong_answer2= 0;
            $exam->wrong_answer3= 0;
            $exam->question_type=$question_type;
            $exam->subject_id=$request->input('sub_id');
            $exam->unit = $request->input('unit');
            $exam->save();
        }
        return redirect()->back()->with('success', 'question added successfuly');

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
        $question = exam::find($id);
        $taq = array('question' =>$question );
        return view('exam.edit', $taq);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=exam::find($id);
        $delete->delete();
        return redirect()->back()->with('success','تم حذف السؤال');
    }
    public function list_random($sub_id){
        $questions= DB::table('exams')
        
        ->where('subject_id', $sub_id)
     
        ->orderByRaw("RAND()")
        
        

        ->get();
        
        $units =  $questions->groupBy('unit')->all();
        //$units->toArray();
        //return 1;
        ksort($units , SORT_REGULAR);
        //$units = $units->asc();
        //$hello= 'you can use with multiple time';
       /* foreach ($units as $unit) {
           foreach ($unit as $question) {
              echo $question->question ."<br>";
           }
        }*/
        $num = count($questions);
        return view('exam.see_exam')->with('units',$units)->with('num' ,$num)->with('sub_id' , $sub_id);
        }
    //public function list(){
    //        $questions=DB::table('trialTest')->get();
    //        return view('trial_test.list_trial_test_questions',compact('questions'));
    //    }
    public function calculate(Request $request ,$num , $sub_id){
        $result = 0;
        for ($i=0; $i < $num && $i< 10 ; $i++) { 
            
                if($request->input('answer'.$i) != null){
                $arr = explode("_" , $request->input('answer' . $i));
                //return $arr[0];
                $question = exam::find($arr[1]);
                if ($question->question_type == 'اكمل') {
                    if($question->right_answer  == $request->input('Complete_answer' . $i))
                        $result++;
                    
                }
                else {
                    if($question->right_answer  == $arr[0]){
                        //return $question->right_answer . $arr[0];
                        $result++;
                    }
                }
                
            }
        }
        $image;
        if($result<5){
            $image = "fail.jpeg";
        }elseif($result<=6){
            $image = "pair.jpeg";
        }elseif($result<=7){
            $image = 'good.jpeg';
        }elseif($result<=8){
            $image = 'vgood.jpeg';
        }elseif($result<=9){
            $image = 'vvgood.jpeg';
        }
        else{
            $image = 'exlant.jpeg';
        }
        return view('exam.show_grade')->with('result' , $result)->with('image',$image)->with('subject_id',$sub_id);
        
    }
    public function list_all($sub_id){
        $questions=DB::table('exams')->where('subject_id', $sub_id)->get();
        return view('exam.list_exam_questions',compact('questions'))->with('sub_id',$sub_id);
    }
}
