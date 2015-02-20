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
            return View::make('hello');
        }
        else
        {
            return Redirect::to('/')->with('login_errors',true);
        }
    }
}