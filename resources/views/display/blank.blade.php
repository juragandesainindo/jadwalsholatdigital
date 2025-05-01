<!DOCTYPE html>
<html lang="id">

<head>
    <title>Halaman Blank</title>
    <link rel="stylesheet" href="{{ asset('assets/css/blank.css') }}">
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
</head>

<body>

    <div class="blank">
        <h1 id="countdown-blank">{{ $blankTime }}</h1>
    </div>



    <script>
        let duration = {{ $blankTime }};

        function formatTime(seconds) {
        let minutes = Math.floor(seconds / 60);
        let sec = seconds % 60;
        return minutes + ":" + (sec < 10 ? "0" : "" ) + sec; }
        
        function countdownBlank() {
            if (duration <= 0) {
                window.location.href = "/"; // Pindah otomatis ke halaman jadwal
            } else {
                document.getElementById("countdown-blank").innerText = formatTime(duration);
                duration--;
                setTimeout(countdownBlank, 1000);
            }
        }
        countdownBlank();
    </script>
</body>

</html>