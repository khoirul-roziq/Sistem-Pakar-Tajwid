@extends('layouts.admin')

@section('title')
    Kategori
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/data-tables/css/style.css') }}">
    <link rel="stylesheet" href="https://alquran.cloud/public/css/font-kitab.css?v=1">
@endsection

@section('content')
    <div class="row">
        <div class="content-wrapper-before teal"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><b>KATEGORI</b></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                            <li class="breadcrumb-item active white-text"><b>Kategori</b></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="container mt-3">
                <!-- users list start -->

                @if (session('message'))
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s10 m12 l12">
                                    <div class="card-alert card cyan">
                                        <div class="card-content white-text">
                                            <p>
                                                <i class="material-icons">check</i> {{ session('message') }}
                                            </p>
                                        </div>
                                        <button type="button" class="close white-text" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="row">
                        <div class="container">
                            <div id="man" class="col s12">
                                <div class="card material-table">
                                    <div class="table-header">
                                        <span class="table-title"></span>
                                        <div class="actions">
                                            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i
                                                    class="material-icons">search</i></a>
                                            {{-- <a href="#" class="modal-trigger waves-effect btn-flat nopadding"><i
                                                    class="material-icons">file_download</i></a> --}}
                                            <a href="{{ route('kategori.create') }}"
                                                class="modal-trigger waves-effect btn-flat nopadding"><i
                                                    class="material-icons">add_circle</i></a>
                                        </div>
                                    </div>

                                    <table id="datatable">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $value)
                                                @if ($value->kode != 'K000')
                                                    <tr>
                                                        <td>{{ $value->kode }}</td>
                                                        <td>{{ $value->nama_kategori }}</td>
                                                        <td>
                                                            <form action="{{ route('kategori.destroy', $value->id) }}"
                                                                method="post" class="delete" id="delete{{ $value->id }}"
                                                                name="delete">
                                                                @method('delete')
                                                                @csrf
                                                                <!-- Dropdown Trigger -->
                                                                <a class='dropdown-trigger btn-small teal white-text'
                                                                    href='#'
                                                                    data-target='aksi{{ $value->id }}'><b>Pilih
                                                                        Aksi!</b></a>

                                                                <!-- Dropdown Structure -->
                                                                <ul id='aksi{{ $value->id }}' class='dropdown-content'>
                                                                    <li><a href="{{ route('kategori.edit', $value->id) }}"><i
                                                                                class="material-icons">edit</i>Edit</a></li>
                                                                    <li><a onclick="fungsiDelete({{ $value->id }})"><i
                                                                                class="material-icons">delete</i>Hapus</a>
                                                                    </li>
                                                                </ul>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- users list ends -->


            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://pixinvent.com/materialize-material-design-admin-template/laravel/demo-1/js/scripts/ui-alerts.js">
    </script>
    <script src="{{ asset('assets/vendor/data-tables/js/script.js') }}"></script>
    <script>
        function fungsiDelete(id) {
            if (confirm('Apakah kamu yakin akan menghapus data ini?')) {
                document.getElementById('delete' + id).submit();
            }
        }
    </script>
@endsection
