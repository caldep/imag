<?php
/**
 * Created by PhpStorm.
 * User: caldep
 * Date: 23/02/15
 * Time: 01:30 AM
 */

class GetUserController extends BaseController{
    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function getIndex($id)
    {
        Redirect::to('ls_users')->with('status', 'ok_delete');
    }

    public function postData()
    {
        $user_id = Input::get('user');

        $user = User::find($user_id);



        $data = array(
            'success' => true,
            'id' => $user_id,
            'name' => $user->name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'birthday' => $user->birthday,
            'phone' => $user->phone

        );

        return Response::json($data);

    }

}