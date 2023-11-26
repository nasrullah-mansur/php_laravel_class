@extends('back.layout.layout')

@section('content')
<section class="content">
    <div class="body_scroll">    
        <div class="block-header">
            @if (Session::has('success'))
            <div class="alert alert-success">
                <strong>Well done!</strong> {{Session::get('success')}}
            </div>
            @endif

            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Blog Category Edit</h2>
                    
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="min-height: calc(100vh - 150px)">
            <form method="POST" action="{{ route('back.category.update', $category->slug) }}">
               
                <div class="card">
                    <div class="body">
                        <div class="col-sm-12">
                            
                                @csrf
                                <label for="name">Category Name</label>
                                <div class="form-group">                                
                                    <input value="{{ $category->name }}" name="name" type="text" id="name" class="form-control" placeholder="Enter category name">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                
                                <button type="submit" class="btn btn-raised btn-primary waves-effect">Save</button>
                            
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="body">
                        <h3>SEO</h3>
                        <div class="col-sm-12">
                            
                               
                                <label for="title">Title</label>
                                <div class="form-group">                                
                                    <input value="{{$category->title}}" name="title" type="text" id="title" class="form-control" placeholder="SEO Title">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>


                                <label for="description">Description</label>
                                <div class="form-group">                                
                                    <textarea name="description" id="description" class="form-control" placeholder="SEO description">{{$category->description}}</textarea>
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>

                                <label for="keyword">Keyword</label>
                                <div class="form-group">                                
                                    <textarea name="keyword" id="keyword" class="form-control" placeholder="SEO keyword">{{$category->keyword}}</textarea>
                                    <span class="text-danger">{{ $errors->first('keyword') }}</span>
                                </div>

                                <label for="head_script">Head script</label>
                                <div class="form-group">                                
                                    <textarea name="head_script" id="head_script" class="form-control" placeholder="SEO head_script">{{$category->head_script}}</textarea>
                                    <span class="text-danger">{{ $errors->first('head_script') }}</span>
                                </div>

                                <label for="body_script">Body script</label>
                                <div class="form-group">                                
                                    <textarea name="body_script" id="body_script" class="form-control" placeholder="SEO body_script">{{$category->body_script}}</textarea>
                                    <span class="text-danger">{{ $errors->first('body_script') }}</span>
                                </div>

                                
                                
                                <button type="submit" class="btn btn-raised btn-primary waves-effect">Save</button>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection