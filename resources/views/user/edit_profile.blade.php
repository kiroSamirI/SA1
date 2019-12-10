@extends('inc.user')
@section('main_content')
<h1>edit profile</h1>
    {!! Form::open([ 'action' => ['manage_account_controller@update' ,auth()->user()->id ],'method'=>'POST' ,'enctype' => 'multipart/form-data']) !!}
    {{Form::label('NAME','NAME')}}
    {{Form::text('user_name',$user->name,['class' => 'form-control'])}}
</br>
{{Form::label('EMAIL','EMAIL')}}
    {{Form::text('user_email',$user->email,['class' => 'form-control'])}}
</br>
{{Form::label('PASSWORD','PASSWORD')}}
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