<?php
    session_start();

    //Validando formulario

    if(isset($_POST['acao'])){
        $tarefa = strip_tags($_POST['tarefa']);
        //Verificar se existe uma sessão tarefas
        if(!isset($_SESSION['tarefas'])){
            $_SESSION['tarefas'] = array();
            $_SESSION['tarefas'][] = $tarefa;
        } else {
            $_SESSION['tarefas'][] = $tarefa;
        }
        echo '<script>alert("Tarefa adicionada com sucesso!");</script>';
    }

    if(isset($_POST['apagar'])){
        unset($_SESSION['tarefas']);
        echo '<script>alert("Lista apagada com sucesso!");</script>';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tarefas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #fafafa;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);

            max-width: 500px;
            margin: 0 auto;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background: #00a65a;
            color: #fff;
            border: 0;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        #apagar {
            background: #dd4b39;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        h3 {
            text-align: center;
            margin: 20px;
        }

        p {
            text-align: center;
            margin: 20px;
        }
    </style>
</head>
<body>
    <section class="container">
        <form action="" method="post">
            <input type="text" name="tarefa" placeholder="Digite sua tarefa...">
            <input type="submit" name="acao" value="Enviar!">
            <input type="submit" name="apagar" value="Apagar Lista" id="apagar">
        </form>
        <h3>Suas tarefas atuais</h3><br>
    </section>
    <?php
        if(isset($_SESSION['tarefas'])){
            foreach($_SESSION['tarefas'] as $tarefa){
                echo '<p>'.$tarefa.'</p>';
            }
        }
    ?>
</body>
</html>