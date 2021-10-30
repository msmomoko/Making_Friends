<?php

use Illuminate\Database\Seeder;

class RecruitmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recruitments')->insert([
            'user_id' => '1',
            'recruitment_contents' => 'recruitment_contens1',
            'category' => 'category1',
            'conditions' => 'conditions1',
            'class' => 'class1',
        ]);
        
        DB::table('recruitments')->insert([
            'user_id' => '2',
            'recruitment_contents' => 'recruitment_contens2',
            'category' => 'category2',
            'conditions' => 'conditions2',
            'class' => 'class2',
        ]);
    }
}
