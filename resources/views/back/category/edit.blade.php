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
            <div class="card">
                <div class="body">
                    <div class="col-sm-12">
                        <form method="POST" action="{{ route('back.category.update', $category->slug) }}">
                            @csrf
                            <label for="name">Category Name</label>
                            <div class="form-group">                                
                                <input value="{{ $category->name }}" name="name" type="text" id="name" class="form-control" placeholder="Enter category name">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            
                            <button type="submit" class="btn btn-raised btn-primary waves-effect">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection