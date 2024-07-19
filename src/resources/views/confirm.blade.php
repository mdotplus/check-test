@extends('layouts/app')

@section('contents')
    <header>
        <p>FashionablyLate<p>
    </header>
    <main>
        <p>Confirm<p>
        <form action="thanks" method="post">
            @csrf
            <table>
                <tr>
                    <th>お名前</th>
                    <td>
                        <input type="text" name="name" value="{{ $contents['last_name'] }}　{{ $contents['first_name'] }}" readonly>
                        <input type="hidden" name="last_name" value="{{ $contents['last_name'] }}">
                        <input type="hidden" name="first_name" value="{{ $contents['first_name'] }}">
                    </td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        <input type="text" name="gender" value="{{ $contents['gender'] }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>
                        <input type="email" name="email" value="{{ $contents['email'] }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>
                        <input type="tel" name="tell" value="{{ $contents['tel_area_code'] }}{{ $contents['tel_city_code'] }}{{ $contents['tel_subscriber_number'] }}" readonly>
                        <input type="hidden" name="tel_area_code" value="{{ $contents['tel_area_code'] }}">
                        <input type="hidden" name="tel_city_code" value="{{ $contents['tel_city_code'] }}">
                        <input type="hidden" name="tel_subscriber_number" value="{{ $contents['tel_subscriber_number'] }}">
                    </td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>
                        <input type="text" name="address" value="{{ $contents['address'] }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>
                        <input type="text" name="building" value="{{ $contents['building'] }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>
                        <input type="text" name="content" value="{{ $contents['content'] }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせの内容</th>
                    <td>
                        <input type="text" name="detail" value="{{ $contents['detail'] }}" readonly>
                    </td>
                </tr>
            </table>
            <button type="submit" name="next_step" value="complete">送信</button>
            <button type="submit" name="next_step" value="correct">修正</button>
        </form>
    </main>
@endsection
