<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lattihan 3</title>
</head>
<body>
    <h1>Latihan 03</h1>
    <p>OM SWASTYASTU, Nama saya <b>{{$nama}}</b>, Hobi saya adalah :</p>
    <ul>
        @foreach ($hobi as $val)
            <li>{{$val}}</li>
        @endforeach
    </ul>
    <p>Skill Saya :</p>
    <ol>
        @for ($a = 0; $a < count($skill); $a++)
            <li>{{$skill[$a]}}</li>
        @endfor
    </ol>
</body>
</html>