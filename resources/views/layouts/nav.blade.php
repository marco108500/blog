<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="/">Home</a>
            @if (Auth::check())
                <a class="nav-link" href="/posts/create">Create Post</a>
            @else
                <a class="nav-link" href="/login">login</a>
                <a class="nav-link" href="/register">Register</a>
            @endif
            @if (Auth::check())
                <a class="nav-link ml-auto" href="#">{{Auth::user()->name}}</a>
                @if (Auth::check())
                    <a class="nav-link" href="/logout">logout</a>
                @endif
            @endif
        </nav>
    </div>
</div>
