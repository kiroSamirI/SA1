@extends('inc.teacher')
@section('main_content')

   
<h1>add_exam</h1>
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
          <span class="icon-bar"></span>
        </button> 
        <a class="navbar-brand" href="/add_exam/{{$sub_id}}">add exam</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/list_exam_questions/{{$sub_id}}">list exam</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  {!! Form::open(['action' =>'examController@store','method'=>'POST' ,'enctype' => 'multipart/form-data']) !!}
 
                   <input id='watch-me' name='test' type='radio' value='اكمل'checked/> اكمل<br>
                   <input id='see-me' name='test' type='radio' value='اختر' /> اختر <br>
                   <input id='look-me' name='test' type='radio' value='صح او خطا'/> صح او خطا<br>
               <br><br>

               <!--complete -->
               <div id='show-me'>
                   <!-- Nav tabs -->
                   <div class="form-group">
                        {{Form::label('title','السؤال')}}
                        {{Form::text('complete_question','',['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('title','الاجابه')}}
                        {{Form::text('complete_answer','',['class' => 'form-control'])}}
                    </div>
                    {{Form::hidden('sub_id', $sub_id)}}
               </div>
               
                 <!--choose -->
               <div id='show-me-two' style='display:none; border:2px solid #ccc'>
                    <div class="form-group">
                            {{Form::label('title','السؤال')}}
                            {{Form::text('choose_question','',['class' => 'form-control'])}}
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

               <!-- true$false-->
               <div id='show-me-three' style='display:none; border:2px solid #ccc'>
                <div class="form-group">
                    {{Form::label('title','السؤال')}}
                    {{Form::text('T_F_question','',['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('title','الاجابه')}}<br>
                    <input id='watch-me' name='answer' type='radio' value='true'/> صح<br>
                    <input id='see-me' name='answer' type='radio' value='wrong'/> خطأ <br>
                    
                </div>
           </div>
                
               </div>
            </div>
            <div class="form-group">
                    {{Form::label('title','الوحده')}}<br>
                <input class="form-control" type="number" value="" name="unit" min="1" required>
              </div>
               <div class="form-group">
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}       
                
            {!! Form::close() !!}
            
@endsection