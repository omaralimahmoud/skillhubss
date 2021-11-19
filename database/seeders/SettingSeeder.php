<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
         'email'=>'ali@yhoo.com',
          'phone'=>'01159449309',
           'facebook'=>'https://www.facebook.com/groups/codezilla.channel',
           'twitter'=>'https://twitter.com/twitter?lang=ar',
            'instagram'=>'https://www.instagram.com',
            'youtube'=>'https://www.youtube.com',
            'linkedIn'=>'https://www.linkedin.com/feed/',
             

        ]);
    }
}
