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
        $password = md5($request->password);
        $is_exists = DB::table('users')
            ->where('email', $mail)
            ->where('password', $password)
            ->exists();
        
        if (!$request->session()->has('user_data')) {
            $user_data = DB::table('users')
                ->where('email', $mail)
                ->where('password', $password)->first();
            $request->session()->put('user_data', $user_data);
        }
        return json_encode(['status' => ($is_exists? 1 : 0)]);
    }

    public function signup(Request $request)
    {
        $mail = $request->mail;
        $password = md5($request->password);
        $is_exists = DB::table('users')
            ->where('email', $mail)
            ->exists();

        if($is_exists)
        {
            return json_encode(['status' => 0]);
        }
        else
        {
            $id = DB::table('users')->insertGetId(
                ['name' => $mail, 'email' => $mail, 'password' => $password]
            );
            return json_encode(['status' => 1]);
        }
    }
}
