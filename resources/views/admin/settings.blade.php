<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Setting</title>
</head>

<body>
    <div class="container">
        <h2>Pilih Display</h2>

        @include('admin.message')

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <label>
                <input type="radio" name="display_mode" value="1" {{ $displayMode==1 ? 'checked' : '' }}> Display 1
            </label>
            <label>
                <input type="radio" name="display_mode" value="2" {{ $displayMode==2 ? 'checked' : '' }}> Display 2
            </label>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>

</html>