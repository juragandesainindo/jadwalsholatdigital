<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Sholat</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            /* background: #000; */
            /* color: #fff; */
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 100%;
            height: 100vh;
            /* background: linear-gradient(135deg, #0a2e38 0%, #1a1a2e 100%); */
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.8);
            /* position: relative; */
        }

        .header {
            height: 12%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 5px solid yellow;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .header-left .logo img {
            width: 50px;
            height: 50px;
        }

        .section {
            height: 80%;
            display: flex;
        }

        .section-left {
            width: 20%;
            height: 100%;
        }

        .section-center {
            width: 80%;
        }

        .section-center img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="header">
            <div class="header-left">
                <div class="logo">
                    <img src="{{ asset('assets/img/logo2.svg') }}" alt="Masjid Icon">
                </div>
                <h1>
                    MASJID AGUNG NURUL FALAH
                </h1>
            </div>
            <div class="header-right">
                <h2>
                    Kantor Bupati Kabupaten Agam
                </h2>
                <p>
                    Lubuk Basung - Sumatera Barat
                </p>
            </div>
        </div>

        <div class="section">
            <div class="section-left">
                <div class="time">
                    <h1 class="header-oclock" id="current-time">00:00</h1>
                    <p id="current-date">
                        Rabu<br>
                        09 April 2025
                    </p>
                    <p id="hijri-date">
                        10 Syawal 1446 H
                    </p>
                </div>

                <div class="jadwal">
                    <div class="section-left-jadwal" id="subuh">
                        <div class="section-left-jadwal-left">
                            Subuh
                        </div>
                        <div class="section-left-jadwal-right">
                            04:50
                        </div>
                    </div>
                    <div class="section-left-jadwal" id="syuruq">
                        <div class="section-left-jadwal-left">
                            Syuruq
                        </div>
                        <div class="section-left-jadwal-right">
                            06:10
                        </div>
                    </div>
                    <div class="section-left-jadwal active" id="dzuhur">
                        <div class="section-left-jadwal-left">
                            Dzhuhur
                        </div>
                        <div class="section-left-jadwal-right">
                            12:20
                        </div>
                    </div>
                    <div class="section-left-jadwal" id="asar">
                        <div class="section-left-jadwal-left">
                            Asar
                        </div>
                        <div class="section-left-jadwal-right">
                            15:40
                        </div>
                    </div>
                    <div class="section-left-jadwal" id="maghrib">
                        <div class="section-left-jadwal-left">
                            Maghrib
                        </div>
                        <div class="section-left-jadwal-right">
                            18:25
                        </div>
                    </div>
                    <div class="section-left-jadwal" id="isya">
                        <div class="section-left-jadwal-left">
                            Isya
                        </div>
                        <div class="section-left-jadwal-right">
                            19:40
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Image Display -->
            <div class="section-center">
                <img src="{{ asset('assets/img/img1.jpg') }}" alt="Masjid View" id="main-image">

            </div>
        </div>
    </div>



</body>

</html>