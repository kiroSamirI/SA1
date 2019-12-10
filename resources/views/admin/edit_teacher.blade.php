@extends('inc.admin')
@section('main_content')

    {!! Form::open(['action' => ['teacherController@update' ,$teacher->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name','الاسم')}}
        {{Form::text('name',$teacher->name,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title','الايميل')}}
        {{Form::text('email',$teacher->email,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title','الباسورد')}}
        {{Form::password('password',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title','الباسورد')}}
        {{Form::password('password-confirm',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}       
     </div>
{!! Form::close() !!}



@endsection