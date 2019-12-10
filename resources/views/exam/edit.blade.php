@extends('inc.teacher')
@section('main_content')

    <h1> edit exam </h1>
    {!! Form::open([ 'action' => ['examController@update' , $question->id],'method'=>'POST' ,'enctype' => 'multipart/form-data']) !!}
    @if($question->question_type=='اختر')

    <div id='show-me-two' style='border:2px solid #ccc'>
            <div class="form-group">
                    {{Form::label('title','السؤال')}}
                    {{Form::text('choose_question',$question->question,['class' => 'form-control'])}}
                </div>
                        <div class="form-group">
                            {{Form::label('title',' الاجابه الصحيحه')}}
                            {{Form::text('right_answer',$question->right_answer,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                                {{Form::label('title','الاجابه الخاطئه 1')}}
                                {{Form::text('wrong_answer1',$question->wrong_answer1,['class' => 'form-control'])}}
                                
                            </div>
                            <div class="form-group">
                                {{Form::label('title','لاجابه الخاطئه 2')}}
                                {{Form::text('wrong_answer2',$question->wrong_answer2,['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                    {{Form::label('title','لاجابه الخاطئه 3')}}
                                    {{Form::text('wrong_answer3',$question->wrong_answer3,['class' => 'form-control'])}}
                                    
                                </div>
               </div>
    @endif
    @if($question->question_type=='اكمل')
    <div id='show-me' style='border:2px solid #ccc'>
            <div class="form-group">
                    {{Form::label('title','السؤال')}}
                    {{Form::text('complete_question',$question->question,['class' => 'form-control'])}}
                </div>
         <div class="form-group">
             {{Form::label('title','الاجابه')}}
             {{Form::text('complete_answer',$question->right_answer,['class' => 'form-control'])}}
         </div>
    </div>
    @endif
    @if($question->question_type=='صح او خطا')
    <div id='show-me-three' style='border:2px solid #ccc'>
            <div class="form-group">
                    {{Form::label('title','السؤال')}}
                    {{Form::text('T_F_question',$question->question,['class' => 'form-control'])}}
                </div>
        <div class="form-group">
            {{Form::label('title','الاجابه')}}<br>
            <input id='watch-me' name='answer' type='radio' value='true' checked/>{{$question->right_answer}} <br>
            @if($question->right_answer=='true')
                <input id='see-me' name='answer' type='radio' value='wrong'/> false <br>
            @else
                <input id='see-me' name='answer' type='radio' value='wrong'/> true <br>
        @endif            
        </div>
    @endif

    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}


@endsection