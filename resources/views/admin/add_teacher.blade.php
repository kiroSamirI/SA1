@extends('inc.admin')
@section('main_content')

<style>
    .check{
        margin-left: 10px;
        padding: 10px;
    }
</style>
{!! Form::open(['action' => 'teacherController@store' , 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name','الاسم')}}
        {{Form::text('name','',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('email','الايميل')}}
        {{Form::text('email','',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('password','الباسورد')}}
        {{Form::password('password',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('password-confirm','الباسورد')}}
        {{Form::password('password_confirmation',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        
                {{Form::label('stage','المرحله')}}
        <div>
            <label>
                <input name="stage" value="ابتدائى" class="primary" type="radio"> الابتدائى 
            </label>
        </div>
        <div>
                <label>
                        <input name="stage" value="اعدادى" class="middel" type="radio" checked> الاعدادى 
                </label>
        </div>
        <div>
                <label>
                        <input name="stage" value="ثانوى" class="secandry" type="radio"> الثانوى 
                </label>
        </div>
     </div>
    <div class="form-group">
        {{Form::label('title','الماده')}}
        {{Form::text('subject','',['class' => 'form-control'])}}
     </div>
    <div>
        {{Form::label('title','الصف', ['class' => 'awesome'])}}
        <div>
            <label>{{Form::checkbox('years[]', 'الاول' )}} الاول </label>
          </div>
          <div>
            <label>{{Form::checkbox('years[]', 'الثانى')}} الثانى </label>
          </div>
          <div>
            <label>{{Form::checkbox('years[]', 'الثالث')}} الثالث </label>
          </div>
          <div id="primary_years" style="display: none">
          <div>
            <label>{{Form::checkbox('years[]', 'الرابع')}} الرابع</label>
          </div>
          <div>
            <label>{{Form::checkbox('years[]', 'الخامس')}} الخامس</label>
          </div>
          <div>
            <label>{{Form::checkbox('years[]', 'السادس')}} السادس</label>
          </div>
          </div>
    </div>
    <div class="form-group">
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}       
     </div>
{!! Form::close() !!}
@endsection