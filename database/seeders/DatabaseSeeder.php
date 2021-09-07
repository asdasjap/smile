<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Question::truncate();
        // \App\Models\User::factory(10)->create();
        \App\Models\Question::create(['question' => 'In the last month, how often have you been upset because of something that happened unexpectedly?', 'reverse' => false]);
        \App\Models\Question::create(['question' => 'In the last month, how often have you felt that you were unable to control the important things in your life?', 'reverse' => false]);
        \App\Models\Question::create(['question' => 'In the last month, how often have you felt nervous and stressed?', 'reverse' => false]);
        \App\Models\Question::create(['question' => 'In the last month, how often have you felt confident about your ability to handle your personal problems?', 'reverse' => true]);
        \App\Models\Question::create(['question' => 'In the last month, how often have you felt that things were going your way?', 'reverse' => true]);
        \App\Models\Question::create(['question' => 'In the last month, how often have you found that you could not cope with all the things that you had to do?', 'reverse' => false]);
        \App\Models\Question::create(['question' => 'In the last month, how often have you been able to control irritations in your life?', 'reverse' => true]);
        \App\Models\Question::create(['question' => 'In the last month, how often have you felt that you were on top of things?', 'reverse' => true]);
        \App\Models\Question::create(['question' => 'In the last month, how often have you been angered because of things that happened that were outside of your control?', 'reverse' => false]);
        \App\Models\Question::create(['question' => 'In the last month, how often have you felt difficulties were piling up so high that you could not overcome them?', 'reverse' => false]);
        

    }
}
