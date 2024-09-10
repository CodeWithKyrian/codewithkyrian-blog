<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();

        foreach ($categories as $category) {
            if ($category->slug === 'tutorial-series') {
                continue;
            }

            $post = Post::factory()->for($category)->create();

            $post->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());

            // Create 1 to 5 comments for each post
            $commentCount = rand(1, 5);
            for ($i = 0; $i < $commentCount; $i++) {
                $comment = Comment::factory()->create([
                    'post_id' => $post->id,
                    'user_id' => $users->random()->id,
                ]);

                // Randomly like the comment
                $this->randomlyLikeComment($comment, $users);

                // 30% chance of adding 1 to 3 replies to this comment
                if (rand(1, 100) <= 30) {
                    $replyCount = rand(1, 3);
                    for ($j = 0; $j < $replyCount; $j++) {
                        $reply = Comment::factory()->create([
                            'post_id' => $post->id,
                            'user_id' => $users->random()->id,
                            'parent_id' => $comment->id,
                        ]);

                        // Randomly like the reply
                        $this->randomlyLikeComment($reply, $users);
                    }
                }
            }
        }
    }

    /**
     * Randomly like a comment by random users.
     */
    private function randomlyLikeComment(Comment $comment, $users): void
    {
        $likeCount = rand(0, 10); // Random number of likes (0 to 10)
        $likers = $users->random($likeCount);

        foreach ($likers as $liker) {
            if (!$comment->isLikedBy($liker)) {
                $comment->like($liker);
            }
        }
    }
}
