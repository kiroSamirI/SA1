@extends('inc.admin')
@section('main_content')
{!! Form::open(['action' => ['vacanciesController@update' ,$vacancy->id ], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title','العنوان')}}
        {{Form::text('title',$vacancy->title,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('discription','وصف')}}
        {{Form::textarea('discription',$vacancy->description,['id' => 'article-ckeditor' , 'class' => 'form-control'])}}
    </div>
    <div class="form-group">
            {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}       
    </div>
{!! Form::close() !!}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection