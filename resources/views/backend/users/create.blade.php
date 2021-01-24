@extends('layouts.backend.mainusers')


@section('title', 'GEOSPATIAL BHUTAN')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
      <h1>Add New User</h1>
      <ol class="breadcrumb">
        <li>
            <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Dashboard </a>
             <a href="{{ route('backend.users.index')}}"><li>Users</li></a>
            <li class="active">Add New</li>

        </li>
      </ol>
    </section>

<section class="content">
    <div class="row">

                            {!! Form::model($user, [
                                                    
                                'method' =>'POST',
                                'route'  => 'backend.users.store',
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
