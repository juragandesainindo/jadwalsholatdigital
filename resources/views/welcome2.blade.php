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
            /* background: #111; */
            color: #fff;
            font-family: sans-serif;
            /* display: flex;
            justify-content: center;
            align-items: center; */
            /* height: 100vh; */
        }

        .slider-container {
            width: 600px;
            height: 350px;
            overflow: hidden;
            position: relative;
        }

        .horizontal-slider {
            display: flex;
            transition: transform 1s ease;
        }

        .category-slide {
            border: 2px solid red;
            min-width: 600px;
            box-sizing: border-box;
        }

        .card {
            background: #1e1e1e;
            border-radius: 10px;
            margin-bottom: 15px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
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

        .card-second {
            position: relative;
            height: 120px;
            overflow: hidden;
        }

        .card-vertical-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            transition: transform 0.6s ease;
        }

        .card-detail {
            padding: 10px 15px;
            background: #2a2a2a;
            border-bottom: 1px solid #444;
        }
    </style>
</head>

<body>

    <div class="slider-container">
        <div class="horizontal-slider" id="slider">
            <!-- SLIDE 1 -->
            <div class="category-slide">
                <div class="card">
                    <div class="text-lg">KAS PEMBANGUNAN MASJID</div>
                    <div class="text-sm mb-1">April 2025</div>
                    <div>Saldo terakhir: Rp 1.000.000</div>
                    <div>Pengeluaran: Rp 500.000</div>
                    <div><strong>Total Saldo: Rp 500.000</strong></div>
                </div>
                <div class="card-second">
                    <div class="card-vertical-wrapper">
                        <div class="card-detail text-sm">28 Maret 2025 - Donasi warga A - Rp 500.000</div>
                        <div class="card-detail text-sm">29 Maret 2025 - Donasi warga B - Rp 500.000</div>
                        <div class="card-detail text-sm">1 April 2025 - Beli semen - Rp 300.000</div>
                        <div class="card-detail text-sm">2 April 2025 - Beli keramik - Rp 200.000</div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 2 -->
            <div class="category-slide">
                <div class="card">
                    <div class="text-lg">KAS INFAK ANAK YATIM</div>
                    <div class="text-sm mb-1">April 2025</div>
                    <div>Pemasukan: Rp 2.000.000</div>
                    <div>Pengeluaran: Rp 1.000.000</div>
                    <div><strong>Total Saldo: Rp 1.000.000</strong></div>
                </div>
                <div class="card-second">
                    <div class="card-vertical-wrapper">
                        <div class="card-detail text-sm">30 Maret 2025 - Infak jemaah A - Rp 1.000.000</div>
                        <div class="card-detail text-sm">31 Maret 2025 - Infak jemaah B - Rp 1.000.000</div>
                        <div class="card-detail text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 3 -->
            <div class="category-slide">
                <div class="card">
                    <div class="text-lg">KAS TPQ</div>
                    <div class="text-sm mb-1">April 2025</div>
                    <div>Pemasukan: Rp 2.000.000</div>
                    <div>Pengeluaran: Rp 1.000.000</div>
                    <div><strong>Total Saldo: Rp 1.000.000</strong></div>
                </div>
                <div class="card-second">
                    <div class="card-vertical-wrapper">
                        <div class="card-detail text-sm">30 Maret 2025 - Infak jemaah A - Rp 1.000.000</div>
                        <div class="card-detail text-sm">31 Maret 2025 - Infak jemaah B - Rp 1.000.000</div>
                        <div class="card-detail text-sm">3 April 2025 - Beli perlengkapan anak yatim - Rp 1.000.000
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const slides = document.querySelectorAll('.category-slide');
        const slider = document.getElementById('slider');
        const slideWidth = 600;
        let currentIndex = 0;

        function animateVertical(cardSecond, callback) {
            const wrapper = cardSecond.querySelector('.card-vertical-wrapper');
            const items = wrapper.querySelectorAll('.card-detail');
            let index = 0;
            
            // Mulai dari posisi awal (tanpa animasi dari atas)
            wrapper.style.transform = 'translateY(0)';
            wrapper.style.transition = 'transform 0.6s ease';

            function scrollNext() {
                if (index < items.length) {
                    const offset = -index * items[0].offsetHeight;
                    wrapper.style.transform = `translateY(${offset}px)`;
                    index++;
                    setTimeout(scrollNext, 1500);
                } else {
                    setTimeout(callback, 1000);
                }
            }

            // Mulai animasi scroll
            setTimeout(scrollNext, 700);
        }

        function slideLoop() {
            const currentSlide = slides[currentIndex];
            const cardSecond = currentSlide.querySelector('.card-second');

            // Reset posisi vertikal wrapper
            if (cardSecond) {
                const wrapper = cardSecond.querySelector('.card-vertical-wrapper');
                
                // Ketika kembali ke slide pertama, langsung tampilkan tanpa animasi awal
                if (currentIndex === 0) {
                    wrapper.style.transition = 'none';
                    wrapper.style.transform = 'translateY(0)';
                    // Force reflow
                    void wrapper.offsetWidth;
                    wrapper.style.transition = 'transform 0.6s ease';
                } else {
                    wrapper.style.transform = 'translateY(0)';
                }

                animateVertical(cardSecond, () => {
                    // Pindah ke slide berikutnya
                    if (currentIndex === slides.length - 1) {
                        currentIndex = 0;
                        slider.style.transition = 'none';
                        slider.style.transform = `translateX(0px)`;
                        requestAnimationFrame(() => {
                            requestAnimationFrame(() => {
                                slider.style.transition = 'transform 1s ease';
                                slideLoop();
                            });
                        });
                    } else {
                        currentIndex++;
                        slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                        setTimeout(slideLoop, 1000);
                    }
                });
            } else {
                setTimeout(() => {
                    currentIndex++;
                    slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                    slideLoop();
                }, 2000);
            }
        }

        slideLoop();
    </script>

</body>

</html>