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
                    <h2>Appearance</h2>

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
                            <label for="title">Title</label>
                            <div class="form-group">
                                <input value="{{ old('title') }}" name="title" type="text" id="title" class="form-control" placeholder="SEO Title" />
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>

                            <label for="description">Description</label>
                            <div class="form-group">
                                <textarea name="description" id="description" class="form-control" placeholder="SEO description">{{ old('description') }}</textarea>
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>

                            <label for="keyword">keyword</label>
                            <div class="form-group">
                                <textarea name="keyword" id="keyword" class="form-control" placeholder="SEO keyword">{{ old('keyword') }}</textarea>
                                <span class="text-danger">{{ $errors->first('keyword') }}</span>
                            </div>

                            <label for="head_script">Head Script</label>
                            <div class="form-group">
                                <textarea name="head_script" id="head_script" class="form-control" placeholder="Head Script">{{ old('head_script') }}</textarea>
                                <span class="text-danger">{{ $errors->first('head_script') }}</span>
                            </div>

                            <label for="body_script">Body Script</label>
                            <div class="form-group">
                                <textarea name="body_script" id="body_script" class="form-control" placeholder="Body Script">{{ old('body_script') }}</textarea>
                                <span class="text-danger">{{ $errors->first('body_script') }}</span>
                            </div>
                            



                            <label for="main_logo">Main Logo</label>
                            <div class="form-group">
                                <input name="main_logo" type="file" id="main_logo" class="dropify form-control" />
                                <span class="text-danger">{{ $errors->first('main_logo') }}</span>
                            </div>


                            <label for="footer_logo">Footer Logo</label>
                            <div class="form-group">
                                <input name="footer_logo" type="file" id="footer_logo" class="dropify form-control" />
                                <span class="text-danger">{{ $errors->first('footer_logo') }}</span>
                            </div>


                            <label for="favicon">Favicon</label>
                            <div class="form-group">
                                <input name="favicon" type="file" id="favicon" class="form-control dropify" />
                                <span class="text-danger">{{ $errors->first('favicon') }}</span>
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

@section('custom_js')
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });

    $('.select2').select2({
        placeholder: "Select Category",
    });

</script>
@endsection