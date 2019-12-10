@extends('inc.admin')
@section('main_content')
<link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
    @section('img')
    <img src="../../assets/img/ui-sam.jpg" class="img-circle" width="60">
    @endsection
{!! Form::open(['action' => ['adminController@update' ,$admin->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title','الايميل')}}
        {{Form::text('email',$admin->email,['class' => 'form-control'])}}
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
        {{Form::label('title','active')}}
        {{Form::text('active',$admin->active,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}       
    </div>
{!! Form::close() !!}
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../../1assets/js/jquery.ui.touch-punch.min.js"></script>
<script class="include" type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../../assets/js/jquery.scrollTo.min.js"></script>
<script src="../../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="../../assets/js/common-scripts.js"></script>
@endsection