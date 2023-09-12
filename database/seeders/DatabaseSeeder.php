<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\Backend\SouraCardController;
use App\Models\Category;
use App\Models\SouraCard;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::create(['name'=>'الحصري']);
        Category::create(['name'=>'عبدالباسط عبدالصمد']);
        Category::create(['name'=>'مشاري راشد العفاسي']);
        Category::create(['name'=>'المنشاوي']);
        Category::create(['name'=>'ياسر الدوسري']);
        Category::create(['name'=>'مصطفي اسماعيل']);
        Category::create(['name'=>'الطبلاوي']);
        Category::create(['name'=>'ماهر المعيقلي']);



        User::create([
           'name'=>'Ziad Badr',
           'email' => 'ziadmahmoud5947@gmail.com',
           'password'=>bcrypt('123456789'),
            'email_verified_at'=>NOW(),
        ]);











        SouraCard::create(['title'=>'سورة الناس']);
        SouraCard::create(['title'=>'سورة الفلق']);
        SouraCard::create(['title'=>'سورة الاخلاص']);
        SouraCard::create(['title'=>'سورة المسد']);
        SouraCard::create(['title'=>'سورة النصر']);
        SouraCard::create(['title'=>'سورة الكافرون']);
        SouraCard::create(['title'=>'سورة الكوثر']);
        SouraCard::create(['title'=>'سورة الماعون']);
        SouraCard::create(['title'=>'سورة قريش']);
        SouraCard::create(['title'=>'سورة الفيل']);
    }
}
