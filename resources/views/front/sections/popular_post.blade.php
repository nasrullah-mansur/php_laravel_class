<!-- Popular post -->
<div class="sidebar-item">
    <h3 class="sidebar-title">Popular Post</h3>
    <div class="sidebar-popular-post">
        @foreach ($popular_posts as $popular_post)
        <div class="post-item">
            <div class="img">
                <img src="{{ asset($popular_post->image_sm) }}" alt="{{ $popular_post->image_alt ? $popular_post->image_alt : $popular_post->title}}">
            </div>
            <div class="content">
                <a href="#" class="category">{{ $popular_post->category->name }}</a>
                <a href="#" class="title">{{ $popular_post->title }}</a>
                <div class="calendar">
                    <i class="fas fa-calendar-alt"></i>
                    <span> {{ $popular_post->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>