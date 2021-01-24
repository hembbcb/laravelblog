@extends('layouts.backend.maincategories')


@section('title', 'GEOSPATIAL BHUTAN')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
      <h1>Edit Category</h1>
      <ol class="breadcrumb">
        <li>
            <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Dashboard </a>
             <a href="{{ route('backend.blog.index')}}"><li>Categories</li></a>
            <li class="active">Edit Category</li>

        </li>
      </ol>
    </section>

<section class="content">
    <div class="row">

    {!! Form::model($category, [
                            
        'method' =>'PUT',
        'route'  => ['backend.categories.update', $category->id],
        'files'  => TRUE,
        'id' =>'category-form'

    ]) !!}
           @include('backend.categories.form')

            <hr>

                            {!! Form::close() !!}
                        
        </div>

        

     
     
    </section>
   
  </div>
@endsection