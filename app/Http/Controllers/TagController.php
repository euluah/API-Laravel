<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //

    function index()
    {
        $tag = Tag::all();
        return response()->json($tag);
    }
}
