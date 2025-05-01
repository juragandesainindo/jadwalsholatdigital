@extends('admin.layout.master')
@section('title','Running Text')

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
            <a href="{{ route('running-text.create') }}" class="btn btn-primary">
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
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Urutan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    @forelse ($running as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td class="text-center">
                                            @if ($item->status == 1)

                                            <span class="badge bg-success">Aktif</span>
                                            @else
                                            <span class="badge bg-secondary">Non Aktif</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $item->order }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm mb-1"
                                                href="{{ route('running-text.edit',$item->id) }}">
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
                                        <td colspan="5" class="text-center text-secondary">Data tidak ditemukan...!</td>
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
@foreach ($running as $item)
<div class="modal fade" id="delete-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hapus @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('running-text.destroy',$item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah Yakin Ingin Menghapus Running Text ini? <br>
                    <strong>"{{ $item->title }}"</strong>
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