@extends('inc.admin')
@section('main_content')

{!! Form::open(['action' => 'employeeController@store' , 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title','الاسم')}}
        {{Form::text('name','',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title','الايميل')}}
        {{Form::text('email','',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title','الباسورد')}}
        {{Form::password('password',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title','الباسورد')}}
        {{Form::password('password_confirmation',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}       
    </div>
{!! Form::close() !!}
@endsection