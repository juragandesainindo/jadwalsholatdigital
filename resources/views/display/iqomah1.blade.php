<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iqomah - {{ ucfirst($sholat) }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/iqomah.css') }}">
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
</head>

<body>

    <div class="iqomah">
        <h2>WAKTU IQOMAH {{ strtoupper($sholat) }}</h2>
        <h1 id="countdown-iqomah"></h1>
    </div>


    <audio id="alarm" src="{{ asset('assets/iqomah.mp3') }}" preload="auto"></audio>

    <script>
        let duration = {{ $iqomahTime }}; // dalam detik
        // let alarm = document.getElementById("alarm");

        function formatTime(seconds) {
            let minutes = Math.floor(seconds / 60);
            let sec = seconds % 60;
            return minutes + ":" + (sec < 10 ? "0" : "" ) + sec; 
        }
    
        function countdownIqomah() {
            if (duration <= 0) {
                // Pindah ke halaman blank
                window.location.href="/blank" ; 
            } else {
                document.getElementById("countdown-iqomah").innerText = formatTime(duration);
                
                // Saat 10 detik terakhir, unmute dan mainkan audio 
                if (duration === 10) { 
                    document.getElementById("alarm").play();
                }

                duration--; 
                setTimeout(countdownIqomah, 1000);
            } 
        } 
        countdownIqomah();
    </script>
</body>

</html>