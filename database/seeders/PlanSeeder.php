<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name'          => ['en' => 'Free Plan', 'ar' => 'الخطة المجانية'],
                'slug'          => ['en' => 'free', 'ar' => 'مجاني'],
                'price'         => 0,
                'duration_days' => 30,
                'is_active'     => true,
            ],
            [
                'name'          => ['en' => 'Pro Plan', 'ar' => 'الخطة الاحترافية'],
                'slug'          => ['en' => 'pro', 'ar' => 'احترافية'],
                'price'         => 49.99,
                'duration_days' => 30,
                'is_active'     => true,
            ],
            [
                'name'          => ['en' => 'Enterprise Plan', 'ar' => 'الخطة المؤسسية'],
                'slug'          => ['en' => 'enterprise', 'ar' => 'مؤسسية'],
                'price'         => 199.99,
                'duration_days' => 30,
                'is_active'     => true,
            ],
        ];

        Plan::createMany($plans);
    }
}
