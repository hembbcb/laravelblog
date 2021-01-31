@extends('layouts.main')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8">

        
                <article class="post-item">


                                @if ($post->image_url)
                                    <div class="post-item-image">
                                            <a href="">
                                                <img src="{{$post->image_url}}" alt="{{$post-> title }}">
                                            </a>
                                    </div>

                                @endif

                            <div class="post-item-body">

                                        <div class="padding-10">

                                        <h1>{{$post->title}}</h1>
                                            
                                        </div>

                            
                                    <div class="post-meta no-broder">
                                        <ul class="post-meta-group">
                                            <li><i class="fa fa-user"></i><a>{{$post-> author->name}}</a></li>
                                            <li><i class="fa fa-clock-o"></i><time>{{$post->date}}</time></li>
                                            <li><i class="fa fa-folder"></i><a href="{{route('category', $post->category->id)}}">{{ $post->category->title}}</a></li>
                                            <li><i class="fa fa-tag"></i>{!!$post-> tags_html !!}</li>
                                        </ul>
                                    </div>

                                    <div class="post-item-body">

                                        <div class="padding-10">
                                        
                                            {!!$post->body_html !!}
                                            
                                        </div>
                                    </div>      
                            </div>
                </article>

                <article class="post-author padding-10">
                    <div class="media">
                            <div class="media-left">
                            
                                <a>
                                <img alt="{{ $post->author->name }}" width="100" height="100" src="{{ $post->author->profile_url }}" class="media-object">
                                </a>
                            </div>


                            <div class="media-body">
                                <h4 class="media-heading"><a>{{ $post->author->name }}</a></h4>
                                            <div class='post-author-count'>
                                            <p><a><i class="fa fa-clone"></i>
                                                    {{$post->author->posts->count()}}
                                                </a>posts </p>
                                            </div>
                                      
                                            <div>
                                            
                                                {!! $post->author->bio_html !!}
                                            </div>

                            </div>
                    
                    </div>
                </article>


            </div>


            @include('layouts.sidebar')

            </div>
    </div>

@endsection

