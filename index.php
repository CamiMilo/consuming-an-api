<?php
const API_URL = 'https://whenisthenextmcufilm.com/api';
// inicializate the cURL = ch = curt hundle
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="consumir una API con php utilizando cURL">
  <title>Mi primera pagina de PHP</title>
  <!-- Centered viewport -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
  >
  <style>
    body{
      display: grid;
      place-content: center;
      place-items: center;
    }
  </style>
</head>
<body>
  <img src="<?= $data['poster_url'] ?>" alt="">
  <hgroup>
    <h1><?= $data['title'] ?> se estrena en <?= $data['days_until'] ?> dias</h1>
    <h2><?= $data['release_date'] ?></h2>
    <h3>La proxima pelicula que se estrena es: <?= $data['following_production']['title'] ?></h3>
  </hgroup>
</body>
</html>