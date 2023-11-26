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
                    <h2>Slider Create</h2>
                    
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
                        <form method="POST" action="{{ route('back.slider.store') }}" enctype="multipart/form-data">
                            @csrf
                            <label for="title">Slider Title</label>
                            <div class="form-group">                                
                                <input name="title" type="text" id="title" class="form-control" placeholder="Enter slider title">
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>


                            <label for="image">Slider image</label>
                            <div class="form-group">                                
                                <input name="image" type="file" id="image" class="form-control">
                                <span class="text-danger">{{ $errors->first('image') }}</span>
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


@section('custom_js')
<script>
    $(document).ready(function() {
        $('#image').dropify();
    });

</script>
@endsection