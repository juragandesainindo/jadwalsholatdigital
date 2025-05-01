@extends('admin.layout.master')
@section('title','Kategori Keuangan')

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
            <a href="{{ route('kategori-keuangan.create') }}" class="btn btn-primary">
                <i class="align-middle me-2" data-feather="plus-circle"></i>
                Tambah @yield('title')
            </a>
        </h1>

        <div class="row">
            <div class="col-12 col-lg-12">

                @include('admin.message')

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="datatable" class="table table-bordered" style="width: 100%">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    @forelse ($kategori as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm mb-1"
                                                href="{{ route('kategori-keuangan.edit',$item->id) }}">
                                                <i class="align-middle me-2" data-feather="edit"></i>
                                                Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm mb-1"
                                                data-bs-toggle="modal" data-bs-target="#delete-{{ $item->id }}">
                                                <i class="align-middle me-2" data-feather="trash"></i>
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-secondary">Data tidak ditemukan...!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Modal -->
@foreach ($kategori as $item)
<div class="modal fade" id="delete-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hapus @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kategori-keuangan.destroy',$item->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah Yakin Ingin Menghapus Kategori Keuangan ini? <br>
                    <strong>"{{ $item->kategori }}"</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="align-middle me-2" data-feather="trash"></i>
                        Ya, hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection