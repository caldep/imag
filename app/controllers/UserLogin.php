<?php
/**
 * Created by PhpStorm.
 * User: caldep
 * Date: 20/02/15
 * Time: 09:47 AM
 */

class UserLogin extends BaseController {

    public function autenticar()
    {
        $userdata = array(
             'email'    => Input::get('username')
            ,'password' => Input::get('password')
        );

        if(Auth::attempt($userdata))
        {
            $list_users = DB::table('users')->get();

            return Redirect::to('ls_users')->with('list_users', $list_users);

        }
        else
        {
            return Redirect::to('/')->with('login_errors',true);
        }
    }
}