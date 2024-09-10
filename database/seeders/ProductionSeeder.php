<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create(['name' => 'Kyrian Obikwelu', 'email' => 'kyrianobikwelu@gmail.com',]);


        $categories = [
            ['title' => 'Guides & Tutorials', 'slug' => 'guides-tutorials', 'description' => 'Embark on insightful journeys with our in-depth guides and tutorials. Explore step-by-step instructions, thoughtfully curated to help you master a diverse range of tech subjects.'],
            ['title' => 'Newsletter Updates', 'slug' => 'newsletter-updates', 'description' => 'Stay in the loop with our carefully curated newsletter updates. Receive a steady stream of the latest tech insights and industry news, directly delivered to your inbox.'],
            ['title' => 'Tech News', 'slug' => 'tech-news', 'description' => 'Dive into the dynamic world of technology through my unbiased tech news coverage. Gain insights into groundbreaking advancements, product launches, and in-depth industry analyses.'],
            ['title' => 'Quick Tips', 'slug' => 'quick-tips', 'description' => 'Boost your skills with my quick tips, offering actionable advice to enhance your productivity and proficiency. These concise tips are designed to fit seamlessly into your busy tech journey.'],
            ['title' => 'Product Reviews', 'slug' => 'product-reviews', 'description' => 'Make confident decisions with my detailed product reviews, where I provide an unbiased evaluation of tech products, tools, and services to help you navigate the ever-evolving tech landscape.'],
            ['title' => 'Opinions & Insights', 'slug' => 'opinions-insights', 'description' => 'Engage in thought-provoking discussions with my candid opinions and insightful analyses on tech subjects. Join me in exploring different perspectives and deepening our understanding together.'],
            ['title' => 'Expert Interviews', 'slug' => 'expert-interviews', 'description' => 'Gain exclusive insights through interviews with industry experts. Join me as I converse with thought leaders, innovators, and influencers who are shaping the future of technology.'],
            ['title' => 'Miscellaneous', 'slug' => 'miscellaneous', 'description' => 'Venture beyond conventional categories with me and explore the uncharted territories of tech. Discover unexpected insights, intriguing perspectives, and delightful surprises that lie beyond the surface.'],
            ['title' => 'Tutorial Series', 'slug' => 'tutorial-series', 'description' => 'Embark on a personalized learning journey with my tutorial series. Dive into in-depth guides thoughtfully organized into parts, designed to provide you with a comprehensive understanding of tech topics.'],
        ];

        Category::insert($categories);

        $tags = [
            ['name' => 'PHP', 'slug' => 'php', 'description' => 'PHP is a widely-used server-side scripting language known for its versatility in web development and integration with databases.'],
            ['name' => 'Laravel', 'slug' => 'laravel', 'description' => 'Laravel is a sophisticated PHP framework that offers elegant syntax, powerful features, and a developer-friendly ecosystem for building modern web applications.'],
            ['name' => 'CodeIgniter', 'slug' => 'codeigniter', 'description' => 'CodeIgniter is a lightweight yet robust PHP framework, ideal for developers seeking an efficient toolkit to create full-featured web applications with ease.'],
            ['name' => 'Vue.js', 'slug' => 'vuejs', 'description' => 'Vue.js is a progressive JavaScript framework that empowers developers to build interactive and dynamic user interfaces for web applications with minimal effort.'],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'description' => 'JavaScript is a versatile programming language widely used to create dynamic web pages and enhance user interactivity by manipulating HTML and CSS.'],
            ['name' => 'Unity', 'slug' => 'unity', 'description' => 'Unity is a powerful cross-platform game engine that empowers game developers to create immersive and visually stunning experiences across various devices and platforms.'],
            ['name' => 'C#', 'slug' => 'c-sharp', 'description' => 'C# is a versatile programming language with a strong type system, suitable for a wide range of application types, from web and desktop apps to games and enterprise software.'],
            ['name' => 'Svelte', 'slug' => 'svelte', 'description' => 'Svelte is an innovative front-end compiler that enables developers to build high-performance web applications by compiling components into optimized JavaScript code during build time.'],
            ['name' => 'Docker', 'slug' => 'docker', 'description' => 'Docker is a containerization platform that simplifies software deployment by packaging applications and their dependencies into isolated containers, ensuring consistency across various environments.'],
            ['name' => 'DevOps', 'slug' => 'devops', 'description' => 'DevOps is a culture and set of practices that aim to bridge the gap between development and IT operations, focusing on collaboration, automation, and continuous improvement to deliver software faster and more reliably.'],
            ['name' => 'Linux', 'slug' => 'linux', 'description' => 'Linux is an open-source operating system that powers millions of servers and devices worldwide, known for its stability, security, and flexibility.'],
            ['name' => 'Git', 'slug' => 'git', 'description' => 'Git is a distributed version control system that tracks changes in code, enabling developers to collaborate on projects and manage codebases effectively.'],
            ['name' => 'Windows', 'slug' => 'windows', 'description' => 'Windows is a popular operating system that powers millions of personal computers worldwide, known for its user-friendly interface and compatibility with a wide range of software and hardware.'],
            ['name' => 'MacOS', 'slug' => 'macos', 'description' => 'MacOS is the proprietary operating system developed by Apple Inc. for its Macintosh line of computers, known for its sleek design, user-friendly interface, and powerful performance.'],
            ['name' => 'API', 'slug' => 'api', 'description' => 'API is an acronym for Application Programming Interface, which is a set of protocols, routines, and tools for building software applications. APIs enable different software components to communicate with each other, facilitating the integration of diverse systems and services.'],
            ['name' => 'TransformersPHP', 'slug' => 'transformersphp', 'description' => 'TransformersPHP is a powerful PHP library that simplifies the process of integrating AI models into your applications, providing a simple and intuitive interface for working with complex machine learning models.'],
            ['name' => 'ML', 'slug' => 'ml', 'description' => 'ML is an acronym for Machine Learning, which is a subset of artificial intelligence that focuses on enabling machines to learn from data and make predictions or decisions without being explicitly programmed.'],
            ['name' => 'AI', 'slug' => 'ai', 'description' => 'AI is an acronym for Artificial Intelligence, which refers to the simulation of human intelligence in machines that are programmed to think and learn like humans.'],
            ['name' => 'Livewire', 'slug' => 'livewire', 'description' => 'Livewire is a full-stack framework for Laravel that enables developers to build dynamic and interactive web applications with minimal effort, using a reactive programming model.'],
            ['name' => 'Filament', 'slug' => 'filament', 'description' => 'Filament is a modern and elegant admin panel framework for Laravel that simplifies the process of building powerful and customizable admin interfaces.'],
            ['name' => 'TailwindCSS', 'slug' => 'tailwindcss', 'description' => 'TailwindCSS is a utility-first CSS framework that empowers developers to build custom designs with a highly customizable and responsive approach.'],
        ];  

        Tag::insert($tags);
    }
}
