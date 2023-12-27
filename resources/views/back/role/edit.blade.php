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
                    <h2>Role Edit</h2>
                    
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="min-height: calc(100vh - 150px)">
            <form method="POST" action="{{ route('role.update', $role->id) }}">
                <div class="card">
                    <div class="body">
                        <div class="col-sm-12">
                                @csrf
                                <label for="name">Category Name</label>
                                <div class="form-group">                                
                                    <input value="{{ $role->name }}" name="name" type="text" id="name" class="form-control" placeholder="Enter category name">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>

                                <div class="form-group">  
                                    <h4>Select Permissions</h4>
                                    <div class="d-flex">

                                        @foreach ($permissions as $permission)
                                            <div class="checkbox mr-4">
                                                <input name="permissions[]" value="{{ $permission->name }}" id="{{ $permission->id }}" type="checkbox">
                                                <label for="{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                            @endforeach

                                    </div>
                                    <span class="text-danger">{{ $errors->first('permissions') }}</span>
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