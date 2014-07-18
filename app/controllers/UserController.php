<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 12/07/14
 * Time: 18:18
 */

class UserController extends BaseController {

    public function index()
    {
        $users = User::all();

        if (Request::wantsJson())
            return Response::json($users);
        else
            return View::make('users')->with('users', $users);
    }

    public function get($id)
    {
        $user = User::find($id);

        if (Request::wantsJson())
            return Response::json($user);
        else
            return View::make('user')->with('user', $user);
    }

    public function post($user)
    {
        $u = new User();

        $u->merge($user);
        $u->save();
    }

    public function put($user)
    {
        $u = User::find($user->id);

        $u->merge($user);
        $u->save();
    }

    public function delete()
    {
        //
    }

}