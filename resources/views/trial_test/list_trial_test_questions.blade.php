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
            <a class="navbar-brand" href="/add_trial_test/{{$subject_id}}">add test</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="/list_trial_test_questions/{{$subject_id}}">list trial_test questions</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <h1>list questions</h1>

@foreach($questions as $question)
<div class="border bborder-secondaryy " >
    <div class="question jumbotron" >
 {{$question->question}}
    </div>
<div id="answer" class="jumbotron">
        {!!$question->answer!!}
    </div>
</div>
<a href="/trialTest/{{$question->id}}/edit">
    <button type="button" class="btn btn-outline-secondary">Edit</button>

</a>
{!!Form::open(['action'=>['trialTestController@destroy' , $question->id], 'method' => 'POST' ,'class'=>'pull-right' ])!!}
                    {{Form::hidden('_method' , 'DELETE')}}
                    {{Form::submit('Delete' , ['class'=>'btn btn-outline-danger'])}}
                    {!!Form::close()!!}
@endforeach
@endsection