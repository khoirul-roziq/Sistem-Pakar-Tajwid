@extends('layouts.guest')

@section('title')
    Konsultasi
@endsection

@section('styles')
    <link rel="stylesheet"
        href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2-materialize.css"
        type="text/css">

    <style>
        #ayahText {
            font-size: 32px;
            line-height: 65px;
            text-align: right;
            border: 1px solid teal;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
    <!-- BEGIN: Page Main-->

    <div class="row">
        <div class="content-wrapper-before teal"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container" id="salam">
                <div class="row center-align">
                    <div class="col s12 m12 l12">
                        <h1 class="breadcrumbs-title mt-0 mb-0 font-kitab">
                            {{ html_entity_decode(json_decode('"\ufd3e \u0642\u064e\u0627\u0646\u06e1\u0633\u064f\u0644\u06e1\u062a\u064e\u0627\u0633\u0650\u064a\u06e1 \u062a\u064e\u0627\u062c\u06e1\u0648\u0650\u064a\u06e1\u062f \ufd3f"'), ENT_QUOTES, 'UTF-8') }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="container mt-3">
            <div class="card">
                <div class="card-content">
                    <div class="judul">
                        <h1>Pilih salah satu ayat dari surat {{ $dataSurah['englishName'] }} ( <span
                                class="font-kitab">{{ $dataSurah['name'] }}</span> ), antara ayat 1 -
                            {{ $dataSurah['numberOfAyahs'] }}!</h1>
                    </div>
                    <div class="row">
                        <div class="col m4 s12">
                            <div class="input-field">
                                <input type="text" id="verseNumber" placeholder="Masukkan nomor ayat">
                                <button id="searchButton" class="btn-small">Cari Ayat</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <h1 id="ayahText" class="font-kitab"></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row" id="send">
                            <form action="{{ route('konsultasi.hasil') }}" method="post" id="submitData">
                                @csrf
                                <input type="text" value="" name="valueText" id="valueText">
                                <input type="text" value="" name="valueAyah" id="valueAyah">
                                <input type="text" value="{{ $dataSurah['number'] }}" name="valueSurah">
                                <input type="text" value="{{ $pattern }}" name="valuePattern">
                            </form>
                        </div>
                        <div class="row">
                            <div class="col s12 center">
                                
                                    <button id="prevButton" class="btn" disabled><i
                                            class="material-icons large">keyboard_arrow_left</i></button>
                                    <button id="nextButton" class="btn"><i
                                            class="material-icons large">keyboard_arrow_right</i></button>
                                
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mt-3">
                        <div class="col s12">
                            <button class="btn" id="submit" onclick="submitForm()" style="width: 10rem;"><b>Kirim Data</b></button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
    </div>

    <!-- END: Page Main-->
@endsection

@section('scripts')
    <script
        src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2.full.min.js">
    </script>
    <script>
        // fungsi selec2
        $(".select2").select2({
            dropdownAutoWidth: true,
            width: '100%',
        });

        // konversi nomor latin ke arab
        function convertLatinToArabic(latinNumber) {
            var arabicNumber = '';

            for (var i = 0; i < latinNumber.length; i++) {
                switch (latinNumber[i]) {
                    case '0':
                        arabicNumber += '٠';
                        break;
                    case '1':
                        arabicNumber += '١';
                        break;
                    case '2':
                        arabicNumber += '٢';
                        break;
                    case '3':
                        arabicNumber += '٣';
                        break;
                    case '4':
                        arabicNumber += '٤';
                        break;
                    case '5':
                        arabicNumber += '٥';
                        break;
                    case '6':
                        arabicNumber += '٦';
                        break;
                    case '7':
                        arabicNumber += '٧';
                        break;
                    case '8':
                        arabicNumber += '٨';
                        break;
                    case '9':
                        arabicNumber += '٩';
                        break;
                    default:
                        arabicNumber += latinNumber[i];
                        break;
                }
            }

            return arabicNumber;
        }

        // deklarasi dan insialisasi variabel data api
        var currentAyahNumber = 1;
        var numberOfSurah = "{{ $dataSurah['number'] }}";
        var numberOfAyahs = "{{ $dataSurah['numberOfAyahs'] }}";

        // deklarasi dan inisialisasi variable tag html
        var prevButton = document.getElementById("prevButton");
        var nextButton = document.getElementById("nextButton");
        var ayahTextElement = document.getElementById("ayahText");

        // fungsi ketika prev button diklik
        prevButton.addEventListener("click", function() {
            if (currentAyahNumber == 2) {
                prevButton.disabled = true;
            }

            if (currentAyahNumber == numberOfAyahs) {
                nextButton.disabled = false;
            }

            getAyahData(currentAyahNumber - 1);
        });

        // fungsi ketika next button diklik
        nextButton.addEventListener("click", function() {
            if (currentAyahNumber == 1) {
                prevButton.disabled = false;
            }

            if (currentAyahNumber == numberOfAyahs - 1) {
                nextButton.disabled = true;
            }

            getAyahData(currentAyahNumber + 1);
        });

        // fungsi untuk melakukan request data api
        function getAyahData(ayahNumber) {
            fetch(`https://api.alquran.cloud/v1/ayah/${numberOfSurah}:${ayahNumber}`)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {

                    // inisialisasi nomor ayat yang diproses
                    currentAyahNumber = data.data.numberInSurah;

                    // deklarasi dan inisialisasi variabel untuk text arab
                    var ayahText = data.data.text;

                    // deklarasi dan inisialisasi variable untuk penomoran ayat
                    var referenceAyah = ' - ' + convertLatinToArabic('' + currentAyahNumber + '');

                    // membungkus nomor ayat menggunakan span
                    var spanElement = document.createElement("span");
                    spanElement.textContent = referenceAyah;

                    ayahTextElement.textContent = ayahText;
                    ayahTextElement.appendChild(spanElement);

                    // Perbarui kolom input verseNumber
                    document.getElementById("verseNumber").value = currentAyahNumber;

                    // perbarui nilai input yang akan dikirim ke controller
                    document.getElementById("valueText").value = ayahText;
                    document.getElementById("valueAyah").value = currentAyahNumber;

                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        // Mengambil data ayat awal
        getAyahData(currentAyahNumber);

        // cari ayat
        // lakukan aksi ketika tombol search diklik
        document.getElementById("searchButton").addEventListener("click", function() {
            var verseNumberInput = document.getElementById("verseNumber").value;
            searchAyah(parseInt(verseNumberInput));
        });

        // gungsi untuk mencari ayat berdasarkan kolom pencarian
        function searchAyah(verseNumber) {
            if (verseNumber >= 1 && verseNumber <= numberOfAyahs) {
                getAyahData(verseNumber);
            } else {
                alert("Nomor ayat tidak valid. Mohon masukkan nomor ayat antara 1 - " + numberOfAyahs);
            }
        }

        // submit data
        function submitForm() {
            // Mengambil referensi elemen form
            var form = document.getElementById("submitData");

            // Melakukan submit form
            form.submit();
        }
    </script>
@endsection
