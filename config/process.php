<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    //Conferindo se o form veio
    $data = $_POST;

    //MODIFICANDO BANCO
    if(!empty($data)) {

        //criar dado
        if ($data["type"] === "create") {

            //inputs form
            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];

            $insertQuery = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

            $stmt = $conn->prepare($insertQuery);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);

            $stmt->execute();

            $_SESSION["msg"] = "Contato criado com sucesso!";

        } else if ($data["type"] === "edit") {

            //inputs form
            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];
            $id = $data["id"];

            $updateQuery = "UPDATE contacts 
                            SET name = :name, phone = :phone, observations = :observations 
                            WHERE id = :id";

            $stmt = $conn->prepare($updateQuery);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);

            $stmt->execute();

            $_SESSION["msg"] = "Contato atualizado com sucesso!";
        } else if ($data["type"] === "delete") {

            $id = $data["id"];

            $deleteQuery = "DELETE FROM contacts WHERE id = :id";

            $stmt = $conn->prepare($deleteQuery);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $_SESSION["msg"] = "Contato excluído com sucesso";
        }

        //redirect HOME
        header("Location:" . $BASE_URL . "../index.php");

    //SELECIONANDO DADOS
    } else {

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
    }

    //FECHAR CONEXÃO
    $conn = null;