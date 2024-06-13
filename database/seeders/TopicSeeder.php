<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topic::create(['name' => 'Laravel']);
        Topic::create(['name' => 'Livewire']);
        Topic::create(['name' => 'SQL']);
        Topic::create(['name' => 'DevOps']);
        Topic::create(['name' => 'Frontend']);
    }
}
