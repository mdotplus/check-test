@extends('layouts/app')

@section('contents')
    <header>
        <p>FashionablyLate</p>
        <a href="/admin">login</a>
    </header>
    <main>
        <p>Register</p>
        <form action="/register" method="post">
            @csrf
            <p>お名前</p>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="例:山田　太郎">
            @if ($errors->has('name'))
                <p>{{ $errors->first('name') }}</p>
            @endif
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
            <button type="submit">登録</button>
        </form>
    </main>
@endsection
