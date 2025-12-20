<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teamMembers = [
            [
                'name' => 'أ. أحمد سليمان',
                'position' => 'مدير البرامج',
                'description' => 'خبرة 10 سنوات في تطوير وإدارة المبادرات المجتمعية.',
            ],
            [
                'name' => 'د. رانيا عبدالعزيز',
                'position' => 'المدير التنفيذي',
                'description' => 'متخصصة في التخطيط الاستراتيجي وإدارة المؤسسات غير الربحية.',
            ],
            [
                'name' => 'م. كريم محمد',
                'position' => 'مسؤول التقنية',
                'description' => 'مسؤول عن التحول الرقمي وتطوير الأنظمة داخل الجمعية.',
            ],
            [
                'name' => 'أ. أحمد سليمان',
                'position' => 'مدير البرامج',
                'description' => 'خبرة 10 سنوات في تطوير وإدارة المبادرات المجتمعية.',
            ],
            [
                'name' => 'د. رانيا عبدالعزيز',
                'position' => 'المدير التنفيذي',
                'description' => 'متخصصة في التخطيط الاستراتيجي وإدارة المؤسسات غير الربحية.',
            ],
            [
                'name' => 'م. كريم محمد',
                'position' => 'مسؤول التقنية',
                'description' => 'مسؤول عن التحول الرقمي وتطوير الأنظمة داخل الجمعية.',
            ],
        ];

        foreach ($teamMembers as $member) {
            Team::create($member);
        }
    }
}

