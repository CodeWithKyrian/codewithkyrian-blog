<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['name' => 'PHP', 'description' => 'PHP is a widely-used server-side scripting language known for its versatility in web development and integration with databases.']);
        Tag::create(['name' => 'Laravel', 'description' => 'Laravel is a sophisticated PHP framework that offers elegant syntax, powerful features, and a developer-friendly ecosystem for building modern web applications.']);
        Tag::create(['name' => 'CodeIgniter', 'description' => 'CodeIgniter is a lightweight yet robust PHP framework, ideal for developers seeking an efficient toolkit to create full-featured web applications with ease.']);
        Tag::create(['name' => 'Vue.js', 'description' => 'Vue.js is a progressive JavaScript framework that empowers developers to build interactive and dynamic user interfaces for web applications with minimal effort.']);
        Tag::create(['name' => 'JavaScript', 'description' => 'JavaScript is a versatile programming language widely used to create dynamic web pages and enhance user interactivity by manipulating HTML and CSS.']);
        Tag::create(['name' => 'Unity', 'description' => 'Unity is a powerful cross-platform game engine that empowers game developers to create immersive and visually stunning experiences across various devices and platforms.']);
        Tag::create(['name' => 'C#', 'description' => 'C# is a versatile programming language with a strong type system, suitable for a wide range of application types, from web and desktop apps to games and enterprise software.']);
        Tag::create(['name' => 'Svelte', 'description' => 'Svelte is an innovative front-end compiler that enables developers to build high-performance web applications by compiling components into optimized JavaScript code during build time.']);
        Tag::create(['name' => 'Docker', 'description' => 'Docker is a containerization platform that simplifies software deployment by packaging applications and their dependencies into isolated containers, ensuring consistency across various environments.']);
        Tag::create(['name' => 'DevOps', 'description' => 'DevOps is a culture and set of practices that aim to bridge the gap between development and IT operations, focusing on collaboration, automation, and continuous improvement to deliver software faster and more reliably.']);
    }
}
