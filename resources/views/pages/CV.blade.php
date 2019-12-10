@extends('layouts.app')
@section('content')
@if (count($vacancies) > 0)
@foreach($vacancies as $vacancy)
<div class="alert alert-success">
    {{$vacancy->title}}
</div>
<div class="alert alert-success">
    {!! $vacancy->description !!}
</div>
@include('inc.messages')
@endforeach
{!! Form::open(['action' => 'cvController@store' , 'method' => 'POST' , 'dir' => "rtl" ,'style' => "text-align: center", 'enctype' => 'multipart/form-data' ]) !!}
    <div class='form-group' style="text-align: center ; margin: auto">
        <label  style="float: right; font-size: 20px; margin: 10px" >الاسم</label>  
          <div class='col-md-6 inputGroupContainer'>
          <div class='input-group'>
              <span class='input-group-addon'><i class='glyphicon glyphicon-bookmark'></i></span>
              <input name='name' class='form-control' type='text' required>
          </div>
        </div>
      </div>
      <div class='form-group'>
            <label  style="float: right; font-size: 20px; margin: 10px" >الماده</label>  
          <div class='col-md-6 inputGroupContainer'>
          <div class='input-group'>
              <span class='input-group-addon'><i class='glyphicon glyphicon-bookmark'></i></span>
              <input name='subject' class='form-control' type='text' required>
          </div>
        </div>
      </div>
      <div class="form-group">
            <label  style="float: right; font-size: 20px; margin: 10px" >ارسال CV</label>  
        <div class='col-md-6 inputGroupContainer'>
            <div class='input-group'>
            <input type="file" class="custom-file-input" id="customFile" name="pdf" required>
            <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="float: right; margin: 10px;">Submit</button>
      {!! Form::close() !!}
  @else
  <div class="alert alert-success">
    sorry no vacancies now
</div>
  @endif
  @endsection