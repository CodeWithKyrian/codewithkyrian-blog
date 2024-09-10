<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\info;
use function Laravel\Prompts\intro;
use function Laravel\Prompts\note;
use function Laravel\Prompts\outro;

class CleanupPostImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:cleanup-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up unused images from the post-images disk';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        intro('Starting post images cleanup...');

        // Get all images from the post-images disk
        $allImages = Storage::disk('post-images')->files();

        // Get all used images from post bodies
        $usedImages = Post::pluck('body')
            ->flatMap(function ($body) {
                preg_match_all('/!\[.*?\]\((.*?)\)/', $body, $matches);
                return $matches[1];
            })
            ->map(function ($path) {
                return basename($path);
            })
            ->unique()
            ->values()
            ->toArray();

        // Find unused images
        $unusedImages = array_diff($allImages, $usedImages);

        // Delete unused images
        foreach ($unusedImages as $image) {
            Storage::disk('post-images')->delete($image);
            info("Deleted unused image: {$image}");
        }

        note(count($unusedImages) . ' unused images were deleted.');
        
        outro('Post images cleanup completed.');
    }
}
