<?php
/**
 * Created by PhpStorm.
 * User: caldep
 * Date: 20/02/15
 * Time: 07:44 AM
 */
Class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->delete();

        User::create(
            array(
                 'name'         => 'Carlos'
                ,'last_name'    => 'Lizcano'
                ,'email'        => 'caldep@gmail.com'
                ,'phone'        =>  3164620934
                ,'birthday'     => '1976-11-21'
                ,'password'     => Hash::make('123456')
            )
        );

        User::create(
            array(
             'name'         => 'Maria'
            ,'last_name'    => 'Gutierrez'
            ,'email'        => 'mariag@gmail.com'
            ,'phone'        =>  3164620934
            ,'birthday'     => '1985-05-30'
            ,'password'     => Hash::make('123456')
            )
        );
    }
}