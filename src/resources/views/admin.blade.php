@extends('layouts/app')

@section('contents')
    <header>
        <p>FashionablyLate</p>
        <form action="/logout" method="post">
            @csrf
            <button>logout</button>
        </form>
    </header>
    <main>
        <p>Admin</p>
        <form action="/admin/search" method="get">
            @csrf
            <input name="keyword" value="{{ $request->keyword }}" placeholder="名前やメールアドレスを入力してください"></input>
            <select name="gender">
                <option
                    disabled
                    {{ empty($request->gender) ? 'selected' : '' }}
                >
                    性別
                </option>
                <option
                    value=0
                    {{ $request->gender === '0' ? 'selected' : '' }}
                >
                    全て
                </option>
                <option
                    value=1
                    {{ $request->gender === '1' ? 'selected' : '' }}
                >
                    男性
                </option>
                <option
                    value=2
                    {{ $request->gender === '2' ? 'selected' : '' }}
                >
                    女性
                </option>
                <option
                    value=3
                    {{ $request->gender === '3' ? 'selected' : '' }}
                >
                    その他
                </option>
            </select>
            <select name="category">
                <option
                    disabled
                    {{ empty($request->category) ? 'selected' : '' }}
                >
                    お問い合わせの種類
                </option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ $request->category === strval($category->id) ? 'selected' : '' }}
                    >
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>
            <input type="date" name="date" value="{{ $request->date }}">
            <button type="submit">検索</button>
        </form>
        <form action="/admin" method="get">
            <button type="submit">リセット</button>
        </form>
        <button type="button">エクスポート</button>
        {{ $contacts->appends(request()->query())->links() }}
        <table>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name . "　" . $contact->first_name }}</td>
                    <td>{{ $contact->gender }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td>
                        <input type="hidden" name="" value="{{ $contact }}"></input>
                        <button type="button">詳細</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
