<ul class="list-group">
    <a href="/" class="list-group-item">全部</a>
    @foreach($tags as $tag)
        <a href="/?tag={{strtolower($tag->name)}}" class="list-group-item">
            {{$tag->name}}
            <span class="badge">
                {{$tag->blogs_count}}
            </span>
        </a>
    @endforeach
</ul>