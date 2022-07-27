<?php

    try {
        $database = new PDO('mysql:host=localhost;dbname=astra;charset=utf8;', 'root', '');
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Ereur de connexion à la base de donnée ". $getMessage()->$e);
    }




