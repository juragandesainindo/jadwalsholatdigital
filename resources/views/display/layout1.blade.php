<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Sholat</title>
    <link rel="stylesheet" href="{{ asset('assets/css/prayer.css') }}">
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
</head>

<body>


    @yield('content')


    <audio id="alarm" src="{{ asset('assets/iqomah.mp3') }}" preload="auto"></audio>


    <script>
        let prayerTimes = @json($jadwal);
        let holidayDate = @json($nextHoliday ? $nextHoliday->date : null);
    </script>
    <script src="{{ asset('assets/js/jadwal.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
</body>

</html>