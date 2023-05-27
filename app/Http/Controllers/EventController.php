<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
  //登録画面表示用 
  public function create()
  {
    return view('events.create');
  }

 // 登録処理・登録画面表示用
  public function store(Request $request)
  {
    Log::debug("イベント名:". $request->get('title'));
    // ↑だけだと画面に何も出力されず、真っ白のビューファイルが出力されてしまうので、↓で登録フォームが表示されるようにview関数で指定を行う
    return to_route('events.create');
  }

}
