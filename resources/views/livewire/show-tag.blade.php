<x-slot:meta>
    <meta name="description" content="{{ $tag->description }}">
</x-slot:meta>
<div class="container flex flex-wrap justify-center w-full">
    <section id="intro" class="w-full">
        <div class="max-w-screen-md px-4 py-8 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight lg:text-4xl text-zinc-900 dark:text-white">
                {{ $tag->name }}
            </h2>
            <p class="text-zinc-600 sm:text-xl dark:text-zinc-400">{{ $tag->description }}</p>
        </div>
    </section>

    <section id="post-list" aria-label="Posts list" class="w-full md:w-7/12 lg:w-8/12 ">
        <div class="grid gap-6 py-4 mx-auto lg:grid-cols-2">
            @foreach ($tag->posts as $post)
                <article class="card hover:scale-[102%] transition-transform duration-300">
                    <div class="flex items-center justify-between mb-2 text-zinc-500">
                        <x-category-badge :category="$post->category" />
                        <span class="inline-flex items-center text-sm font-medium text-zinc-400 dark:text-zinc-300">
                            {{ $post->read_time }}
                        </span>
                    </div>
                    <h2 class="mb-2 card-title">
                        <a wire:navigate href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="mb-3 text-zinc-600 dark:text-zinc-400 line-clamp-3">
                        {{ $post->description }}
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            @foreach ($post->tags as $tag)
                                <a wire:navigate href="/t/{{ $tag->slug }}" class="text-zinc-500 hover:text-blue-500">
                                    <span class="font-mono text-blue-500">#</span>{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                        <span class="text-sm text-zinc-500">{{ $post->published_at->format('F j, Y') }}</span>

                    </div>
                </article>
            @endforeach

        </div>

        {{-- <Pagination meta="{meta}"/> --}}
    </section>

    <aside class="flex flex-col items-center w-full md:w-5/12 lg:w-4/12">

        <div class="px-4 py-4 mx-auto ">
            <x-about-card />
        </div>

    </aside>
</div>
