<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();

        Tag::create([

      	 'name'	   	=> 		'測試用tag',
      	 'frenquency'    =>      '1',
        	    
      ]);

    }
}
