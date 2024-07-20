@extends('layouts/guest')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection

@section('contents')
    <?php
    ?>

    <button id="myBtn">モーダルを開く</button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="popup-content__name"></p>
            <p id="popup-content__gender"></p>
            <p id="popup-content__email"></p>
            <p id="popup-content__tel"></p>
            <p id="popup-content__address"></p>
            <p id="popup-content__building"></p>
            <p id="popup-content__category"></p>
            <p id="popup-content__contact"></p>
        </div>
    </div>

    <script>
        var modal = document.getElementById('myModal');
        var btn = document.getElementById('myBtn');
        var span = document.getElementsByClassName('close')[0];
        var popupContentName = document.getElementById('pupup-content__name');
        var popupContentGender = document.getElementById('pupup-content__gender');
        var popupContentEmail = document.getElementById('pupup-content__email');
        var popupContentTel = document.getElementById('pupup-content__tel');
        var popupContentAddress = document.getElementById('pupup-content__address');
        var popupContentBuilding = document.getElementById('pupup-content__building');
        var popupContentCategory = document.getElementById('pupup-content__category');
        var popupContentContact = document.getElementById('pupup-content__contact');

        btn.onclick = function() {
            popupContentName.textContent = 'お名前' + '{{ $contact->id }}';
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
