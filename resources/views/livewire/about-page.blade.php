<x-slot:meta>
    <meta name="description"
        content="Kyrian Obikwelu is a versatile software developer specializing in backend development, with a passion for exploring new technologies and solving complex problems.">
</x-slot:meta>

<div class="container max-w-screen-xl py-8 mx-auto">
    <!-- Introduction -->
    <section class="mb-12">
        <div class="flex items-center mb-8">
            <div
                class="w-32 h-32 mr-4 overflow-hidden border rounded-full md:mr-8 border-zinc-200 dark:border-zinc-700/60">
                <img src="{{ asset('img/kyrian.jpeg') }}" alt="Kyrian Obikwelu" class="object-cover w-full h-full">
            </div>
            <div>
                <h1 class="mb-2 text-2xl font-bold md:text-4xl text-zinc-800 dark:text-zinc-300">
                    Kyrian Obikwelu
                </h1>
                <p class="text-lg md:text-xl text-zinc-600 dark:text-zinc-400">
                    Software Developer & Tech Explorer
                </p>
                <div class="flex mt-4 space-x-8 md:justify-start">
                    <a href="https://linkedin.com/in/kyrian-obikwelu" target="_blank" rel="noopener noreferrer"
                        class="transition-colors duration-300 text-zinc-600 hover:text-blue-500 dark:text-zinc-400 dark:hover:text-blue-400">
                        @svg('si-linkedin', 'size-4')
                    </a>
                    <a href="mailto:kyrianobikwelu@gmail.com"
                        class="transition-colors duration-300 text-zinc-600 hover:text-red-500 dark:text-zinc-400 dark:hover:text-red-400">
                        @svg('heroicon-o-envelope', 'size-4')
                    </a>
                    <a href="https://twitter.com/CodeWithKyrian" target="_blank" rel="noopener noreferrer"
                        class="transition-colors duration-300 text-zinc-600 hover:text-blue-400 dark:text-zinc-400 dark:hover:text-blue-300">
                        @svg('si-x', 'size-4')
                    </a>
                    <a href="https://github.com/CodeWithKyrian" target="_blank" rel="noopener noreferrer"
                        class="transition-colors duration-300 text-zinc-600 hover:text-gray-900 dark:text-zinc-400 dark:hover:text-white">
                        @svg('si-github', 'size-4')
                    </a>
                </div>
            </div>
        </div>
        <div class="prose dark:prose-invert max-w-none text-zinc-700 dark:text-zinc-300">
            <p>Hey there! I'm Kyrian, a software developer with a passion for technology. My journey began in 2018 when
                I discovered PHP, but since then, I've ventured into many other languages and frameworks, including
                JavaScript, C#, and Rust. Each experience has enriched my skills and shaped my approach to solving
                complex problems in the ever-evolving world of software development.</p>
            <p>While some might see my diverse skill set as a jack-of-all-trades approach, I view it as my superpower.
                My exploration across various languages and frameworks has given me a unique perspective, allowing me to
                bring innovative solutions to complex problems.</p>
        </div>
    </section>

    <!-- My Journey -->
    <section class="mb-12">
        <h2 class="mb-6 text-3xl font-bold text-zinc-800 dark:text-zinc-300">My Tech Odyssey</h2>
        <div class="prose dark:prose-invert max-w-none text-zinc-700 dark:text-zinc-300">
            <p>It all started with PHP and CodeIgniter back in 2018. As I dived deeper, my curiosity led me to explore
                other territories:</p>
            <ul>
                <li>Ventured into JavaScript, falling in love with Vue.js for both frontend and backend development.
                </li>
                <li>Dabbled in Rust, pushing the boundaries of system-level programming.</li>
                <li>Built shared libraries with C and C++, gaining a deeper understanding of low-level operations.</li>
                <li>Explored the exciting world of game development using Unity, currently working part-time in the
                    industry.</li>
                <li>Founded a coding school for high school students in my locality, teaching them coding and robotics,
                    and have graduated over 1,000 students.</li>
                <li>Mastered Docker and containerization, streamlining deployment processes.</li>
                <li>Developed an interest in machine learning in late 2023, applying knowledge from Python and C# to
                    enhance my PHP projects.</li>
            </ul>
            <p>This journey has shaped me into a versatile developer, capable of tackling challenges across various
                domains. While I've explored many areas, my true passion lies in crafting powerful backend applications
                with complex logic.</p>
        </div>
    </section>

    <!-- Strengths -->
    <section class="mb-12">
        <h2 class="mb-8 text-3xl font-bold text-zinc-800 dark:text-zinc-300">My Superpowers</h2>
        <p class="mb-4 text-zinc-600 dark:text-zinc-400">
            My primary superpower lies in my meticulous approach to creating solutions. I intentionally avoid calling it
            just "writing code" because what I do transcends that—I create solutions. I obsess over making them elegant,
            well-tested, and reliable. I learned the importance of thorough testing the hard way a few years ago, and
            now I can't ship without proper tests to ensure quality and ... I just love to sleep well at night 😮‍💨.
        </p>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <article class="p-6 transition-transform duration-300 card hover:scale-[102%]">
                <div class="flex items-center mb-4">
                    @svg('heroicon-o-cpu-chip', 'w-8 h-8 mr-3 text-blue-500')
                    <h3 class="text-xl font-semibold text-zinc-800 dark:text-zinc-300">Problem Solver Extraordinaire
                    </h3>
                </div>
                <p class="text-zinc-600 dark:text-zinc-400">I thrive on challenges and complex problems. My approach
                    involves diving deep, exploring every angle, and crafting elegant solutions. This problem-solving
                    mindset has been the driving force behind my diverse tech journey, from PHP to game development.</p>
            </article>

            <article class="p-6 transition-transform duration-300 card hover:scale-[102%]">
                <div class="flex items-center mb-4">
                    @svg('heroicon-o-puzzle-piece', 'w-8 h-8 mr-3 text-green-500')
                    <h3 class="text-xl font-semibold text-zinc-800 dark:text-zinc-300">Versatility</h3>
                </div>
                <p class="text-zinc-600 dark:text-zinc-400">My diverse experience is my greatest strength. From PHP and
                    JavaScript to Rust and C++, each language has enriched my coding perspective. Working with
                    Express.js improved my Laravel code, while C# instilled a passion for strict code structure. This
                    versatility allows me to approach problems from multiple angles.</p>
            </article>

            <article class="p-6 transition-transform duration-300 card hover:scale-[102%]">
                <div class="flex items-center mb-4">
                    @svg('heroicon-o-arrow-path', 'w-8 h-8 mr-3 text-purple-500')
                    <h3 class="text-xl font-semibold text-zinc-800 dark:text-zinc-300">Adaptability</h3>
                </div>
                <p class="text-zinc-600 dark:text-zinc-400">I excel at quickly adapting to new technologies and
                    environments. Whether it's an emergency project with an unfamiliar stack or exploring game
                    development part-time, I'm always ready to learn and contribute effectively. This flexibility has
                    been crucial in my journey as a tech explorer and problem solver.</p>
            </article>

            <article class="p-6 transition-transform duration-300 card hover:scale-[102%]">
                <div class="flex items-center mb-4">
                    @svg('heroicon-o-cube-transparent', 'w-8 h-8 mr-3 text-yellow-500')
                    <h3 class="text-xl font-semibold text-zinc-800 dark:text-zinc-300">Holistic Approach</h3>
                </div>
                <p class="text-zinc-600 dark:text-zinc-400">While PHP is my primary focus, I recognize the strengths and
                    weaknesses of various technologies. My experience with Docker, Rust, and game development has taught
                    me to see the bigger picture. I'm not afraid to incorporate other languages or stacks when they're
                    the best tool for the job, ensuring optimal solutions for complex problems.</p>
            </article>
        </div>
    </section>

    <!-- Tech Arsenal -->
    <section class="mb-12">
        <h2 class="mb-6 text-3xl font-bold text-zinc-800 dark:text-zinc-300">Tech Arsenal</h2>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
            @php
                $skills = [
                    ['name' => 'PHP', 'icon' => 'si-php'],
                    ['name' => 'Laravel', 'icon' => 'si-laravel'],
                    ['name' => 'JavaScript', 'icon' => 'si-javascript'],
                    ['name' => 'Vue.js', 'icon' => 'si-vuedotjs'],
                    ['name' => 'Rust', 'icon' => 'si-rust'],
                    ['name' => 'C++', 'icon' => 'si-cplusplus'],
                    ['name' => 'Docker', 'icon' => 'si-docker'],
                    ['name' => 'MySQL', 'icon' => 'si-mysql'],
                    ['name' => 'PostgreSQL', 'icon' => 'si-postgresql'],
                    ['name' => 'Redis', 'icon' => 'si-redis'],
                    ['name' => 'Git', 'icon' => 'si-git'],
                    ['name' => 'CI/CD', 'icon' => 'heroicon-o-cog-6-tooth'],
                    ['name' => 'RESTful APIs', 'icon' => 'heroicon-o-server-stack'],
                ];
            @endphp

            @foreach ($skills as $skill)
                <div class="flex items-center p-4 space-x-3 transition-transform duration-300 card hover:scale-105">
                    @svg($skill['icon'], 'w-6 h-6 text-blue-500')
                    <span class="text-zinc-700 dark:text-zinc-300">{{ $skill['name'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Open Source Contributions -->
    <section class="mb-12">
        <h2 class="mb-6 text-3xl font-bold text-zinc-800 dark:text-zinc-300">Open Source Adventures</h2>
        <div class="mb-6 prose dark:prose-invert max-w-none text-zinc-700 dark:text-zinc-300">
            <p>I'm passionate about contributing to the open-source community. Here are some of my notable projects:</p>
        </div>
        <div class="grid gap-6 md:grid-cols-2">
            @foreach ($openSourceProjects as $project)
                <article class="card p-6 flex flex-col hover:scale-[102%] transition-transform duration-300">
                    <div class="flex justify-between">
                        <div class="flex items-center mb-4">
                            @svg($project['icon'], 'w-8 h-8 mr-3 text-blue-500')
                            <h3 class="text-xl font-semibold text-zinc-800 dark:text-zinc-300">{{ $project['name'] }}
                            </h3>
                        </div>
                        <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer">
                            @svg('si-github', 'w-5 h-5 mr-2 text-black dark:text-white')
                        </a>
                    </div>


                    <p class="mb-4 text-zinc-600 dark:text-zinc-400">{{ $project['description'] }}</p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach ($project->meta['badges'] as $badge)
                            <div class="flex items-center overflow-hidden text-xs rounded-full">
                                <span
                                    class="px-2 py-1 bg-zinc-200 dark:bg-zinc-700 text-zinc-700 dark:text-zinc-300">{{ $badge['label'] }}</span>
                                <span class="{{ $badge['color'] }} text-white px-2 py-1">{{ $badge['value'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mb-16">
        <h2 class="mb-6 text-3xl font-bold text-zinc-800 dark:text-zinc-300">Featured Projects</h2>
        <div class="grid gap-6 md:grid-cols-2">
            @foreach ($regularProjects as $project)
                <article
                    class="card p-0 overflow-hidden flex flex-col hover:scale-[102%] transition-transform duration-300">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ $project->thumbnail }}" alt="{{ $project->name }}"
                            class="project-screenshot-scroll" />
                    </div>
                    <div class="flex flex-col flex-grow p-4">
                        <h3 class="mb-2 text-xl font-semibold text-zinc-800 dark:text-zinc-300">{{ $project->name }}
                        </h3>
                        <p class="flex-grow mb-4 text-zinc-600 dark:text-zinc-400">{{ $project->description }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($project->technologies as $tech)
                                <span
                                    class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-200">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <a href="{{ $project->url }}" target="_blank" rel="noopener noreferrer"
                            class="text-blue-600 hover:underline">View Project</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <!-- Closing -->
    <section class="mb-12">
        <div class="prose dark:prose-invert max-w-none text-zinc-700 dark:text-zinc-300">
            <p>While I take pride in my versatility and problem-solving skills, I'm not without my quirks. I can
                sometimes get lost in the pursuit of perfection, obsessing over code optimization and structure. But
                hey, that's just part of what makes me, me!</p>
            <p>If you're looking for a developer who brings a unique blend of expertise, curiosity, and adaptability to
                the table, let's connect and create something amazing together!</p>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="mb-12 overflow-hidden rounded-lg shadow-xl bg-gradient-to-r from-blue-500 to-purple-600">
        <div class="flex flex-col items-center justify-between px-6 py-12 md:px-12 md:py-16 md:flex-row">
            <div class="mb-8 text-center md:mb-0 md:mr-8 sm:text-left">
                <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">Ready to Create Something Amazing?</h2>
                <p class="mb-6 text-xl text-blue-100">Let's combine your vision with my expertise and build the next big
                    thing in tech!</p>
                <div class="flex flex-col items-center justify-center gap-4 sm:flex-row md:justify-start">
                    <a href="mailto:your.kyrianobikwelu@gmail.com"
                        class="inline-flex items-center px-6 py-3 text-base font-medium text-blue-600 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:bg-blue-50">
                        @svg('heroicon-o-envelope', 'w-5 h-5 mr-2')
                        Email Me
                    </a>
                    <a href="https://linkedin.com/in/kyrian-obikwelu" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center px-6 py-3 text-base font-medium text-white transition duration-150 ease-in-out bg-blue-800 border border-transparent rounded-md hover:bg-blue-700">
                        @svg('si-linkedin', 'w-5 h-5 mr-2')
                        Connect on LinkedIn
                    </a>
                </div>
            </div>
            <div class="flex justify-center w-full md:w-1/3">
                <div class="relative">
                    <div
                        class="absolute inset-0 rounded-full bg-gradient-to-r from-blue-400 to-purple-500 animate-pulse">
                    </div>
                    <img src="{{ asset('img/kyrian.jpeg') }}" alt="Kyrian Obikwelu"
                        class="relative z-10 w-48 h-48 border-4 border-white rounded-full shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Fun Fact -->
    <section class="mb-12 text-center">
        <p class="text-lg italic text-zinc-600 dark:text-zinc-400">
            "Did you know? I once set up a GitHub Actions workflow to build a library across all platforms, and it
            worked
            flawlessly on the <span class="font-bold animate-flash-expand">first</span> try — god level!!"
        </p>
    </section>
</div>

@script
    <script>
        const screenshots = document.querySelectorAll('.project-screenshot-scroll');

        screenshots.forEach(screenshot => {
            const img = new Image();
            img.onload = function() {
                const scrollHeight = screenshot.clientHeight - screenshot.parentElement.clientHeight;
                const duration = scrollHeight / 10;

                screenshot.style.setProperty('--scroll-height', `-${scrollHeight}px`);
                screenshot.style.animationDuration = `${duration}s`;
            }
            img.src = screenshot.src;
        });
    </script>
@endscript
