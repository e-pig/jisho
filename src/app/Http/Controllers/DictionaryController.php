<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dictionary;

class DictionaryController extends Controller
{
    public function index(Request $request)
    {
        $query = Dictionary::query();

        //検索キーワード
        if ($request->filled('keyword')) {
        $query->where('keyword', 'like', '%' . $request->keyword . '%')
            ->orWhere('description', 'like', '%' . $request->keyword . '%');
        }

        //新しい順で取得
        $dictionaries  = $query->orderBy('created_at', 'desc')->get();
        return view('index', compact('dictionaries'));
    }

    public function store(Request $request)
    {
        $request->validate([ //登録画面のバリデーション
            'keyword' => 'required|regex:/^[a-zA-Zぁ-んァ-ン一-龥ー\s]+$/u|max:30',
            'description' => 'required|regex:/^[a-zA-Zぁ-んァ-ン一-龥ー\s]+$/u|max:30',
        ], [ //ここからエラーメッセージ個別設定
            'keyword.required' => 'キーワードは必須です。',
            'keyword.regex' => 'キーワードは文字列(日本語また英字)で入力してください。',
            'keyword.max' => 'キーワードは30文字以内で入力してください。',

            'description.required' => '説明は必須です。',
            'description.regex' => '説明は文字列(日本語または英字)で入力してください。',
            'description.max' => '説明は30文字以内で入力してください。',
        ]);

        $userId = session('user_id'); //ログインしているユーザーのID(sessionからの取得)

        Dictionary::create([
            'user_id' => session('user_id'),
            'keyword' => $request->keyword,
            'description' => $request->description,
        ]);

        return redirect()->route('home')->with('success', '登録が完了しました！');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'id' => ['bail', 'required', 'regex:/^[a-z0-9]{4,}$/'], //alpha_num', 'min:4だとあいうえおでもログインできてしまうため、変更,１つエラーになると他のエラーが表示されないため、bailを追加
            ],
            [ //ここからエラーメッセージ
            'id.required' => 'ユーザーIDは必須です。',
            'id.regex' => 'ユーザーIDは小文字英数字のみで4文字以上で入力して下さい。',
            ]);

            session(['user_id' => $request->id]);
            return redirect()->route('dictionary.register');
    }
}