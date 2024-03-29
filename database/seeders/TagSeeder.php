<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $post_ids = Post::pluck('id')->toArray();

        $tags = [
            ['label' => 'HTML', 'color' => '#F1672B'],
            ['label' => 'CSS', 'color' => '#1572B6'],
            ['label' => 'JS', 'color' => '#f6ce48'],
            ['label' => 'Vue', 'color' => '#00bb7c'],
            ['label' => 'php', 'color' => '#4d588e'],
            ['label' => 'Laravel', 'color' => '#ce3232'],
            ['label' => 'SQL', 'color' => '#d47131'],
            ['label' => 'Bootstrap', 'color' => '#9163d5']
        ];

        foreach ($tags as $tag) {
            $new_tag = new Tag();

            $new_tag->label = $tag['label'];
            $new_tag->color = $tag['color'];

            $new_tag->save();

            $tag_posts = [];
            foreach ($post_ids as $post_id) {
                if (rand(0, 1)) $tag_posts[] = $post_id;
            }
            $new_tag->post()->attach($tag_posts);
        }
    }
}
