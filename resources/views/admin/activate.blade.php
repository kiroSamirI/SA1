@extends('inc.admin')
@section('main_content')

<head>
    <meta charset="UTF-8">
    <title>Responsive Filter Table</title>
    
    
    
        <link rel="stylesheet" href="table/css/style.css">
  
    <style>
        .mine{
            display: inline-block;
        }
    </style>
  </head>
  
  <body>
  
    <div id="f-accordion">
      <h3> Section 1</h3>
    <div>
    

      
  
  <input type="search" class="light-table-filter" data-table="order-table" placeholder="بحث" />
      <section class="table-box">
          <table class="order-table">
              <thead>
                  <tr>
                      <th>الاسم</th>
                      <th>الايميل</th>
                      <th>تاكيد</th>
                      <th>مسح</th>
                  </tr>
              </thead>
              <tbody>
                    @foreach($users as $user)
                  <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      @if($user->active==0)
                      <td>
                            {!! Form::open(['action' => ['activeStudentsController@update' ,$user->id], 'method' => 'POST']) !!}
                            <div class="form-group">
                                    {{Form::hidden('_method', 'PUT')}}
                                    {{Form::submit('تاكيد',['class' => 'btn btn-default'])}}       
                                </div>
                            {!! Form::close() !!}
                      </td>
                      @else
                      <td>مؤكد</td>
                      @endif
                  <td>
                        {!! Form::open(['action' => ['activeStudentsController@destroy' ,$user->id], 'method' => 'POST' , 'class' => 'mine']  ) !!}  
                    
                        {{Form::hidden('_method', 'DELETE')}}
                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        {!! Form::close() !!}
                   
                      
                  </tr>
                  @endforeach
                 
              </tbody>
          </table>
      </section>
      
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
  

    <script  src="table/js/index.js"></script>

@endsection