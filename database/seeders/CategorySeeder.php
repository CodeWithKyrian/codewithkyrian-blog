<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title' => 'Guides & Tutorials',
            'description' => 'Embark on insightful journeys with our in-depth guides and tutorials. Explore step-by-step instructions, thoughtfully curated to help you master a diverse range of tech subjects.',
        ]);

        Category::create([
            'title' => 'Newsletter Updates',
            'description' => 'Stay in the loop with our carefully curated newsletter updates. Receive a steady stream of the latest tech insights and industry news, directly delivered to your inbox.',
        ]);

        Category::create([
            'title' => 'Tech News',
            'description' => 'Dive into the dynamic world of technology through my unbiased tech news coverage. Gain insights into groundbreaking advancements, product launches, and in-depth industry analyses.',
        ]);

        Category::create([
            'title' => 'Quick Tips',
            'description' => 'Boost your skills with my quick tips, offering actionable advice to enhance your productivity and proficiency. These concise tips are designed to fit seamlessly into your busy tech journey.',
        ]);

        Category::create([
            'title' => 'Product Reviews',
            'description' => 'Make confident decisions with my detailed product reviews, where I provide an unbiased evaluation of tech products, tools, and services to help you navigate the ever-evolving tech landscape.',
        ]);

        Category::create([
            'title' => 'Opinions & Insights',
            'description' => 'Engage in thought-provoking discussions with my candid opinions and insightful analyses on tech subjects. Join me in exploring different perspectives and deepening our understanding together.',
        ]);

        Category::create([
            'title' => 'Expert Interviews',
            'description' => 'Gain exclusive insights through interviews with industry experts. Join me as I converse with thought leaders, innovators, and influencers who are shaping the future of technology.',
        ]);

        Category::create([
            'title' => 'Miscellaneous',
            'description' => 'Venture beyond conventional categories with me and explore the uncharted territories of tech. Discover unexpected insights, intriguing perspectives, and delightful surprises that lie beyond the surface.',
        ]);

        $series = Category::create([
            'title' => 'Tutorial Series',
            'description' => 'Embark on a personalized learning journey with my tutorial series. Dive into in-depth guides thoughtfully organized into parts, designed to provide you with a comprehensive understanding of tech topics.',
        ]);

        $series->children()->createMany([
            ['title' => 'PHP Basics', 'description' => 'Join me as I guide you through the foundations of PHP programming in this beginner-friendly tutorial series. Explore essential concepts and hands-on exercises that will empower you to code with confidence.'],
            ['title' => 'Advanced Laravel', 'description' => "Elevate your Laravel expertise with my advanced tutorial series. Together, we'll explore intricate techniques, industry best practices, and real - world applications that will take your web development skills to the next level . "],
            ['title' => 'Mastering Vue.js', 'description' => "Embark on a Vue . js journey with me through this comprehensive tutorial series . From mastering components to diving into routing and state management, we'll delve into every facet of Vue.js development together."],
            ['title' => 'Docker Fundamentals', 'description' => 'Explore Docker with me in this tutorial series designed to demystify containerization. Discover the essentials of Docker and practical use cases that will enable you to optimize your development environment with ease.'],
        ]);
    }
}
