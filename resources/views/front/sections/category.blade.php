<div class="sidebar-item">
    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-category">
        <ul class="mb-0">
            @foreach ($categories as $category)
            <li>
                <a href="{{ route('front.blog.by.category', $category->slug) }}">
                    <span>{{ $category->name }}</span>
                    <span>({{ $category->blog_count }})</span>
                </a>
            </li>
            @endforeach
            
        </ul>
    </div>
</div>