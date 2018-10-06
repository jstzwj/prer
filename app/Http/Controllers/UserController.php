<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 为指定用户显示详情
     *
     * @param int $id
     * @return Response
     * @author LaravelAcademy.org
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function signin(Request $request)
    {
        $mail = $request->mail;
        $password = $request->password;
        $is_exists = DB::table('users')
            ->where('email', $mail)
            ->orWhere('password', $password)
            ->exists();
        return json_encode(['status' => ($is_exists? 1 : 0)]);
    }
}
