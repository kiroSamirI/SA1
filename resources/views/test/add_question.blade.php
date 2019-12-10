@extends('inc.teacher')
@section('main_content')

    @section('img')
    <img src="../../assets/img/ui-sam.jpg" class="img-circle" width="60">
    @endsection

{!! Form::open(['action' => 'vacanciesController@store' , 'method' => 'POST']) !!}
<form>
                   <input id='watch-me' name='test' type='radio' checked /> اكمل<br>
                   <input id='see-me' name='test' type='radio' /> اختر <br>
                   <input id='look-me' name='test' type='radio' /> صح او خطا<br>
</form>
               <br><br>
               <div id='show-me'>
                   <!-- Nav tabs -->
                   <div class="form-group">
                        {{Form::label('title','السؤال')}}
                        {{Form::text('question','',['class' => 'form-control'])}}
                        
                    </div>
                    <div class="form-group">
                        {{Form::label('title','الاجابه')}}
                        {{Form::text('answer','',['class' => 'form-control'])}}
                    </div>
               </div>
               
               <div id='show-me-two' style='display:none; border:2px solid #ccc'>
                    <div class="form-group">
                            {{Form::label('title','السؤال')}}
                            {{Form::text('question','',['class' => 'form-control'])}}
                            
                        </div>
                        <div class="form-group">
                            {{Form::label('title',' الاجابه الصحيحه')}}
                            {{Form::text('right_answer','',['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                                {{Form::label('title','الاجابه الخاطئه 1')}}
                                {{Form::text('wrong_answer1','',['class' => 'form-control'])}}
                                
                            </div>
                            <div class="form-group">
                                {{Form::label('title','لاجابه الخاطئه 2')}}
                                {{Form::text('wrong_answer2','',['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                    {{Form::label('title','لاجابه الخاطئه 3')}}
                                    {{Form::text('wrong_answer3','',['class' => 'form-control'])}}
                                    
                                </div>
               </div>
               <div id='show-me-three' style='display:none; border:2px solid #ccc'>
                    
               </div>
               <div class="form-group">
                    {{Form::label('title','الوحده')}}<br>
                    <input class="form-control" type="number" value="" name="unit" min="1" required>
               </div>
               <div class="form-group">
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}       
                </div>
               
            {!! Form::close() !!}
            
@endsection