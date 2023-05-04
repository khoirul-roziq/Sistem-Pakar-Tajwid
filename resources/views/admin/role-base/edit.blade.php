@extends('layouts.admin')

@section('title')
    Edit Role Base
@endsection

@section('styles')
    <link rel="stylesheet"
        href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2-materialize.css"
        type="text/css">
    <link rel="stylesheet" href="https://alquran.cloud/public/css/font-kitab.css?v=1">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/role-base.css') }}">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-bottom: 20px;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: teal;
            color: white;
            height: 2rem;
        }

        table tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        table tr:hover td {
            background-color: #ddd;
        }

        table {
            /* properti CSS lainnya */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        table.show {
            opacity: 1;
            visibility: visible;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="content-wrapper-before teal"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><b>ROLE BASE</b></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('role-base.index') }}">Role Base</a></li>
                            <li class="breadcrumb-item active white-text"><b>Edit Role Base</b></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="container mt-3">
                @if ($errors->any())
                    <div class="card">
                        <div class="card-content">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-content">
                        <form action="{{ route('role-base.update', $roleBase->id) }}" method="post" enctype="multipart/form-data">
                            @method("put")
                            @csrf
                            <div class="row">
                                <div class="col m12 s12 mb-3">
                                    <button class="waves-effect waves-dark btn btn-primary teal right" type="submit"><i
                                            class="material-icons left">save</i> Simpan</button>
                                </div>
                            </div>
                            <div class="row">

                                <div class="input-field col m6 s12">
                                    <label for="kode">Kode Role Base<span class="red-text">*</span></label>
                                    <input type="text" id="kode" name="kode"
                                        class="validate @error('kode') is-invalid @enderror" required
                                        value="{{ $roleBase->kode }}">
                                    @error('kode')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-field col m6 s12">
                                    <select class="select2 browser-default" name="tajwid">
                                        <option value="" disabled>--- Pilih Tajwid ---</option>
                                        @foreach ($data as $value)
                                            <option value="{{ $value->id }}"
                                                @if ($value->id == $roleBase->id_tajwid) selected @endif>{{ $value->nama_tajwid }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <input type="text" id="pattern" name="pattern" hidden>

                            <div class="selectHiden" hidden>
                                <select name="tandaTajwid[]" id="tanda-tajwid" multiple>
                                    @foreach ($roleBase->tandaTajwid as $valueTanda)
                                        <option value="{{ $valueTanda->id }}" selected></option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row center-align">
                                <span><b>Representasi Role Base</b></span>
                                <div class="wrap">
                                    <div class="panel">
                                        <div class="content">
                                            <span class="font-kitab" id="combinedValues"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="show-pattern">
                                    <span id="value-pattern"></span>
                                </div>
                            </div>
                        </form>

                        <div class="row center">
                            <div class="title mb-1" id="title-table"><b>Tabel Data</b></div>
                            <table id="table-role-base" class="show">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Representasi</th>
                                        <th>Unicode</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-role-base">
                                    <!-- data role base dari script -->
                                    @foreach ($roleBase->tandaTajwid as $valueTanda)
                                        <tr>
                                            <td>{{ $valueTanda->kode }}</td>
                                            <td>{{ $valueTanda->nama_tanda }}</td>
                                            <td class="font-kitab">{{ html_entity_decode(json_decode('"' . $valueTanda->unicode . '"'), ENT_QUOTES, 'UTF-8') }}</td>
                                            <td>{{ $valueTanda->unicode }}</td>
                                            <td><button class="btn-small"
                                                    onclick="deleteRow(this.parentNode.parentNode.rowIndex)"><i
                                                        class="material-icons">delete_sweep</i></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="no-data" class="center-align mb-4 mt-2">
                                <span>Tidak ada tanda yang dipilih</span>
                            </div>
                            <div class="row center-align mt-2">
                                <button id="switch" class="btn-small">Sembunyikan Tabel</button>
                                <button id="delete-btn" class="btn-small">Hapus semua data</button>
                            </div>
                            <div class="row center-align" id="key-button">
                                @foreach ($tandaTajwid as $value)
                                    <button
                                        onclick="addRow(`{{ $value->kode }}`, `{{ $value->nama_tanda }}`, `{{ $value->unicode }}`, `{{ trim(preg_replace('/\\\\u([0-9a-fA-F]{4})/', '\\\\u$1', json_encode($value->unicode)), '"') }}`, `{{ $value->id }}`)"
                                        class="btn-small tombol-tanda"><span class="font-kitab-bold">
                                            @if ($value->unicode == '&nbsp;')
                                                <i class="material-icons">space_bar</i>
                                            @else
                                                {{ html_entity_decode(json_decode('"' . $value->unicode . '"'), ENT_QUOTES, 'UTF-8') }}
                                            @endif
                                        </span></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script
        src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2.full.min.js">
    </script>

    {{-- Select --}}
    <script>
        $(".select2").select2({
            dropdownAutoWidth: true,
            width: '100%'
        });
    </script>

    {{-- Panel Representasi --}}
    <script>
        const panel = document.querySelector(".panel");

        let isResizing = false;
        let startX;
        let startY;
        let startWidth;
        let startHeight;

        panel.addEventListener("mousedown", function(e) {
            e.preventDefault();
            isResizing = true;
            startX = e.clientX;
            startY = e.clientY;
            startWidth = parseInt(
                document.defaultView.getComputedStyle(panel).width,
                10
            );
            startHeight = parseInt(
                document.defaultView.getComputedStyle(panel).height,
                10
            );
        });

        document.addEventListener("mousemove", function(e) {
            if (!isResizing) return;
            const width = startWidth + e.clientX - startX;
            const height = startHeight + e.clientY - startY;
            if (width >= 50) {
                panel.style.width = width + "px";
            }
            if (height >= 30) {
                panel.style.height = height + "px";
            }
        });

        document.addEventListener("mouseup", function(e) {
            isResizing = false;
        });
    </script>

    {{-- Tabel Role Base --}}
    <script>
        // Tampilkan atau Sembunyikan
        const switchButton = document.getElementById("switch");
        const table = document.getElementById("table-role-base");
        const titleTable = document.getElementById("title-table");
        const valuePatternParent = document.getElementById('value-pattern').parentNode;
        const noData = document.getElementById('no-data');

        // No Data
        function toggleNoData() {
            if (table.rows.length <= 1) {
                noData.style.display = 'block';
                valuePatternParent.style.display = 'none';
            } else {
                noData.style.display = 'none';
                valuePatternParent.style.display = 'block';
            }
        }

        toggleNoData(); // panggil fungsi untuk menampilkan elemen no-data saat pertama kali memuat halaman


        switchButton.addEventListener("click", function() {
            table.classList.toggle("show");
            switchButton.classList.toggle("active");
            switchButton.innerText = "Tampilkan Tabel";
            titleTable.style.display = 'none'
        });

        // Hilangkan table

        table.addEventListener('transitionend', function() {
            if (!table.classList.contains('show')) {
                table.style.display = 'none';
            }
        });

        // tampilkan tabel
        switchButton.addEventListener('click', () => {
            if (table.style.display === 'none') {
                table.style.display = 'table';
                setTimeout(() => {
                    table.style.opacity = 1;
                }, 100);
                switchButton.innerText = "Sembunyikan Tabel";
                titleTable.style.display = 'block';
            } else {
                table.style.opacity = 0;
                setTimeout(() => {
                    table.style.display = 'none';
                }, 500);
            }
        });

        function updateCombinedValues() {
            // Menampilkan gabungan representasi

            // Mendapatkan semua sel pada kolom Representasi
            const cells = table.querySelectorAll('td:nth-child(4)');

            // Membuat array untuk menyimpan nilai setiap sel
            let values = [];

            // Looping untuk mendapatkan nilai setiap sel
            cells.forEach(cell => {
                values.push(cell.innerText);
            });

            // Menggabungkan nilai sel menjadi satu string
            const combinedValues = values.join('');

            // Mendapatkan elemen div baru
            const combinedValuesDiv = document.getElementById('combinedValues');
            const inputPattern = document.getElementById('pattern');
            const valuePattern = document.getElementById('value-pattern');

            // Menampilkan nilai gabungan pada elemen div baru            
            combinedValuesDiv.innerText = JSON.parse(`"${combinedValues}"`);
            inputPattern.value = combinedValues;
            valuePattern.innerHTML = combinedValues;
        }

        updateCombinedValues();

        // Tambah
        function addOption(id) {
            // ambil tag menggunakan id
            let selectElement = document.getElementById("tanda-tajwid");

            // buat elemen option
            let optionElement = document.createElement("option");

            // set value
            optionElement.value = id;

            // set atribut selected
            optionElement.selected = true;

            //tambahkan elemen option pada elemen select
            selectElement.appendChild(optionElement);


        }

        function clearOption() {
            // ambil tag menggunakan id
            let selectElement = document.getElementById("tanda-tajwid");

            selectElement.innerHTML = '';
        }

        function deleteOption(index) {
            let selectElement = document.getElementById("tanda-tajwid");

            selectElement.remove(index);
        }

        function addRow(kode, nama, representasi, unicode, id) {
            var table = document.getElementById("tbody-role-base");


            var row = table.insertRow(-1);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);

            // menambahkan class font-kitab pada kolom representasi
            cell3.classList.add("font-kitab");

            cell1.innerHTML = kode;
            cell2.innerHTML = nama;
            cell3.innerHTML = representasi;
            cell4.innerHTML = unicode;
            cell5.innerHTML =
                `<button class="btn-small" onclick="deleteRow(this.parentNode.parentNode.rowIndex)"><i class="material-icons">delete_sweep</i></button>`;

            addOption(id);
            updateCombinedValues();
            toggleNoData(); // panggil fungsi untuk menampilkan atau menyembunyikan elemen no-data
        }

        // Hapus semua data
        const deleteBtn = document.getElementById("delete-btn");
        const tbody = table.querySelector("tbody");

        deleteBtn.addEventListener("click", () => {

            tbody.innerHTML = '';

            clearOption();
            updateCombinedValues();
            toggleNoData(); // panggil fungsi untuk menampilkan atau menyembunyikan elemen no-data
        });

        function deleteRow(rowIndex) {
            document.getElementById("table-role-base").deleteRow(rowIndex);

            deleteOption(rowIndex - 1);
            updateCombinedValues();
            toggleNoData(); // panggil fungsi untuk menampilkan atau menyembunyikan elemen no-data
        }
    </script>
@endsection
