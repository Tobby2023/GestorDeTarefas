<?php
$titulo = "Gestor De tarefa";
include_once './Controller/TarefaControl.php';

// route the request internally
$uri = explode("?", $_SERVER['REQUEST_URI']);
$url = $uri[0];
$tarefaControl = new TarefaControl();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="Content/css/bootstrap.min.css"/>
    <title><?php echo $titulo;?></title>
</head>
<body>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <?php

                    //Rotas definidas
                    if($url == "/GestorDeTarefas/" || $url == "/GestorDeTarefas/Tarefas" || $url == "/GestorDeTarefas/Tarefa"){
                        $tarefaControl->index();
                    }else if($url == "/GestorDeTarefas/Guardar"){
                        $tarefaControl->addTarefa();
                    }else if($url == "/GestorDeTarefas/Remover"){
                        $tarefaControl->removerTarefa();
                    }else {
                        header('Status: 404 Not Found');
                        echo '<hr/><h1> Page Not Found </h1><hr/>';
                    }
                ?>
                </div>
            </div>
        </div>
    </section>
<script src="Content/js/bootstrap.min.js"></script>
</body>
</html>