<!-- Popular tags -->
@if ($tags->count() > 0)
<div class="sidebar-item">
    <h3 class="sidebar-title">Popular Tags</h3>
    <ul class="popular-tags mb-0">
        @foreach ($tags as $tag)
        <li><a href="#">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
</div>
@endif