<?php

namespace Database\Seeders;

use App\Enums\ProjectType;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $openSourceProjects = [
            [
                'name' => 'TransformersPHP',
                'description' => 'State-of-the-art Machine Learning for PHP. This library brings the power of Hugging Face\'s Transformers to PHP, enabling tasks like text generation, summarization, and translation with thousands of pre-trained models.',
                'url' => 'https://github.com/CodeWithKyrian/transformers-php',
                'icon' => 'si-huggingface',
                'technologies' => ['PHP'],
                'meta' => [
                    'badges' => [
                        ['label' => 'Downloads', 'value' => '10k+', 'color' => 'bg-blue-500'],
                        ['label' => 'Version', 'value' => '1.0.0', 'color' => 'bg-green-500'],
                        ['label' => 'License', 'value' => 'MIT', 'color' => 'bg-purple-500'],
                        ['label' => 'Repo Size', 'value' => '5 MB', 'color' => 'bg-orange-500'],
                    ],
                ],
                'type' => ProjectType::OPEN_SOURCE,
            ],
            [
                'name' => 'ChromaDB PHP',
                'description' => 'A PHP library for seamless interaction with Chroma vector database. It enables storing, searching, and analyzing high-dimensional data at scale, perfect for building LLM applications.',
                'url' => 'https://github.com/CodeWithKyrian/chroma-php',
                'icon' => 'si-php',
                'technologies' => ['PHP'],
                'meta' => [
                    'badges' => [
                        ['label' => 'Downloads', 'value' => '1k+', 'color' => 'bg-blue-500'],
                        ['label' => 'Version', 'value' => '1.0.0', 'color' => 'bg-green-500'],
                        ['label' => 'License', 'value' => 'MIT', 'color' => 'bg-purple-500'],
                        ['label' => 'Repo Size', 'value' => '2 MB', 'color' => 'bg-orange-500'],
                    ],
                ],
                'type' => ProjectType::OPEN_SOURCE,
            ],
        ];

        foreach ($openSourceProjects as $project) {
            Project::create($project);
        }

        $regularProjects = [
            [
                'name' => 'CodeWithKyrian',
                'description' => 'An educational platform for learning programming, featuring a sleek dark mode theme for comfortable reading, advanced code highlighting for better readability, and a robust comment system that fosters community engagement.',
                'technologies' => ['Laravel', 'Vue.js', 'Tailwind CSS'],
                'url' => 'https://codewithkyrian.com',
                'type' => ProjectType::REGULAR,
            ],
            [
                'name' => 'Vitani Farms',
                'description' => 'A feature-rich e-commerce platform using Laravel,  featuring a seamless frontend and backend integration, an intuitive user interface to boost conversion and a secure payment gateway for smooth transactions.',
                'technologies' => ['Laravel', 'Livewire'],
                'url' => 'https://vitanifarms.com/',
                'type' => ProjectType::REGULAR,
            ],
            [
                'name' => "St Peter's School Achina",
                'description' => 'A comprehensive school management web application with Laravel and Vue.js, featuring student and result management system, bulk ID card printing, CBT platform for school entrance exams and class promotion management.',
                'technologies' => ['Laravel', 'Vue.js', 'Tailwind'],
                'url' => 'https://stpetersschoolachina.com/',
                'type' => ProjectType::REGULAR,
            ],
            [
                'name' => 'Quizland (Personal)',
                'description' => 'An online Computer-Based Testing (CBT) platform using Laravel and Vue.js with a flexible question bank system, customizable exam creating parameters and cross-platform compatibility using Capacitor and Electron.',
                'technologies' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'Capacitor', 'Electron'],
                'url' => 'https://github.com/CodeWithKyrian/quizland',
                'type' => ProjectType::REGULAR,
            ],
        ];

        foreach ($regularProjects as $project) {
            Project::create($project);
        }
    }
}
