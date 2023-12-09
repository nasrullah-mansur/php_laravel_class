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
                            <label for="mailer">SMTP Mailer</label>
                            <div class="form-group">
                                <input value="smtp" name="mailer" type="text" id="mailer" class="form-control" />
                                <span class="text-danger">{{ $errors->first('mailer') }}</span>
                            </div>

                            <label for="host">Mail Host</label>
                            <div class="form-group">
                                <input value="smtp.gmail.com" name="host" type="text" id="host" class="form-control" />
                                <span class="text-danger">{{ $errors->first('host') }}</span>
                            </div>

                            <label for="port">Mail Port</label>
                            <div class="form-group">
                                <input value="587" name="port" type="text" id="port" class="form-control" />
                                <span class="text-danger">{{ $errors->first('port') }}</span>
                            </div>

                            <label for="username">Mail Username</label>
                            <div class="form-group">
                                <input value="youremail@gmail.com" name="username" type="text" id="username" class="form-control" />
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            </div>

                            <label for="password">Mail Password</label>
                            <div class="form-group">
                                <input name="password" type="text" id="password" class="form-control" />
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>

                            <label for="enctype">Mail ENCType</label>
                            <div class="form-group">
                                <input value="tls" name="enctype" type="text" id="enctype" class="form-control" />
                                <span class="text-danger">{{ $errors->first('enctype') }}</span>
                            </div>

                            <label for="from_address">Mail From Address</label>
                            <div class="form-group">
                                <input value="youremail@gmail.com" name="from_address" type="text" id="from_address" class="form-control" />
                                <span class="text-danger">{{ $errors->first('from_address') }}</span>
                            </div>

                            <label for="from_name">Mail From Name</label>
                            <div class="form-group">
                                <input value="Your website name" name="from_name" type="text" id="from_name" class="form-control" />
                                <span class="text-danger">{{ $errors->first('from_name') }}</span>
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
