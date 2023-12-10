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
                                        {{ $dataTable->table() }}
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

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush


@section('custom_js')
<script>

    $(document).ready(function() {

        $('.table').on('click', '.delete-btn', function(e) {
            e.preventDefault();

            let dataId = $(this).attr('data-id');

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
                  
                 $.ajax({
                    type: 'POST',
                    url: "{{ route('back.blog.delete') }}",
                    data: {
                        id: dataId,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        $('.dataTable').DataTable().ajax.reload();
                    }
                });

                } else {
                  swal("Your imaginary file is safe!");
                }
            });
        })

    });

</script>

@endsection