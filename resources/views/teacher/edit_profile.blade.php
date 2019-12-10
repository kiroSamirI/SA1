@extends('inc.teacher')
@section('main_content')


    <h1>edit profile</h1>
    {!! Form::open([ 'action' => ['manage_account_controller@update' ,auth()->user()->id ],'method'=>'POST' ,'enctype' => 'multipart/form-data']) !!}
    {{Form::label('الاسم','الاسم')}}
    {{Form::text('user_name',$user->name,['class' => 'form-control'])}}
</br>
{{Form::label('الايميل','الايميل')}}
    {{Form::text('user_email',$user->email,['class' => 'form-control'])}}
</br>
{{Form::label('كلمه المرور','كلمه المرور')}}
    {{Form::password('user_password',['class' => 'form-control'])}}
</br>
{{Form::label('COVER_IMAGE','COVER IMAGE')}}

<div class="form-group">
    {{Form::file('cover_image')}}
</div>
{{Form::hidden('_method', 'PUT')}}
{{Form::submit('submit',['class'=>'btn btn-primary'])}}

{!! Form::close() !!}


@endsection