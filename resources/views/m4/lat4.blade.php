<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Latihan 04</title>
</head>
    <style>
        /* Reset CSS default margin and padding */
body, h1, h2, p {
    margin: 0;
    padding: 0;
}

/* Style header */
header {
    background-color: #3498db;
    color: #fff;
    text-align: center;
    padding: 20px;
}

/* Style profile section */
.profile {
    text-align: center;
    margin: 20px;
}

.profile img {
    max-width: 100%;
    border-radius: 50%;
}

/* Style heading and description */
.profile h2 {
    font-size: 24px;
    margin: 10px 0;
}

.profile p {
    font-size: 16px;
}

    </style>
<body>
    <header>
        <h1>Selamat Datang</h1>
    </header>
    <main>
        <section class="profile">
            <h2><b>{{$nama}}</b></h2>
            <p>HOBI : <b>{{$alamat}}</b></p><br>
            @include('m4.lat4_foto')
        </section>
    </main>
</body>
</html>
