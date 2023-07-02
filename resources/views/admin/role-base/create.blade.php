@extends('layouts.admin')

@section('title')
    Buat Rule Tajwid
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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><b>RULE TAJWID</b></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('role-base.index') }}">Rule Tajwid</a></li>
                            <li class="breadcrumb-item active white-text"><b>Tambah</b></li>
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
                        <form action="{{ route('role-base.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col m12 s12 mb-3">
                                    <button class="waves-effect waves-dark btn btn-primary teal right" type="submit"><i
                                            class="material-icons left">save</i> Simpan</button>
                                </div>
                            </div>
                            <div class="row">

                                <div class="input-field col m6 s12">
                                    <label for="kode">Kode Rule Tajwid<span class="red-text">*</span></label>
                                    <input type="text" id="kode" name="kode"
                                        class="validate @error('kode') is-invalid @enderror" required
                                        value="{{ $newKodeRoleBase }}">
                                    @error('kode')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-field col m6 s12">
                                    <select class="select2 browser-default" name="tajwid">
                                        <option value="" disabled selected>--- Pilih Tajwid ---</option>
                                        @foreach ($data as $value)
                                            @if ($value->kode != 'H000')
                                                <option value="{{ $value->id }}">{{ $value->nama_tajwid }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <select class="select2 browser-default" name="synonym">
                                        <option value="" disabled selected>--- Pilih Referensi Sinonim ---</option>
                                        @foreach ($roleBase as $value)
                                            <option value="{{ $value->kode }}">{!! $value->kode . ' - ' . $value->keterangan . ' ('. html_entity_decode(json_decode('"' . $value->role. '"'), ENT_QUOTES, 'UTF-8') .')' !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col m12 s12 mb-5">
                                    <label>
                                        <input type="checkbox" class="filled-in" name="second-role" />
                                        <span>Rule Kedua</span>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <span>Keterangan</span>
                                    <textarea id="keterangan" name="keterangan" rows="5"></textarea>
                                </div>
                            </div>

                            <input type="text" id="pattern" name="role" hidden>

                            <div class="selectHiden" hidden>
                                <select name="tandaTajwid[]" id="tanda-tajwid" multiple></select>
                            </div>

                            <div class="row center-align">
                                <span><b>Representasi Rule Tajwid</b></span>
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

                                </tbody>
                            </table>
                            <div id="no-data" class="center-align mb-4 mt-2">
                                <span>Tidak ada tanda yang dipilih</span>
                            </div>
                            <div class="row center-align mt-2">
                                <button id="switch" class="btn-small">Sembunyikan Tabel</button>
                                <button id="delete-btn" class="btn-small"><i class="material-icons left">clear_all</i> Hapus
                                    semua data</button>
                            </div>
                            <div class="row center-align" id="key-button">
                                @foreach ($tandaTajwid as $value)
                                    <button
                                        onclick="addRow(`{{ $value->kode }}`, `{{ $value->nama_tanda }}`, `{{ $value->unicode }}`, `{{ trim(preg_replace('/\\\\u([0-9a-fA-F]{4})/', '\\\\u$1', json_encode($value->unicode)), '"') }}`, `{{ $value->id }}`)"
                                        class="btn-small tombol-tanda">

                                        @if ($value->unicode == '\u0020')
                                            <span class="font-kitab-bold"><i class="material-icons">space_bar</i></span>
                                        @else
                                            @if ($value->jenis == 'huruf')
                                                <span
                                                    class="font-kitab-bold" style="font-size: 18px;">{{ html_entity_decode(json_decode('"' . $value->unicode . '"'), ENT_QUOTES, 'UTF-8') }}</span>
                                            @elseif($value->jenis == 'tanda')
                                                <span
                                                    class="font-kitab-bold" style="font-size: 20px;">{{ html_entity_decode(json_decode('"' . $value->unicode . '"'), ENT_QUOTES, 'UTF-8') }}</span>
                                            @endif
                                        @endif
                                    </button>
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

    {{-- Input Keterangan --}}
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        // tinymce.init({
        // 	selector: 'textarea'
        // });
        tinymce.init({
            selector: 'textarea#keterangan',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_prefix: "{path}{query}-{id}-",
            autosave_restore_when_empty: false,
            autosave_retention: "2m",
            image_advtab: true,
            /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
            link_list: [{
                    title: 'My page 1',
                    value: 'https://www.codexworld.com'
                },
                {
                    title: 'My page 2',
                    value: 'https://www.xwebtools.com'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'https://www.codexworld.com'
                },
                {
                    title: 'My page 2',
                    value: 'https://www.xwebtools.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            file_picker_callback: function(callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {
                        text: 'My text'
                    });
                }
                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {
                        alt: 'My alt text'
                    });
                }
                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'https://www.google.com/logos/google.jpg'
                    });
                }
            },
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 300,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
        });
    </script>
@endsection
