@extends('layouts.backend.mainposts')


@section('title', 'GEOSPATIAL BHUTAN')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
      <h1> Display All Blog Posts</h1>
      <ol class="breadcrumb">
        <li>
            <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Dashboard </a>
            <li href=" {{ route('backend.blog.index') }}"> Blog</li>
            <li class="active">All Posts</li>



        </li>
      </ol>
    </section>


    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

            <div class="box-header clearfix">
                <div class="pull-left">
                
                    <a href="{{ route('backend.blog.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>                
                
                </div>

                <div class="pull-right" style="padding: 7px 0;">
                
                    <a href="?status=all">All</a> |
                    <a href="?status=published">Published</a> |
                    <a href="?status=scheduled">Scheduled</a> |
                    <a href="?status=draft">Draft</a> |
                    <a href="?status=trash">Trash</a>                 
                
                </div>

            </div>

            <div class="box-header " style="padding: 5px 0;">
            
            @if(session('message'))

                <div class="alert alert-success">
                    {{session ('message')}}
                </div>

                @elseif(session('trash-message'))

                <?php list($message, $postId) = session ('trash-message') ?>         

                  {!! Form::open(['method' => 'PUT', 'route' =>['backend.blog.restore', $postId]]) !!}

                    <div class="alert alert-info">
                                    {{ $message }}
                        <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Undo </button>

                                {!! Form::close() !!}

                    </div>

            @endif
        

            </div>
           
              <div class="box-body ">

                @if($onlyTrashed)

                        @include('backend.blog.table-trash')
                @else

                        @include('backend.blog.table')
                @endif


            
            </div>

        <div class="box-footer clearfix">
            <div class="pull-left">
                   
                    {{ $posts->appends(Request::query())->links()}}
            </div>

            <div class="pull-right">
                <strong> {{ $posts->count()}} Items </strong>
            </div>
        </div>

        
           
            </div>
          
          </div>
        </div>
     
    </section>
   
  </div>
@endsection


