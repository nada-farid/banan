<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Contact Information
            ['key' => 'phone', 'value' => '+966 56 860 4531'],
            ['key' => 'mobile', 'value' => '0568604531'],
            ['key' => 'email', 'value' => 'bnanalqranyt@gmail.com'],
            ['key' => 'address', 'value' => 'جدة - حي الصفا - شارع جبل سطيحه'],
            
            // Social Media
            ['key' => 'facebook_url', 'value' => ''],
            ['key' => 'twitter_url', 'value' => 'bnanalgranyt'],
            ['key' => 'instagram_url', 'value' => ''],
            ['key' => 'youtube_url', 'value' => ''],
            
            // Bank Accounts
            ['key' => 'bank_account_1', 'value' => 'SA376000010006084528554'],
            ['key' => 'bank_account_2', 'value' => 'SA8015000999145194150008'],
            
            // About Section
            ['key' => 'about_text', 'value' => 'هي مؤسسة خيرية حديثة النشأة تقع في محافظة جدة ؛ وتعني بتعليم كتاب الله الكريم لأبناء وبنات المسلمين ؛ وهي مسجلة بالمركز الوطني لتنمية القطاع غير الربحي برقم ( ١١٠.٥٢٣٧٠٠ ) وتاريخ (١٦-٠٦-١٤٤٦هـ ) وهي متخصصة في غرس تعظيم كتاب الله الكريم لدى المجتمع وتعليمه وذلك من خلال تقديم برامج نوعية ومناهج علمية'],
            
            // Organization Info
            ['key' => 'organization_name', 'value' => 'مؤسسة بنان'],
            ['key' => 'registration_number', 'value' => '١١٠.٥٢٣٧٠٠'],
            ['key' => 'registration_date', 'value' => '١٦-٠٦-١٤٤٦هـ'],
            
            // Statistics (for the numbers section) - حسب الفرونت (index.blade.php)
            ['key' => 'clients_count', 'value' => '250'],
            ['key' => 'lessons_count', 'value' => '200'],
            ['key' => 'teachers_count', 'value' => '150'],
            ['key' => 'certificates_count', 'value' => '500'],
            ['key' => 'initiatives_count', 'value' => '20'],
            ['key' => 'courses_count', 'value' => '20'],
            ['key' => 'vision_text', 'value' => 'تعليم القرآن الكريم لمختلف شرائح المجتمع بكوادر متميزة في التعليم والإشراف وبرامج نوعية وبيئة محفـ.زة'],
            ['key' => 'mission_text', 'value' => 'تعليم القرآن الكريم لمختلف شرائح المجتمع بكوادر متميزة في التعليم والإشراف وبرامج نوعية وبيئة محفـ.زة'],
            ['key' => 'values_text', 'value' => 'تعليم القرآن الكريم لمختلف شرائح المجتمع بكوادر متميزة في التعليم والإشراف وبرامج نوعية وبيئة محفـ.زة'],
            
            
            // Chairman Message (from manager.html)
            ['key' => 'chairman_message', 'value' => 'بسم الله الرحمن الرحيم،

يسعدني أن أرحب بكم في منصّة الجمعية، التي نسعى من خلالها إلى تحقيق رؤيتنا في تعزيز العمل المجتمعي، وتقديم خدمات نوعية تسهم في دعم الأفراد والأسر بطرق مستدامة وفعّالة.

نعمل على تطوير برامجنا ومبادراتنا بشكل مستمر، واضعين الشفافية والجودة والمسؤولية الاجتماعية على رأس أولوياتنا، مستندين إلى قيم راسخة تهدف إلى خدمة المجتمع وبناء مستقبل أفضل بإذن الله.

يسعدني أن أرحب بكم في منصّة الجمعية، التي نسعى من خلالها إلى تحقيق رؤيتنا في تعزيز العمل المجتمعي، وتقديم خدمات نوعية تسهم في دعم الأفراد والأسر بطرق مستدامة وفعّالة. نعمل على تطوير برامجنا ومبادراتنا بشكل مستمر، واضعين الشفافية والجودة والمسؤولية الاجتماعية على رأس أولوياتنا، مستندين إلى قيم راسخة تهدف إلى خدمة المجتمع وبناء مستقبل أفضل بإذن الله.'],
            ['key' => 'chairman_image', 'value' => 'frontend/assets/img/chairman.png'],
            ['key' => 'chairman_name', 'value' => 'رئيس مجلس الإدارة'],
            
            // License Information (from license.html)
            ['key' => 'license_certificate_image', 'value' => 'frontend/assets/img/certificate.png'],
            
            // Logo Settings
            ['key' => 'logo', 'value' => 'frontend/assets/img/logo.png'],
            ['key' => 'logo_footer', 'value' => 'frontend/assets/img/logo.png'],
        ];

        foreach ($settings as $setting) {
            // For JSON columns in MySQL, we need to store valid JSON
            // We'll encode the string value as a JSON string (which wraps it in quotes)
            $jsonValue = json_encode($setting['value'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            
            $exists = DB::table('settings')->where('key', $setting['key'])->exists();
            
            if ($exists) {
                DB::table('settings')
                    ->where('key', $setting['key'])
                    ->update([
                        'value' => $jsonValue,
                        'updated_at' => now(),
                    ]);
            } else {
                DB::table('settings')->insert([
                    'key' => $setting['key'],
                    'value' => $jsonValue,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    
}

