<ul class="list-group">
    <a href="/" class="list-group-item">全部</a>
    @foreach($subjects as $subject)
        <a href="/?category={{strtolower($subject->name)}}" class="list-group-item">
            {{$subject->name}}
            <span class="badge">
                {{$subject->blogs_count}}
            </span>
        </a>
    @endforeach
</ul>