<!-- HEADER -->
<html>
    <head>
        <title>Запись к врачу</title>
        <!-- CSS Reset -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
        <!-- Milligram CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
        <!-- My CSS -->
        <link rel="stylesheet" href="<? echo "/styles/main.css";?>">
        <link rel="stylesheet" href="<? echo "/styles/svg.css";?>">
    </head>
    <body>
        <div class="main">

        <? if ($_SESSION['sid']) echo '<a href=logout>Удалить сессию ' . $_SESSION['sid'] .'</a> <br>';?>
