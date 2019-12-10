@extends('inc.admin')
@section('main_content')

{!! Form::open(['action' => 'vacanciesController@store' , 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title','العنوان')}}
        {{Form::text('title','',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('discription','وصف')}}
        {{Form::textarea('discription','',['id' => 'article-ckeditor' , 'class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}       
    </div>
{!! Form::close() !!}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection