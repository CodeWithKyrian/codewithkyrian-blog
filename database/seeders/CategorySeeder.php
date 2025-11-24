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
            ['title' => 'Mastering Object Oriented Programming in PHP', 'description' => 'Get ready to dive into Object-Oriented Programming (OOP) in PHP! In this series, I\'ll show you how to use OOP in PHP in a way that\'s easy to understand. We\'ll explore classes, objects, inheritance, polymorphism, and so much more, so you can learn to create efficient and organized PHP code.'],
            ['title' => 'Machine Learning with TransformersPHP', 'description' => 'Machine learning inference tutorials using TranformersPHP'],
        ]);
    }
}
