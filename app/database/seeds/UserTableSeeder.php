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
            ,'phone'        =>  3584620934
            ,'birthday'     => '1985-05-30'
            ,'password'     => Hash::make('123456')
            )
        );

        User::create(
            array(
             'name'         => 'José'
            ,'last_name'    => 'Jaimes'
            ,'email'        => 'josem@gmail.com'
            ,'phone'        =>  3114620934
            ,'birthday'     => '1990-05-30'
            ,'password'     => Hash::make('123456')
            )
        );

        User::create(
            array(
             'name'         => 'Miriam'
            ,'last_name'    => 'Contreras'
            ,'email'        => 'miriamc@gmail.com'
            ,'phone'        =>  3564620934
            ,'birthday'     => '1975-05-30'
            ,'password'     => Hash::make('123456')
            )
        );
        User::create(
            array(
             'name'         => 'Abel'
            ,'last_name'    => 'Salamanca'
            ,'email'        => 'abels@gmail.com'
            ,'phone'        =>  3464620934
            ,'birthday'     => '1955-06-30'
            ,'password'     => Hash::make('123456')
            )
        );
        User::create(
            array(
             'name'         => 'Karina'
            ,'last_name'    => 'Lopez'
            ,'email'        => 'karinal@gmail.com'
            ,'phone'        =>  3264620934
            ,'birthday'     => '1981-10-15'
            ,'password'     => Hash::make('123456')
            )
        );
        User::create(
            array(
             'name'         => 'Rosa'
            ,'last_name'    => 'Pedraza'
            ,'email'        => 'rosap@gmail.com'
            ,'phone'        =>  3244620934
            ,'birthday'     => '2000-11-02'
            ,'password'     => Hash::make('123456')
            )
        );
    }
}