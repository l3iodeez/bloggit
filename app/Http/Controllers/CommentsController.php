<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class CommentsController extends BaseController
{

    public function edit()
    {
      // return view('commentss/edit');
      return "comments";
    }

    public function update()
    {
      // return view('commentss/create');
      return "comments";
    }
}
