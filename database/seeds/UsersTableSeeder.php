<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the users table
    //    DB:: statement('SET FOREIGN_KEY_CHECKS=0');
        DB:: table('users')->delete();
        

        DB::table('users')->insert([
            [
                'name'=>'Administrator',
                'email'=> 'geospatialbhutan@gmail.com',
                'password'=> '$2y$10$QxPMJGyeBt8nK.FeXfsb/ODIpLm9jrUea.v6Xun3IrM8ZEPRRB0Bi',
                'bio' => 'Remote Sensing, Web Mapping, Geo-Data Management, Environmental Statistics',
               
            ],
        ]);

    }
    
}
