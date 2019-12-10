@extends('inc.admin')
@section('img')
    <img src="assets/img/ui-sam.jpg" class="img-circle" width="60">
    @endsection
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
    

      
      <aside class="alert success">
    <p><i class="icon fa fa-envelope-o"></i> Roger Roger, Message Received. <i class="close fa fa-times"></i></p>
  </aside><!-- end alert -->
  
  
  <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filtrer" /> <a class="button"><i class="fa fa-exclamation-circle"></i> Report Error</a>
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
                    @foreach($admins as $admin)
                  <tr>
                      <td>{{$admin->name}}</td>
                      <td>{{$admin->email}}</td>
                  <td>
                        {!! Form::open(['action' => ['adminController@destroy' ,$admin->id], 'method' => 'POST' , 'class' => 'mine']  ) !!}  
                    
                        {{Form::hidden('_method', 'DELETE')}}
                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        {!! Form::close() !!}
                    <a href="/admin/{{$admin->id}}/edit"><button style="margin: 2px" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>                      </td>
                      
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