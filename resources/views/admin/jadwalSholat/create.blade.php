@extends('admin.layout.master')
@section('title', 'Tambah Jadwal Sholat')

@section('content')

<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">


                <span class="text-dark text-uppercase">
                    @yield('title')
                </span>

            </li>
        </ul>
    </div>
</nav>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">
            <a href="{{ route('admin.jadwal-sholat.index') }}" class="nav-link">
                <i class="align-middle me-2" data-feather="arrow-left-circle"></i>
                Kembali
            </a>
        </h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.jadwal-sholat.uploadExcel') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="file">Pilih File Excel</label>
                                <input type="file" class="form-control" id="file" name="file" value="{{ old('file') }}"
                                    required>
                                <small class="form-text text-muted">
                                    Format file harus .xlsx, .xls, atau .csv. Kolom harus berisi: date, subuh, syuruq,
                                    dzhuhur,
                                    asar, maghrib, isya
                                </small>
                            </div>

                            <button type="submit" class="btn btn-primary  mt-4">
                                <i class="align-middle me-2" data-feather="save"></i>
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection