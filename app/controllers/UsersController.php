<?php

class UsersController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }


    public function getIndex()
    {

        return $this->showList();


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
            'password' => 'required|min:6|max:100'
        );

        $messages = array(
            'required'  => 'El campo :attribute es obligatorio.',
            'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
            'email'     => 'El campo :attribute debe ser un email válido.',
            'max'       => 'El campo :attribute no puede tener más de :max carácteres.',
            'unique'    => 'El email ingresado ya encuentra registrado',
            'confirmed' => 'Los passwords no coinciden'
        );
        $validation = Validator::make(Input::all(), $rules, $messages);

        if($validation->fails())
        {
            return Redirect::to('add_user')->withInput()->with_errors($validation);
        }
        else{

            //si todo esta bien guardamos
            $password = Input::get('password');
            $user = new User;
            $user->name = Input::get('name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->birthday = date("Y-m-d",strtotime(Input::get('birthday'))) ;
            $user->phone = Input::get('phone');
            $user->password = Hash::make($password);
            $file = Input::file('avatar');
            // guardamos

            if($user->save())
            {
                $photo = new Photo;
                $photo->real_name = $file->getClientOriginalName();
                $photo->path_name = md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
                $photo->user_id = $user->id;
                Image::make($file)->resize(300, 300)->save('uploads/avatars/'.$photo->path_name);
                $photo->save();
                //actualizar la foto de perfil de usuario
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(array('photo_id' => $photo->id));




                //se empaquetan los datos para enviar correo
                $data = array(
                    'name'      => $user->name,
                    'last_name' => $user->last_name,
                    'birthday'  => Input::get('birthday'),
                    'phone'     => $user->phone
                );

                $to_email = $user->email;
                //se agrega el email a la cola de envío
                Mail::queue('emails.registro', $data, function($message) use ($to_email)
                {
                    $message->subject('Confirmación de su registro');
                    //se envía con copia a caldep
                    $message->to($to_email)->cc('caldep@gmail.com');

                });

                //redirigimos a usuarios
                return Redirect::to('ls_users')->with('status', 'ok_create');
            }


        }//else


    }

    // eliminar usuarios
    public function getDelete($user_id)
    {

        //buscamos el usuario en la base de datos segun la id enviada
        $user = User::find($user_id);
        //se buscan todas las fotos del usuario
        $photos = DB::table('photos')->where('user_id', '=', $user_id)->get();
        foreach ($photos as $photo)
            {
                //se elimina la foto del usuario
                File::delete(public_path().'/uploads/avatars/'.$photo->path_name);
            }
        //se eliminan todas las fotos del usuario
        DB::table('photos')->where('user_id', '=', $user_id)->delete();
        //eliminamos y redirigimos
        $user->delete();

        return Redirect::to('ls_users')->with('status', 'ok_delete');

    }

    public function getUpdate($user_id)
    {
        //$user = User::find($user_id);
        $user = DB::table('users')
                ->leftJoin('photos', 'users.photo_id', '=', 'photos.id')
                ->select('users.*', 'photos.path_name')
                ->where('users.id','=',$user_id)
                ->get();

        return Redirect::to('edit_user')
                    ->with('user_id',   $user[0]->id)
                    ->with('name',      $user[0]->name)
                    ->with('last_name', $user[0]->last_name)
                    ->with('email',     $user[0]->email)
                    ->with('birthday',  $user[0]->birthday)
                    ->with('phone',     $user[0]->phone)
                    ->with('photo_id',  $user[0]->photo_id)
                    ->with('path_name', $user[0]->path_name);
    }
    //controlador para actualizar datos del usurio
    public function postUpdate()
    {
        $user_id            = Input::get('user_id');
        $user               = User::find($user_id);

        $user->name         = Input::get('name_edit');
        $user->last_name    = Input::get('last_name_edit');
        $user->email        = Input::get('email_edit');
        $user->birthday     = date("Y-m-d",strtotime(Input::get('birthday_edit')));
        $user->phone        = Input::get('phone_edit');


        $user->save();
        return Redirect::to('users')->with('status', 'ok_update');

    }

    public function showList()
    {
        $list_users = DB::table('users')
                        ->leftJoin('photos', 'users.photo_id', '=', 'photos.id')
                        ->select('users.*', 'photos.path_name')
                        ->get();

        return View::make('list_users.index')->with('list_users', $list_users);

    }


}
