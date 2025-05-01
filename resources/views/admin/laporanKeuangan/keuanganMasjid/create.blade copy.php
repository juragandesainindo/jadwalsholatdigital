@extends('admin.layout.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Keuangan Masjid</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/dashboard') }}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('keuangan-masjid.index') }}">
                                Kembali
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Keuangan Masjid</li>
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

                    <div class="card card-info card-outline">
                        <!-- /.card-header -->

                        <div class="card-body">

                            <form action="{{ route('keuangan-masjid.store') }}" method="POST">
                                @csrf

                                @include('admin.laporanKeuangan.keuanganMasjid._form')

                                <button type="submit" class="btn btn-primary  mt-2">
                                    <i class="fas fa-save"></i>&nbsp;
                                    Simpan
                                </button>
                                <a href="{{ route('keuangan-masjid.index') }}" class="btn btn-secondary mt-2">
                                    <i class="fas fa-backward"></i>&nbsp;
                                    Kembali
                                </a>
                            </form>


                        </div>
                        <!-- /.card-body -->
                    </div>
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



@endsection