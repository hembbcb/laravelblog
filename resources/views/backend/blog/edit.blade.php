@extends('layouts.backend.mainposts')


@section('title', 'GEOSPATIAL BHUTAN')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
      <h1>Edit Post</h1>
      <ol class="breadcrumb">
        <li>
            <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Dashboard </a>
             <a href="{{ route('backend.blog.index')}}"><li>Blog</li></a>
            <li class="active">Edit Post</li>

        </li>
      </ol>
    </section>

<section class="content">
    <div class="row">

    {!! Form::model($post, [
                            
        'method' =>'PUT',
        'route'  => ['backend.blog.update', $post->id],
        'files'  => TRUE,
        'id' =>'post-form'

    ]) !!}
           @include('backend.blog.form')

            <hr>

                            {!! Form::close() !!}
                        
        </div>

        

     
     
    </section>
   
  </div>
@endsection

