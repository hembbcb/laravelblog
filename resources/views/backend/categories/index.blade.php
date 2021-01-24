@extends('layouts.backend.maincategories')


@section('title', 'GEOSPATIAL BHUTAN')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
      <h1> Display All Categories</h1>
      <ol class="breadcrumb">
        <li>
            <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Dashboard </a>
            <li href=" {{ route('backend.categories.index') }}">Categories</li>
            <li class="active">All Categories</li>



        </li>
      </ol>
    </section>


    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

            <div class="box-header clearfix">
                <div class="pull-left">
                
                    <a href="{{ route('backend.categories.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>                
                
                </div>

                <div class="pull-right">
                
                                     
                
                </div>

            </div>

            <div class="box-header " style="padding: 5px 0;">
            
            @if(session('message'))

                <div class="alert alert-success">
                    {{session ('message')}}
                </div>


            @elseif(session('error-message'))

                <div class="alert alert-danger">
                    {{session ('error-message')}}
                </div>
            
            @endif
        

            </div>
           
              <div class="box-body ">

               

                        @include('backend.categories.table')
               

            
            </div>

        <div class="box-footer clearfix">
            <div class="pull-left">
                   
                    {{ $categories->links()}}
            </div>

            <div class="pull-right">
                <strong> {{ $categories-> count()}} Categories </strong>
            </div>
        </div>

        
           
            </div>
          
          </div>
        </div>
     
    </section>
   
  </div>
@endsection


