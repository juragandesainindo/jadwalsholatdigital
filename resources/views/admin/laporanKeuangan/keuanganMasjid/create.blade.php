@extends('admin.layout.master')
@section('title', 'Tambah Keuangan Masjid')

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
            <a href="{{ route('keuangan-masjid.index') }}" class="nav-link">
                <i class="align-middle me-2" data-feather="arrow-left-circle"></i>
                Kembali
            </a>
        </h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('keuangan-masjid.store') }}" method="POST">
                            @csrf

                            @include('admin.laporanKeuangan.keuanganMasjid._form')

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

@push('js')
<script>
    function formatRupiah(input) {
            let angka = input.value.replace(/\D/g, ""); // Hanya angka
            let formatted = angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            input.value = formatted;
        }
</script>
@endpush