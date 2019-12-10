@extends('inc.teacher')
@section('main_content')
<h1>exam index</h1>
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
  </nav
  <h1>hello from exam index</h1>
  <div id="count_down" style="height:200px;width:200px;color:red"></div>
  <script src="../../js/timer.js"></script>
@endsection