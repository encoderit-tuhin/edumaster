<?php

namespace Database\Seeders;

use App\SmsBalance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmsTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Sliders
        DB::table('sms_templates')->insert([
            [
                'name' => 'Exam Notice	',
                'description' => 'Annual exam will be held on pls collect your admit card',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Headmaster	',
                'description' => 'সম্মানিত অভিভাবকগণ আপনাদের অবগতির জন্য জানানো যাচ্ছে যে আগামীকাল বিদ্যালয় বন্ধ থাকবে	',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Holiday Notice',
                'description' => 'Kindly note that the school will remain closed on 14th & 15th April 16 for the Occasion of Pohela Boishakh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'name' => 'Urgent Meeting	',
                'description' => 'Dear Teacher, An Urgent Meeting will held on Today at 5.30pm. Please Attend on Just Time. Principal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'name' => 'অভিভাবক সমাবেশ		',
                'description' => 'সম্মানিত অভিভাবক মহোদয় আগামী 24/05/2023 বিদ্যালয়ে অভিভাবক সমাবেশে আয়োজন করা হয়েছে উক্ত সমাবেশে আপনার উপস্থতিতে একান্ত কাম্য ঘোষণা করছি',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'name' => ' উপস্থিত		',
                'description' => 'আপনার সন্তান আজ উপস্থিত হয়নি	',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
        DB::table('phone_book_categories')->insert([
            
                [
                    'name' => 'Student',
                    'description' => 'Student',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Teacher',
                    'description' => 'Teacher',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Family',
                    'description' => 'Family',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'VIP',
                    'description' => 'VIP',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Director',
                    'description' => 'Director',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Shareholder',
                    'description' => 'Shareholder',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Other School Teacher',
                    'description' => 'Other School Teacher',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Chairman',
                    'description' => 'Chairman',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            
            


        ]);
        SmsBalance::create(['masking_balance'=>0,'non_masking_balance'=>0]);
        
    }
}
