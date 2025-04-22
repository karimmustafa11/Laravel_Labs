<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
{
    return view('posts.index');
}

public function create()
{
    return view('posts.create');
}


public function show ($id) {
    return view('posts.show' , ['id' => $id]);
}


public function edit($id)
{
    return view('posts.edit' , ['id' => $id]);
}

}
