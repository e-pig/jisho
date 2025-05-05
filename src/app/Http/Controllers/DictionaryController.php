<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dictionary;
use Illuminate\Support\Facades\Auth;


class DictionaryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Dictionary::query();

        //検索キーワード
        if ($request->filled('keyword')) {
        $query->where(function ($q) use ($request) {
            $q->where('keyword', 'like', '%' . $request->keyword . '%')
            ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        //新しい順で取得
        $dictionaries  = $query->orderBy('created_at', 'desc')->get();
        return view('index', compact('dictionaries'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'keyword' => 'required|string|max:30',
        'description' => 'required|string|max:30',
        ],[
            'keyword.required' => 'キーワードは必須です。',
        'keyword.string' => '有効な内容を入力してください。',
        'keyword.max' => 'キーワードは30文字以内で入力してください。',
        'description.required' => '説明は必須です。',
        'description.string' => '有効な内容を入力してください。',
        'description.max' => '説明は30文字以内で入力してください。',
        ]);

    Dictionary::create([
        'user_id' => Auth::id(), // ← ここが大事！
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
}