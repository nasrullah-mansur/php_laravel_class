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
                        <li>
                            <div class="img">
                                <img src="{{ asset('front/images/user-01.jpg') }}" alt="img">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h5>Omar Elnagar</h5>
                                    <span>September 13, 2018 at 10:38 AM</span>
                                </div>
                                <p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he. They call him Flipper Flipper the faster than lightning. No one you see is smarter than he</p>
                                <a class="reply" href="#"><i class="fa-solid fa-reply"></i> REPLY</a>
                            </div>

                            <ul>
                                <li>
                                    <div class="img">
                                        <img src="{{ asset('front/images/user-01.jpg') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <div class="title">
                                            <h5>Omar Elnagar</h5>
                                            <span>September 13, 2018 at 10:38 AM</span>
                                        </div>
                                        <p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he. They call him Flipper Flipper the faster than lightning. No one you see is smarter than he</p>
                                        <a class="reply" href="#"><i class="fa-solid fa-reply"></i> REPLY</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="img">
                                <img src="{{ asset('front/images/user-01.jpg') }}" alt="img">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h5>Omar Elnagar</h5>
                                    <span>September 13, 2018 at 10:38 AM</span>
                                </div>
                                <p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he. They call him Flipper Flipper the faster than lightning. No one you see is smarter than he</p>
                                <a class="reply" href="#"><i class="fa-solid fa-reply"></i> REPLY</a>
                            </div>

                            <ul>
                                <li>
                                    <div class="img">
                                        <img src="{{ asset('front/images/user-01.jpg') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <div class="title">
                                            <h5>Omar Elnagar</h5>
                                            <span>September 13, 2018 at 10:38 AM</span>
                                        </div>
                                        <p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he. They call him Flipper Flipper the faster than lightning. No one you see is smarter than he</p>
                                        <a class="reply" href="#"><i class="fa-solid fa-reply"></i> REPLY</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="img">
                                        <img src="{{ asset('front/images/user-01.jpg') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <div class="title">
                                            <h5>Omar Elnagar</h5>
                                            <span>September 13, 2018 at 10:38 AM</span>
                                        </div>
                                        <p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he. They call him Flipper Flipper the faster than lightning. No one you see is smarter than he</p>
                                        <a class="reply" href="#"><i class="fa-solid fa-reply"></i> REPLY</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- Comment area -->
                <div class="comment-area">
                    <h2 class="text-uppercase">Leave your comment here</h2>
                    <form>
                        <input class="half" type="text" placeholder="your Name">
                        <input class="half" type="text" placeholder="your Email">
                        <textarea placeholder="Your Comment"></textarea>
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
    </div>
</section>
<!-- Post end -->
@endsection