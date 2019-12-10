@extends('inc.teacher')
@section('main_content')

 
 
    <h1> edit trial test </h1>
    {!! Form::open([ 'action' => ['trialTestController@update' , $questions->id],'method'=>'POST' ,'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
            {{Form::label('question', 'question')}}
            {{Form::textarea('question',$questions->question,['class'=>'form-control','placeholder' => 'question','style'=>'visibility: visible;'])}}
    </div>

    <div class="form-group">
        {{Form::label('answer', 'answer')}}
        {{Form::textarea('answer',$questions->answer,['id'=>'article-ckeditor','class'=>'form-control','placeholder' => 'answer','style'=>'visibility: visible;'])}}
    </div>
    <div class="form-group"> 
        {{Form::label('title','الوحده')}}<br>
        <input class="form-control" type="number" value="{{$questions->unit}}" name="unit" min="1" required>
   </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>



@endsection