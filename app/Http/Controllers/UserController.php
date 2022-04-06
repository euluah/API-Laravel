<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserController extends Controller
{
    //

    function index()
    {
        $users = User::all();
        return response()->json($users);
    }
}
