<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $post = new Post();

        $post->title = 'Post 1';
        $post->create_date = '2020-02-10';
        $post->publi_date = '2020-02-10';
        $post->options = json_encode(['Caducable']);
        $post->extract = 'Extract 1';
        $post->content = 'Content 1';
        $post->access = true;
        $post->user_id = 1;
        $post->save();

        DB::table('posts')->insert([
            'title' => 'Post 2',
            'create_date' => '2020-02-10',
            'publi_date' => '2020-02-10',
            'options' => json_encode(['Caducable']),
            'extract' => 'Extract 2',
            'content' => 'Content 2',
            'access' => false,
            'user_id' => 1,
        ]);


    }
}
