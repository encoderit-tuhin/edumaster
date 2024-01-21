<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_categories')->insert([
            [
                'category' => 'News',
                'note' => null,
                'type' => 'post'
            ],
            [
                'category' => 'Event',
                'note' => null,
                'type' => 'post'
            ],
        ]);
        DB::table('posts')->insert([
            [
                'id' => 1,
                'slug' => 'sample-slug1',
                'post_type' => 'post',
                'post_status' => 'publish',
                'featured_image' => 'dymmy.jpg',
                'category_id' => 1,
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id' => 2,
                'slug' => 'sample-slug2',
                'post_type' => 'post',
                'post_status' => 'publish',
                'featured_image' => 'dymmy.jpg',
                'category_id' => 1,
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id' => 3,
                'slug' => 'sample-slug3',
                'post_type' => 'post',
                'post_status' => 'publish',
                'featured_image' => 'dymmy.jpg',
                'category_id' => 2,
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id' => 4,
                'slug' => 'sample-slug4',
                'post_type' => 'post',
                'post_status' => 'publish',
                'featured_image' => 'dymmy.jpg',
                'category_id' => 2,
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ],
        ]);

        DB::table('post_contents')->insert([
            [
                'id' => 1,
                'post_id' => 1,
                'post_title' => "বৈরী আবহাওয়ায় নবীনবরণ অনুষ্ঠানে উপস্থিতি প্রসঙ্গে",
                'post_content' => '<embed src="https://ndcm.edu.bd/public/attached_notice/notice480373.jpg">',
                'meta_data' => 'publish',
                'language' => 'en',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'post_id' => 2,
                'post_title' => "Re-Take exam results and 2nd year admission fee affairs",
                'post_content' => '<embed src="https://ndcm.edu.bd/public/attached_notice/notice996660.jpg">',
                'meta_data' => 'publish',
                'language' => 'en',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'post_id' => 3,
                'post_title' => "Test 3",
                'post_content' => 'The more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham',
                'meta_data' => 'publish',
                'language' => 'en',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'post_id' => 4,
                'post_title' => "Test 4",
                'post_content' => 'The more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham',
                'meta_data' => 'publish',
                'language' => 'en',

                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}