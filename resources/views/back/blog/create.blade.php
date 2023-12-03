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
                    <h2>Blog Create</h2>

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
                            <label for="category_id">Category Name</label>

                            <div class="form-group">
                                <select value="two" name="category_id" class="form-control show-tick ms select2" data-placeholder="Select Category">
                                    <option></option>
                                    @foreach ($categories as $category)
                                    <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            </div>

                            <label for="tags">Tags (Optional)</label>
                            <div class="form-group">
                                <div class="border py-1" style="border-radius: 5px;">
                                    <input name="tags" type="text" id="tags" class="form-control taginput" data-role="tagsinput" placeholder="SEO Tags" />
                                </div>
                                <span class="text-danger">{{ $errors->first('tags') }}</span>
                            </div>

                            <label for="image">Image</label>
                            <div class="form-group">
                                <input name="image" type="file" id="image" class="form-control" />
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            </div>

                            <label for="image_alt">Image Alt (optional)</label>
                            <div class="form-group">
                                <input value="{{ old('image_alt') }}" name="image_alt" type="text" id="image_alt" class="form-control" placeholder="SEO Image Alt" />
                                <span class="text-danger">{{ $errors->first('image_alt') }}</span>
                            </div>

                            <label for="details">Details</label>
                            <div class="form-group">
                                <textarea name="details" id="details" class="form-control summernote" placeholder="Details"></textarea>
                                <span class="text-danger">{{ $errors->first('details') }}</span>
                            </div>

                            <div class="form-group">
                                <select name="status" class="form-control show-tick">
                                    @foreach (STATUS_MSG as $status_msg)
                                    <option value="{{ $status_msg }}">{{ $status_msg }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="body">
                        <div class="panel-group" id="group_1" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-primary">
                                <div class="panel-heading bg-dark" role="tab" id="seo_according">
                                    <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#group_1" href="#seo_collapse_one" aria-expanded="true" aria-controls="seo_collapse_one">SEO Inputs</a></h4>
                                </div>
                                <div id="seo_collapse_one" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="seo_according">
                                    <div class="panel-body">
                                        <label for="keyword">Keyword</label>
                                        <div class="form-group">
                                            <textarea name="keyword" id="keyword" class="form-control" placeholder="SEO keyword"></textarea>
                                            <span class="text-danger">{{ $errors->first('keyword') }}</span>
                                        </div>

                                        <label for="head_script">Head script</label>
                                        <div class="form-group">
                                            <textarea name="head_script" id="head_script" class="form-control" placeholder="SEO head_script"></textarea>
                                            <span class="text-danger">{{ $errors->first('head_script') }}</span>
                                        </div>

                                        <label for="body_script">Body script</label>
                                        <div class="form-group">
                                            <textarea name="body_script" id="body_script" class="form-control" placeholder="SEO body_script"></textarea>
                                            <span class="text-danger">{{ $errors->first('body_script') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="custom_according">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#group_1" href="#custom_according_one" aria-expanded="true" aria-controls="custom_according_one">Custom Code (Optional)</a>
                                    </h4>
                                </div>

                                <div id="custom_according_one" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="custom_according">
                                    <div class="panel-body">
                                        <label for="custom_html">Custom HTML</label>
                                        <div class="form-group">
                                            <textarea name="custom_html" id="custom_html" class="form-control" placeholder="Custom HTML"></textarea>
                                            <span class="text-danger">{{ $errors->first('custom_html') }}</span>
                                        </div>

                                        <label for="custom_css">Custom CSS</label>
                                        <div class="form-group">
                                            <textarea name="custom_css" id="custom_css" class="form-control" placeholder="Custom CSS"></textarea>
                                            <span class="text-danger">{{ $errors->first('custom_css') }}</span>
                                        </div>

                                        <label for="custom_js">Custom JavaScript</label>
                                        <div class="form-group">
                                            <textarea name="custom_js" id="custom_js" class="form-control" placeholder="Custom JavaScript"></textarea>
                                            <span class="text-danger">{{ $errors->first('custom_js') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="body">
                        <button type="submit" class="btn btn-raised btn-primary waves-effect">Save Blog</button>
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
        $('#image').dropify();
    });

    $('.select2').select2({
        placeholder: "Select Category",
    });

</script>
@endsection