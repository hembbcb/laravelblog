<div class="col-xs-9">
                    <div class="box with-broder">
                        <div class="box-body ">

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                    {!! Form::label('name') !!}
                                    {!! Form::text('name',null, ['class = "form-control"']) !!}
                            
                                    @if ($errors->has('name'))

                                        <span class='help-block'> {{ $errors -> first('name')}}
                                    @endif
                            </div>

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                                    {!! Form::label('email') !!}
                                    {!! Form::text('email',null, ['class' => "form-control"]) !!}

                                    @if ($errors->has('email'))

                                        <span class='help-block'> {{ $errors -> first('email')}}
                                    @endif

                            </div> 

                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

                                    {!! Form::label('password') !!}
                                    {!! Form::password('password', ['class' => "form-control"]) !!}

                                    @if ($errors->has('password'))

                                        <span class='help-block'> {{ $errors -> first('password')}}
                                    @endif

                            </div>  

                            <div class="form-group-bio {{ $errors->has('bio') ? 'has-error' : '' }}">

                                    {!! Form::label('bio') !!}
                                    {!! Form::textarea ('bio', null, ['class' => "form-control"]) !!}

                                    @if ($errors->has('bio'))
                                    <span class='help-block'> {{ $errors -> first('bio')}}
                                    @endif

                            </div>  

                            


 
                        </div>
                    
            
                    </div>
</div>

            <div class="col-xs-3">
                <div class="box with-broder">
                        <div class="box-body">
                                <div class="form-group {{ $errors->has('profile') ? 'has-error' : '' }}">

                                            {!! Form::label('profile', 'Profile') !!}

                                            <div class="fileinput fileinput-new text-center"  data-provides="fileinput">
                                                    <div class="fileinput-new img-thumbnail" style="width:220px; height: 230px;">
                                                        <img src="($post->profile_url) ? $post->profile_url: ' https://place-hold.it/210x220/666/fff/000.gif' "  alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                    <div class=btn>
                                                        <span class="btn btn-primary btn-file"><span class="fileinput-new">Select Profile</span><span class="fileinput-exists">Change</span> {!! Form::file('profile') !!}</span>
                                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                            </div>

                                            @if ($errors->has('profile', null))
                                                <span class='help-block'> {{ $errors -> first('profile')}}
                                            @endif

                                </div>
                        </div>

                        <div class="box-footer clearfix">

                            <div class="pull-left">
                            <button type="submit" class="btn btn-primary">{{ $user -> exists ? 'Update':'Save'}}</button>
                            </div>

                            <div class="pull-right">
                            
                            <a href="{{ route('backend.users.index') }}" class="btn btn-primary">Cancel</a>
                            </div>
                            
                            
                        </div>

                    </div>
                </div>

            </div>