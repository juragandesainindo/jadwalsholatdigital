<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Sholat</title>
    <link rel="stylesheet" href="{{ asset('assets/css/prayer.css') }}">
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
</head>

<body>
    <div class="content">

        <div class="header">
            <div class="header-left">
                <div class="header-left-logo">
                    <img src="{{ asset('assets/img/mosque.svg') }}" alt="">
                </div>
                <div class="header-left-name">
                    MASJID AGUNG NURUL FALAH
                </div>
            </div>
            <div class="header-right">
                <div class="header-right-title">
                    Kantor Bupati Kabupaten Agam
                </div>
                <div class="header-right-subtitle">
                    Lubuk Basung - Sumatera Barat
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-left">
                <div class="section-left-jam">
                    <h1>17:00:30</h1>
                    <p>Minggu</p>
                    <p>22 Maret 2025</p>

                </div>
                <div class="section-left-jadwal">
                    <div class="section-left-jadwal-left">
                        Subuh
                    </div>
                    <div class="section-left-jadwal-right">
                        05:11
                    </div>
                </div>
                <div class="section-left-jadwal">
                    <div class="section-left-jadwal-left">
                        Syuruq
                    </div>
                    <div class="section-left-jadwal-right">
                        05:11
                    </div>
                </div>
                <div class="section-left-jadwal">
                    <div class="section-left-jadwal-left">
                        Dzhuhur
                    </div>
                    <div class="section-left-jadwal-right">
                        05:11
                    </div>
                </div>
                <div class="section-left-jadwal">
                    <div class="section-left-jadwal-left">
                        Asar
                    </div>
                    <div class="section-left-jadwal-right">
                        05:11
                    </div>
                </div>
                <div class="section-left-jadwal">
                    <div class="section-left-jadwal-left">
                        Maghrib
                    </div>
                    <div class="section-left-jadwal-right">
                        05:11
                    </div>
                </div>
                <div class="section-left-jadwal">
                    <div class="section-left-jadwal-left">
                        Isya
                    </div>
                    <div class="section-left-jadwal-right">
                        05:11
                    </div>
                </div>
            </div>
            <div class="section-center">
                <img src="{{ asset('assets/img/img1.jpg') }}" alt="">
            </div>
            <div class="section-right">
                <div class="section-right-content">
                    <div class="top">
                        <div class="top-number">
                            1.
                        </div>
                        <div class="top-title">
                            Kas Opr Masjid
                        </div>
                    </div>
                    <div class="center">
                        Kas Awal 21-03-2025 <br>
                        Rp. 10.000.000
                        <br><br>
                        Pemasukan <br>
                        Rp. 10.000.000
                    </div>
                    <div class="bottom">
                        Rp. 1.000.210.000
                    </div>
                </div>
            </div>
        </div>
        <div class="date-time">
            <div class="date-time-left">
                <p>Waktu Zuhur</p>
                <h1>07:30</h1>
            </div>
            <div class="date-time-right">
                <h1>4</h1>
                <p>Hari Idul Fitri</p>
            </div>
        </div>

        <div class="bottom">
            <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">
                <div class="holder">
                    @foreach ($runningText as $running)
                    <div class="bottom-running">
                        &nbsp; &nbsp; <img src="{{ asset('assets/img/rocket.png') }}"> &nbsp;&nbsp;
                        {{ $running->title }}
                    </div>
                    @endforeach
                </div>
        </div>
    </div>


    <audio id="alarm" src="{{ asset('assets/iqomah.mp3') }}" preload="auto"></audio>


    <script>
        let prayerTimes = @json($jadwal);
        let holidayDate = @json($nextHoliday ? $nextHoliday->date : null);
    </script>
    <script src="{{ asset('assets/js/jadwal.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
</body>

</html>