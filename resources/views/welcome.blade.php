<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Info Keuangan Masjid</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;

        }

        html,
        body {
            color: #fff;
            font-family: sans-serif;
            height: 100%;
        }

        .slider-container {
            width: 20%;
            height: 90%;
            overflow: hidden;
            position: relative;
        }

        .horizontal-slider {
            display: flex;
            transition: transform 1s ease;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .category-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease;
            pointer-events: none;
            min-width: 100%;
            height: 100%;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .category-slide.active {
            opacity: 1;
            pointer-events: auto;
        }

        .category-slide .card {
            background: #1e1e1e;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .category-slide .text-lg {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .category-slide .text-sm {
            font-size: 14px;
            color: #ccc;
        }

        .category-slide .mb-1 {
            margin-bottom: 5px;
        }

        .category-slide .card-second {
            position: relative;
            flex-grow: 1;
            overflow: hidden;
            margin-top: 10px;
            border: 2px solid red;
        }

        .category-slide .card-vertical-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            transition: transform 0.6s ease;
        }

        .category-slide .card-detail {
            padding: 10px 15px;
            background: #2a2a2a;
            border-bottom: 1px solid #444;
        }
    </style>
</head>

<body>

    <div class="slider-container">
        <div class="horizontal-slider" id="slider">
            <!-- SLIDE 1 -->
            <div class="category-slide">
                <div class="card">
                    <div class="text-lg">KAS PEMBANGUNAN MASJID</div>
                    <div class="text-sm mb-1">April 2025</div>
                    <div>Saldo terakhir: Rp 1.000.000</div>
                    <div>Pengeluaran: Rp 500.000</div>
                    <div><strong>Total Saldo: Rp 500.000</strong></div>
                </div>
                <div class="card-second">
                    <div class="card-vertical-wrapper">
                        <div class="card-detail text-sm">28 Maret 2025 - Donasi warga A - Rp 500.000</div>
                        <div class="card-detail text-sm">29 Maret 2025 - Donasi warga B - Rp 500.000</div>
                        <div class="card-detail text-sm">1 April 2025 - Beli semen - Rp 300.000</div>
                        <div class="card-detail text-sm">2 April 2025 - Beli keramik - Rp 200.000</div>
                        <div class="card-detail text-sm">2 April 2025 - Beli keramik - Rp 200.000</div>
                        <div class="card-detail text-sm">2 April 2025 - Beli keramik - Rp 200.000</div>
                        <div class="card-detail text-sm">2 April 2025 - Beli keramik - Rp 200.000</div>
                        <div class="card-detail text-sm">2 April 2025 - Beli keramik - Rp 200.000</div>
                        <div class="card-detail text-sm">2 April 2025 - Beli keramik - Rp 200.000</div>
                        <div class="card-detail text-sm">2 April 2025 - Beli keramik - Rp 200.000</div>
                        <div class="card-detail text-sm">2 April 2025 - Beli keramik - Rp 200.000</div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 2 -->
            <div class="category-slide">
                <div class="card">
                    <div class="text-lg">KAS INFAK ANAK YATIM</div>
                    <div class="text-sm mb-1">April 2025</div>
                    <div>Pemasukan: Rp 2.000.000</div>
                    <div>Pengeluaran: Rp 1.000.000</div>
                    <div><strong>Total Saldo: Rp 1.000.000</strong></div>
                </div>
                <div class="card-second">
                    <div class="card-vertical-wrapper">
                        <div class="card-detail text-sm">30 Maret 2025 - Infak jemaah A - Rp 1.000.000</div>
                        <div class="card-detail text-sm">31 Maret 2025 - Infak jemaah B - Rp 1.000.000</div>
                        <div class="card-detail text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 3 -->
            <div class="category-slide">
                <div class="card">
                    <div class="text-lg">KAS TPQ</div>
                    <div class="text-sm mb-1">April 2025</div>
                    <div>Pemasukan: Rp 2.000.000</div>
                    <div>Pengeluaran: Rp 1.000.000</div>
                    <div><strong>Total Saldo: Rp 1.000.000</strong></div>
                </div>
                <div class="card-second">
                    <div class="card-vertical-wrapper">
                        <div class="card-detail text-sm">30 Maret 2025 - Infak jemaah A - Rp 1.000.000</div>
                        <div class="card-detail text-sm">31 Maret 2025 - Infak jemaah B - Rp 1.000.000</div>
                        <div class="card-detail text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>






    {{-- <div class="slider-container">
        <div class="horizontal-slider" id="sliderKeuangan">
            @foreach($kas as $item)
            <div class="category-slide">
                <div class="card">
                    <div class="text-lg">
                        {{ strtoupper($item->kategori) }}
                    </div>
                    <div class="text-sm mb-1">
                        {{ \Carbon\Carbon::parse($item->periode)->translatedFormat('F Y') }}
                    </div>
                    <div>Saldo terakhir: Rp
                        {{ number_format($item->saldo_awal, 0, ',', '.') }}
                    </div>
                    <div>Pengeluaran: Rp
                        {{ number_format($item->pengeluaran, 0, ',', '.') }}
                    </div>
                    <div><strong>Total Saldo: Rp
                            {{ number_format($item->saldo_akhir, 0, ',', '.') }}
                        </strong></div>
                </div>
                <div class="card-second">
                    <div class="card-vertical-wrapper">
                        @foreach($item->detail as $detail)
                        <div class="card-detail text-sm">
                            {{
                            \Carbon\Carbon::parse($detail->tanggal)->translatedFormat('d M Y')
                            }} -
                            {{
                            $detail->keterangan }} - Rp {{ number_format($detail->jumlah, 0, ',', '.')
                            }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}

    <script src="{{ asset('assets/js/welcome.js') }}"></script>

</body>

</html>