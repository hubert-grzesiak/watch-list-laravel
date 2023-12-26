<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsletterSubscriber;
class NewsletterSubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscribersRecords = [
            ['id'=>1,'email'=>'abc100@gmail.com','status'=>1],
            ['id'=>2,'email'=>'abc200@gmail.com','status'=>1],
        ];
    NewsletterSubscriber::insert($subscribersRecords);
    }
}
