<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Running Text Vertikal</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .running-text-container {
            width: 300px;
            height: 100vh;
            overflow: hidden;
            border: 2px solid #1E88E5;
            border-radius: 10px;
            background: white;
            position: relative;
        }

        .running-text {
            position: absolute;
            width: 100%;
            height: 100%;
            animation: moveUp 30s linear infinite, resetPosition 2s linear infinite 30s;
        }

        .running-text p {
            text-align: center;
            font-size: 16px;
            padding: 10px 0;
            margin: 0;
            color: #333;
        }

        @keyframes moveUp {
            0% {
                transform: translateY(100%);
            }

            100% {
                transform: translateY(-100%);
            }
        }

        /* Animasi reset setelah 30 detik (delay 2 detik sebelum muncul lagi) */
        @keyframes resetPosition {
            0% {
                transform: translateY(100%);
            }

            100% {
                transform: translateY(100%);
            }
        }
    </style>
</head>

<body>

    <div class="running-text-container">
        <div class="running-text">
            <p>📢 Donasi untuk pembangunan masjid dapat dikirim ke rekening XYZ</p>
            <p>🌙 4 hari lagi menuju bulan Ramadhan</p>
            <p>📌 Kajian Islam setiap Sabtu ba'da Maghrib</p>
            <p>🤲 Mari tingkatkan ibadah dan amal sholeh</p>
        </div>
    </div>

    <script>
        let runningText = document.querySelector(".running-text");
    let containerHeight = document.querySelector(".running-text-container").offsetHeight;
    let textHeight = runningText.offsetHeight;
    let currentPosition = containerHeight;
    
    function moveText() {
    currentPosition -= 1;
    if (currentPosition < -textHeight) { setTimeout(()=> {
        currentPosition = containerHeight;
        }, 2000); // Delay 2 detik sebelum muncul kembali
        }
        runningText.style.transform = `translateY(${currentPosition}px)`;
        }
    
        setInterval(moveText, 30);
    </script>
</body>

</html>