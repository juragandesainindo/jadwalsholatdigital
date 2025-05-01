<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Sholat</title>
    <link rel="stylesheet" href="{{ asset('assets/css/jadwal.css') }}">
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
</head>

<body>
    <div class="content">

        {{-- Topbar Start --}}
        <div class="topbar" data-interval="{{ $interval ?? 5000 }}">
            <div class="slider">
                @foreach ($sliders as $slide)
                <div class="slide" style="background: {{ $slide->color }};">
                    <div class="title">{{ $slide->title }}</div>
                    <div class="sub-title">{{ $slide->sub_title }}</div>
                    <div class="description">{{ $slide->description }}</div>
                </div>
                @endforeach
                <!-- Duplikasi slide pertama untuk efek looping -->
                @if (count($sliders) > 0)
                <div class="slide" style="background: {{ $sliders[0]->color }};">
                    <div class="title">{{ $sliders[0]->title }}</div>
                    <div class="sub-title">{{ $sliders[0]->sub_title }}</div>
                    <div class="description">{{ $sliders[0]->description }}</div>
                </div>
                @endif
            </div>
        </div>
        {{-- Topbar End --}}

        <div class="header">
            <div class="header-name">
                <h1>MASJID ALHAMDULILLAH</h1>
                <p>Jl. Karya Mandiri - Pekanbaru</p>
            </div>
            <div class="header-time">
                <div class="header-date">
                    <div class="masehi" id="current-date">
                        @if ($tanggal == 0)
                        {{ \Carbon\Carbon::parse(date(now()))->translatedFormat('d F Y') }}
                        @else
                        {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                        @endif
                    </div>
                    <div class="hijriyah">
                        {{ $hijriDate }}
                    </div>
                </div>
                <div class="header-oclock" id="current-time"></div>
            </div>
        </div>
        <div class="jadwal">
            @foreach (['subuh', 'syuruq', 'dzhuhur', 'asar', 'maghrib', 'isya'] as $sholat)
            <div class="jadwal-sholat-item">
                <p>{{ ucfirst($sholat) }}</p>
                <h3>{{ $jadwal[$sholat] ?? '00:00:00' }}</h3>
            </div>
            @endforeach
        </div>
        <div class="counter">
            <div class="counter-sholat">
                <p id="next-prayer"></p>
                <p id="countdown"></p>
            </div>
            <div class="counter-islamic">
                @if ($nextHoliday)
                <p>{{ $nextHoliday->name }} <span id="holiday-countdown"></span> hari lagi</p>
                @endif
            </div>

        </div>
        <div class="running-text">
            <div class="main-runtext">
                <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">

                    <div class="holder">
                        @foreach ($runningText as $running)
                        <div class="text-container">
                            &nbsp; &nbsp; <img src="{{ asset('assets/img/rocket.png') }}"> &nbsp;&nbsp;
                            {{ $running->title }}
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
        <audio id="alarm" src="{{ asset('assets/iqomah.mp3') }}" preload="auto"></audio>
    </div>



    <script>
        let prayerTimes = @json($jadwal);
        let holidayDate = @json($nextHoliday ? $nextHoliday->date : null);
    </script>
    <script src="{{ asset('assets/js/jadwal.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
</body>

</html>