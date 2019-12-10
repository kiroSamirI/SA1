@extends('inc.teacher')
@section('main_content')
<h1> add assignment </h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['action' =>'filesController@store' ,'method'=>'POST' ,'enctype' => 'multipart/form-data']) !!}

<div class="form-group">
    {{Form::label('title', 'title')}}
    {{Form::text('Title','',['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::file('title')}}
</div>
{{Form::hidden('sub_id' , $sub_id)}}
{{Form::submit('submit',['class'=>'btn btn-primary'])}}

{!! Form::close() !!}
@endsection