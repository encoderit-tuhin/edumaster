<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    
    public function run(): void
    {
        $books = [
            [
                'name' => 'ফিন্যান্স ১ম পত্র',
                'code' => '000178',
                'author' => 'মোহাম্মদ আখতার হোসেন',
            ],
            [
                'name' => 'ভূগোল',
                'code' => '000201',
                'author' => 'প্রফেসর. ড. এস. এম. আশফাক হোসেন',
            ],
            [
                'name' => 'উচ্চ মাধ্যমিক ব্যবসায় নীতি ও প্রয়োগ ব্যাংকিং ও বীমা',
                'code' => '000028',
                'author' => 'মো: ইসমাইল কাজী',
            ],
            [
                'name' => 'ফিন্যান্স ব্যকিং ও বীমা ১ম পত্র',
                'code' => '000030',
                'author' => 'মোহাম্মদ  রেজাউল করিম',
            ],
            [
                'name' => 'গাণিতিক পদার্থবিজ্ঞান ১ম পত্র',
                'code' => '000158',
                'author' => 'মো: খালিকুর রহমান',
            ],


            [
                'name' => 'হিসাব বিজ্ঞান ১ম ও ২য় পত্র',
                'code' => '000167',
                'author' => 'মো: খলিলুর রহমান',
            ],
            [
                'name' => 'জীববিজ্ঞান',
                'code' => '000171',
                'author' => 'প্রফেসর মো: আজিজুর রহমান',
            ],
            [
                'name' => 'জীববিজ্ঞান ১ম পত্র',
                'code' => '000173',
                'author' => 'প্রফেসর মো: আজিজুর রহমান',
            ],
            [
                'name' => 'সৃজনশীল জীববিজ্ঞান',
                'code' => '000175',
                'author' => 'মমতাজ বেগম',
            ],

            [
                'name' => 'পরিসংখ্যান',
                'code' => '000179',
                'author' => 'আহ্মেদ তৌফিক হাসান',
            ],
            [
                'name' => 'পৌরনীতি ও সুশাসন',
                'code' => '000187',
                'author' => 'ড. মোহাম্মদ আব্দুল ওদুদ ভূঁইয়া',
            ],
            [
                'name' => 'সৃঝনশীল ভুগোল',
                'code' => '000197',
                'author' => 'মো: এনামুল কবির মিয়া',
            ],
             [
                'name' => 'ফিন্যান্স ব্যাকিং ও বীমা',
                'code' => '000215',
                'author' => 'মো: জিয়াউল হুদা',
            ],

            [
                'name' => 'ব্যাবসায় সংগঠন ও ব্যাবস্থপনা',
                'code' => '000224',
                'author' => 'শাহ রিদওয়ান চৌধুরী',
            ],
             [
                'name' => 'হিসাববিজ্ঞান',
                'code' => '000235',
                'author' => 'মো: বশির আহমেদ',
            ],

            [
                'name' => 'হিসাববিজ্ঞান ১ম পত্র',
                'code' => '000239',
                'author' => 'মোহাম্মদ জাকির হোসেন',
            ],
            [
                'name' => 'বাংলা ব্যাকরণ ও রচনা',
                'code' => '000242',
                'author' => 'একে এম. আবুল হোসেন',
            ],
            [
                'name' => 'বাংলা ১ম পত্র সৃজন',
                'code' => '000244',
                'author' => 'একে এম. আবুল হোসেন',
            ],
            [
                'name' => "Young Learner’s publication comonegetive English Model Question",
                'code' => '000248',
                'author' => 'Md Jamal Hossain',
            ],

            [
                'name' => 'NOTES ON ENG FOR TODAY',
                'code' => '000252',
                'author' => 'Jakir Ismail',
            ],
            [
                'name' => 'ইতিহাস',
                'code' => '000256',
                'author' => 'মো: মিজানুর রহমান',
            ],
        ];

        foreach ($books as $book) {
            DB::table('books')->insert([
                'name' => $book['name'],
                'code' => $book['code'],
                'author' => $book['author'],
                'category_id' => 1, 
                'publisher' => "Test2",
                'rack_no' => 1,
                'quantity' => 10,
                'description' => $book['name'],
                'publish_date' => "2022-11-11",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $bookCategories = [
            [
                'name' => 'Fiction',
            ],
            [
                'name' => 'Science Fiction',
            ],
            [
                'name' => 'Mystery',
            ],
            [
                'name' => 'Non-Fiction',
            ],
            [
                'name' => 'Fantasy',
            ],
        ];

        foreach ($bookCategories as $bookCategory) {
            DB::table('book_categories')->insert([
                'category_name' => $bookCategory['name'],

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
