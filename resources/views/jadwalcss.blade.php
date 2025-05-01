<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Sholat</title>
    <link rel="stylesheet" href="{{ asset('assets/css/jadwalcss.css') }}">
</head>

<body>
    <div class="content">

        {{-- Topbar Start --}}
        <div class="topbar">
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
                    <div class="masehi">
                        19 Maret 2025
                    </div>
                    <div class="hijriyah">
                        19 Ramadhan 1446
                    </div>
                </div>
                <div>|</div>
                <div class="header-oclock">
                    22:49:50
                </div>
            </div>
        </div>
        <div class="jadwal">
            <div class="jadwal-sholat-item">
                <p>Subuh</p>
                <h3>04:10:50</h3>
            </div>
            <div class="jadwal-sholat-item">
                <p>Syuruq</p>
                <h3>04:10:50</h3>
            </div>
            <div class="jadwal-sholat-item">
                <p>Dzuhur</p>
                <h3>04:10:50</h3>
            </div>
            <div class="jadwal-sholat-item">
                <p>Asar</p>
                <h3>04:10:50</h3>
            </div>
            <div class="jadwal-sholat-item">
                <p>Maghrib</p>
                <h3>04:10:50</h3>
            </div>
            <div class="jadwal-sholat-item">
                <p>Isya</p>
                <h3>04:10:50</h3>
            </div>
        </div>
        <div class="counter">
            <div class="counter-sholat">
                Waktu zuhur 03:10:50
            </div>
            <div class="counter-islamic">
                Idul Fitri 13 hari lagi
            </div>

        </div>
        <div class="running-text">
            <div class="main-runtext">
                <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">

                    <div class="holder">

                        <div class="text-container">
                            &nbsp; &nbsp; <img src="{{ asset('assets/img/rocket.png') }}"> &nbsp;&nbsp;
                            Barangsiapa membangun masjid karena Allah, maka Allah bangunkan baginya rumah di surga. (HR.
                            Bukhari & Muslim)
                        </div>
                        <div class="text-container">
                            &nbsp; &nbsp; <img src="{{ asset('assets/img/rocket.png') }}"> &nbsp;&nbsp;
                            Sholat tepat waktu adalah kunci sukses dunia & akhirat
                        </div>
                        <div class="text-container">
                            &nbsp; &nbsp; <img src="{{ asset('assets/img/rocket.png') }}"> &nbsp;&nbsp;
                            Bersabarlah, Allah bersama orang-orang yang sabar. (QS. Al-Baqarah: 153)
                        </div>

                    </div>
            </div>
        </div>
    </div>
    <script>
        let currentIndex = 0;
        const slides = document.querySelectorAll(".slide");
        const totalSlides = slides.length;
        const slider = document.querySelector(".slider");
    
        let slideInterval = {{ $interval ?? 5000 }}; // Ambil dari database, default 30 detik
    
        function updateSlider() {
            slider.style.transition = "transform 0.5s ease-in-out";
            slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        }
    
        function nextSlide() {
            currentIndex++;
            updateSlider();
        }
    
        slider.addEventListener("transitionend", function () {
            if (currentIndex === totalSlides - 1) {
                // Matikan animasi dan reset ke slide 1
                slider.style.transition = "none";
                currentIndex = 0;
                slider.style.transform = `translateX(0)`;
    
                // Hidupkan kembali transisi setelah 10ms (trik agar animasi tetap halus)
                setTimeout(() => {
                    slider.style.transition = "transform 0.5s ease-in-out";
                }, 10);
            }
        });
    
        setInterval(nextSlide, slideInterval);
    </script>
</body>

</html>