@extends('front.layout.layout')

@section('content')

<!-- Post start -->
<section class="post">
    <div class="container">
        <div class="blog-category p-2 mb-4 bg-light text-center">
            <h1 class="text-capitalize">{{$category->name}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="col-lg-6">
                        <div class="post-item-bg">
                            <div class="img">
                                <a href="{{ route('front.single.blog', $blog->slug) }}">
                                    <img class="img-fluid w-100" src="{{ asset($blog->image) }}" alt="{{ $blog->image_alt ? $blog->image_alt : $blog->title }}">
                                </a>
                            </div>
                            <div class="calendar">
                                <a href="{{ route('front.blog.by.category', $category->slug) }}" class="category">{{ $category->name }}</a>
                                <div class="info">
                                    <div class="date">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>{{ $blog->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="comment">
                                        <i class="fas fa-comment"></i>
                                        <span>(20)</span>
                                    </div>
                                </div>
                            </div>
                            <h3 class="title"><a href="{{ route('front.single.blog', $blog->slug) }}">{{ $blog->title }}</a></h3>
                            <p class="description">{{ $blog->description }}</p>
                            <a href="{{ route('front.single.blog', $blog->slug) }}" class="read-more">Read More</a>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
                

                {{ $blogs->onEachSide(3)->links() }}

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