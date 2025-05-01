@extends('admin.layout.master')
@section('title', 'Tambah Petugas Jumat')

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
            <a href="{{ route('petugas-jumat.index') }}" class="nav-link">
                <i class="align-middle me-2" data-feather="arrow-left-circle"></i>
                Kembali
            </a>
        </h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <form action="{{ route('petugas-jumat.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            @include('admin.petugasJumat._form')

                        </div>
                    </div>
                    @include('admin.layout.buttonSave')
                </form>
            </div>
        </div>

    </div>
</main>

@endsection