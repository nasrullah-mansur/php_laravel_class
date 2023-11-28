@extends('back.layout.layout')

@section('content')
<section class="content">
    <div class="body_scroll">    
        <div class="block-header">
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button style="margin-top: 14px;" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Well done!</strong> {{Session::get('success')}}
            </div>
            @endif

            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Blogs</h2>
                    
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
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <ul class="header-dropdown">
                                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="javascript:void(0);">Action</a></li>
                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                <li><a href="javascript:void(0);">Something else</a></li>
                                            </ul>
                                        </li>
                                        <li class="remove">
                                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="bg-dark text-white">
                                                    <th>Sl</th>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($blogs as $blog)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        <img style="width: 90px" src="{{ asset($blog->image_thumb) }}" alt="image">
                                                    </td>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>{{ $blog->category->name }}</td>
                                                    <td>
                                                        @php
                                                            $status_color = 'bg-dark';
                                                            if($blog->status == 'Active') {
                                                                $status_color = 'bg-success text-white'; 
                                                            } 

                                                            if($blog->status == 'Inactive') {
                                                                $status_color = 'bg-info text-white'; 
                                                            }

                                                            if($blog->status == 'Draft') {
                                                                $status_color = 'bg-light'; 
                                                            }
                                                        @endphp
                                                        <span class="{{$status_color}} p-1 font-bold" >{{ $blog->status }}</span>
                                                    </td>
                                                    <td>{{ $blog->created_at->format('d M Y') }}</td>
                                                    <td>{{ $blog->updated_at->format('d M Y') }}</td>
                                                    <td>
                                                        <div class="btn-area">
                                                            <a href="{{ route('back.blog.edit', $blog->slug) }}" type="submit" class="btn btn-raised btn-primary waves-effect">Edit</a>
                                                            <a href="#" type="submit" class="btn btn-raised btn-danger waves-effect delete-btn">Delete</a>
                                                            <form class="d-none" action="{{ route('back.blog.delete') }}" method="POST">
                                                                @csrf
                                                                <input type="test" name="id" value="{{ $blog->id }}">
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @empty
                                                <tr>
                                                    <td colspan="5">
                                                        <span class="d-block text-center">No Data Found</span>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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

        $('.delete-btn').on('click', function() {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                  });
                  
                  let myForm = $(this).next();

                  myForm.submit();

                } else {
                  swal("Your imaginary file is safe!");
                }
            });
        })

    });

</script>

@endsection