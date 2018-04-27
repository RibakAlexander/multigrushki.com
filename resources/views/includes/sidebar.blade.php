<!-- sidebar nav -->
<nav id="sidebar-nav">
    @if($categories)
    <ul class="nav nav-pills nav-stacked">
        @foreach($categories as $category)
        <li><a href="{{ route('category') . '/' . $category->slug }}">{{ $category->getDescription('name') }}</a></li>
        @endforeach
    </ul>
    @endif
</nav>