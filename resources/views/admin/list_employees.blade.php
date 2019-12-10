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
                      <th>Name</th>
                      <th>Email</th>
                      <th>edit</th>
                  </tr>
              </thead>
              <tbody>
                    @foreach($employees as $employee)
                  <tr>
                      <td>{{$employee->name}}</td>
                      <td>{{$employee->email}}</td>
                  <td>
                        {!! Form::open(['action' => ['employeeController@destroy' ,$employee->id], 'method' => 'POST' , 'class' => 'mine']  ) !!}  
                    
                        {{Form::hidden('_method', 'DELETE')}}
                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        {!! Form::close() !!}
                    <a href="/employee/{{$employee->id}}/edit"><button style="margin: 2px" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>                      </td>
                      
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