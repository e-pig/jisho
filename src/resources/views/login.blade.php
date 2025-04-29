@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="login-container">
    <h2 class="login-title">ログイン</h2>

    <form action="{{ route('login') }}" method="post">
        @csrf
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="id">ユーザーID</label>
            <input type="text" name="id" id="id">
        </div>
        <button type="submit" class="login-button">ログイン</button>
    </form>
</div>
@endsection
