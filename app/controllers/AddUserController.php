<?php
/**
 * Created by PhpStorm.
 * User: caldep
 * Date: 22/02/15
 * Time: 04:34 AM
 */

class AddUserController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function getIndex()
    {


        return View::make('add_user.index');
    }
}