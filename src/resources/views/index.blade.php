@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

<div class="search">
    <div class="form-box">
        <div class="form-header">
            <h2 class="title">検索画面</h2>
            <a href="{{ route('dictionary.register') }}">
                <button class="nav-button">登録画面へ</button>
            </a>
        </div>

        {{-- 成功メッセージ --}}
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        {{-- 検索フォーム --}}
        <form action="{{ route('home') }}" method="GET">
            <div class="search-box">
                <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="キーワードを入力" class="search-input">
                <button type="submit" class="search-button">検索</button>
            </div>
        </form>

        {{-- 検索結果の表示 --}}
        <div class="search-results">
            @if (count($dictionaries) > 0)
                <ul>
                    @foreach ($dictionaries as $dictionary)
                        <li>
                            <small>登録日時: {{ $dictionary->created_at->format('Y/m/d') }}</small><br>
                            <strong>{{ $dictionary->keyword }}</strong><br>
                            {{ $dictionary->description }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>まだ登録されていません。</p>
            @endif
        </div>
    </div>
</div>
@endsection

