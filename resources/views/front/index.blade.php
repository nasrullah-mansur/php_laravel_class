@extends('front.layout.layout')

@section('content')
<!-- Banner start -->
<section class="banner">
    <div class="banner-slider">
        @foreach ($sliders as $slider)
        <div class="slider-item" style="background-image: url({{ asset($slider->image) }});">
            <div class="container">
                <h3>{{ $slider->title }}</h3>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Banner end -->

<!-- Post start -->
<section class="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="post-area">
                    <div class="row">
                        @foreach ($blogs as $blog)
                        <div class="col-lg-6 col-md-6">
                            <div class="blog-cart">
                                <a href="{{ route('front.single.blog', $blog->slug) }}"><img class="img-fluid w-100" src="{{ asset($blog->image_sm) }}" alt="{{ $blog->image_alt ? $blog->image_alt : $blog->title  }}"></a>
                                <h3><a href="{{ route('front.single.blog', $blog->slug) }}">{{ $blog->title}}</a></h3>
                                <div class="info">
                                    <a href="{{ route('front.blog.by.category', $blog->category->slug) }}" class="category">{{ $blog->category->name }}</a>
                                    <div class="date">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>{{ $blog->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="comment">
                                        <i class="fas fa-comment"></i>
                                        <span>(20)</span>
                                    </div>
                                </div>
                                <p>{{ $blog->description }}</p>
                                <a class="read-more text-uppercase" href="{{ route('front.single.blog', $blog->slug) }}">Read More</a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{ $blogs->onEachSide(3)->links() }}

                    
                    
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



