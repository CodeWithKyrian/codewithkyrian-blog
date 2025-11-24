<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Tag::truncate();
        Schema::enableForeignKeyConstraints();

        Tag::create([
            'name' => 'PHP',
            'slug' => 'php',
            'description' => 'PHP is a widely-used server-side scripting language known for its versatility in web development and integration with databases.'
        ]);
        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
            'description' => 'Laravel is a sophisticated PHP framework that offers elegant syntax, powerful features, and a developer-friendly ecosystem for building modern web applications.'
        ]);
        Tag::create([
            'name' => 'CodeIgniter',
            'slug' => 'codeigniter', 
            'description' => 'CodeIgniter is a lightweight yet robust PHP framework, ideal for developers seeking an efficient toolkit to create full-featured web applications with ease.'
        ]);
        Tag::create([
            'name' => 'Vue.js',
            'slug' => 'vuejs',
            'description' => 'Vue.js is a progressive JavaScript framework that empowers developers to build interactive and dynamic user interfaces for web applications with minimal effort.'
        ]);
        Tag::create([
            'name' => 'JavaScript',
            'slug' => 'javascript',
            'description' => 'JavaScript is a versatile programming language widely used to create dynamic web pages and enhance user interactivity by manipulating HTML and CSS.'
        ]);
        Tag::create([
            'name' => 'Unity',
            'slug' => 'unity',
            'description' => 'Unity is a powerful cross-platform game engine that empowers game developers to create immersive and visually stunning experiences across various devices and platforms.'
        ]);
        Tag::create([
            'name' => 'C#',
            'slug' => 'c-sharp',
            'description' => 'C# is a versatile programming language with a strong type system, suitable for a wide range of application types, from web and desktop apps to games and enterprise software.'
        ]);
        Tag::create([
            'name' => 'Svelte',
            'slug' => 'svelte',
            'description' => 'Svelte is an innovative front-end compiler that enables developers to build high-performance web applications by compiling components into optimized JavaScript code during build time.'
        ]);
        Tag::create([
            'name' => 'Docker',
            'slug' => 'docker',
            'description' => 'Docker is a containerization platform that simplifies software deployment by packaging applications and their dependencies into isolated containers, ensuring consistency across various environments.'
        ]);
        Tag::create([
            'name' => 'DevOps',
            'slug' => 'devops',
            'description' => 'DevOps is a culture and set of practices that aim to bridge the gap between development and IT operations, focusing on collaboration, automation, and continuous improvement to deliver software faster and more reliably.'
        ]);
        Tag::create([
            'name' => 'Linux',
            'slug' => 'linux',
            'description' => 'Linux is an open-source operating system that powers millions of servers and devices worldwide, known for its stability, security, and flexibility.'
        ]);
        Tag::create([
            'name' => 'Git',
            'slug' => 'git',
            'description' => 'Git is a distributed version control system that tracks changes in code, enabling developers to collaborate on projects and manage codebases effectively.'
        ]);
        Tag::create([
            'name' => 'Windows',
            'slug' => 'windows',
            'description' => 'Windows is a popular operating system that powers millions of personal computers worldwide, known for its user-friendly interface and compatibility with a wide range of software and hardware.'
        ]);
        Tag::create([
            'name' => 'MacOS',
            'slug' => 'macos',
            'description' => 'MacOS is the proprietary operating system developed by Apple Inc. for its Macintosh line of computers, known for its sleek design, user-friendly interface, and powerful performance.'
        ]);
        Tag::create([
            'name' => 'API',
            'slug' => 'api',
            'description' => 'API (Application Programming Interface) is a set of protocols and tools that enable different software components to communicate and integrate with each other.'
        ]);
        Tag::create([
            'name' => 'TransformersPHP',
            'slug' => 'transformersphp',
            'description' => 'TransformersPHP is a powerful PHP library that simplifies the process of integrating AI models into your applications, providing a simple and intuitive interface for working with complex machine learning models.'
        ]);
        Tag::create([
            'name' => 'ML',
            'slug' => 'ml',
            'description' => 'ML is an acronym for Machine Learning, which is a subset of artificial intelligence that focuses on enabling machines to learn from data and make predictions or decisions without being explicitly programmed.'
        ]);
        Tag::create([
            'name' => 'AI',
            'slug' => 'ai',
            'description' => 'AI is an acronym for Artificial Intelligence, which refers to the simulation of human intelligence in machines that are programmed to think and learn like humans.'
        ]);
        Tag::create([
            'name' => 'Livewire',
            'slug' => 'livewire',
            'description' => 'Livewire is a full-stack framework for Laravel that enables developers to build dynamic and interactive web applications with minimal effort, using a reactive programming model.'
        ]);
        Tag::create([
            'name' => 'Filament',
            'slug' => 'filament',
            'description' => 'Filament is a modern and elegant admin panel framework for Laravel that simplifies the process of building powerful and customizable admin interfaces.'
        ]);
        Tag::create([
            'name' => 'TailwindCSS',
            'slug' => 'tailwindcss',
            'description' => 'TailwindCSS is a utility-first CSS framework that empowers developers to build custom designs with a highly customizable and responsive approach.'
        ]);
    }
}
