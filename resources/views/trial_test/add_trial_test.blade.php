@extends('inc.teacher')
@section('main_content')
 
  
</br>
</br>
<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>

            </button>
            <a class="navbar-brand" href="/add_trial_test/{{$subject_id}}">add test</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <li class="active"><a href="/list_trial_test_questions/{{$subject_id}}">list trial_test questions</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <h1> add trial test </h1>

    {!! Form::open(['action' =>'trialTestController@store','method'=>'POST']) !!}

    <div class="form-group">
            {{Form::label('question', 'question')}}
            {{Form::textarea('question','',['id'=>'','class'=>'form-control','placeholder' => 'question','style'=>'visibility: visible;'])}}
    </div>

    <div class="form-group">
        {{Form::label('answer', 'answer')}}
        {{Form::textarea('answer','',['id'=>'article-ckeditor','class'=>'form-control','placeholder' => 'answer','style'=>'visibility: visible;'])}}
    </div>
    <div class="form-group"> 
      {{Form::label('title','الوحده')}}<br>
      <input class="form-control" type="number" value="" name="unit" min="1" required>
    </div>
    {{Form::hidden('sub_id' , $subject_id)}}
    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!} 
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    @endsection