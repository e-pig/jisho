@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="register-wrapper">
    <div class="register-box">
        <div class="register-header">
            <div class="register-tittle-wrapper">
                <h2 class="register-title">登録画面</h2>
            </div>
            <a  href="{{ route('home') }}">
                <button class="register-nav-button">検索画面へ</button>
            </a>
        </div>

        <form action="{{ route('dictionary.store') }}" method="POST">
            @csrf
            <div class="register-form-group">
                <input type="text" name="keyword" placeholder="キーワード" class="register-input" value="{{ old('keyword') }}">
                @error('keyword')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="register-form-group">
                <textarea name="description" placeholder="説明" class="register-textarea">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="register-form-group center">
                <button type="submit" class="register-submit-button">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection