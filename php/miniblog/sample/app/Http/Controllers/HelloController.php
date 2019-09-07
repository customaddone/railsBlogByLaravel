<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Member;
use App\Article;

class HelloController extends Controller
{
    public function __construct()
    {
        $this->middleware('newLine')
            ->only(['index']);

        /* $this->middleware('returnNewLine')
            ->only(['show']); */
    }

    public function index()
    {
        $articles = Article::visible('released_at')->get();
        return view('hello.index', ['page_title' => 'Home',
                    'articles' => $articles]);

    }

    /*
    public function getAuth(Request $request)
    {
      $msg = 'ログインしてください'

      return redirect('/members')->with('msg', $msg);
    }
    */
    public function postAuth(Request $request)
    {
      $authEmail = $request->authEmail;
      $password = $request->password;
      // Auth::attemptでこのemail,passwordの人はいるか確認する
      if (Auth::attempt(['email' => $authEmail, 'password' => $password]))
      {
        $state = Auth::user()->name .'さん';
        $request->session()->put('msg',$state);
      } else {

      }

      return redirect('/members');
    }

    public function postDestroy()
    {
      session()->forget('msg');
      return redirect('/members');
    }
}
