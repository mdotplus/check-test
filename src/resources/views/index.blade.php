@extends('layouts/app')

@section('contents')
    <header>
        <p>FashionablyLate</p>
    </header>
    <main>
        <p>Contant</p>
        <form action="/confirm" method="post">
            @csrf
            <table>
                <tr>
                    <th>お名前<span>※</span></th>
                    <td>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例:山田">
                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例:太郎">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        @if ($errors->has('last_name'))
                            <p>{{ $errors->first('last_name') }}</p>
                        @endif
                        @if ($errors->has('first_name'))
                            <p>{{ $errors->first('first_name') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>性別<span>※</span></th>
                    <td>
                        <input
                            type="radio"
                            name="gender"
                            value="男性"
                            id="gender_man"
                            {{ empty(old('gender')) || old('gender') === '男性' ? 'checked' : '' }}
                        >
                        <label for="gender_man">男性</label>
                        <input
                            type="radio"
                            name="gender"
                            value="女性"
                            id="gender_woman"
                            {{ old('gender') === '女性' ? 'checked' : '' }}
                        >
                        <label for="gender_woman">女性</label>
                        <input
                            type="radio"
                            name="gender"
                            value="その他"
                            id="gender_others"
                            {{ old('gender') === 'その他' ? 'checked' : '' }}
                        >
                        <label for="gender_others">その他</label>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        @if ($errors->has('gender'))
                            <p>{{ $errors->first('gender') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス<span>※</span></th>
                    <td>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        @if ($errors->has('email'))
                            <p>{{ $errors->first('email') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>電話番号<span>※</span></th>
                    <td>
                        <input type="tel" name="tel_area_code" value="{{ old('tel_area_code') }}" placeholder="080">
                        <input type="tel" name="tel_city_code" value="{{ old('tel_city_code') }}" placeholder="1234">
                        <input type="tel" name="tel_subscriber_number" value="{{ old('tel_subscriber_number') }}" placeholder="5678">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        @if ($errors->has('tel_area_code'))
                            <p>{{ $errors->first('tel_area_code') }}</p>
                        @endif
                        @if ($errors->has('tel_city_code'))
                            <p>{{ $errors->first('tel_city_code') }}</p>
                        @endif
                        @if ($errors->has('tel_subscriber_number'))
                            <p>{{ $errors->first('tel_subscriber_number') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>住所<span>※</span></th>
                    <td>
                        <input type="text" name="address" value="{{ old('address') }}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        @if ($errors->has('address'))
                            <p>{{ $errors->first('address') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>
                        <input type="text" name="building" value="{{ old('building') }}" placeholder="例:千駄ヶ谷マンション101">
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせの種類<span>※</span></th>
                    <td>
                        <select name="content">
                            <option value="" selected disabled>選択してください</option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->content }}"
                                    {{ old('content') === $category->content ? 'selected' : '' }}
                                >
                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        @if ($errors->has('content'))
                            <p>{{ $errors->first('content') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせの内容<span>※</span></th>
                    <td>
                        <textarea name="detail" cols="30" rows="10" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        @if ($errors->has('detail'))
                            <p>{{ $errors->first('detail') }}</p>
                        @endif
                    </td>
                </tr>
            </table>
            <button type="submit">確認画面</button>
        </form>
    </main>
@endsection
