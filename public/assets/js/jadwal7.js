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
        let currentPrayer = null;

        // Reset semua class active terlebih dahulu
        document.querySelectorAll('.currentFirst').forEach(el => {
            el.classList.remove('active');
        });

        // Cek sholat mana yang sedang aktif
        ['subuh', 'dzhuhur', 'asar', 'maghrib', 'isya'].forEach(sholat => {
            let waktu = moment(prayerTimes[sholat], "HH:mm");
            let waktuEnd = sholat === 'subuh' ? moment(prayerTimes['syuruq'], "HH:mm") :
                sholat === 'dzhuhur' ? moment(prayerTimes['asar'], "HH:mm") :
                sholat === 'asar' ? moment(prayerTimes['maghrib'], "HH:mm") :
                sholat === 'maghrib' ? moment(prayerTimes['isya'], "HH:mm") :
                sholat === 'isya' ? moment(prayerTimes['subuh'], "HH:mm").add(1, 'days') : null;

            if (now.isBetween(waktu, waktuEnd)) {
                currentPrayer = sholat;
                // Tambahkan class active ke elemen sholat yang sedang aktif
                document.querySelectorAll('.currentFirst').forEach(el => {
                    if (el.querySelector('.prayerName').textContent.trim().toLowerCase().includes(sholat)) {
                        el.classList.add('active');
                    }
                });
            }

            if (waktu.isAfter(now) && (!nextTime || waktu.isBefore(nextTime))) {
                nextPrayer = sholat;
                nextTime = waktu;
            }
        });

        const footerTimer = document.querySelector('.footer-timer');
        const footerHoliday = document.querySelector('.footer-holiday');

        if (nextPrayer && nextTime) {
            // Tampilkan footer timer jika ada sholat berikutnya
            footerTimer.classList.remove('hidden');
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
        } else {
            // Sembunyikan footer timer jika tidak ada sholat berikutnya
            footerTimer.classList.add('hidden');
            document.getElementById("next-prayer").innerText = '';
            document.getElementById("countdown").innerText = '';
        }

        // Hitungan mundur hari besar Islam
        if (holidayDate) {
            footerHoliday.classList.remove('hidden'); // Tampilkan jika ada holiday
            let holidayMoment = moment(holidayDate, "YYYY-MM-DD");
            let nowMoment = moment().startOf('day');
            let holidayDiff = holidayMoment.diff(nowMoment, "days");
            document.getElementById("holiday-countdown").innerText = holidayDiff;
        } else {
            footerHoliday.classList.add('hidden'); // Sembunyikan jika tidak ada holiday
        }

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
