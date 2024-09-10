<x-slot:meta>
    <meta name="description"
        content="Welcome to my coding Wonderland! Join me on an adventure through programming, web development, and game development. Get ready to learn new things and unleash your inner geek. Let's geek out together😜!">
</x-slot:meta>
<div class="container flex flex-wrap justify-center w-full">
    <section id="intro" class="w-full">
        <div class="max-w-screen-md px-4 py-8 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight lg:text-4xl text-zinc-900 dark:text-white">
                Tips and Tutorials
            </h2>
            <p class="text-zinc-600 sm:text-xl dark:text-zinc-400">Welcome to my coding Wonderland! Join
                me on an adventure through programming, web development, and game development. Get ready to
                learn new things and unleash your inner geek. Let's geek out together😜!</p>
        </div>
    </section>

    <section id="post-list" aria-label="Posts list" class="w-full md:w-2/3">
        <div class="grid gap-6 py-4 mx-auto lg:grid-cols-2">
            @foreach ($posts as $index => $post)
                <article @class([
                    'card p-0 flex flex-col lg:flex-row hover:scale-[102%] transition-transform duration-300',
                    'lg:col-span-2' => $index === 0 && $this->getPage() === 1,
                ])>
                    @if ($index === 0 && $this->getPage() === 1)
                        <div class="flex-grow w-full">
                            <a href="{{ route('post.show', $post) }}" wire:navigate>
                                {!! $post->thumbnail->img()->attributes([
                                    'id' => \Illuminate\Support\Str::uuid(),
                                    'loading' => 'lazy',
                                    'class' => 'object-cover w-full h-auto md:h-full md:w-auto',
                                    'alt' => $post->title,
                                ]) !!}
                            </a>
                        </div>
                    @endif
                    <div class="flex-shrink w-full p-4 md:p-6">
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
                                    <a wire:navigate href="{{ route('tag.show', $tag) }}" class="text-zinc-500 hover:text-blue-500">
                                        <span class="font-mono text-blue-500">#</span>{{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                            <span class="text-sm text-zinc-500">{{ $post->published_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </article>
            @endforeach

        </div>

        {{ $posts->links('components.pagination') }}
    </section>

    <aside class="flex flex-col items-center w-full md:w-5/12 lg:w-1/3">

        <div class="sticky px-4 py-4 mx-auto top-16">
            <x-about-card />

            <x-tags-card :tags="$tags" />
        </div>

    </aside>
</div>
