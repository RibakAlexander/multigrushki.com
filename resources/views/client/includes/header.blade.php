<div class="categories">
    @foreach($categories as $category)
        @php
        $desc = $category->description()->first();
        @endphp
    <div class="category">
        <a href="/catalog/{{ $category->slug }}">{{ $desc->name }}</a>
    </div>
    @endforeach
</div>
<!--
<div class="navbar">
    <div class="navbar-inner">
        <a id="logo" href="/">Single Malt</a>
        <ul class="nav">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/projects">Projects</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </div>
</div>
<div class="top_panel_fix">

</div>-->