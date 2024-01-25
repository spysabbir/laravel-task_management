<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create demo tasks associated with the demo user
        $user = DB::table('users')->where('email', 'sabbir@email.com')->first();

        DB::table('tasks')->insert([
            'user_id' => $user->id,
            'title' => 'Task 1',
            'description' => 'This is the description for Task 1.',
            'due_date' => now()->addDays(7)->toDateString(),
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tasks')->insert([
            'user_id' => $user->id,
            'title' => 'Task 2',
            'description' => 'This is the description for Task 2.',
            'due_date' => now()->addDays(14)->toDateString(),
            'status' => 'completed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
