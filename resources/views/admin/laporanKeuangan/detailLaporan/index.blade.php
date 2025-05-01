@extends('admin.layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Laporan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Detail Laporan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="pt-2 px-3">
                                <h3 class="card-title">Detail Laporan 7 Hari Terakhir</h3>
                            </li>
                            @foreach ($laporanFinal as $key => $item)
                            <li class="nav-item">
                                <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                    id="tab-{{ str_replace(' ','-',$item['kategori']) }}" data-toggle="pill"
                                    href="#content-{{ str_replace(' ','-',$item['kategori']) }}" role="tab"
                                    aria-controls="content-{{ str_replace(' ','-',$item['kategori']) }}"
                                    aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                    {{ $item['kategori'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($laporanFinal as $key => $item)
                            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                id="content-{{ str_replace(' ','-',$item['kategori']) }}" role="tabpanel"
                                aria-labelledby="tab-{{ str_replace(' ','-',$item['kategori']) }}">
                                <div class="row">
                                    <div class="col-sm-4 col-6">
                                        <div class="description-block border-right">
                                            <h5 class="description-header text-success">
                                                Rp. {{ number_format($item['laporan_7_hari']['totalMasuk'],0,',',',') }}
                                            </h5>
                                            <span class="description-text">Total Masuk</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="description-block border-right">
                                            <h5 class="description-header text-danger">
                                                Rp. {{ number_format($item['laporan_7_hari']['totalKeluar'],0,',',',')
                                                }}
                                            </h5>
                                            <span class="description-text">Total Keluar</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="description-block border-right">
                                            @if ($item['laporan_7_hari']['saldoAkhir']>0)
                                            <h5 class="description-header text-success">
                                                Rp. {{ number_format($item['laporan_7_hari']['saldoAkhir'],0,',',',') }}
                                            </h5>
                                            <span class="description-text text-success"><strong>Saldo
                                                    Akhir</strong></span>
                                            @else
                                            <h5 class="description-header text-danger">
                                                Rp. {{ number_format($item['laporan_7_hari']['saldoAkhir'],0,',',',') }}
                                            </h5>
                                            <span class="description-text text-danger"><strong>Saldo
                                                    Akhir</strong></span>

                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="pt-2 px-3">
                                <h3 class="card-title">Detail Laporan 1 Bulan Terakhir</h3>
                            </li>
                            @foreach ($laporanFinal as $key => $item)
                            <li class="nav-item">
                                <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                    id="tab-{{ str_replace(' ','-',$item['kategori']) }}-bulan" data-toggle="pill"
                                    href="#content-{{ str_replace(' ','-',$item['kategori']) }}-bulan" role="tab"
                                    aria-controls="content-{{ str_replace(' ','-',$item['kategori']) }}-bulan"
                                    aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                    {{ $item['kategori'] }} Bulan
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($laporanFinal as $key => $item)
                            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                id="content-{{ str_replace(' ','-',$item['kategori']) }}-bulan" role="tabpanel"
                                aria-labelledby="tab-{{ str_replace(' ','-',$item['kategori']) }}-bulan">
                                <div class="row">
                                    <div class="col-sm-4 col-6">
                                        <div class="description-block border-right">
                                            <h5 class="description-header text-success">
                                                Rp. {{ number_format($item['laporan_bulanan']['totalMasuk'],0,',',',')
                                                }}
                                            </h5>
                                            <span class="description-text">Total Masuk</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="description-block border-right">
                                            <h5 class="description-header text-danger">
                                                Rp. {{ number_format($item['laporan_bulanan']['totalKeluar'],0,',',',')
                                                }}
                                            </h5>
                                            <span class="description-text">Total Keluar</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="description-block border-right">
                                            @if ($item['laporan_bulanan']['saldoAkhir']>0)
                                            <h5 class="description-header text-success">
                                                Rp. {{ number_format($item['laporan_bulanan']['saldoAkhir'],0,',',',')
                                                }}
                                            </h5>
                                            <span class="description-text text-success"><strong>Saldo
                                                    Akhir</strong></span>
                                            @else
                                            <h5 class="description-header text-danger">
                                                Rp. {{ number_format($item['laporan_bulanan']['saldoAkhir'],0,',',',')
                                                }}
                                            </h5>
                                            <span class="description-text text-danger"><strong>Saldo
                                                    Akhir</strong></span>

                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="pt-2 px-3">
                                <h3 class="card-title">Detail All</h3>
                            </li>
                            @foreach ($laporanFinal as $key => $item)
                            <li class="nav-item">
                                <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                    id="tab-{{ str_replace(' ','-',$item['kategori']) }}-all" data-toggle="pill"
                                    href="#content-{{ str_replace(' ','-',$item['kategori']) }}-all" role="tab"
                                    aria-controls="content-{{ str_replace(' ','-',$item['kategori']) }}-all"
                                    aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                    {{ $item['kategori'] }} All
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($laporanFinal as $key => $item)
                            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                id="content-{{ str_replace(' ','-',$item['kategori']) }}-all" role="tabpanel"
                                aria-labelledby="tab-{{ str_replace(' ','-',$item['kategori']) }}-all">
                                <div class="row">
                                    <div class="col-sm-4 col-6">
                                        <div class="description-block border-right">
                                            <h5 class="description-header text-success">
                                                Rp. {{ number_format($item['laporan_all']['totalMasuk'],0,',',',') }}
                                            </h5>
                                            <span class="description-text">Total Masuk</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="description-block border-right">
                                            <h5 class="description-header text-danger">
                                                Rp. {{ number_format($item['laporan_all']['totalKeluar'],0,',',',')
                                                }}
                                            </h5>
                                            <span class="description-text">Total Keluar</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="description-block border-right">
                                            @if ($item['laporan_all']['saldoAkhir']>0)
                                            <h5 class="description-header text-success">
                                                Rp. {{ number_format($item['laporan_all']['saldoAkhir'],0,',',',') }}
                                            </h5>
                                            <span class="description-text text-success"><strong>Saldo
                                                    Akhir</strong></span>
                                            @else
                                            <h5 class="description-header text-danger">
                                                Rp. {{ number_format($item['laporan_all']['saldoAkhir'],0,',',',') }}
                                            </h5>
                                            <span class="description-text text-danger"><strong>Saldo
                                                    Akhir</strong></span>

                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- "kategori" => "Kas Operasional Keuangan"
            "totalMasuk" => 0
            "totalKeluar" => 11000000
            "saldoAkhir" => -11000000
            "data" => array:2 [▼
            0 => array:9 [▼
            "id" => 1
            "kategori_keuangan_id" => 1
            "tanggal" => "2025-03-23"
            "keterangan" => "Gharim"
            "jenis" => "Keluar"
            "nominal" => "1000000"
            "status" => 1
            "created_at" => "2025-03-23T16:27:07.000000Z"
            "updated_at" => "2025-03-23T16:27:07.000000Z"
            ] --}}






        </div>
    </section>
</div>

@endsection