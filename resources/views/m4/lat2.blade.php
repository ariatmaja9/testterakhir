<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Latihan 02</h1>
    OM Swastyastu, nama saya <strong>{{$nama}}</strong>, nilai saya adalah <strong>{{$nilai}}</strong>
    @if ($nilai <= 20)
        (<b>E</b>) 
    @elseif ($nilai <= 40)
        (<b>D</b>) 
    @elseif ($nilai <= 60)
        (<b>C</b>) 
    @elseif ($nilai <= 80)
        (<b>B</b>)
    @else
        (<b>A</b>)
    @endif
</body>
</html>