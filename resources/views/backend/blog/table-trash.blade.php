<table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td >Action</td>
                        <td>Title</td>
                        <td width="120">Author</td>
                        <td width="150">Category</td>
                        <td width="150">Date</td>
                    </tr>
                </thead>


                <tbody>

                @foreach( $posts as $post)
                   <tr>
                       <td>
                                {!! Form::open(['style' => 'display: inline-block', 'method' => 'PUT', 'route' =>['backend.blog.restore',$post->id]])!!}

                           <button title="Restore" onclick="return confirm('Are you sure you want to restore this post ?')" class="btn btn-xs btn-default">
                                        <i class="fa fa-undo"></i>
                                       
                           </button>   
                                {!! Form::close() !!}

                            {!! Form::open(['style' => 'display:inline-block' ,'method' => 'DELETE', 'route' =>['backend.blog.delete',$post->id]])!!}

                            <button title="Delete Permanent" onclick="return confirm('Are you sure you want to delete this post permanently ?')" type="submit" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>

                            </button>

                                {!! Form::close() !!}

                       </td>
                      
                       <td> {{$post->title}}</td>
                       <td>{{$post->author->name}}</td>
                       <td>{{$post->category-> title}}</td>
                       <td>
                           <abbr title="{{$post->dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr>
                            {!! $post-> publicationLabel() !!}
                       </td>
                   </tr>

                   @endforeach
                </tbody>
</table>