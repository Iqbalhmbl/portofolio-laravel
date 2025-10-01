<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExperiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experiences')->insert([
            [
                'id' => 1,
                'created_at' => Carbon::parse('2025-09-25 03:51:36'),
                'updated_at' => Carbon::parse('2025-09-29 09:04:19'),
                'title' => 'Web Developer (Internship)',
                'company' => 'PT. Vaganza Solusi Internasional',
                'start_date' => '2021-01-01',
                'end_date' => '2021-03-01',
                'description' => '<p>● Developing features to enhance the user experience.</p>
                                  <p>● Involved into discussion with stakeholders.</p>
                                  <p>● Testing and deploying programs and systems.</p>',
            ],
            [
                'id' => 2,
                'created_at' => Carbon::parse('2025-09-25 03:53:55'),
                'updated_at' => Carbon::parse('2025-09-29 09:04:53'),
                'title' => 'Full Stack Developer | Project Manager',
                'company' => 'PT. Vaganza Solusi Internasional',
                'start_date' => '2022-01-01',
                'end_date' => '2025-07-01',
                'description' => '<p>● Coordinated and managed IT department activities.</p>
                                  <p>● Acted as the person-in-charge for multiple projects, overseeing project direction and execution.</p>
                                  <p>● Developed internal and services websites on both the Front End and Server side.</p>
                                  <p>● Conducted testing and deployed completed tasks.</p>
                                  <p>● Managed server configurations and calculated server expenditures.</p>
                                  <p>● Designed, developed, and maintained dynamic web applications using modern web technologies.</p>
                                  <p>● Built frontend interfaces for multiple projects using Vue.js, Next.js, Bootstrap, HTML, CSS, JavaScript, AJAX, and jQuery, enhancing user experience and responsiveness.</p>
                                  <p>● Developed backend services for several projects using Laravel (PHP), CodeIgniter, Golang, and Express.js (Node.js) to ensure robust and scalable server-side applications.</p>
                                  <p>● Managed databases, primarily using MySQL, while also implementing MongoDB and SQL Server for specific projects, optimizing data storage and retrieval efficiency.</p>
                                  <p>● Deployed and managed cloud infrastructure using AWS (EC2, S3, RDS) for optimal performance and scalability.</p>
                                  <p>● Ensured smooth project workflows by following Agile methodology and utilizing project management tools such as JIRA, and Notion.</p>
                                  <p>● Conducted performance optimization and debugging, improving system efficiency and resolving technical issues to maintain high system reliability.</p>',
            ],
            [
                'id' => 3,
                'created_at' => Carbon::parse('2025-09-25 04:00:42'),
                'updated_at' => Carbon::parse('2025-09-29 09:05:08'),
                'title' => 'Full Stack Developer (Freelancer)',
                'company' => 'Kapi Bytes',
                'start_date' => '2025-06-01',
                'end_date' => null,
                'description' => '<p>● Developed web applications using PHP Laravel, CSS, and Bootstrap, ensuring responsive and user-friendly interfaces.</p>
                                  <p>● Built mobile applications with Flutter, focusing on performance and smooth user experience.</p>
                                  <p>● Implemented AI-powered features to enhance automation and intelligent user interactions.</p>
                                  <p>● Designed software architecture to support scalable and maintainable application development.</p>',
            ],
        ]);
    }
}
