<div class="sidebar-item">
    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-category">
        <ul class="mb-0">
            @foreach ($categories as $category)
            <li>
                <a href="#">
                    <span>{{ $category->name }}</span>
                    <span>20</span>
                </a>
            </li>
            @endforeach
            
        </ul>
    </div>
</div>