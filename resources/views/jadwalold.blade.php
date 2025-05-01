<!DOCTYPE html>
<html lang="id">

<head>
    <title>Jadwal Sholat Digital</title>
    <link rel="stylesheet" href="{{ asset('assets/css/jadwal.css') }}">
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
</head>

<body>
    <div class="slider">
        <div class="w3-content w3-section">
            <img class="mySlides w3-animate-fading" src="{{ asset('assets/img/img1.jpg') }}"
                style="width:100%;object-fit: contain;">
            <img class="mySlides w3-animate-fading" src="{{ asset('assets/img/img2.jpg') }}"
                style="width:100%;object-fit: contain;">
            <img class="mySlides w3-animate-fading" src="{{ asset('assets/img/img3.jpg') }}"
                style="width:100%;object-fit: contain;">
            <img class="mySlides w3-animate-fading" src="{{ asset('assets/img/img4.jpg') }}"
                style="width:100%;object-fit: contain;">
        </div>
    </div>

    <div class="header">
        <div class="header-item">
            <div class="header-logo">
                <h1>Masjid Alhamdulillah</h1>
                <p>Jl. Karya Mandiri - Pekanbaru</p>
            </div>
            <div class="header-time">
                <div class="date">
                    <p id="current-date">{{ $tanggal }}</p>
                    <p>{{ $hijriDate }}</p>
                </div>
                <div class="oclock">
                    <h1 id="current-time">-</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="jadwal-sholat">
        @foreach (['subuh', 'syuruq', 'dzhuhur', 'asar', 'maghrib', 'isya'] as $sholat)
        <div class="jadwal-sholat-item">
            <p>{{ ucfirst($sholat) }}</p>
            <h3>{{ $jadwal[$sholat] ?? '-' }}</h3>
        </div>
        @endforeach
    </div>

    <div class="timer">
        <div class="timer-sholat">
            <p id="next-prayer">-</p>
            <h1 id="countdown">-</h1>
        </div>
        <div class="">

            <p>|</p>
        </div>
        <div class="timer-islam">
            @if ($nextHoliday)
            <p>{{ $nextHoliday->name }} <span id="holiday-countdown">-</span> hari lagi</p>
            @endif
        </div>
    </div>


    <h1>Jadwal Sholat</h1>
    <h3>Tanggal Aktif: <span id="current-date">{{ $tanggal }}</span></h3>

    <!-- Tambahkan Tanggal Hijriyah -->
    <h3>Tanggal Hijriyah: <span>{{ $hijriDate }}</span></h3>

    <!-- Tambahkan Jam Saat Ini -->
    <h3>Jam Saat Ini: <span id="current-time">-</span></h3>
    <br>

    <table border="1">
        <tr>
            <th>Sholat</th>
            <th>Waktu</th>
        </tr>
        @foreach (['fajr', 'syuruq', 'dhuhr', 'asr', 'maghrib', 'isha'] as $sholat)
        <tr>
            <td>{{ ucfirst($sholat) }}</td>
            <td>{{ $jadwal[$sholat] ?? '-' }}</td>
        </tr>
        @endforeach
    </table>

    <div class="runtext-container">
        <div class="main-runtext">
            <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">

                <div class="holder">

                    <div class="text-container">
                        &nbsp; &nbsp; <img src="{{ asset('assets/img/rocket.png') }}"> &nbsp;
                        Barangsiapa membangun masjid karena Allah, maka Allah bangunkan baginya rumah di surga. (HR.
                        Bukhari & Muslim)
                    </div>
                    <div class="text-container">
                        &nbsp; &nbsp; <img src="{{ asset('assets/img/rocket.png') }}"> &nbsp;
                        Sholat tepat waktu adalah kunci sukses dunia & akhirat
                    </div>
                    <div class="text-container">
                        &nbsp; &nbsp; <img src="{{ asset('assets/img/rocket.png') }}"> &nbsp;
                        Bersabarlah, Allah bersama orang-orang yang sabar. (QS. Al-Baqarah: 153)
                    </div>

                </div>

            </marquee>
        </div>
    </div>

    <h3>Sholat Berikutnya:</h3>
    <p id="next-prayer">-</p>
    <p id="countdown">-</p>

    <!-- Hitungan mundur Islamic Holiday -->
    @if ($nextHoliday)
    <h3>Hari Besar Islam Berikutnya:</h3>
    <p>{{ $nextHoliday->name }} dalam <span id="holiday-countdown">-</span> hari lagi</p>
    @endif

    <script>
        let prayerTimes = @json($jadwal);
        let holidayDate = @json($nextHoliday ? $nextHoliday->date : null);

        function updateClock() {
            let now = moment();
            document.getElementById("current-time").innerText = now.format("HH:mm:ss");
        }

        function startCountdown() {
            setInterval(() => {
            let now = moment();
            updateClock(); // Perbarui jam setiap detik
            let nextPrayer = null;
            let nextTime = null;
    
            ['subuh', 'dzhuhur', 'asar', 'maghrib', 'isya'].forEach(sholat => {
                let waktu = moment(prayerTimes[sholat], "HH:mm");
                if (waktu.isAfter(now) && (!nextTime || waktu.isBefore(nextTime))) {
                    nextPrayer = sholat;
                    nextTime = waktu;
                }
            });
    
            if (nextPrayer && nextTime) {
                document.getElementById("next-prayer").innerText = nextPrayer.toUpperCase();
                function countdown() {
                    let now = moment();
                    let diff = nextTime.diff(now, "seconds");
                    if (diff <= 0) {
                        window.location.href = `/iqomah/${nextPrayer}`;
                    } else {
                        document.getElementById("countdown").innerText = moment.utc(diff * 1000).format("HH:mm:ss");
                        setTimeout(countdown, 1000);
                    }
                }
                countdown();
            }

            // Hitungan mundur hari besar Islam
            if (holidayDate) {
                let holidayMoment = moment(holidayDate, "YYYY-MM-DD");
                let holidayDiff = holidayMoment.diff(now, "days");
                document.getElementById("holiday-countdown").innerText = holidayDiff;
            }

            // **Pastikan sistem membaca tanggal baru setelah jam 00:00:00**
            if (now.format('HH:mm:ss') === '00:00:00') {
                console.log("Jam 00:00:00 terdeteksi! Memuat ulang halaman...");
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }

            }, 1000);
        }

        
    
        // Jalankan semua fungsi
        updateClock();
        startCountdown();
    </script>
</body>

</html>