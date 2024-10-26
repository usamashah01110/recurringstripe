<h1>All Pages</h1>
<a href="{{ route('pages.create') }}">Create New Page</a>
<ul>
    @foreach($pages as $page)
        <li>{{ $page->title }} - <a href="{{ route('pages.edit', $page->id) }}">Edit</a> | 
        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        </li>
    @endforeach
</ul>
