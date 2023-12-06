@extends('front.layout.layout')

@section('content')
<!-- Post start -->
<section class="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-blog-content">
                    <h1>{{ $blog->title }}</h1>
                    <div class="calendar">
                        <a href="{{ route('front.blog.by.category', $blog->category->slug) }}" class="category">{{ $blog->category->name }}</a>
                        <div class="info">
                            <div class="date">
                                <i class="fas fa-calendar-alt"></i>
                                <span>{{ $blog->category->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="comment">
                                <i class="fas fa-comment"></i>
                                <span>(20)</span>
                            </div>
                        </div>
                    </div>
                    <img class="w-100 img-fluid" src="{{ asset($blog->image) }}" alt="{{ $blog->image_alt ? $blog->image_alt : $blog->title }}">
                    <p class="description pt-3">{{ $blog->description }}</p>

                    <div class="details">{!! $blog->details !!}</div>

                </div>

                <!-- Prev Next -->
                <div class="prev-next">
                    @if ($prev_blog)
                    <div class="prev">
                        <span>Previous Post</span>
                        <a href="{{ route('front.single.blog', $prev_blog->slug) }}">{{ $prev_blog->title }}</a>
                    </div>
                    @endif

                    @if ($next_blog)
                    <div class="next text-lg-end">
                        <span>Next Post</span>
                        <a href="{{ route('front.single.blog', $next_blog->slug) }}">{{ $next_blog->title }}</a>
                    </div>
                    @endif
                </div>

                <!-- Also like -->
                <div class="also-like-area">
                    <div class="row">
                        @foreach ($related_blogs as $related_blog)
                        <div class="col-lg-4">
                            <div class="also-like-item">
                                <div class="img">
                                    <a href="{{ route('front.single.blog', $related_blog->slug) }}">
                                        <img src="{{ asset($related_blog->image) }}" alt="{{ $related_blog->image_alt ? $related_blog->image_alt : $related_blog->title }}">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="info">
                                        <div class="date">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>{{ $related_blog->created_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="comment">
                                            <i class="fas fa-comment"></i>
                                            <span>(20)</span>
                                        </div>
                                    </div>
                                    <h4><a href="{{ route('front.single.blog', $related_blog->slug) }}">{{ $related_blog->title }}</a></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Comment area -->
                <div class="comment-area">
                    <h2>RECENT COMMENTS</h2>
                    <ul>
                        @foreach ($comments as $comment)
                        <li>
                            <div class="img">
                                <img style="border-radius: 50%" src="{{ Avatar::create($comment->email)->toGravatar() }}" alt="{{ $comment->name }}">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h5>{{ $comment->name }}</h5>
                                    <span>{{ $comment->created_at->format('d F Y') }} at {{ $comment->created_at->format('h:i A') }}</span>
                                </div>
                                <p>{{ $comment->comment }}</p>
                                <a data-id="{{ $comment->id }}" class="reply" href="#comment-area"><i class="fa-solid fa-reply"></i> REPLY</a>
                            </div>

                            <ul>
                                @foreach ($comment->replies as $reply)
                                <li>
                                    <div class="img">
                                        <img style="border-radius: 50%" src="{{ Avatar::create($comment->email)->toGravatar() }}" alt="{{ $reply->name }}">
                                    </div>
                                    <div class="content">
                                        <div class="title">
                                            <h5>{{ $reply->name }}</h5>
                                            <span>{{ $reply->created_at->format('d F Y') }} at {{ $reply->created_at->format('h:i A') }}</span>
                                        </div>
                                        <p>{{ $reply->comment }}</p>
                                        <a data-id="{{ $comment->id }}" class="reply" href="#comment-area"><i class="fa-solid fa-reply"></i> REPLY</a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                        </li>
                        @endforeach
                        
                    </ul>
                </div>

                <!-- Comment area -->
                <div class="comment-area" id="comment-area">
                    <h2 class="text-uppercase">Leave your comment here</h2>
                    <form method="POST" action="{{ route('front.send.comment') }}">
                        @csrf 
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <input type="hidden" name="parent_id" value="0">

                        <input value="{{ Session::has('name') ? Session::get('name') : old('name') }}" name="name" class="half form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" placeholder="your Name">
                        <input value="{{ Session::has('email') ? Session::get('email') : old('email') }}" name="email" class="half form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" placeholder="your Email">
                        <textarea name="comment" placeholder="Your Comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}">{{ old('comment') }}</textarea>
                        <button type="submit">Send Comment</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar">
                    <!-- Categories -->
                    @include('front.sections.category')

                    @include('front.sections.popular_post')

                    @include('front.sections.subscribe')

                    @include('front.sections.tags')
                </aside>
            </div>
        </div>

        <div class="alart-box">

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> Please check the form again.
                <button type="button" class="btn-close"></button>
            </div>            
            @endif

            @if (Session::has('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Welcome!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close"></button>
            </div>
            @endif
            
        </div>

    </div>
</section>
<!-- Post end -->
@endsection

@section('custom_css')
<style>
    .alart-box {
        position: fixed;
        right: 30px;
        top: 30px;
        width: 420px;
        z-index: 999;
    }
</style>
@endsection


@section('custom_js')
<script>
    $('input, textarea').on('keyup', function() {
        $(this).removeClass('is-invalid')
    })

    let form_errors =   "{{ $errors }}";

    $(document).ready(function() {
        if(form_errors !== "[]") {
            scrollToComment();
        }
    })

    $('.reply').on('click', function() {
        scrollToComment();

        let dataId = $(this).attr('data-id');

        $('[name="parent_id"]').val(dataId);

        console.log(dataId);
    })

    function scrollToComment() {
        // $('html, body').animate({
        //     scrollTop: $("#comment-area").offset().top
        // }, 1000);
    }

    $('.btn-close').on('click', function() {
        $('.alart-box').fadeOut();
    })


</script>
@endsection