<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => 'إطلاق برنامج "حفظك نور"',
            'slug' => Str::slug('إطلاق برنامج "حفظك نور"', '-') . '-' . $this->faker->unique()->numberBetween(1, 1000),
            'short_description' => 'أعلنت المنصة عن إطلاق برنامج "حفظك نور" الجديد، الذي يهدف إلى مساعدة الطلاب على حفظ القرآن بسهولة',
            'description' => 'أعلنت الجمعية الخيرية لتحفيظ القرآن الكريم اليوم عن إطلاق مبادرتها الجديدة الرائدة "نور الأجيال"، التي تهدف إلى توفير فرص حفظ ومراجعة القرآن الكريم عن بعد باستخدام أحدث التقنيات التعليمية.

تستهدف المبادرة جميع الفئات العمرية داخل وخارج المملكة، مع التركيز على المناطق التي تفتقر إلى مراكز تحفيظ تقليدية. توفر المبادرة منصة إلكترونية متكاملة مع معلمين مؤهلين، وجدول زمني مرن، ومستويات مختلفة للمبتدئين والمتقدمين، بالإضافة إلى برامج إجازة بالسند المتصل.

من المتوقع أن تساهم هذه المبادرة في خدمة آلاف الطلاب وتعزيز اللغة العربية، ويدعو القائمون على المبادرة جميع المهتمين للتسجيل والمشاركة.',
            'description_2' => 'الكلمات الدلالية: أخبار، اقتصاد، تنمية، محافظة',
            'address' => 'المدينة المنورة',
        ];
    }

    public function withMedia(): Factory
    {
        return $this->afterCreating(function (News $news) {
            // استخدام صورة من newsImage01.png إلى newsImage05.png بشكل دوري
            $imageNumber = (($news->id - 1) % 5) + 1;
            $sourcePath = public_path("frontend/assets/img/newsImage0{$imageNumber}.png");
            
            if (file_exists($sourcePath)) {
                $destinationPath = public_path("frontend/assets/img/news-{$news->id}-temp.png");
                copy($sourcePath, $destinationPath);
            }
            
            if (file_exists($sourcePath) && file_exists($destinationPath)) {
                $news->addMedia($destinationPath)->toMediaCollection('photo');
            }
            
            // صورة داخلية للتفاصيل
            $sourcePath2 = public_path("frontend/assets/img/news-detail.jpg");
            if (file_exists($sourcePath2)) {
                $destinationPath2 = public_path("frontend/assets/img/news-inside-{$news->id}-temp.jpg");
                copy($sourcePath2, $destinationPath2);
            }
            if (file_exists($sourcePath2) && file_exists($destinationPath2)) {
                $news->addMedia($destinationPath2)->toMediaCollection('inside_image');
            }
        });
    }
}

