@extends('layouts.admin')

@section('title')
    Edit Tajwid
@endsection

@section('styles')
    <link rel="stylesheet"
        href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2-materialize.css"
        type="text/css">
@endsection

@section('content')
    <div class="row">
        <div class="content-wrapper-before teal"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><b>DATA TAJWID</b></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tajwid.index') }}">Tajwid</a></li>
                            <li class="breadcrumb-item active white-text"><b>Edit</b></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="container mt-3">
                <div class="card mt-3">
                    <div class="card-content">
                        <p class="caption mb-0"><i>"Pastikan data yang diisikan valid!"</i></p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <form action="{{ route('tajwid.update', $tajwid->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="row">
                                <div class="input-field col m4 s12">
                                    <label for="namaTajwid">Nama Tajwid<span class="red-text">*</span></label>
                                    <input type="text" id="namaTajwid" name="namaTajwid"
                                        class="validate @error('namaTajwid') is-invalid @enderror" required
                                        value="{{ $tajwid->nama_tajwid }}">
                                    @error('namaTajwid')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-field col m4 s12">
                                    <label for="kode">Kode<span class="red-text">*</span></label>
                                    <input type="text" id="kode" name="kode"
                                        class="validate @error('kode') is-invalid @enderror" required
                                        value="{{ $tajwid->kode }}">
                                    @error('kode')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-field col m4 s12">
                                    <select class="select2 browser-default" name="kategori">
                                        <option value="" disabled>--- Pilih Kategori ---</option>
                                        @foreach ($kategori as $value)
                                            @if ($value->kode != 'K000')
                                                <option value="{{ $value->id }}"
                                                    @if ($value->id == $tajwid->kategori_id) selected @endif>
                                                    {{ $value->nama_kategori }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <span>Penjelasan Tajwid</span>
                                    <textarea id="penjelasan" name="penjelasan" rows="5">{{ $tajwid->penjelasan }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col m4 s12">
                                    <span>Tentukan contoh dari Al-Qur'an</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m4 s12">
                                    <select class="select2 browser-default" name="surah"
                                        onchange="updateAyahOptions(this)">
                                        <option value="" disabled selected>--- Pilih Surah ---</option>
                                        @foreach ($surahs as $surah)
                                            <option value="{{ $surah['number'] }}"
                                                @if ($surah['number'] == $tajwid->ex_surah) selected @endif>
                                                {{ $surah['number'] . '. ' . $surah['englishName'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-field col m4 s12">
                                    <select class="select2 browser-default" name="ayah" id="ayahSelect">
                                        <option value="" disabled selected>--- Pilih Ayah ---</option>
                                        @if($thisSurah != null)
                                        @for ($i = 1; $i <= $thisSurah['numberOfAyahs']; $i++)
                                            <option value="{{ $i }}"
                                                @if ($i == $tajwid->ex_ayah) selected @endif>{{ $i }}
                                            </option>
                                        @endfor
                                        @endif
                                    </select>
                                </div>
                                <div class="input-field col m4 s12">
                                    <label for="patternEx">Pattern Contoh<span class="red-text">*</span></label>
                                    <input type="text" id="patternEx" name="patternEx"
                                        class="validate @error('patternEx') is-invalid @enderror" required value="{{ $tajwid->pattern_ex }}">
                                    @error('patternEx')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col m6 s12 mb-1">
                                    <button class="waves-effect waves-dark btn btn-primary teal" type="submit"><i
                                            class="material-icons left">save</i> Simpan</button>
                                </div>
                            </div>
                        </form>
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
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        // tinymce.init({
        // 	selector: 'textarea'
        // });
        tinymce.init({
            selector: 'textarea#penjelasan',
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
    <script>
        function updateAyahOptions(select) {
            const surahNumber = select.value;
            const ayahSelect = document.getElementById("ayahSelect");

            // Clear existing options
            while (ayahSelect.firstChild) {
                ayahSelect.removeChild(ayahSelect.firstChild);
            }

            // Add new options based on the selected surah
            if (surahNumber) {
                const surah = findSurahByNumber(surahNumber);
                for (let i = 1; i <= surah['numberOfAyahs']; i++) {
                    const option = document.createElement("option");
                    option.value = i;
                    option.textContent = i;
                    ayahSelect.appendChild(option);
                }
            } else {
                // If no surah is selected, show default option
                const defaultOption = document.createElement("option");
                defaultOption.value = "";
                defaultOption.disabled = true;
                defaultOption.selected = true;
                defaultOption.textContent = "--- Pilih Ayah ---";
                ayahSelect.appendChild(defaultOption);
            }

            // Initialize Select2 for the updated options
            $('.select2').select2();
        }

        function findSurahByNumber(surahNumber) {
            return @json($surahs).find(surah => surah.number === parseInt(surahNumber));
        }

        // Initialize Select2 on page load
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
