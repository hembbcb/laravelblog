<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
    
            DB::table('categories')->delete();
    
            DB::table('categories')->insert([
    
                [
                'title'=>'Un-Categorize',
                'slug'=>'un-categorize',
                ],
    
               
    
            ]);
    }
}
}