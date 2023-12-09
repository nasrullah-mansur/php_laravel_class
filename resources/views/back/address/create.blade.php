@extends('back.layout.layout')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            @if (Session::has('success'))
            <div class="alert alert-success"><strong>Well done!</strong> {{Session::get('success')}}</div>
            @endif

            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Email Info</h2>

                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="min-height: calc(100vh - 150px);">
            <form method="POST" action="{{ route('back.blog.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="body">
                        <div class="col-sm-12">
                            <label for="phone">Phone Number</label>
                            <div class="form-group">
                                <input name="phone" type="text" id="phone" class="form-control" />
                                <small>If you use multiple use (--) for separation</small>
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>

                            <label for="email">email Address</label>
                            <div class="form-group">
                                <input name="email" type="text" id="email" class="form-control" />
                                <small>If you use multiple use (--) for separation</small>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>

                            <label for="address">Address</label>
                            <div class="form-group">
                                <input name="address" type="text" id="address" class="form-control" />
                                <small>If you use multiple use (--) for separation</small>
                                <span class="text-danger">{{ $errors->first('address') }}</span>
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
