<?php

use Illuminate\Database\Seeder;

class ListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 10 ; $i++) {

            \App\TableList::create([
                'word' => $i .'番目の単語',
                'text' => $i .'番目のテキスト',
                
            ]);
    
    }
    }
}
