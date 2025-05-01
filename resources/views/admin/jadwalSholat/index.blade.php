@extends('admin.layout.master')
@section('title','Jadwal Sholat')

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
            <a href="{{ route('admin.jadwal-sholat.create') }}" class="btn btn-primary">
                <i class="align-middle me-2" data-feather="plus-circle"></i>
                Tambah @yield('title')
            </a>
        </h1>

        <div class="row">
            <div class="col-12 col-lg-12">


                @include('admin.message')

                <div class="card">
                    <div class="card-body">
                        <form id="search-form">
                            <div class="row">
                                <div class="col-md-3 mb-2 mt-md-0">
                                    <label for="search_date">Tanggal Spesifik</label>
                                    <input type="date" class="form-control" id="search_date" name="search_date">
                                </div>
                                <div class="col-md-3 mb-2 mt-md-0">
                                    <label for="search_month">Bulan</label>
                                    <select class="form-select" id="search_month" name="search_month">
                                        <option value="">Pilih Bulan</option>
                                        @for($i=1; $i<=12; $i++) <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0,
                                            $i, 1)) }}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="search_year">Tahun</label>
                                    <select class="form-select" id="search_year" name="search_year">
                                        <option value="">Pilih Tahun</option>
                                        @foreach($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end mt-3 mt-md-0">
                                    <button type="submit" class="btn btn-primary me-2">Cari</button>
                                    <button type="reset" class="btn btn-secondary" id="reset-filter">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="datatable" class="table table-bordered" style="width: 100%">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Subuh</th>
                                        <th>Syuruq</th>
                                        <th>Dzhuhur</th>
                                        <th>Asar</th>
                                        <th>Maghrib</th>
                                        <th>Isya</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <!-- Data akan diisi oleh DataTables secara server-side -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection

@push('js')

<script>
    $(document).ready(function() {
        // Inisialisasi datepicker
        flatpickr("#search_date", {
            dateFormat: "Y-m-d",
            allowInput: true
        });

        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            // Sembunyikan search box default
            dom: '<"top">rt<"bottom"ip><"clear">',
            // lengthChange: false,
            ajax: {
                url: "{{ route('admin.jadwal-sholat.index') }}",
                data: function (d) {
                    d.search_date = $('#search_date').val();
                    d.search_month = $('#search_month').val();
                    d.search_year = $('#search_year').val();
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'date', name: 'date'},
                {data: 'subuh', name: 'subuh'},
                {data: 'syuruq', name: 'syuruq'},
                {data: 'dzhuhur', name: 'dzhuhur'},
                {data: 'asar', name: 'asar'},
                {data: 'maghrib', name: 'maghrib'},
                {data: 'isya', name: 'isya'},
            ],
            order: [[1, 'asc']],
            language: {
                search: "Cari:",
                lengthMenu: " _MENU_ ",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                infoEmpty: "Tidak ada data tersedia",
                infoFiltered: "(difilter dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            }
        });

        // Submit form filter
        $('#search-form').on('submit', function(e) {
            e.preventDefault();
            table.draw();
        });

        // Reset filter
        $('#reset-filter').on('click', function() {
            $('#search-form')[0].reset();
            table.draw();
        });
    });
</script>
@endpush