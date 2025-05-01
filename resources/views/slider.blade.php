<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Laravel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f5f5f5;
        }

        .slider-container {
            width: 80%;
            max-width: 800px;
            overflow: hidden;
            position: relative;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
        }

        .sub-title {
            font-size: 18px;
            margin-top: 5px;
        }

        .description {
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<body>


    {{-- bootstap 5 slide crossfade--}}
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="10000">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <div class="slider-container">
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

    <script>
        let currentIndex = 0;
    const slides = document.querySelectorAll(".slide");
    const totalSlides = slides.length;
    const slider = document.querySelector(".slider");

    let slideInterval = {{ $interval ?? 3000 }}; // Ambil dari database, default 30 detik

    function updateSlider() {
        slider.style.transition = "transform 0.5s ease-in-out";
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    function nextSlide() {
        currentIndex++;
        updateSlider();

        // Jika sudah sampai slide duplikat, reset ke slide pertama tanpa animasi
        if (currentIndex === totalSlides - 1) {
            setTimeout(() => {
                slider.style.transition = "none";
                currentIndex = 0;
                slider.style.transform = `translateX(0)`;
                setTimeout(() => {
                    slider.style.transition = "transform 0.5s ease-in-out";
                }, 10);
            }, 500);
        }
    }

    setInterval(nextSlide, slideInterval);
    </script>

</body>

</html>