@props(['tags', 'title' => 'Popular Tags'])
<div class="mb-6 card">
    <h2 class="card-title">{{ $title }}</h2>
    <ul class="px-2">
        @foreach ($tags as $tag)
            <li class="flex items-center">
                <a href="{{ route('tag.show', $tag) }}"
                   class="flex-1 block py-2 text-zinc-700 hover:text-zinc-800 hover:underline dark:text-zinc-400 dark:hover:text-zinc-300">{{ $tag->name }}</a>
                <span
                        class="inline-flex items-center justify-center w-8 h-8 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-200 dark:text-blue-800">{{ $tag->posts_count }}</span>
            </li>
        @endforeach
    </ul>
    <a href="/"
       class="flex items-center justify-center w-full px-2 py-3 mt-6 text-sm font-bold text-white uppercase bg-blue-800 rounded hover:bg-blue-700">
        See all tags
    </a>
</div>