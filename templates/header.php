<?php

    include_once("config/url.php");
    include_once("config/process.php");

    //limpa a mensagem
    if (isset($_SESSION["msg"])) {
        $printMsg = $_SESSION["msg"];
        $_SESSION["msg"] = '';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e2f70584a0.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
    <title>Agenda</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?= $BASE_URL ?>index.php">
                <img src="<?= $BASE_URL ?>img/logo.svg" alt="logo agenda">
            </a>
            <div>
                <div class="navbar-nav">
                    <a href="<?= $BASE_URL ?>index.php" class="nav-link active" id="home-link">Agenda</a>
                    <a href="<?= $BASE_URL ?>create.php" class="nav-link active">Criar Contato</a>
                </div>
            </div>
        </nav>
    </header>