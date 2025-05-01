<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display {{ $setting }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/jadwal1.css') }}">
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>

</head>

<body>
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
        <nav class="navbar">
            <span class="navbar-brand">
                <img src="{{ asset('assets/img/logo2.svg') }}">
            </span>
            <ul class="navbar-nav">
                <li class="nav-item start">
                    <span class="nav-link nav-name">
                        {{ $detailMasjid->nama }}
                    </span>
                    <span class="nav-link nav-alamat">
                        {{ $detailMasjid->alamat }}

                    </span>
                </li>
                <li class="nav-item center">
                </li>
                <li class="nav-item end">
                    <span class="nav-link nav-time" id="current-time"></span>
                    <span class="nav-link" id="gregorian-date">
                        @if ($tanggal == 0)
                        {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                        @else
                        {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}
                        @endif
                    </span>
                    <span class="nav-link" id="hijri-date" style="display:none;">{{ $hijriDate }}</span>
                </li>
            </ul>
        </nav>

        <div class="content">
            <div class="prayer">
                <div class="currentPrayer">
                    @foreach (['subuh', 'syuruq', 'dzhuhur', 'asar', 'maghrib', 'isya'] as $sholat)
                    <ul>
                        <li class="prayer-name">{{ ucfirst($sholat) }}</li>
                        <li class="prayer-time">
                            {{ \Carbon\Carbon::parse($jadwal[$sholat] ?? '00:00')->format('H:i') }}
                        </li>
                    </ul>
                    @endforeach
                </div>
                <ul class="waktu-sholat">
                    <li class="prayer-name">
                        <span></span>
                        <span id="next-prayer"></span>
                    </li>
                    <li class="prayer-time">
                        {{-- <span>-</span> &nbsp; --}}
                        <span id="countdown"></span>
                    </li>
                </ul>

            </div>
            <div class="footer">
                <div class="footer-logo">
                    <img src="{{ asset('assets/img/logo2.svg') }}" alt="">
                </div>
                <div class="marquee">
                    <p>
                        @foreach ($runningText as $index => $t)
                        {{ $t->title }}
                        @if($index !== count($runningText) - 1)
                        &nbsp;<span>|</span>&nbsp;
                        @endif
                        @endforeach
                        {{-- Pengumuman: Shalat Jum'at.
                        <span>|</span>
                        Terima kasih atas partisipasinya. --}}
                    </p>
                </div>
                <div class="footer-logo-holiday">
                    @if ($nextHoliday)
                    <span>{{ $nextHoliday->name }}</span>
                    <p id="holiday-countdown"></p>
                    @endif
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


    <script src="{{ asset('assets/js/caraousel1.js') }}"></script>
</body>

</html>