<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != ''){
            $posts = News::where('title', 'LIKE', "%$cond_title%")->orderBy('update_at', 'desc')->get();
        } else{
            $posts = News::all()->sortByDesc('update_at');
        }
        return view('admin.news.index',['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function add()
  {
      return view('admin.news.create');
  }
}
