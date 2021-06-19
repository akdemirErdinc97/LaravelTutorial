<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Content;

class FrontController extends Controller
{
    public function index(){
      $content = Content::paginate(10);
      return view("front.pages.index")->with("content",$content);
    }
}
