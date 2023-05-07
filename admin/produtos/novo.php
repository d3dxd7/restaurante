<?php

include('../config.php');

session_start();

if(!isset($_SESSION['email'])){

    header("Location: {$back_url}");

}

$conexao = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

$sql_categorias = "select * from categorias order by nome";

$query_categorias = mysqli_query($conexao, $sql_categorias);

?>

<!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $application_name ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>

        <?php include('../menu.php'); ?>

        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= $back_url; ?>">
                            Admin
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= $back_url . '/produtos'; ?>">
                            Produtos
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Novo
                    </li>
                </ol>
            </nav>
        </div>

        <div class="container">

            <?php if(isset($_GET['alerta'])): ?>

                <div class="alert alert-danger" role="alert">
                    <?= $_GET['mensagem'] ?>
                </div>

            <?php endif; ?>

            <form method="post" action="<?= $back_url . '/produtos/insert.php' ?>" enctype="multipart/form-data">
                <div>
                    <label>
                        Categoria
                    </label>
                    <select name="categoria_id" class="form-control" required>
                        <option value="">Selecionar</option>
                        <?php while($categoria = mysqli_fetch_array($query_categorias)){ ?>
                            <option value="<?= $categoria['id'] ?>">
                                <?= $categoria['nome'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <div>
                    <label>
                        Nome
                    </label>
                    <input placeholder="Exemplo: Coca Cola 2L" type="text" name="nome" class="form-control" required>
                </div>
                <br>
                <div>
                    <label>
                        Preço
                    </label>
                    <input type="text" name="preco" class="form-control real" required>
                </div>
                <br>
                <div>
                    <label>
                        Imagem
                    </label>
                    <input type="file" name="file" class="form-control" required>
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">
                        Salvar
                    </button>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
        <script src="<?= $front_url ?>/js/jquery-3.6.4.min.js"></script>
        
        <script src="<?= $front_url ?>/js/jquery.maskMoney.js"></script>
        
        <script type="text/javascript">

            $(".real").maskMoney({
                prefix: "",
                decimal: ",",
                thousands: "."
            });

        </script>
    </body>


    </html>