@extends('admin.layout.master')
@section('title', 'Edit Kategori Keuangan')

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
            <a href="{{ route('kategori-keuangan.index') }}" class="nav-link">
                <i class="align-middle me-2" data-feather="arrow-left-circle"></i>
                Kembali
            </a>
        </h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kategori-keuangan.update',$kategori->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('admin.laporanKeuangan.kategoriKeuangan._form')

                            <button type="submit" class="btn btn-primary  mt-4">
                                <i class="align-middle me-2" data-feather="save"></i>
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection