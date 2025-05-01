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
                    {{ $detailMasjid->nama }}
                </div>
            </div>
            <div class="header-right">
                <div class="header-right-title">
                    {{ $detailMasjid->alamat }}
                </div>
                <div class="header-right-subtitle">
                    {{ $detailMasjid->alamat2 }}
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-left">
                <div class="section-left-jam">
                    <h1 class="header-oclock" id="current-time"></h1>
                    <p id="current-date">
                        @if ($tanggal == 0)
                        {{ \Carbon\Carbon::parse(date(now()))->translatedFormat('l') }}
                        @else
                        {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l') }}
                        @endif
                        <br>
                        {{ $hijriDate }}
                    </p>
                    <p id="current-date">
                        @if ($tanggal == 0)
                        {{ \Carbon\Carbon::parse(date(now()))->translatedFormat('d F Y') }}
                        @else
                        {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                        @endif
                    </p>

                </div>
                @foreach (['subuh', 'syuruq', 'dzhuhur', 'asar', 'maghrib', 'isya'] as $sholat)
                <div class="section-left-jadwal">
                    <div class="section-left-jadwal-left">
                        {{ ucfirst($sholat) }}
                    </div>
                    <div class="section-left-jadwal-right">
                        {{ $jadwal[$sholat] ?? '00:00:00' }}
                    </div>
                </div>
                @endforeach
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
                <p id="next-prayer"></p>
                <h1 id="countdown"></h1>
            </div>
            @if ($nextHoliday)
            <div class="date-time-right">
                <h1 id="holiday-countdown"></h1>
                <p>{{ $nextHoliday->name }}</p>
            </div>
            @endif
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