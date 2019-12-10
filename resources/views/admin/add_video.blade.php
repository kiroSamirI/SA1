@extends('inc.admin')
@section('main_content')

{!! Form::open(['action' => 'videoController@store' , 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title','العنوان')}}
        {{Form::text('title','',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('discription','وصف')}}
        {{Form::text('discription','',['class' => 'form-control'])}}
    </div>
    
    <div class="form-group">
        <label class="custom-file-label" for="customFile">اضافه رابط</label>
        {{Form::text('videoFile','',['class' => 'form-control'])}}
    </div>

    <div class="form-group">
            <label class="custom-file-label" for="customFile">Choose image</label>
            {{Form::file('imageFile')}}
    </div>


    <div class="form-group">
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}       
    </div>
{!! Form::close() !!}
@endsection