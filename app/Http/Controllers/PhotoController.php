<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
			//
	}

  // アップロード画面
	public function create()
	{
		return view('photos.create');
	}

	// アップロード処理
	public function store(Request $request)
	{
		$savedFilePath = $request->file('image')->store('photos', 'public');
	  Log::debug($savedFilePath);
		$fileName = pathinfo($savedFilePath, PATHINFO_BASENAME);
		
		return to_route('photos.show', ['photo' => $fileName])->with('success', "アップロードしました");
	}

	// アップロード画像の表示ページ
	public function show($fileName)
	{
		return view('photos.show', ['fileName' => $fileName]);
		// ↑ 表示用のビューで$fileNameが使用できるように、view関数の第２引数に指定を行う。
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
			//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
			//
	}

	// アップロード画像の削除
	public function destroy($fileName)
	{
		Storage::disk('public')->delete('photos/'. $fileName);
		return to_route('photos.create')->with('success', "削除しました");
	}

	// ダウンロード用のアクション
	public function download($fileName)
	{
		return Storage::disk('public')->download('photos/'. $fileName, "アップロード画像.jpg");
	}
}
