@extends('inc.teacher')
@section('main_content')
<br>
</br>
<nav class="navbar navbar-default" >
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
                <li class="active"><a href="/list_exam_questions/{{$sub_id}}">list exam questions</a></li>
              </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <h1>list questions</h1>

@foreach($questions as $question)
<div class="border bborder-secondaryy " >
    <div class="question jumbotron" >
 {{$question->question}}
 <span style="display:block;">answer:{{$question->right_answer}}</span>
    </div>
</div>
<a href="/exam/{{$question->id}}/edit">
    <button type="button" class="btn btn-outline-secondary">Edit</button>
</a>
{!!Form::open(['action'=>['examController@destroy' , $question->id], 'method' => 'POST' ,'class'=>'pull-right' ])!!}
                    {{Form::hidden('_method' , 'DELETE')}}
                    {{Form::submit('Delete' , ['class'=>'btn btn-outline-danger'])}}
                    {!!Form::close()!!}
@endforeach
@endsection