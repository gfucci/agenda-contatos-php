<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    //Conferindo o GET
    $id;

    if (!empty ($_GET)) {
        $id = $_GET["id"];
    }

    //resgatando contatos
    if (!empty ($id)) {

        //resgatando um unico contato
        $query = "SELECT * FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        $contact = $stmt->fetch();
    } else {

        //resgatando todos os contatos
        $query = "SELECT * FROM contacts";
        $contacts = [];
    
        $stmt = $conn->prepare($query);
        $stmt->execute();
    
        $contacts = $stmt->fetchAll();
    }

   