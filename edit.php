<?php

    include_once("templates/header.php");

?>
    <div class="container">
        <?php include_once("templates/backbtn.php") ?>
        <h1 id="main-title">Editar Contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $contact["id"] ?>">
            <div class="form-group">
                <label for="name">Nome do contato:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="name" 
                    id="name" 
                    required 
                    placeholder="Insira o nome do contato"
                    value="<?= $contact["name"] ?>";
                >
            </div>
            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="phone" 
                    id="phone" 
                    required placeholder="Insira o telefone do contato"
                    value="<?= $contact["phone"] ?>";
                >
            </div>
            <div class="form-group">
                <label for="observations">Observações:</label>
                <textarea 
                    type="text" 
                    class="form-control" 
                    name="observations" 
                    id="observations" 
                    placeholder="Insira as observações" 
                    rows="3"
                ><?= $contact["observations"] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
<?php

include_once("templates/footer.php");

?>