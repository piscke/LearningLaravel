<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 12/07/14
 * Time: 18:18
 */

class UserController extends BaseController {

    public function getIndex()
    {
        $users = User::all();

        if (Request::isJson())
            return Response::json($users);
        else
            return View::make('users')->with('users', $users);
    }

    public function getId($id)
    {
        $user = User::find($id);

        return Response::json($user);
    }

    public function postProfile()
    {
        //
    }

    public function anyLogin()
    {
        //
    }
}