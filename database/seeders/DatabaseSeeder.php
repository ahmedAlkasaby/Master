<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\CategoryCase;
use App\Models\City;
use App\Models\Faq;
use App\Models\Payment;
use App\Models\Region;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Storage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(LaratrustSeeder::class);
        $this->call(RoleSeeder::class);
        Storage::create(['price'=>100000]);
        Setting::create([
            'site_title'=>'Charity',
            'site_email'=>'alkasaby145@gmail.com',
            'site_phone'=>'01016192604',
            'facebook'=>'https://www.facebook.com/profile.php?id=100063230695093',
        ]);
        Payment::create([
            'name'=>json_encode([
                'ar'=>'كاش',
                'en'=>'Cash'
            ])
        ]);

        $this->call(CategorySeeder::class);
        $this->call(AdminSeeder::class);

        Slider::factory(5)->create();
        Category::factory(10)->create();

        $this->call(ItemSeeder::class);
        City::factory(10)->create();
        Region::factory(50)->create();
        CategoryCase::factory(6)->create();
        Faq::factory(6)->create();
        $this->call(UserSeeder::class);
        $this->call(VolunteerSeeder::class);
        $this->call(DonerSeeder::class);
        $this->call(CharityCasesSeeder::class);
        $this->call(ImpactSeeder::class);
        $this->call(DonationSeeder::class);
        $this->call(TransferSeeder::class);
        $this->call(TransferItemSeeder::class);
        $this->call(PageSeeeder::class);
        $this->call(MessageSeeder::class);
    }
}
