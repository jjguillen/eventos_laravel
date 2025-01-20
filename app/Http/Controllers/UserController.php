<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.usuarios', [ 'usuarios' => User::all() ]);
    }

    public function show($id)
    {
        return "Id: ".$id. " - admin";
    }
}
