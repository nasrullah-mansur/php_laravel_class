<!-- Popular post -->
<div class="sidebar-item">
    <h3 class="sidebar-title">Popular Post</h3>
    <div class="sidebar-popular-post">
        @foreach ($popular_posts as $popular_post)
        <div class="post-item">
            <div class="img">
                <a href="{{ route('front.single.blog', $popular_post->slug) }}">
                    <img src="{{ asset($popular_post->image_sm) }}" alt="{{ $popular_post->image_alt ? $popular_post->image_alt : $popular_post->title}}">
                </a>
            </div>
            <div class="content">
                <a href="{{ route('front.blog.by.category', $popular_post->category->slug) }}" class="category">{{ $popular_post->category->name }}</a>
                <a href="{{ route('front.single.blog', $popular_post->slug) }}" class="title">{{ $popular_post->title }}</a>
                <div class="calendar">
                    <i class="fas fa-calendar-alt"></i>
                    <span> {{ $popular_post->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>