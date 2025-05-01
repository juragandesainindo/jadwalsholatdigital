@extends('admin.layout.master')
@section('title','Pengaturan Detail Masjid')

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

        @foreach ($detailMasjid as $item)
        <h1 class="h3 mb-3">
            <a href="{{ route('admin.pengaturan-detail-masjid.edit',$item->id) }}" class="btn btn-info">
                <i class="align-middle me-2" data-feather="edit"></i>
                Edit @yield('title')
            </a>
        </h1>

        <div class="row">
            <div class="col-12 col-lg-12">

                @include('admin.message')

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>Nama Masjid/Mushalla</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Utama</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $item->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Sub</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $item->alamat2 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Logo</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $item->logo }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>

@endsection