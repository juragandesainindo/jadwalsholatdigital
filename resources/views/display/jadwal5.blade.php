<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal 6</title>
    <link rel="website icon" type="svg" href="{{ asset('assets/img/logo2.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jadwal5.css') }}">
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
</head>

<body>
    <section>
        <div class="navbar">
            <div class="navbar-logo">
                <img src="{{ asset('assets/img/logo2.svg') }}" alt="logo">
            </div>
            <div class="navbar-content">
                <div class="navbar-title">
                    <h1>{{ $detailMasjid->nama }}</h1>
                    <p>{{ $detailMasjid->alamat }}</p>
                </div>
                <div class="navbar-time">
                    <div class="navbar-date">
                        <p id="current-date">
                            @if ($tanggal == 0)
                            {{ \Carbon\Carbon::parse(date(now()))->translatedFormat('l') }}
                            @else
                            {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l') }}
                            @endif
                            -
                            @if ($tanggal == 0)
                            {{ \Carbon\Carbon::parse(date(now()))->translatedFormat('d F Y') }}
                            @else
                            {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                            @endif
                        </p>
                        <p>{{ $hijriDate }}</p>
                    </div>
                    <div class="navbar-oclock">
                        <h2 id="current-time"></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-start">
                @foreach (['subuh', 'syuruq', 'dzhuhur', 'asar', 'maghrib', 'isya'] as $sholat)
                <div class="prayer">
                    <p>{{ ucfirst($sholat) }}</p>
                    <h3>
                        {{ \Carbon\Carbon::parse($jadwal[$sholat] ?? '00:00')->format('H:i') }}
                    </h3>
                </div>
                @endforeach
                <div class="prayer prayer-countdown">
                    <p id="next-prayer"></p>
                    <h3 id="countdown"></h3>
                </div>
            </div>
            <div class="content-end">
                <div class="carousel">
                    <div class="carousel-inner">
                        @foreach($sliders as $index => $slider)
                        <div class="carousel-item {{ $slider->order == 1 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $slider->image) }}" class="d-block w-100"
                                alt="{{ $slider->title }}">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="footer">
                    <div class="running-text">
                        <div class="scroll-content">
                            <h4>
                                @foreach ($runningText as $index => $t)
                                {{ $t->title }}
                                @if($index !== count($runningText) - 1)
                                &nbsp;<img src="{{ asset('assets/img/rocket.png') }}" alt="" height="20"> &nbsp;
                                @endif
                                @endforeach
                            </h4>
                        </div>
                    </div>
                    <div class="logo">
                        <img src="{{ asset('assets/img/logo2.svg') }}" width="100">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <audio id="alarm" src="{{ asset('assets/iqomah.mp3') }}" preload="auto"></audio>

    <script>
        let prayerTimes = @json($jadwal);
            let holidayDate = @json($nextHoliday ? $nextHoliday->date : null);
    </script>
    <script src="{{ asset('assets/js/jadwal.js') }}"></script>

    <script src="{{ asset('assets/js/caraousel6.js') }}"></script>
</body>

</html>