<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuqestController extends Controller
{
  public function form()
  {
    return view('form');
  }

  public function loginForm()
  {
    return view('login');
  }

  public function login(Request $request)
  {
    if ($request->get('email') === 'user@example.com' && $request->get('password') === '12345678') {
        return 'ログイン成功';
    }
    return 'ログイン失敗';
  }
  
  public function queryStrings(Request $request)
  {
/*     $keyword = "未設定";
    if ($request->has(key: 'keyword')){
      $keyword = $request->keyword;
    } */
    $keyword = $request->get('keyword', "未設定");
    return "キーワードは「". $keyword. "」です。";
  }

  public function profile($id)
  {
    return "ID:". $id;
  }

  public function profileArchive(Request $request, $category, $year)
  {
    //URLクエリパラメータを取得するための変数($request)にはタイプヒンティングが必要なので、一番最初に指定
    //その後、ルートパラメータを登録順に引数に指定

    return "categoey:". $category. "<br>year:". $year. "<br>page:". $request->get("page", 1);
  }

  public function routeLink()
  {
    $url = route('profile', ['id' => 1, 'photos' => 'yes']);
    return "プロフィールページのURLは". $url;
  }


}
