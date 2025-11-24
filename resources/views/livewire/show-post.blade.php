<x-slot:meta>
    <meta name="description" content="{{ $post->description }}">
    <meta name="keywords" content="{{ implode(',', $post->keywords) }}">
    <meta name="author" content="Kyrian Obikwelu">
</x-slot:meta>

<div class="container flex flex-wrap justify-center w-full">
    <section id="post-view" aria-label="Title" class="w-full md:w-8/12">
        <div class="px-2 py-8 mx-auto md:px-4">

            <!-- Banner -->
            <div class="mb-4">
                {!! $post->thumbnail->img()->attributes([
                    'id' => \Illuminate\Support\Str::uuid(),
                    'loading' => 'lazy',
                    'class' => 'rounded'
                ]) !!}
            </div>

            <!-- Title -->
            <div class="mb-6">
                <x-category-badge :category="$post->category" />

                <h1
                    class="mb-2 text-2xl font-bold tracking-tight md:text-3xl lg:text-4xl text-zinc-900 dark:text-white">
                    {{ $post->title }}</h1>

                <div class="flex items-center mb-2 space-x-4">
                    @foreach ($post->tags as $tag)
                        <a wire:navigate href="{{ route('tag.show', $tag) }}" class="text-lg text-zinc-500 hover:text-blue-500">
                            <span class="font-mono text-blue-500">#</span>{{ $tag->name }}
                        </a>
                    @endforeach
                </div>

                <div class="flex mb-4 text-sm tracking-tight text-zinc-900 dark:text-white">
                    Last Updated on {{ $post->published_at->format('F j, Y') }} <span class="mx-2">•</span>
                    {{ $post->read_time }}
                </div>

                <hr />
            </div>


            <!-- Body -->
            <div id="postContent"
                class="mb-4 max-w-full break-words prose md:prose-lg dark:prose-invert prose-img:rounded-md text-zinc-700 dark:text-zinc-300">
                {!! $post->body !!}
            </div>
        </div>

        <!-- Comment Section -->
        <livewire:components.comments-card :post-id="$post->id" />

    </section>

    <aside class="flex flex-col items-center w-full md:w-5/12 lg:w-1/3">

        <div class="sticky top-16 px-4 py-4 mx-auto">
            <x-about-card />

            <x-related-posts-card :posts="$relatedPosts" />
        </div>

    </aside>
</div>

@script
    <script>
        const copyCode = async (e, block) => {
            let code = block.querySelector('code').innerText;

            code = code.replace(/\u00A0/g, ' '); // Replace non-breaking spaces with regular spaces

            try {
                await navigator.clipboard.writeText(code);
                e.target.classList.add('copied');
                setTimeout(() => e.target.classList.remove('copied'), 2000);
            } catch (err) {
                console.error('Failed to copy:', err);
            }
        };

        document.querySelectorAll('pre').forEach(block => {
            block.insertAdjacentHTML(
                'beforeend',
                '<button class="code-copy"><svg class="code-copy-icon"></svg></button>'
            );
            block.querySelector('.code-copy').addEventListener('click', e => copyCode(e, block));
        });
    </script>
@endscript
