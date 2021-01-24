@extends('layouts.backend.maincategories')


@section('title', 'GEOSPATIAL BHUTAN')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
      <h1>Add New Category</h1>
      <ol class="breadcrumb">
        <li>
            <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Dashboard </a>
             <a href="{{ route('backend.categories.index')}}"><li>Categories</li></a>
            <li class="active">Add New</li>

        </li>
      </ol>
    </section>

<section class="content">
    <div class="row">

                            {!! Form::model($category, [
                                                    
                                'method' =>'POST',
                                'route'  => 'backend.categories.store',
                                'files'  => TRUE,
                                'id' =>'categories-form'

                            ]) !!}
           @include('backend.categories.form')

            <hr>

                            {!! Form::close() !!}
                        
        </div>

        

     
     
    </section>
   
  </div>
@endsection
