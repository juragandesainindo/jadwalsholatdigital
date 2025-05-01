<!DOCTYPE html>
<html>

<head>
    <title>IPv4 Address Check</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .ip-box {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;

            background: {
                    {
                    $isLocal ? '#e3f2fd': '#fff8e1'
                }
            }

            ;

            border-left: 5px solid {
                    {
                    $isLocal ? '#2196f3': '#ffc107'
                }
            }

            ;
        }

        .local-badge {
            background: #2196f3;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.8em;
        }

        .public-badge {
            background: #ffc107;
            color: black;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.8em;
        }
    </style>
</head>

<body>
    <h1>IPv4 Address Detection</h1>

    <div class="ip-box">
        <h3>Your IPv4 Address:</h3>
        <p style="font-size: 1.5em; font-weight: bold;">{{ $ipv4 }}</p>
        <span class="{{ $isLocal ? 'local-badge' : 'public-badge' }}">
            {{ $isLocal ? 'Local/Private IP' : 'Public IP' }}
        </span>
    </div>

    <p>For JSON data: <a href="/ip/v4">/ip/v4</a></p>
</body>

</html>