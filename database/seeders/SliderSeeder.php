<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slider = Slider::create([
           'title' => '«خَيْرُكُمْ مَنْ تَعَلَّمَ الْقُرْآنَ وَعَلَّمَهُ»',
                'sub_title' => 'عن عثمان رضي الله عنه عن النبي صلى الله عليه وسلم قال:',

        ]);
        
        $sourcePath = public_path('frontend/assets/img/hero01.jpg');
        if(file_exists($sourcePath)){
            $destinationPath = public_path('frontend/assets/img/hero01-temp.jpg');
            copy($sourcePath, $destinationPath);
        } 
        if(file_exists($sourcePath) && file_exists($destinationPath)){
            $slider->addMedia($destinationPath)->toMediaCollection('image');
        }

        $slider = Slider::create([
            'title' => '«خَيْرُكُمْ مَنْ تَعَلَّمَ الْقُرْآنَ وَعَلَّمَهُ»',
            'sub_title' => 'عن عثمان رضي الله عنه عن النبي صلى الله عليه وسلم قال:',
        ]);
        
        $sourcePath = public_path('frontend/assets/img/hero02.jpg');
        if(file_exists($sourcePath)){
            $destinationPath = public_path('frontend/assets/img/hero02-temp.jpg');
            copy($sourcePath, $destinationPath);
        } 
        if(file_exists($sourcePath) && file_exists($destinationPath)){
            $slider->addMedia($destinationPath)->toMediaCollection('image');
        }

        $slider = Slider::create([
            'title' => '«خَيْرُكُمْ مَنْ تَعَلَّمَ الْقُرْآنَ وَعَلَّمَهُ»',
            'sub_title' => 'عن عثمان رضي الله عنه عن النبي صلى الله عليه وسلم قال:',
        ]);
        
        $sourcePath = public_path('frontend/assets/img/hero03.jpg');
        if(file_exists($sourcePath)){
            $destinationPath = public_path('frontend/assets/img/hero03-temp.jpg');
            copy($sourcePath, $destinationPath);
        } 
        if(file_exists($sourcePath) && file_exists($destinationPath)){
            $slider->addMedia($destinationPath)->toMediaCollection('image');
        }
    }
}