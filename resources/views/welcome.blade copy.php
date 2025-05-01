<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Info Keuangan Masjid</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #111;
            color: #fff;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .slider-container {
            width: 600px;
            height: 350px;
            overflow: hidden;
            position: relative;
        }

        .horizontal-slider {
            display: flex;
            width: 9999px;
            transition: transform 1s ease;
        }

        .category-slide {
            min-width: 600px;
            padding: 20px;
            box-sizing: border-box;
        }

        .vertical-slide {
            animation: slide-up 5s ease-in-out 1 forwards;
        }

        @keyframes slide-up {
            0% {
                transform: translateY(100%);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .card {
            background: #1e1e1e;
            border-radius: 10px;
            margin-bottom: 15px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .card-second {
            background: #2b2b2b;
            /* max-height: 150px; */
            overflow-y: auto;
        }

        .text-lg {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .text-sm {
            font-size: 14px;
            color: #ccc;
        }

        .mb-1 {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <div class="slider-container">
        <div class="horizontal-slider" id="slider">
            <!-- Slide 1 -->
            <div class="category-slide">
                <div class="card">
                    <div class="text-lg">KAS PEMBANGUNAN MASJID</div>
                    <div class="text-sm mb-1">28 Maret 2025 - 4 April 2025</div>
                    <div>Pemasukan: Rp 1.000.000</div>
                    <div>Pengeluaran: Rp 500.000</div>
                    <div><strong>Total Saldo: Rp 500.000</strong></div>
                </div>
                <div class="card card-second vertical-slide">
                    <div class="text-lg">Rincian</div>
                    <div class="text-sm">28 Maret 2025 - Donasi warga A - Rp 500.000</div>
                    <div class="text-sm">29 Maret 2025 - Donasi warga B - Rp 500.000</div>
                    <div class="text-sm">1 April 2025 - Beli semen - Rp 300.000</div>
                    <div class="text-sm">2 April 2025 - Beli keramik - Rp 200.000</div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="category-slide">
                <div class="card">
                    <div class="text-lg">KAS INFAK ANAK YATIM</div>
                    <div class="text-sm mb-1">28 Maret 2025 - 4 April 2025</div>
                    <div>Pemasukan: Rp 2.000.000</div>
                    <div>Pengeluaran: Rp 1.000.000</div>
                    <div><strong>Total Saldo: Rp 1.000.000</strong></div>
                </div>
                <div class="card card-second vertical-slide">
                    <div class="text-lg">Rincian</div>
                    <div class="text-sm">30 Maret 2025 - Infak jemaah A - Rp 1.000.000</div>
                    <div class="text-sm">31 Maret 2025 - Infak jemaah B - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="category-slide">
                <div class="card">
                    <div class="text-lg">KAS TPQ</div>
                    <div class="text-sm mb-1">28 Maret 2025 - 4 April 2025</div>
                    <div>Pemasukan: Rp 2.000.000</div>
                    <div>Pengeluaran: Rp 1.000.000</div>
                    <div><strong>Total Saldo: Rp 1.000.000</strong></div>
                </div>
                <div class="card card-second vertical-slide">
                    <div class="text-lg">Rincian</div>
                    <div class="text-sm">30 Maret 2025 - Infak jemaah A - Rp 1.000.000</div>
                    <div class="text-sm">31 Maret 2025 - Infak jemaah B - Rp 1.000.000</div>
                    <div class="text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentIndex = 0;
  const slides = document.querySelectorAll('.category-slide');
  const slider = document.getElementById('slider');
  const slideWidth = 600;

  function showVerticalAnimation(slide) {
const secondCard = slide.querySelector('.card-second');
if (secondCard) {
secondCard.classList.remove('vertical-slide');
void secondCard.offsetWidth; // force reflow
secondCard.classList.add('vertical-slide');
}
}

  function slideLoop() {
    showVerticalAnimation(slides[currentIndex]);

    setTimeout(() => {
      // Jika sudah di slide terakhir, langsung ke index 0
      if (currentIndex === slides.length - 1) {
        currentIndex = 0;
        slider.style.transition = 'none'; // hilangkan animasi transisi dulu
        slider.style.transform = `translateX(0px)`;

        // Setelah hilangkan transisi, kita butuh sedikit delay sebelum mengembalikannya
        requestAnimationFrame(() => {
          requestAnimationFrame(() => {
            slider.style.transition = 'transform 1s ease';
            showVerticalAnimation(slides[currentIndex]);
          });
        });
      } else {
        currentIndex++;
        slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        showVerticalAnimation(slides[currentIndex]);
      }

      slideLoop();
    }, 8000); // durasi per slide
  }

  slideLoop();
    </script>

</body>

</html>