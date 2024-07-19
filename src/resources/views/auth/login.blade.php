@extends('layouts/app')

@section('contents')
    <header>
        <p>FashionablyLate</p>
        <a href="/register">register</a>
    </header>
    <main>
        <p>Login</p>
        <form action="/login" method="post">
            @csrf
            <p>メールアドレス</p>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com">
            @if ($errors->has('email'))
                <p>{{ $errors->first('email') }}</p>
            @endif
            <p>パスワード</p>
            <input type="password" name="password" placeholder="例:coachtech1106">
            @if ($errors->has('password'))
                <p>{{ $errors->first('password') }}</p>
            @endif
            <button type="submit">ログイン</button>
        </form>
    </main>
@endsection
