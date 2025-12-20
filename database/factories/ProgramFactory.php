<?php

namespace Database\Factories;

use App\Models\Program;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition(): array
    {
        $category = Category::firstOrCreate(
            ['title' => 'البرامج التربوية والسلوكية المساندة'],
            ['short_description' => 'برامج تربوية وسلوكية مساندة لتحفيظ القرآن الكريم']
        );

        return [
            'title' => 'برامج تحفيظ القرآن الكريم',
            'slug' => Str::slug('برامج تحفيظ القرآن الكريم', '-') . '-' . $this->faker->unique()->numberBetween(1, 1000),
            'short_description' => 'مبادرة تابعة لجمعية تحفيظ القرآن - برنامج مجتمعي',
            'description' => 'تهدف هذه المبادرة إلى تعزيز ارتباط الأطفال بكتاب الله من خلال توفير بيئة تعليمية آمنة وممتعة تعتمد على أساليب تربوية حديثة تعزز الحفظ والفهم معاً. يتم التركيز على بناء شخصية الطفل أخلاقياً وروحياً بما يتناسب مع تعاليم القرآن الكريم، إضافة إلى تنمية مهاراتهم في التلاوة الصحيحة والتجويد. تسعى المبادرة أيضاً إلى إشراك الأسرة في عملية التعلم، وتقديم دعم مستمر للطلاب من خلال حصص فردية، مسابقات، تحفيز وجوائز، ونظام متابعة يساعد على قياس تقدم كل مشارك بشكل دوري.',
            'description_2' => 'الجدول الزمني:
الأسبوع الأول: تسجيل وتقييم المستويات
الشهر الأول: بدء الحلقات وتوزيع المواد
كل 3 أشهر: اختبارات ومراجعات عامة

المكان: المركز الرئيسي
المدة: مستمرة

أهداف المبادرة:
• تنمية حب القرآن لدى الأطفال
• تثبيت الحفظ بطرق تربوية
• الدعم بالوسائل التعليمية والجوائز
• تأهيل معلمين متخصصين',
            'category_id' => $category->id,
            'group' => 'mix',
        ];
    }

    public function withMedia(): Factory
    {
        return $this->afterCreating(function (Program $program) {
            $imageNumber = (($program->id - 1) % 7) + 1;
            $sourcePath = public_path("frontend/assets/img/program0{$imageNumber}.png");
            
            if (file_exists($sourcePath)) {
                $destinationPath = public_path("frontend/assets/img/program-{$program->id}-temp.png");
                copy($sourcePath, $destinationPath);
            }
            
            if (file_exists($sourcePath) && file_exists($destinationPath)) {
                $program->addMedia($destinationPath)->toMediaCollection('photo');
            }
            $sourcePath = public_path("frontend/assets/img/program.jpg");
            if (file_exists($sourcePath)) {
                $destinationPath = public_path("frontend/assets/img/program-inside-temp.jpg");
                copy($sourcePath, $destinationPath);
            }
            if (file_exists($sourcePath) && file_exists($destinationPath)) {
                $program->addMedia($destinationPath)->toMediaCollection('inside_image');
            }
        });
    }
}

