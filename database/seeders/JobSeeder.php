<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'مصمم جرافيك',
                'description' => 'نبحث عن مصمم جرافيك مبدع ومتمكن من أدوات التصميم الحديثة لإنشاء محتوى بصري جذاب للمؤسسة.',
            ],
            [
                'title' => 'محفظ قرآن',
                'description' => 'نبحث عن محفظ قرآن كريم متقن للتلاوة والتجويد، لديه خبرة في تعليم وتحفيظ القرآن الكريم.',
            ],
            [
                'title' => 'محاسب',
                'description' => 'نبحث عن محاسب محترف لديه خبرة في إدارة الحسابات والقيود المالية والمسؤوليات المحاسبية.',
            ],
            [
                'title' => 'مدير مشاريع',
                'description' => 'نبحث عن مدير مشاريع ذو خبرة في تخطيط وتنفيذ وإدارة المشاريع بكفاءة عالية.',
            ],
        ];

        foreach ($jobs as $job) {
            Job::updateOrCreate(
                ['title' => $job['title']],
                $job
            );
        }
    }
}
