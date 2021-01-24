<table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td width="80">Action</td>
                        <td>Name</td>
                        <td >Email</td>
                        <td >Bio</td>
                        <td width="80">Post Count</td>
                    </tr>
                </thead>


                <tbody>

                @foreach( $users as $user)
                   <tr>
                       <td>
                                {!! Form::open(['method' => 'DELETE', 'route' =>['backend.users.destroy',$user->id]])!!}

                           <a href="{{ route('backend.users.edit', $user->id)}}" class="btn btn-xs btn-default">
                                        <i class="fa fa-pencil-square-o"></i>
                            </a>

                            @if($user->id == config('cms.default_user_id'))

                            <button type="submit" onclick="return confirm('You are not allowed to delete this user !')" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
                            @else

                            <button type="submit" onclick="return confirm('Are you sure you want to delete the users ?')" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>

                            </button>

                            @endif

                                {!! Form::close() !!}

                       </td>
                      
                       <td> {{$user->name}}</td>
                       <td> {{$user->email}}</td>
                       <td> {{$user->bio}}</td>
                       <td>{{$user ->posts->count()}}</td>
                   </tr>

                   @endforeach
                </tbody>
</table>