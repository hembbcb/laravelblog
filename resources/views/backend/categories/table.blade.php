<table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td width="100">Action</td>
                        <td>Category Name</td>
                        <td width="80">Post Count</td>
                    </tr>
                </thead>


                <tbody>

                @foreach( $categories as $category)
                   <tr>
                       <td>
                                {!! Form::open(['method' => 'DELETE', 'route' =>['backend.categories.destroy',$category->id]])!!}

                           <a href="{{ route('backend.categories.edit', $category->id)}}" class="btn btn-xs btn-default">
                                        <i class="fa fa-pencil-square-o"></i>
                            </a>

                            @if($category->id == config('cms.default_category_id'))

                            <button type="submit" onclick="return confirm('You are not allowed to delete this category !')" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
                            @else

                            <button type="submit" onclick="return confirm('Are you sure you want to delete the categories ?')" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>

                            </button>

                            @endif

                                {!! Form::close() !!}

                       </td>
                      
                       <td> {{$category->title}}</td>
                       <td>{{$category ->posts->count()}}</td>
                   </tr>

                   @endforeach
                </tbody>
</table>