<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'slider_create',
            ],
            [
                'id'    => 22,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 23,
                'title' => 'slider_show',
            ],
            [
                'id'    => 24,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 25,
                'title' => 'slider_access',
            ],
            [
                'id'    => 26,
                'title' => 'goal_create',
            ],
            [
                'id'    => 27,
                'title' => 'goal_edit',
            ],
            [
                'id'    => 28,
                'title' => 'goal_show',
            ],
            [
                'id'    => 29,
                'title' => 'goal_delete',
            ],
            [
                'id'    => 30,
                'title' => 'goal_access',
            ],
            [
                'id'    => 31,
                'title' => 'team_create',
            ],
            [
                'id'    => 32,
                'title' => 'team_edit',
            ],
            [
                'id'    => 33,
                'title' => 'team_show',
            ],
            [
                'id'    => 34,
                'title' => 'team_delete',
            ],
            [
                'id'    => 35,
                'title' => 'team_access',
            ],
            [
                'id'    => 36,
                'title' => 'partner_create',
            ],
            [
                'id'    => 37,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 38,
                'title' => 'partner_show',
            ],
            [
                'id'    => 39,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 40,
                'title' => 'partner_access',
            ],
            [
                'id'    => 41,
                'title' => 'award_create',
            ],
            [
                'id'    => 42,
                'title' => 'award_edit',
            ],
            [
                'id'    => 43,
                'title' => 'award_show',
            ],
            [
                'id'    => 44,
                'title' => 'award_delete',
            ],
            [
                'id'    => 45,
                'title' => 'award_access',
            ],
            [
                'id'    => 46,
                'title' => 'setting_access',
            ],
            [
                'id'    => 47,
                'title' => 'job_create',
            ],
            [
                'id'    => 48,
                'title' => 'job_edit',
            ],
            [
                'id'    => 49,
                'title' => 'job_show',
            ],
            [
                'id'    => 50,
                'title' => 'job_delete',
            ],
            [
                'id'    => 51,
                'title' => 'job_access',
            ],
            [
                'id'    => 52,
                'title' => 'employment_create',
            ],
            [
                'id'    => 53,
                'title' => 'employment_edit',
            ],
            [
                'id'    => 54,
                'title' => 'employment_show',
            ],
            [
                'id'    => 55,
                'title' => 'employment_delete',
            ],
            [
                'id'    => 56,
                'title' => 'employment_access',
            ],
            [
                'id'    => 57,
                'title' => 'hawkma_category_create',
            ],
            [
                'id'    => 58,
                'title' => 'hawkma_category_edit',
            ],
            [
                'id'    => 59,
                'title' => 'hawkma_category_show',
            ],
            [
                'id'    => 60,
                'title' => 'hawkma_category_delete',
            ],
            [
                'id'    => 61,
                'title' => 'hawkma_category_access',
            ],
            [
                'id'    => 62,
                'title' => 'hawkma_create',
            ],
            [
                'id'    => 63,
                'title' => 'hawkma_edit',
            ],
            [
                'id'    => 64,
                'title' => 'hawkma_show',
            ],
            [
                'id'    => 65,
                'title' => 'hawkma_delete',
            ],
            [
                'id'    => 66,
                'title' => 'hawkma_access',
            ],
            [
                'id'    => 67,
                'title' => 'report_category_create',
            ],
            [
                'id'    => 68,
                'title' => 'report_category_edit',
            ],
            [
                'id'    => 69,
                'title' => 'report_category_show',
            ],
            [
                'id'    => 70,
                'title' => 'report_category_delete',
            ],
            [
                'id'    => 71,
                'title' => 'report_category_access',
            ],
            [
                'id'    => 72,
                'title' => 'report_create',
            ],
            [
                'id'    => 73,
                'title' => 'report_edit',
            ],
            [
                'id'    => 74,
                'title' => 'report_show',
            ],
            [
                'id'    => 75,
                'title' => 'report_delete',
            ],
            [
                'id'    => 76,
                'title' => 'report_access',
            ],
            [
                'id'    => 77,
                'title' => 'category_create',
            ],
            [
                'id'    => 78,
                'title' => 'category_edit',
            ],
            [
                'id'    => 79,
                'title' => 'category_show',
            ],
            [
                'id'    => 80,
                'title' => 'category_delete',
            ],
            [
                'id'    => 81,
                'title' => 'category_access',
            ],
            [
                'id'    => 82,
                'title' => 'program_create',
            ],
            [
                'id'    => 83,
                'title' => 'program_edit',
            ],
            [
                'id'    => 84,
                'title' => 'program_show',
            ],
            [
                'id'    => 85,
                'title' => 'program_delete',
            ],
            [
                'id'    => 86,
                'title' => 'program_access',
            ],
            [
                'id'    => 87,
                'title' => 'program_timeline_create',
            ],
            [
                'id'    => 88,
                'title' => 'program_timeline_edit',
            ],
            [
                'id'    => 89,
                'title' => 'program_timeline_show',
            ],
            [
                'id'    => 90,
                'title' => 'program_timeline_delete',
            ],
            [
                'id'    => 91,
                'title' => 'program_timeline_access',
            ],
            [
                'id'    => 92,
                'title' => 'program_team_create',
            ],
            [
                'id'    => 93,
                'title' => 'program_team_edit',
            ],
            [
                'id'    => 94,
                'title' => 'program_team_show',
            ],
            [
                'id'    => 95,
                'title' => 'program_team_delete',
            ],
            [
                'id'    => 96,
                'title' => 'program_team_access',
            ],
            [
                'id'    => 97,
                'title' => 'program_management_access',
            ],
            [
                'id'    => 98,
                'title' => 'program_goal_create',
            ],
            [
                'id'    => 99,
                'title' => 'program_goal_edit',
            ],
            [
                'id'    => 100,
                'title' => 'program_goal_show',
            ],
            [
                'id'    => 101,
                'title' => 'program_goal_delete',
            ],
            [
                'id'    => 102,
                'title' => 'program_goal_access',
            ],
            [
                'id'    => 103,
                'title' => 'hawkma_management_access',
            ],
            [
                'id'    => 104,
                'title' => 'report_management_access',
            ],
            [
                'id'    => 105,
                'title' => 'news_create',
            ],
            [
                'id'    => 106,
                'title' => 'news_edit',
            ],
            [
                'id'    => 107,
                'title' => 'news_show',
            ],
            [
                'id'    => 108,
                'title' => 'news_delete',
            ],
            [
                'id'    => 109,
                'title' => 'news_access',
            ],
            [
                'id'    => 110,
                'title' => 'gallery_create',
            ],
            [
                'id'    => 111,
                'title' => 'gallery_edit',
            ],
            [
                'id'    => 112,
                'title' => 'gallery_show',
            ],
            [
                'id'    => 113,
                'title' => 'gallery_delete',
            ],
            [
                'id'    => 114,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 115,
                'title' => 'contact_create',
            ],
            [
                'id'    => 116,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 117,
                'title' => 'contact_show',
            ],
            [
                'id'    => 118,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 119,
                'title' => 'contact_access',
            ],
            [
                'id'    => 120,
                'title' => 'media_center_access',
            ],
            [
                'id'    => 121,
                'title' => 'tag_create',
            ],
            [
                'id'    => 122,
                'title' => 'tag_edit',
            ],
            [
                'id'    => 123,
                'title' => 'tag_show',
            ],
            [
                'id'    => 124,
                'title' => 'tag_delete',
            ],
            [
                'id'    => 125,
                'title' => 'tag_access',
            ],
            [
                'id'    => 126,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
