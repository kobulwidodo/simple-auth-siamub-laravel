<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Araditama\AuthSIAM\AuthSIAM;

class AuthController extends Controller
{
    public function index()
    {
        $data = null;
        return view('home', compact('data'));
    }

    public function auth(Request $request) {
        // dd($request);
        $auth = new AuthSIAM;
        $data = [
            'nim' => $request->nim,
            'password' => $request->password
        ];
        $result = $auth->auth($data);
        $data = $result->original;
        // dd($data);

        return view('home', compact('data'));
    }
}
