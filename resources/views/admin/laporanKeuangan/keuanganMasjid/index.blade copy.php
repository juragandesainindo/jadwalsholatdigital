@extends('admin.layout.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Keuangan Masjid</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Keuangan Masjid</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @include('admin.message')

                    @foreach ($kategoris as $kategori)
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('keuangan-masjid.create') }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-plus-circle"></i> &nbsp;
                                    Tambah {{ $kategori->kategori }}
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2-{{ $kategori->id }}" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Jenis</th>
                                        <th>Nominal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($kategori->keuanganMasjid as $key=>$item)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>{{ $item->nominal }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                            <span class="badge badge-success">Aktif</span>
                                            @else
                                            <span class="badge badge-secondary">Tidak Aktif</span>

                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#modal-edit-">
                                                <i class="fas fa-edit"></i>
                                                &nbsp; Edit
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    @endforeach
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal post -->
@foreach ($kategoris as $kategori)
<div class="modal fade" id="modal-add-{{ $kategori->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah {{ $kategori->kategori }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('keuangan-masjid.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="kategori_keuangan_id" value="{{ $kategori->id }}">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                            placeholder="contoh: Infak Jum'at" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="">Pilih jenis</option>
                            <option value="Masuk">Masuk</option>
                            <option value="Keluar">Keluar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="text" class="form-control" id="nominal" oninput="formatRupiah(this)" name="nominal"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
<!-- /.modal post -->



@endsection

@push('js')

<script>
    $(function() {
        @foreach($kategoris as $kategori)

        $('#example2-{{ $kategori->id }}').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        @endforeach
    });
</script>
<script>
    function formatRupiah(input) {
        let angka = input.value.replace(/\D/g, ""); // Hanya angka
        let formatted = angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        input.value = formatted;
    }
</script>
@endpush