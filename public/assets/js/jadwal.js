// Fungsi untuk toggle tanggal Masehi-Hijriah
function toggleDates() {
    const gregorian = document.getElementById('gregorian-date');
    const hijri = document.getElementById('hijri-date');

    if (gregorian.style.display !== 'none') {
        gregorian.style.display = 'none';
        hijri.style.display = 'inline';
    } else {
        gregorian.style.display = 'inline';
        hijri.style.display = 'none';
    }


}

// Jalankan toggle setiap 5 detik
setInterval(toggleDates, 5000);

// Fungsi-fungsi lainnya (updateClock, startCountdown, dll)


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
            document.getElementById("next-prayer").innerText = 'WAKTU ' + nextPrayer.toUpperCase();

            function countdown() {
                let now = moment();
                let diff = nextTime.diff(now, "seconds");
                if (diff <= 0) {
                    window.location.href = `/iqomah/${nextPrayer}`;
                } else {
                    document.getElementById("countdown").innerText = moment.utc(diff * 1000).format("HH:mm:ss");
                    // Saat 10 detik terakhir, unmute dan mainkan audio 
                    if (diff === 10) {
                        document.getElementById("alarm").play();
                    }

                    diff--;
                    setTimeout(countdown, 1000);
                }
            }
            countdown();
        }

        // Hitungan mundur hari besar Islam
        if (holidayDate) {
            let holidayMoment = moment(holidayDate, "YYYY-MM-DD");
            let nowMoment = moment().startOf('day'); // Mulai dari awal hari ini
            let holidayDiff = holidayMoment.diff(nowMoment, "days");
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
