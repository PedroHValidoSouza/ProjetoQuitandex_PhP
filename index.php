<?php 
require_once('database/conn.php');

$tasks = [];

$sql = $pdo->query("SELECT * FROM task ORDER BY id ASC");

if($sql->rowCount() > 0) {
    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quitandex</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dark-mode.css" id="dark-mode-style" disabled>
</head>
<body>
    
    <header class="navBar">
  <div class="logo" style="font-family: 'Bangers', cursive; font-size: 2.5rem;">
    <a href="index.php" class="home-icon" style="color: white;">
      <i class="fas fa-shopping-basket" style="margin-right: 0.5rem;"></i></a> Quitandex
  </div>


        <button id="menuHamburguer" class="menu-toggle" aria-label="Menu">
            <i class="fas fa-bars"></i>
        </button>

        <nav class="navg" id="navMenu">
            <a href="index.php" class="nav-link" style="color: white;"><i class="fas fa-home"></i> Início</a>
            <button id="btnModo"><i class="fas fa-moon"></i> Modo Escuro</button>
            <a href="listas-populares.html" class="nav-link" style="color: white;"><i class="fas fa-fire"></i> Listas Populares</a>
            <a href="sobre.html" class="nav-link" style="color: white;"><i class="fas fa-info-circle"></i> Sobre Nós</a>
        </nav>
        </header>

    <main class="conteudo">
           <div id="to-do">
        <h1>lista de compras</h1>

        <form action="actions/create.php" method="POST" class="to-do-form">
            <input type="text" name="description" placeholder="adicione um item" required>
            <button type="submit" class="form-button">
            <i class="fa-solid fa-plus" style></i>
            </button>
        </form>
        
        <div id="tasks">
            <?php foreach($tasks as $task): ?>
            <div class="task">
                <input 
                        type="checkbox" 
                        name="progress" 
                        class="progress"
                        <?= $task['completed'] ? 'checked' : '' ?>
                    >

                    <p class="task-description">
                        <?= $task['description'] ?>
                    </p> 

                    <div class="task-actions">
                        <a href="#" class="action-button edit-button">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="actions/delete.php?id=<?= $task['id']?>" class="action-button delete-button">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </div>

                    <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
                        <input type="text" class="hidden" name="id" value="<?=$task['id']?>">
                        <input 
                            type="text" 
                            name="description" 
                            placeholder="Edit your task here" 
                            value="<?=$task['description']?>"
                        >
                        <button type="submit" class="form-button confirm-button">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>
            </div>
            <?php endforeach ?>
        </div>
    </div>

        <div class="produtos">
            <div class="produtos">
                <div class="Imgs" data-categoria="carnes">
                    <img src="imgs/vista-lateral-o-chef-faz-carne-marmorizada-crua-para-bifes-em-um-carrinho.jpg" alt="Carnes">
                    <span>Carnes</span>
                </div>
                <div class="Imgs" data-categoria="laticinios">
                    <img src="imgs/laticinios.jpg" alt="Laticínios">
                    <span>Laticínios</span>
                </div>
                <div class="Imgs" data-categoria="frutas">
                    <img src="imgs/frutas.jpg" alt="Frutas">
                    <span>Frutas</span>
                </div>
                <div class="Imgs" data-categoria="graos">
                    <img src="imgs/graos.jpg" alt="Grãos">
                    <span>Grãos</span>
                </div>
                <div class="Imgs" data-categoria="bebidas">
                    <img src="imgs/sucos.jpg" alt="Bebidas">
                    <span>Bebidas</span>
                </div>
                <div class="Imgs" data-categoria="padaria">
                    <img src="imgs/padaria.jpg" alt="Padaria">
                    <span>Padaria</span>
                </div>
                <div class="Imgs" data-categoria="limpeza">
                    <img src="imgs/limpeza.jpg" alt="Limpeza">
                    <span>Limpeza</span>
                </div>
                <div class="Imgs" data-categoria="higiene">
                    <img src="imgs/higiene.jpg" alt="Higiene">
                    <span>Higiene</span>
                </div>
                <div class="Imgs" data-categoria="reforma">
                    <img src="imgs/conjunto-de-ferramentas-de-arquiteto.jpg" alt="reforma">
                    <span>Reforma</span>
                </div>
            </div>
        </div> 
    </main>
    <script src="js/dark-mode.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/script.js"></script>
</body>
</html>