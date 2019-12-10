@extends('inc.teacher')
@section('main_content')

    <h1>edit assignment</h1>
    {!! Form::open([ 'action' => ['filesController@update' , $assignment->id],'method'=>'POST' ,'enctype' => 'multipart/form-data']) !!}

<div class="form-group">
    {{Form::label('title', 'title')}}
    {{Form::text('title','',['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::file('pdf')}}
</div>
{{Form::hidden('_method', 'PUT')}}
{{Form::submit('submit',['class'=>'btn btn-primary'])}}

{!! Form::close() !!}

<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../../1assets/js/jquery.ui.touch-punch.min.js"></script>
<script class="include" type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../../assets/js/jquery.scrollTo.min.js"></script>
<script src="../../assets/js/jquery.nicescroll.js" type="text/javascript"></script>

<!--common script for all pages-->
<script src="../../assets/js/common-scripts.js"></script>
@endsection