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
                    <h2>User Create</h2>
                    
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
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <label for="name">Name</label>
                            <div class="form-group">                                
                                <input name="name" type="text" id="name" class="form-control" placeholder="Enter Name">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            <label for="email">Email</label>
                            <div class="form-group">                                
                                <input name="email" type="text" id="email" class="form-control" placeholder="Enter Email">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>

                            <label for="password">Password</label>
                            <div class="form-group">                                
                                <input name="password" type="password" id="password" class="form-control" placeholder="Enter Password">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>

                            <label for="confirm_password">Confirm password</label>
                            <div class="form-group">                                
                                <input name="confirm_password" type="password" id="confirm_password" class="form-control" placeholder="Confirm password">
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
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