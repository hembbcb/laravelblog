@extends('layouts.backend.mainusers')


@section('title', 'GEOSPATIAL BHUTAN')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
      <h1>Edit User</h1>
      <ol class="breadcrumb">
        <li>
            <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Dashboard </a>
             <a href="{{ route('backend.blog.index')}}"><li>Users</li></a>
            <li class="active">Edit User</li>

        </li>
      </ol>
    </section>

<section class="content">
    <div class="row">

    {!! Form::model($user, [
                            
        'method' =>'PUT',
        'route'  => ['backend.users.update', $user->id],
        'files'  => TRUE,
        'id' =>'user-form'

    ]) !!}
           @include('backend.users.form')

            <hr>

                            {!! Form::close() !!}
                        
        </div>

        

     
     
    </section>
   
  </div>
@endsection