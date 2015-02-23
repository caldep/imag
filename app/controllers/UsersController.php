<?php

class UsersController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }


    public function getIndex()
    {

        $list_users = DB::table('users')->get();

        return View::make('list_users.index')->with('list_users', $list_users);


    }

    // metodo para agregar al usuario
    public function postCreate()
    {


        //validamos reglas inputs
        $rules = array(
            'name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'birthday' => 'required|max:10',
            'phone' => 'required|numeric|min:7',
            'password' => 'required|min:6',
        );

        $validation = Validator::make(Input::all(), $rules);

        if($validation->fails())
        {
            return Redirect::to('add_user')->with_input()->with_errors($validation);
        }

        //si todo esta bien guardamos
        $password = Input::get('password');


        $user = new User;
        $user->name = Input::get('name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->birthday = date("Y-m-d",strtotime(Input::get('birthday'))) ;
        $user->phone = Input::get('phone');
        $user->password = Hash::make($password);
        // guardamos

        $user->save();

        //redirigimos a usurios
        return Redirect::to('ls_users')->with('status', 'ok_create');
    }

    // eliminar usuarios
    public function getDelete($user_id)
    {
        //buscamos el usuario en la base de datos segun la id enviada
        $user = User::find($user_id);
        //eliminamos y redirigimos
        $user->delete();
        return Redirect::to('ls_users')->with('status', 'ok_delete');

    }

    public function getUpdate($user_id)
    {
        $user = User::find($user_id);
        return Redirect::to('edit_user')->with('user_id', $user->id)->with('name', $user->name)->with('last_name', $user->last_name)->with('email', $user->email)->with('birthday', $user->birthday)->with('phone', $user->phone);
    }
    //controlador para actualizar datos del usurio
    public function postUpdate()
    {
        $user_id = Input::get('user_id');
        $user = User::find($user_id);

        $user->name = Input::get('name_edit');
        $user->last_name = Input::get('last_name_edit');
        $user->email = Input::get('email_edit');
        $user->birthday = date("Y-m-d",strtotime(Input::get('birthday_edit')));
        $user->phone = Input::get('phone_edit');


        $user->save();
        return Redirect::to('users')->with('status', 'ok_update');

    }
}
