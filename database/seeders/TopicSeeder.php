<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        Topic::create(['name' => 'Git']);
        Topic::create(['name' => 'Cybersecurity']);
        Topic::create(['name' => 'PhpStorm']);
        Topic::create(['name' => 'Filament']);
        Topic::create(['name' => 'Databases']);
        Topic::create(['name' => 'Eloquent ORM']);

        DB::table('item_topic')->delete();

        DB::table('item_topic')->insert([
            [
                'item_id' => 1,
                'topic_id' => 1,
            ],
            [
                'item_id' => 2,
                'topic_id' => 1,
            ],
            [
                'item_id' => 3,
                'topic_id' => 1,
            ],
            [
                'item_id' => 3,
                'topic_id' => 9,
            ],
            [
                'item_id' => 4,
                'topic_id' => 1,
            ],
            [
                'item_id' => 5,
                'topic_id' => 1,
            ],
            [
                'item_id' => 5,
                'topic_id' => 9,
            ],
            [
                'item_id' => 329,
                'topic_id' => 1,
            ],
            [
                'item_id' => 330,
                'topic_id' => 5,
            ],
            [
                'item_id' => 331,
                'topic_id' => 3,
            ],
            [
                'item_id' => 332,
                'topic_id' => 1,
            ],
            [
                'item_id' => 333,
                'topic_id' => 1,
            ],
            [
                'item_id' => 334,
                'topic_id' => 6,
            ],
            [
                'item_id' => 335,
                'topic_id' => 1,
            ],
            [
                'item_id' => 336,
                'topic_id' => 7,
            ],
            [
                'item_id' => 337,
                'topic_id' => 1,
            ],
            [
                'item_id' => 338,
                'topic_id' => 1,
            ],
            [
                'item_id' => 339,
                'topic_id' => 1,
            ],
            [
                'item_id' => 340,
                'topic_id' => 1,
            ],
            [
                'item_id' => 340,
                'topic_id' => 5,
            ],
            [
                'item_id' => 341,
                'topic_id' => 8,
            ],
        ]);
    }
}
