<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display {{ $setting }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/jadwal11.css') }}">
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
</head>

<body>

    <section>
        <nav class="navbar">
            <span class="navbar-brand">
                <img src="{{ asset('assets/img/logo.svg') }}">
            </span>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-link nav-name">
                        {{ $detailMasjid->nama }}
                    </span>
                </li>
                <li class="nav-item nav-alamat">
                    <span class="nav-link nav-alamatFirst">
                        Rek Infak 823-2342-234 (BRK Syariah)
                    </span>
                    <span class="nav-link nav-alamatSecond">
                        Jalan Pekanbaru - Riau
                    </span>
                </li>
            </ul>
        </nav>

        <div class="content">
            <div class="prayer">
                <div class="currentPrayer">
                    @foreach (['subuh', 'syuruq', 'dzhuhur', 'asar', 'maghrib', 'isya'] as $sholat)
                    <ul class="currentFirst active">
                        <li class="prayerName ">
                            @if ($sholat == 'subuh')
                            <img src="{{ asset('assets/img/number/number1.svg') }}">
                            @elseif ($sholat == 'syuruq')
                            <img src="{{ asset('assets/img/number/number2.svg') }}">
                            @elseif ($sholat == 'dzhuhur')
                            <img src="{{ asset('assets/img/number/number3.svg') }}">
                            @elseif ($sholat == 'asar')
                            <img src="{{ asset('assets/img/number/number4.svg') }}">
                            @elseif ($sholat == 'maghrib')
                            <img src="{{ asset('assets/img/number/number5.svg') }}">
                            @elseif ($sholat == 'isya')
                            <img src="{{ asset('assets/img/number/number6.svg') }}">
                            @endif
                            {{ ucfirst($sholat) }}
                        </li>
                        <li class="prayer-time">
                            {{ \Carbon\Carbon::parse($jadwal[$sholat] ?? '00:00')->format('H:i') }}
                        </li>
                    </ul>
                    @endforeach
                    <ul class="prayerTime">
                        <h1 id="current-time"></h1>
                        <h2 id="gregorian-date">
                            @if ($tanggal == 0)
                            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                            @else
                            {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}
                            @endif
                        </h2>
                        <h2 id="hijri-date" style="display:none;">{{ $hijriDate['full_date'] }}</h2>
                    </ul>
                </div>
            </div>
            <div class="custom-slider fade" id="myCustomSlider">
                <div class="slider-inner">
                    @foreach($sliders as $index => $slider)
                    <div class="slider-item {{ $slider->order == 1 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $slider->image) }}" class="slider-image" alt="Slide 1">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="footer-timer">
                <p id="next-prayer"></p>
                <p id="countdown"></p>
            </div>
            <div class="marquee">
                <p>
                    @foreach ($runningText as $index => $t)
                    {{ $t->title }}
                    @if($index !== count($runningText) - 1)
                    &nbsp;&nbsp;<img src="{{ asset('assets/img/logowhite.svg') }}">&nbsp;&nbsp;
                    @endif
                    @endforeach
                    {{-- Pengumuman: Shalat Jum'at.
                    <span>|</span>
                    Terima kasih atas partisipasinya. --}}
                </p>
            </div>
            <div class="footer-holiday">
                @if ($nextHoliday)
                <span>{{ $nextHoliday->name }}</span>
                <span class="holiday-countdown">
                    <p id="holiday-countdown"></p> &nbsp; hari lagi
                </span>
                @endif
            </div>
        </div>
    </section>

    <audio id="alarm" src="{{ asset('assets/iqomah.mp3') }}" preload="auto"></audio>

    <script>
        let prayerTimes = @json($jadwal);
        let holidayDate = @json($nextHoliday ? $nextHoliday->date : null);
    </script>
    <script src="{{ asset('assets/js/jadwal7.js') }}"></script>
    <script src="{{ asset('assets/js/caraousel1.js') }}"></script>
</body>

</html>