<div class="col-xs-9">
                    <div class="box">
                            <div class="box-body ">

                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

                                    {!! Form::label('title') !!}
                                    {!! Form::text('title',null, ['class = "form-control"']) !!}
                            
                                    @if ($errors->has('title'))

                                        <span class='help-block'> {{ $errors -> first('title')}}
                                    @endif
                            </div>

                            <div class="form-group-excerpt {{ $errors->has('excerpt') ? 'has-error' : '' }}">

                                    {!! Form::label('excerpt') !!}
                                    {!! Form::textarea('excerpt',null, ['class' => "form-control"]) !!}
                            
                                    @if ($errors->has('excerpt'))

                                        <span class='help-block'> {{ $errors -> first('excerpt')}}
                                    @endif
                            </div>

                            <div class="form-group-body {{ $errors->has('body') ? 'has-error' : '' }}">

                                    {!! Form::label('body') !!}
                                    {!! Form::textarea('body',null, ['class' => "form-control"]) !!}
                            
                                    @if ($errors->has('body'))
                                        <span class='help-block'> {{ $errors -> first('body')}}
                                    @endif
                            </div>
                    </div>
                    
            
            </div>
        </div>

            <div class="col-xs-3">
                <div class="box with-broder">
                        <div class="box-body"> 
                            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">

                                    {!! Form::label('slug') !!}
                                    {!! Form::text('slug',null, ['class' => "form-control"]) !!}

                                    @if ($errors->has('slug'))

                                        <span class='help-block'> {{ $errors -> first('slug')}}
                                    @endif

                            </div>    
                        </div>

                        <div class="box-body">  
                            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">

                                {!! Form::label('category_id', 'Category') !!}
                                {!! Form::select('category_id',App\Category::pluck('title', 'id'), null , ['class' => "form-control", 'placeholder' => "Choose Category"]) !!}

                                @if ($errors->has('category_id'))

                                    <span class='help-block'> {{ $errors -> first('category_id')}}
                                @endif

                            </div> 
                        </div>

                        <div class="box-body">
                            <div class="form-group {{ $errors->has('author_id') ? 'has-error' : '' }}">

                                {!! Form::label('author_id', 'Author') !!}
                                {!! Form::select('author_id',App\User::pluck('name', 'id'), null , ['class' => "form-control", 'placeholder' => "Choose Author"]) !!}

                                @if ($errors->has('author_id'))

                                    <span class='help-block'> {{ $errors -> first('author_id')}}
                                @endif

                            </div> 
                        </div>

                   
                        <div class="box-body">

                            <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">

                                {!! Form::label('post_tags', 'Tags') !!}
                                {!! Form::text('post_tags', null, ['class' => "form-control"]) !!}

                            </div>

                           
                        </div>
                    
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">

                                {!! Form::label('published_at', 'Published Date') !!}
                                {!! Form::text('published_at', null, ['class' => "form-control", 'placeholder' => 'Y-m-d H:i:s']) !!}

                                @if ($errors->has('published_at'))
                                    <span class='help-block'> {{ $errors -> first('published_at')}}
                                @endif

                            </div>
                        </div>

                        <div class="box-body">
                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">

                                            {!! Form::label('image', 'Post Image') !!}

                                            <div class="fileinput fileinput-new text-center"  data-provides="fileinput">
                                                    <div class="fileinput-new img-thumbnail" style="width:220px; height: 230px;">
                                                        <img src="{{ ($post->image_url) ? $post->image_url: ' https://place-hold.it/210x220/666/fff/000.gif' }}"  alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                    <div class=btn>
                                                        <span class="btn btn-primary btn-file"><span class="fileinput-new">Select Image</span><span class="fileinput-exists">Change</span> {!! Form::file('image') !!}</span>
                                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                            </div>

                                            @if ($errors->has('image', null))
                                                <span class='help-block'> {{ $errors -> first('image')}}
                                            @endif

                                </div>
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a id="draft" class="btn btn-primary">Save Draft</a>

                            </div>
                            <div class="pull-right">
                            {!! Form::Submit('Publish', ['class' => "btn btn-primary"]) !!}
                                
                            </div>
                        </div>

                    </div>
                </div>

            </div>

