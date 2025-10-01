<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               DB::table('skills')->insert([
            [
                'id' => 1,
                'name' => 'PHP',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:29:18'),
                'updated_at' => Carbon::parse('2025-09-25 03:29:18'),
            ],
            [
                'id' => 2,
                'name' => 'HTML',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:29:28'),
                'updated_at' => Carbon::parse('2025-09-25 03:29:28'),
            ],
            [
                'id' => 3,
                'name' => 'CSS',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:29:36'),
                'updated_at' => Carbon::parse('2025-09-25 03:29:36'),
            ],
            [
                'id' => 4,
                'name' => 'Javascript',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:29:45'),
                'updated_at' => Carbon::parse('2025-09-25 03:29:45'),
            ],
            [
                'id' => 5,
                'name' => 'Laravel',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:31:28'),
                'updated_at' => Carbon::parse('2025-09-25 03:31:28'),
            ],
            [
                'id' => 6,
                'name' => 'CodeIgniter',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:31:39'),
                'updated_at' => Carbon::parse('2025-09-25 03:31:39'),
            ],
            [
                'id' => 7,
                'name' => 'MySQL',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:31:51'),
                'updated_at' => Carbon::parse('2025-09-25 03:31:51'),
            ],
            [
                'id' => 8,
                'name' => 'NoSQL',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:32:01'),
                'updated_at' => Carbon::parse('2025-09-25 03:32:01'),
            ],
            [
                'id' => 9,
                'name' => 'postgreSQL',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:32:24'),
                'updated_at' => Carbon::parse('2025-09-25 03:32:24'),
            ],
            [
                'id' => 10,
                'name' => 'ExpressJS',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:32:35'),
                'updated_at' => Carbon::parse('2025-09-25 03:32:35'),
            ],
            [
                'id' => 11,
                'name' => 'NodeJS',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:32:47'),
                'updated_at' => Carbon::parse('2025-09-25 03:32:47'),
            ],
            [
                'id' => 12,
                'name' => 'NextJS',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:32:55'),
                'updated_at' => Carbon::parse('2025-09-25 03:32:55'),
            ],
            [
                'id' => 13,
                'name' => 'MVC',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:33:21'),
                'updated_at' => Carbon::parse('2025-09-25 03:33:29'),
            ],
            [
                'id' => 14,
                'name' => 'AWS (Amazone Web Service)',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:39:57'),
                'updated_at' => Carbon::parse('2025-09-25 03:39:57'),
            ],
            [
                'id' => 15,
                'name' => 'API',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:42:39'),
                'updated_at' => Carbon::parse('2025-09-25 03:42:39'),
            ],
            [
                'id' => 16,
                'name' => 'JQuery',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:42:50'),
                'updated_at' => Carbon::parse('2025-09-25 03:42:50'),
            ],
            [
                'id' => 17,
                'name' => 'AJAX',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:42:56'),
                'updated_at' => Carbon::parse('2025-09-25 03:42:56'),
            ],
            [
                'id' => 18,
                'name' => 'Bootstrap',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:46:23'),
                'updated_at' => Carbon::parse('2025-09-25 03:46:23'),
            ],
            [
                'id' => 19,
                'name' => 'MongoDB',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:46:30'),
                'updated_at' => Carbon::parse('2025-09-25 03:46:30'),
            ],
            [
                'id' => 20,
                'name' => 'Figma',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:46:39'),
                'updated_at' => Carbon::parse('2025-09-25 03:46:39'),
            ],
            [
                'id' => 21,
                'name' => 'Windows',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:47:05'),
                'updated_at' => Carbon::parse('2025-09-25 03:47:15'),
            ],
            [
                'id' => 22,
                'name' => 'Linux',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:47:25'),
                'updated_at' => Carbon::parse('2025-09-25 03:47:25'),
            ],
            [
                'id' => 23,
                'name' => 'Google Analytics',
                'description' => null,
                'created_at' => Carbon::parse('2025-09-25 03:47:42'),
                'updated_at' => Carbon::parse('2025-09-25 03:47:42'),
            ],
        ]);
    }
}
