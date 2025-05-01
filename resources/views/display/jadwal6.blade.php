<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display {{ $setting }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/jadwal6.css') }}">
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="background-overlay"></div>

    <div class="tv-container">
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

    <section>
        <header class="header">
            <div class="masjid-info">
                <img src="{{ asset('assets/img/logo2.svg') }}" class="logo">
                <div class="masjid-text">
                    <h1>{{ $detailMasjid->nama }}</h1>
                    <p>{{ $detailMasjid->alamat }}</p>
                </div>
            </div>

            <div class="time-info">
                <div class="digital-clock" id="current-time"></div>
                <div class="date-info">
                    <span id="gregorian-date">
                        @if ($tanggal == 0)
                        {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                        @else
                        {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}
                        @endif
                    </span>
                    <span id="hijri-date">{{ $hijriDate }}</span>
                </div>
            </div>
        </header>

        <main class="main-content">
            <div class="prayer-times">
                @foreach (['subuh', 'syuruq', 'dzhuhur', 'asar', 'maghrib', 'isya'] as $sholat)
                <div class="prayer-card {{ strtolower($sholat) }}">
                    <div class="prayer-name">{{ ucfirst($sholat) }}</div>
                    <div class="prayer-time">
                        {{ \Carbon\Carbon::parse($jadwal[$sholat] ?? '00:00')->format('H:i') }}
                    </div>
                </div>
                @endforeach
            </div>

            <div class="next-prayer">
                <div class="next-label">Sholat Berikutnya:</div>
                <div class="next-name" id="next-prayer"></div>
                <div class="countdown" id="countdown"></div>
            </div>
        </main>

        <footer class="footer">
            <div class="marquee-container">
                <div class="marquee">
                    @foreach ($runningText as $index => $t)
                    <span>{{ $t->title }}</span>
                    @if($index !== count($runningText) - 1)
                    <span class="separator">•</span>
                    @endif
                    @endforeach
                </div>
            </div>

            @if ($nextHoliday)
            <div class="holiday-info">
                <span>{{ $nextHoliday->name }}</span>
                <span id="holiday-countdown"></span>
            </div>
            @endif
        </footer>
    </section>

    <audio id="alarm" src="{{ asset('assets/iqomah.mp3') }}" preload="auto"></audio>

    <script>
        let prayerTimes = @json($jadwal);
        let holidayDate = @json($nextHoliday ? $nextHoliday->date : null);
    </script>
    <script src="{{ asset('assets/js/jadwal.js') }}"></script>
    <script src="{{ asset('assets/js/caraousel1.js') }}"></script>
</body>

</html>